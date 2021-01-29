<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('connect.php');

//$EmployeeID   = $_REQUEST['EmployeeID'];
//$Title		  = $_REQUEST['Title'];
$m_name		  = $_REQUEST['m_name'];
$m_username		  = $_REQUEST['m_username'];
$m_password		  = $_REQUEST['m_password'];

$sql = "
	INSERT INTO member(m_username,m_password,m_name)
	VALUES ('$m_username','$m_password','$m_name');
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	header("location: index.html");
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>