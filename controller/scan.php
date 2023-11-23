<?php
if (isset($_POST['submit'])) {
    $fileN = $_POST['fileName'];
    $modifiedTime = $_POST['modifiedTime'];

    $uploadDir = "./uploads/";
    $uploadedFile = $uploadDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));

    // ตรวจสอบว่าไฟล์เป็นไฟล์ CSV หรือไม่
    if ($fileType != "csv") {
        echo "เฉพาะไฟล์ CSV เท่านั้นที่อนุญาตให้อัปโหลด";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "มีข้อผิดพลาดในการอัปโหลดไฟล์";
    } else {
        // echo $uploadedFile;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile)) {
            // echo "ไฟล์ถูกอัปโหลดเรียบร้อยแล้ว";
            $FN = $uploadedFile;
            // echo $FN;
            $sum = 0;
            $sumP = 0;
            $sumL = 0;
            if (file_exists($FN)) {
                $lastModifiedTimestamp = filectime($FN);
                date_default_timezone_set('Asia/Bangkok');
                $dateObj = DateTime::createFromFormat('m/d/Y, g:i:s A', $modifiedTime);
                $lastModifiedDate = $dateObj->format('Y-m-d H:i:s');

                $file = fopen($FN, 'r');

                // Read the header row (if needed)
                $header = fgetcsv($file);

                // Loop through the remaining rows
                while ($row = fgetcsv($file)) {
                    // Escape values to prevent SQL injection
                    $values = array_map(array($conn, 'real_escape_string'), $row);
                    $totalPrints = !empty($values[2]) ? $values[2] : 0;

                    $sql = "INSERT INTO `report_cannon`(
                         
            `date`,
            `filename`,
            `Dept.ID`,
            `Username`,
            `TotalPrints`,
            `ColorTotal`,
            `Black&WhiteTotal`,
            `ColorCopy`,
            `ColorScan`,
            `ColorPrint`,
            `Black&WhiteCopy`,
            `Black&WhiteScan`,
            `Black&WhitePrint`
        )
        VALUES(
            '$lastModifiedDate',
            '$fileN',
            '$values[0]',
            '$values[1]',
            '$values[2]',
            '$values[3]',
            '$values[4]',
            '$values[5]',
            '$values[6]',
            '$values[7]',
            '$values[8]',
            '$values[9]',
            '$values[10]'
        )";
                    $sum = $sum + 1;
                    // echo $sum;
                    if ($conn->query($sql) === TRUE) {
                        $sumP = $sumP + 1;
                    } else {
                        // echo "Error: " . $sql . "<br>" . $conn->error;
                        $sumL = $sumL + 1;
                    }
                }
                $re = ($sumP / $sum) * 100;
                $result = number_format($re, 2);
                $lo = ($sumL / $sum) * 100;
                $lost = number_format($lo, 2);

                // echo "<br>";
                // echo "ข้อมูลทั้งหมด " . $sum . " บรรทัด<br>";

                if ($result == 100) {
                    echo "<script>
                    alert('อัปโหลดไฟล์สำเร็จ " . $result . " %');
                </script>";
                } else {
                    echo "<script>
                    alert('อัปโหลดไฟล์สำเร็จ " . $result . " %');
                </script>";
                echo "<script>
                alert('สูญหาย " . $sumL . "');
            </script>";
                }
                fclose($file);
            } 
            else {
                echo "ไฟล์ '$filename' ไม่พบ";
            }
        } 
        else {
            echo "ไฟล์ยังไม่ถูกย้าย";
        }
    }
}
?>
