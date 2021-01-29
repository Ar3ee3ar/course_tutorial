<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
session_start();
require('connect.php');

//$EmployeeID   = $_REQUEST['EmployeeID'];
//$Title		  = $_REQUEST['Title'];
$m_old_password		  = $_REQUEST['m_old_password'];
$m_password		  = $_REQUEST['m_new_password'];

$m_username = $_SESSION["m_username"]; 
  $sql = "
  SELECT * FROM `member` WHERE m_username = '$m_username' ;
    ";

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $objResult = mysqli_fetch_array($objQuery);
if($m_old_password==$objResult["m_password"]){
      $sql = "
        UPDATE member
        SET 
        m_password = '$m_password'
        WHERE m_username = '$m_username' ; 
	    ";

    $objQuery = mysqli_query($conn, $sql);

    if ($objQuery) {
	    header("Location: editprofile.php"); 
        exit;
    }else {
	    echo "Error : Input";
    }
}
else{
    echo '<script>
            alert("Sign In Error\nSorry, your old password is incorrect\n Please try again");
            window.location.href="editpass.php"</script>';
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>