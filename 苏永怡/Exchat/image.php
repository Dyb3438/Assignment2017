<?php
include_once("pdo.php");
$p=$_GET['p'];
$year=date("Y");
$month=date("m");
$day=date('d');
$time="";
$sql="select*from image where id>$p";
$res=$dbh->query($sql);
while($row=$res->fetch()){
    $str=$row['Sam'].",".$row['Tom'].",".$row['year'].",".$row['month'].",".$row['day'].",".$row['time'].",";
    echo($str);
    }
    $year=$row['year'];
    $month=$row['month'];
    $day=$row['day'];
    $time=$row['time'];

?>