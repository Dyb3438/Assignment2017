<?php
include_once("pdo_db.php");
$id=$_COOKIE['name'];
$name=$_POST['id'];
$sex="";
$sex=$_POST['sex'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];
$wechat=$_POST['wechat'];
$area=$_POST['area'];
$schoolarea=$_POST['schoolarea'];
if($name==""){
    $b="0";
    echo"<script>alert('请输入姓名！！');history.go(-1)</script>";
}else{
    $b="1";
}
//
if($b=="1") {
    $sql = "insert into informations2 values('$id','$name','$sex','$tel','$qq','$wechat','$area','$schoolarea',null)";
    $res = $dbh->exec($sql);
//传输数据
    if ($res) {
        echo "</br>报名成功！！";
        echo"</br>3秒后返回个人主页";
        header("Refresh:3;url=Choose.php");
    }
}