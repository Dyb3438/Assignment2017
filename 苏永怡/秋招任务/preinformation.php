<center>
    <script>
        function checkpassword(){
            var div = document.getElementById("div1");
            div.innerHTML = "";
            var password = document.form3.password.value;
            if (password == "") {
                div.innerHTML = "密码不位空！";
                document.form3.password.focus();
                return false;
            }
            if (password.length < 4 || password.length > 12) {
                div.innerHTML = "密码长度4-12位";
                document.form3.password.select();
                return false;
            }
            var se=confirm("确定吗？")
            if (se==true){
                return true;
            }else{
                return false;
            }
        }
        function change(){
            document.getElementById('password').type="text";
            document.getElementById('email').type = 'email';
            document.getElementById('tel').type = 'text';
            document.getElementById('input1').disabled = false;
            document.getElementById('input2').disabled = 'disabled';
        }
    </script>
    <form name="form3" id="form3" method="post" action = 'UpdateInformation.php' onsubmit="return checkpassword()">
    <table>
<?php
include_once("pdo_db.php");
$a="还没报名";
if ($dbh) {
    echo "</br><span style='font-size:24px;color:#FF0000'>个人信息</span></br>";
}
$name=$_COOKIE['name'];
$date=$dbh->query('select id,password,email,tel from informations');
while($row=$date->fetch()){
    if($row['id']==$name){
        $id=$row['id'];
        $password=$row['password'];
        $email=$row['email'];
        $tel=$row['tel'];
    }
}
$date2=$dbh->query('select id,name,sex,tel,qq,wechat,area,schoolarea from informations2');
while($row2=$date2->fetch()){
    if($row2['id']==$name){
        $a="已报名";
    }else{
        $a="还没报名";
    }
}
echo"<tr>
          <td>
              用户名：
          </td>
          <td>
             <input value='$name' type='image' name='id' onclick='return false'>
          </td>
     </tr>";
echo"<tr>
          <td>
              密码：
          </td>
          <td>
              <input value='$password' type='image' name='password' id='password' onclick='return false'>
              <div id=\"div1\" style=\"display:inline\" >
          </td>
     </tr>";
echo"<tr>
          <td>
              电子邮箱地址：
          </td>
          <td>
              <input value='$email' type='image' name='email' id='email' onclick='return false'>
          </td>
     </tr>";
echo"<tr>
         <td>
             联系方式：
         </td>
         <td>
             <input value='$tel' type='image' name='tel' id='tel' onclick='return false'>
         </td>
     </tr>";
echo"<tr>
          <td>
              活动报名情况：
          </td>
          <td>
              <input value='$a' type='image' onclick='return false'>
          </td>
     </tr>";
if($a=="还没报名"){
echo"<tr><td></td><td><a href='project.php'>点击这里报名</a></td>";
}
?>
    </table>
        <input type="submit" value="提交" disabled="disabled" id="input1" style="width:100px;height:30px;font-size:18px"  ></input>
    </form>
    <input type="button" value="编辑" onclick="change()"  id="input2" style="width:100px;height:30px;font-size:18px"></input>
    <p>
        <input type="button" value="返回" onclick="window.close();window.open('Choose.php')" style="width:100px;height:30px;font-size:18px">
    </p>
</center>





