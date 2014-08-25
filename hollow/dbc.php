<?php
 date_default_timezone_set('Asia/Shanghai');
 header("Content-Type: text/html;charset=utf-8");
 ini_set('session.bug_compat_warn', 0);
 ini_set('session.bug_compat_42', 0);
 session_start();
 $serverhost = "localhost:3306";
 $dbusername = "root";
 $dbpassword = "asdw";
 $dbname = "hollow";
 $dbc = mysql_connect($serverhost,$dbusername,$dbpassword); 
 mysql_select_db($dbname,$dbc); 
 mysql_query("set character set utf8");
?>