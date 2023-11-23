<?php
ob_start();
session_start();
include "./controller/connect.php";
$request = $_SERVER['REQUEST_URI'];
// echo $request;

switch ($request) {
    case "/":
        include "./pages/home.php";
        break;
    case "/page/data/":
        include "./pages/data.php";
        break;
    case"/test":
        include "tset.php";
        break;
    case"/test1":
        include "test.php";
            break;
}
?>
