<?php
$servername = "localhost";
$username = "root";
$password = "#Genesys!1#";
$dbname = "cannon";
// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
} else {
    // echo "การเชื่อมต่อสำเร็จ";
}
?>
