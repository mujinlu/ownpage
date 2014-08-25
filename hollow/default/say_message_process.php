<?php
include("../dbc.php");
ob_start();
$message_words=$_POST['say_message_words'];
if(isset($_SESSION['user_id']))
{
$userid=$_SESSION['user_id'];
$sql_u="select user_name from user where user_id={$_SESSION['user_id']}";
$res_u=mysql_query($sql_u,$dbc);
$obj_u=mysql_fetch_row($res_u);
$user_name=$obj_u[0];
}
else{
	$user_name="匿名用户";
	$userid=0;
}
$t=time(); 
$date=date("F j, Y, g:i A"); 

$sql_0="select id from messages order by id DESC limit 1";
$res_0=mysql_query($sql_0,$dbc);
$num=mysql_num_rows($res_0);
$obj_0=mysql_fetch_row($res_0);
if($num>0)
$id=$obj_0[0]+1;
else
$id=1;

$sql_i="insert into messages (id,user_id,username,message,time) values ($id,$userid,'$user_name','$message_words','$date')";
$res_i=mysql_query($sql_i);
if(!$res_i)
{
	echo "投递失败，请重新投递，注意字数限制 ";
}
else
    echo "投递成功 ";
echo "页面将在3秒后返回";
Header("Refresh:3;url=../index.php");
ob_end_flush();
?>