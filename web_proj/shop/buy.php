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
$ID_sub		  = $_GET['id'];

$sql = "
INSERT INTO `history`(`ID_sub`, `m_username`, `ID_status`,`history_date`) 
	VALUES ('$ID_sub','$m_username',1,NOW());
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	header("location:history_page.php");
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>