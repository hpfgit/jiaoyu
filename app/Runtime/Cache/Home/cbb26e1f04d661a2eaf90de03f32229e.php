<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>欢迎您的到来！</h1>
<input type="hidden" id="login" value="<?php echo ($coo); ?>">
<input type="hidden" id="username" value="<?php echo ($username); ?>">
<script src="/jiaoyu/app/Home/View/index/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url:'/jiaoyu/app/Home/Controller/checklogin.php',
            data:{
                login:$("#login").val(),
                username:$("#username").val()
            },
            type:'post',
            dataType:"json",
            success:function(data){
                if (data.success == 'true') {
                    alert('你的帐号已在另一台设备登录！');
                    location.href="login.php";
                }
            },
            error:function(jqXHR){
                alert(jqXHR.status);
            }
        });
    });
</script>
</body>
</html>