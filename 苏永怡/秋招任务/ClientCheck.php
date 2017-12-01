<?php
session_start();
include_once("pdo_db.php");
$name=$_POST['id'];
$password=$_POST['password'];
$code=$_POST['code'];
$fix="0";
$daice="baba";
$date=$dbh->query('select id,password from informations');
if($code!=$_SESSION['code']){
    echo"<script>alert('验证码错误！！');history.go(-1);</script>";
}else{
    while($row=$date->fetch()){
        if ($row['id']==$name){
            $daice=$row['password'];
            $fix="1";
            echo"登录成功！";
            echo"</br>3秒后自动跳转……";
            setcookie('name',$name);
            header("Refresh:3;url=Choose.php");
        }
        if($fix=="0"){
            echo"<script>alert('用户名不存在，先注册');history.go(-1);</script>";
        }elseif($password!=$daice){
            echo"<script>alert('密码错误！！');history.go(-1);</script>";
        }
    }
}







?>

