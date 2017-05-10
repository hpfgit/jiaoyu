<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/order/bootstrap/css/normalize.css" rel="stylesheet">
    <link href="/order/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/order/bootstrap/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<form action="/jiaoyu/index.php/Index/upload" enctype="multipart/form-data" method="post" >
    <input type="text" name="name" />
    <input type="file" name="photo" />
    <input type="submit" value=" 提交 " >
</form>
</body>
<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url:'logincheck.php',
            data:{
                login:'<?php echo $_COOKIE['uniqid']; ?>',
                id:'<?php echo $_COOKIE['id']; ?>'
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
</html>