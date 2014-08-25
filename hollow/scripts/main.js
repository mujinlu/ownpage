console.log('%c  ', 'font-size:124px;background-image:url(http://ququ.qiniudn.com/uploads/2011/07/ququ_1_1_1.jpg)');

function showLoginForm(){
$('#login').modal();
}

function login(){
		var username=document.getElementById('username').value;
		var password=document.getElementById('password').value;
		if(!username||!password)
		{
		login_tip.innerText="请填写完整所有项";	
		return false;
		}
}

function show_say_message(){
	var say_message=document.getElementById('say_message');
	var message=document.getElementById('message');
	message.style.display='none';
	say_message.style.display='inline-block';
	return false;
}
function show_message(){
	var say_message=document.getElementById('say_message');
	var message=document.getElementById('message');
	say_message.style.display='none';
	message.style.display='inline-block';
	return false;
}
function say_message_check(){
	var message_words=document.getElementById('say_message_words').value;
	if(!message_words)
	{
		say_message_tip.innerText="请填写完整所有项";
		return false;
	}
}

function logout_action(){
	$.post('login/logout.php',{text:'logout'},function(){alert("成功退出");window.location.href="index.php";});
	return 1;
}