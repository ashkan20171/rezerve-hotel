<?php
ini_set("display_errors", "On");
date_default_timezone_set("Asia/Tehran");

$link_host = "localhost:3306";
$link_dbname = "booking";
$link_username = "root";
$link_password = "";

$link = mysqli_connect($link_host, $link_username, $link_password, $link_dbname)or die(mysqli_error());
mysqli_set_charset($link, "utf8");
?>