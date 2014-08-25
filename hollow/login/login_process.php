<?php
include("../dbc.php");
$username=$_POST['username'];
$password=$_POST['password'];
mysql_query("set character set utf8");
$sql_0="select user_id from user where user_name='$username' and password='$password'";
$res_0=mysql_query($sql_0,$dbc);
$obj_0=mysql_fetch_row($res_0);
$user_id_db=$obj_0[0];
if($obj_0!=null)
{
	$_SESSION['user_id']=$user_id_db;
	Header("Refresh:5;url=../index.php");
	echo "登陆成功，将在5秒内返回原页面……";	
}
else{
	Header("Refresh:5;url=../index.php");
	echo "登陆失败，页面将在5秒内返回，请重新登陆";
	
}
?>