<?php
include_once("pdo.php");
$Tom = $_GET["Tom"];
$year=date("Y");
$month=date("m");
$day=date('d');
date_default_timezone_set("Asia/Shanghai");
$time=date("H:i:s");
if($Tom!=null) {
    $sql = "insert into image values(null,'','$Tom','$year','$month','$day','$time')";
    $res = $dbh->exec($sql);
}
?>