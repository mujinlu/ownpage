<?php
include("dbc.php");
if(isset($_SESSION['user_id']))
{
$sql_u="select user_name from user where user_id={$_SESSION['user_id']}";
$res_u=mysql_query($sql_u,$dbc);
$obj_u=mysql_fetch_row($res_u);
$user_name=$obj_u[0];
echo '欢迎您：'.$user_name;
$log_state=1;

}
else
{
echo '请登陆';
$log_state=0;

}
?>
<html>
<head>
<meta charset="utf-8">
<title>hollow</title>
<link rel="stylesheet" type="text/css" href="mainpage.css">
<script type='text/javascript' src='scripts/jquery.js'></script>
<script type='text/javascript' src='scripts/jquery.simplemodal.1.4.4.min.js'></script>
<script src="scripts/main.js"></script>
<script language='javascript'  for="window" event="onload">
window.onload=function(){
	var logState=<?=$log_state?>;
	if(logState==0){
	var login=document.getElementById('log1');
	var logout=document.getElementById('log2');
	login.style.display='block';
	logout.style.display='none';
	}
	else if(logState==1)
	{
	var login=document.getElementById('log1');
	var logout=document.getElementById('log2');
	login.style.display='none';
	logout.style.display='block';	
}
}
</script>
</head>
<body>
<div class='header'>
	<div class='login' id='log1' style="block">
	<a href="javascript:showLoginForm()" id='logintop'>登陆</a>
	<a href="signup/signup.html">注册</a>
	</div>
	<div class='logout' id='log2' style="block">
	<a href=""><?=$user_name?></a>
	<a href="javascript:logout_action()">退出</a>
	</div>	
</div>
<div class='tag'>
	<ul>
		<li class='say_by_hollow'>
		<a href='' onclick="return show_message();">倾听</a>
		</li>
		<li class='say_to_hollow'>
		<a href='' onclick="return show_say_message();">TELL诉说</a>
		</li>
	</ul>
</div>
<div class='content-block'>
	<div class='message' id='message'>
		<?php
		$sql_0="select * from messages order by id DESC";
		$res_0=mysql_query($sql_0,$dbc);
		while($obj_0=mysql_fetch_object($res_0))
		{
			$user_id=$obj_0->user_id;
			$message=$obj_0->message;
			$username=$obj_0->username;
			$time=$obj_0->time;
			$hollow_content="
				<div class='hollow_words'>
				<div class='hollow_words_user' id='hollow_user_".$user_id."'>
				$username &nbsp &nbsp $time
				</div>
				</br>
				$message
				</div>
				";
			echo $hollow_content;	
		}
		?>
	</div>
	<div class='say_message' id='say_message' style='display:none'>

		<form action="default/say_message_process.php" method="post" onsubmit="return say_message_check()">
			<div class='say_message_block'>
				<textarea rows="10" cols="60" name='say_message_words' id='say_message_words' placeholder='想说点什么呢'></textarea>
				</br>
				<input id='say_message_submit' type="submit" value="投递"></br>
				<div id='say_message_tip'></div>
			</div>
		</form>
	</div>

	<div class='ads'>
	<div id='show_title_date'>
	<?php
	echo "今天是:</br>".date("F j, Y");
	?>
	<img id='ad_board' src="images/ad_board.gif"/>
	</div>
	</div>
</div>
<div id='login' style='display: none'>
   <form action="login/login_process.php" method="post" onsubmit="return login()">
		<div class='login_block'>
			<input id='username' name='username' type='text' placeholder='用户名' maxlength="15">
			</br>
			<input id='password' name='password' type="password" placeholder='密码'>
			</br>
			<input id='submit' type="submit" value="登陆"></br>
			<div id='login_tip'></div>
		</div>
   </form>
</div>
<div id='footer'>
<div id='claim'>
mujinlu@gmail.com&nbsp|&nbsp&copy&nbspmujinlu
</div>
</div>
</body>
</html>