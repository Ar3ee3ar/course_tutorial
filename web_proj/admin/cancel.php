<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
session_start();
require('../connect.php');
if(empty($_SESSION["admin_username"])){
    header("location: ../admin/index.html");
}
//$EmployeeID   = $_REQUEST['EmployeeID'];
//$Title		  = $_REQUEST['Title'];
$m_username		  = $_GET['id'];

$sql = "
DELETE FROM `member` 
	WHERE m_username=".$m_username;

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	header("location:member_page.php");
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>