<?php
require("connect.php");
$m_username = $_REQUEST["username"];
$query = "SELECT * FROM `member` WHERE m_username='$m_username'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
sleep(1);
if ($count==1) {
    echo "denied";
} else {
    echo "okay";
}
?>