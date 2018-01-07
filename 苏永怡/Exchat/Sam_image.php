<?php
include_once("pdo.php");
$Sam = $_GET["Sam"];
$year=date("Y");
$month=date("m");
$day=date('d');
date_default_timezone_set("Asia/Shanghai");
$time=date("H:i:s");
if ($Sam!=null){
$sql = "insert into image values(null,'$Sam','','$year','$month','$day','$time')";
$res = $dbh->exec($sql);
}
?>