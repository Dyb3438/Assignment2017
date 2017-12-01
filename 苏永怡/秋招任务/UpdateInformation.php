<?php
include_once("pdo_db.php");
$name=$_COOKIE['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$sql1="update informations set password='$password' where id='$name'";
$sql2="update informations set email='$email' where id='$name'";
$sql3="update informations set tel='$tel' where id='$name'";
$res1=$dbh->exec($sql1);
$res2=$dbh->exec($sql2);
$res3=$dbh->exec($sql3);
if($res1+$res2+$res3>0){
    echo"个人信息修改成功！";
}else{
    echo"个人信息没修改！";
}
header("Refresh:3;url=preinformation.php");
?>

