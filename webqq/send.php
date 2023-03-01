<?php

require_once 'msgservice.php';
echo "添加trying";
$sender=$_POST['sender'];
$getter=$_POST['getter'];
$con=$_POST['con'];

file_put_contents("C:\AppServ\www\webqq\logs.txt",$sender."--".$getter."--".$con."--");



$messageservice=new messageservice();

if ($messageservice->addmsg($sender, $getter, $con)==0){
	echo "添加失败";
}


?>