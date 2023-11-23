<?php
if(isset($_POST['submit'])){
    $inputValue = $_POST['inputField'];
    // ทำอะไรก็ตามกับค่าที่ได้ เช่นบันทึกลงฐานข้อมูล
    echo "ค่าที่ได้คือ: " . $inputValue;
}
?>
