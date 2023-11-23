<?php
if (isset($_POST['Select'])) {
    $year = $_POST['monthYear'];
    $_SESSION['Year'] = $year;
    header("location: /page/data/");
}
