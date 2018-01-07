<?php
include_once("pdo.php");
$update="select*from image order by id desc limit 1";
$result=$dbh->query($update);
$back=$result->fetch()['id'];
if($back==""){
    echo "0";
}else{
    echo $back;
}
?>