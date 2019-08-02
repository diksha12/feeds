<?php
date_default_timezone_set("Asia/Calcutta");
$timenow=date("Y-m-d H:i:s");
$link = mysqli_connect('localhost', 'root','root','feed');
if(!$link)
{
	die('db not connected');
}
?>