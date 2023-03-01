<?php
require_once 'msgservice.php';


header("Content-Type:text/xml;charset=utf-8");
header("Cache-Control:no-cache");


$getter=$_POST['getter'];
$sender=$_POST['sender'];

$msgservice=new messageservice();

$msglist=$msgservice->getmsg2($getter, $sender);
//file_put_contents("C:\AppServ\www\webqq\logs.txt", "msglist0000=".$msglist."\r\n",FILE_APPEND);
//echo "get method";
echo $msglist;

?>