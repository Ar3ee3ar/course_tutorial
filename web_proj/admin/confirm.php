<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
session_start();
require('../connect.php');
if(empty($_SESSION["m_username"])){
    header("location: ../index.html");
}

//$EmployeeID   = $_REQUEST['EmployeeID'];
//$Title		  = $_REQUEST['Title'];
$m_username		  = $_SESSION["m_username"];
$ID_his		  = $_GET['id'];

$sql = "
UPDATE `history`
SET ID_status =2
WHERE ID_history=".$ID_his.";";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	header("location:order_page.php");
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>