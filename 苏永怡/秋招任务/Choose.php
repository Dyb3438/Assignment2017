<html>
<body style="background-image:url(background.png);background-size:cover">
<?php
$name=$_COOKIE['name'];
echo"<span style='font-size:30px;color:#8B0000'>欢迎$name";
echo"<a href='renwukaohe.html' style='font-size:20px;color:red'>(注销)</a>";
echo"<center>
              <p style=\"padding-top: 200px;\">
                   <input value='个人信息' type='button' style=' width:400px;height:100px;font-size:50px' onclick=\"window.close();window.open('preinformation.php')\">
              </p>
              <p style=\"padding-top: 20px;\">
                   <input value='活动报名' type='button' style='width:400px;height:100px;font-size:50px' onclick=\"window.close();window.open('project.php')\">
              </p>
      </center>"
?>
</body>
</html>

