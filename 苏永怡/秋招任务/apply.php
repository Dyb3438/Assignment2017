<html> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>注册页面</title> 
    <script language="javascript">
        function checkname(){
            var div = document.getElementById("div1");
            div.innerHTML = "";
            var name1 = document.form1.name.value;
            if (name1 == "") {
                div.innerHTML = "姓名不能为空！";
                document.form1.name.focus();
                return false;
            }
            return true;
        }
        function checkpassword(){
            var div = document.getElementById("div2");
            div.innerHTML = "";
            var password = document.form1.password.value;
            if (password == "") {
                div.innerHTML = "密码不位空！";
                document.form1.password.focus();
                return false;
            }
            if (password.length < 4 || password.length > 12) {
                div.innerHTML = "密码长度4-12位";
                document.form1.password.select();
                return false;
            }
            return true;
        }
        function checkrepassword() {
            var div = document.getElementById("div3");
            div.innerHTML = "";
            var password = document.form1.password.value;
            var repass = document.form1.text3.value;
            if (repass == "") {
                div.innerHTML = "密码不位空！";
                document.form1.text3.focus();
                return false;
            }
            return true
        }
        function checkrepass(){
            var password = document.form1.password.value;
            var repass = document.form1.text3.value;
            var div = document.getElementById("div3");
            div.innerHTML = "";
            if (password != repass) {
                div.innerHTML = "输入密码和确认密码不一致";
                document.form1.text3.select();
                return false;
            }
            return true;
        }
        function checkEmail(){
            var div = document.getElementById("div4");
            div.innerHTML = "可选";
            var email = document.form1.email.value;
            if (email.length>0){
            var sw = email.indexOf("@", 0);
            var sw1 = email.indexOf(".", 0);
            var tt = sw1 - sw;
            if (email.indexOf("@", 0) == -1) {
                div.innerHTML = "电子邮件格式不正确，必须包含@符号！";
                document.form1.email.select();
                return false;
            }
            if (email.indexOf(".", 0) == -1) {
                div.innerHTML = "电子邮件格式不正确，必须包含.符号!";
                document.form1.email.select();
                return false;
            }
            return true;
        }
        }
        function check(){
            if (checkname() && checkpassword() && checkrepassword()&& checkrepass()) {
                var sec=confirm("确认吗？")
                if(sec==true){
                    document.form1.submit();
                }
            }
        }
        function chongzhi(){
            document.form1.reset();
        }
    </script> 
    <style type="text/css">
        .submit{
            margin-top:10px;
            margin-left: -200px;
            border:1px solid black;
            width:200px;
            height:60px;
            text-align:center;
            font-size:40px;
        }
        .submit:hover{
            box-shadow: -3px -3px 5px 0 inset,
                          1px 1px 2.5px 0 inset;
        }
        .clean{
            margin-top: -62px;
            margin-left:400px;
            border:1px solid black;
            width:200px;
            height:60px;
            text-align:center;
            font-size:40px;
        }
        .clean:hover{
            box-shadow: -3px -3px 5px 0 inset,
            1px 1px 2.5px 0 inset;
        }
   </style>
</head> 
<body style="background-image:url(pic3.jpg);background-size:cover"> 
<center>
    <p style="padding-top: 20px;font-size:30px;color:#FFFF00">
    注册页面
    </p>
<form name="form1" method="post" action="ApplySubmit.php" onsubmit="return check()"> 
    <table> 
        <tr>
            <td> 
                用户名： 
            </td> 
            <td> 
                <input id="text1" type="text" name="name" onblur="checkname()"> 
                <div id="div1" style="display:inline"> 
                </div> 
            </td> 
        </tr> 
        <tr> 
            <td> 
                密码： 
            </td> 
            <td> 
                <input id="text2" type="password" name="password" onblur="checkpassword()"> 
                <div id="div2" style="display:inline ;"> 
                </div> 
            </td> 
        </tr> 
        <tr> 
            <td> 
                确认密码： 
            </td> 
            <td> 
                <input id="text3" type="password" name="text3" onblur="checkrepass()"> 
                <div id="div3" style="display:inline"> 
                </div> 
            </td> 
        </tr> 
        <tr> 
            <td> 
                电子邮箱地址： 
            </td> 
            <td> 
                <input id="text4" type="email" name="email" onblur="checkEmail()"> 
                <div id="div4" style="display:inline">可选
                </div> 
            </td> 
        </tr> 
        <tr> 
            <td> 
                联系方式： 
            </td> 
            <td> 
                <input id="text5" type="text" name="tel"> 
                <div id="div5" style="display:inline">可选
                </div> 
            </td> 
        </tr> 
    </table> 
</form> 
    <div class="submit" onclick="check()">提交</div>
    <div class="clean" onclick="chongzhi()">重置</div>
</center>
</body> 
</html>