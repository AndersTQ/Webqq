<?php
//关闭header提示,设置output_buffering = On
header("Content-Type: text/xml;charset=utf-8");

$user=$_POST['username'];
$pwd=$_POST['passwd'];

if ($pwd=='123'){

//把用户的名字保存到session
session_start();
$_SESSION['loginuser']=$user;

header("Location:list.php");
}else{
	header("Location:index.php");
}

?>
