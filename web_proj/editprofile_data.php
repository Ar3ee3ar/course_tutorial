<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
session_start();
require('connect.php');

//$EmployeeID   = $_REQUEST['EmployeeID'];
//$Title		  = $_REQUEST['Title'];
$m_name		  = $_REQUEST['m_name'];

$m_username = $_SESSION["m_username"]; 
      $sql = "
        UPDATE member
        SET 
        m_name = '$m_name'
        WHERE m_username = '$m_username' ; 
	    ";

    $objQuery = mysqli_query($conn, $sql);

    if ($objQuery) {
	    header("Location: editprofile.php"); 
        exit;
    }else {
	    echo "Error : Input";
    }
mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>