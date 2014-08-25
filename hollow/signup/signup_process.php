<?php
include("../dbc.php");
ob_start();
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$sql_0="select user_id from user order by user_id DESC limit 1";
$res_0=mysql_query($sql_0,$dbc);
$num=mysql_num_rows($res_0);
$obj_0=mysql_fetch_row($res_0);
if($num>0)
$user_id=$obj_0[0]+1;
else
$user_id=1;

$sql_1="insert into user (user_id,user_name,password) values ($user_id,'$username','$password')";
$res_1=mysql_query($sql_1);
if(!$res_1)
echo "注册失败，请返回重新注册";
else 
echo "注册成功";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>注册</title>
</head>
<body>
<div style="text-align:center;">
页面将在5秒内返回……
</div>
</body>
</html>
<?php
Header("Refresh:5;url=../index.php");
ob_end_flush();
?>