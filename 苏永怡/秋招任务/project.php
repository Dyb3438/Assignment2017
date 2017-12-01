<?php
$name=$_COOKIE['name'];
echo"<span style=\"color:#28FF28;position: absolute;height: 712px;width: 1280px;top: 50%;left: 50%;margin-left: -640px;margin-top: -356px\">欢迎
      <span style=\"color:#FFD700;\">$name";
echo"</br><span  style=\"color:#28ff28;\">目前有一个活动！！";
echo"</br><span  style=\"color:#28ff28;\">快点击
           <span  style=\"color:#0000CD;\">加入战斗
           <span  style=\"color:#28ff28;\">和我们一起
           <span style=\"color:#FF0000;font-size: 24px\" >战斗
           <span style=\"color:#28ff28;font-size: 17px\">吧！！"
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>活动</title>
</head>
<body style="background: black;" >  
<script>
    function ok(){
        window.close();
        window.open("apply_2.php");
    }
</script>
<div id="1" style="background-image:url(pic1.jpg);background-size:cover;position: absolute;height: 712px;width: 1280px;top: 50%;left: 50%;margin-left: -640px;margin-top: -356px;z-index: -1">
</div>
<div style="background: none;position: absolute;height: 712px;width: 1280px;top: 50%;left: 50%;margin-left: -640px;margin-top: -356px;">
<div id="2" style="height: 80px;width: 332px;position: absolute;left: 50%;margin-left: -166px;margin-top: 579px;" onclick="ok()"></div>
</div>
</body>
</html>