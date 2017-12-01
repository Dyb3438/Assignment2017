<?php
include_once("pdo_db.php");
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$a="1";
if ($dbh) {
    echo "成功连接数据库";
}
$checkname=$dbh->query('select id,password ,email,tel,no from informations');
while($row=$checkname->fetch()){
    if ($name==$row['id']){
        echo"<script>alert( '用户名已存在！');history.go(-1)</script>";
        $a="0";
    }
}
 if($a!="0"){
            $sql = "insert into informations values('$name','$password','$email','$tel',null)";
            $res = $dbh->exec($sql);
//传输数据
            if ($res) {
                echo "</br>注册成功,欢迎入坑！</br>3秒后自动跳转……";
            }
            setcookie('name', $name);
            header("Refresh:3;url=choose.php");}
        else{
            return false;
    }





?>

