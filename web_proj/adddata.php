<?php
try{
$pdo = new PDO("mysql:host=localhost;dbname=course;charset=utf8","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$filename = "course.json";
$data = file_get_contents($filename);
$array = json_decode($data,true);
foreach($array["Detail"] as $row){
    $ID = $row['ID'];
    $Name = $row['Name'];
    $Hour = $row['Hour'];
    $Price = $row['Price'];
    $Category = $row['Category'];
    $stmt = $pdo->prepare("INSERT INTO `subject`(`ID_sub`, `sub_name`, `sub_hour`, `sub_price`, `cat_name`) VALUES (?,?,?,?,?)");
    $stmt->bindParam(':ID',$ID);
    $stmt->bindParam(':Name',$Name);
    $stmt->bindParam(':Hour',$Hour);
    $stmt->bindParam(':Price',$Price);
    $stmt->bindParam(':Category',$Category);
    $stmt->execute();
}
header("location:test.php");
}
catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}
?>