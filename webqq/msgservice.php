<?php
//sender,recer,content,stime,ifrece数据库表格结构

//ajax提交的页面不会显示内容，如果要保存数据用file_put_contents保存到本地
require_once 'mysqlhelper.php';
class messageservice{
	
	//添加信息到数据库
	function addmsg($sender,$getter,$con){
		$sql="insert into webmessage(sender,getter,sendtime,content,isGet) values('$sender','$getter',now(),'$con',0)";
		file_put_contents("C:\AppServ\www\webqq\logs.txt", "sql=".$sql."\r\n",FILE_APPEND);

		$sqlhelper=new sqltool();
		
		$sqlhelper->sqlconn();
		
		$res=$sqlhelper->execsql($sql);
		
		$sqlhelper->closesql();
		return	$res;
	}
	
	
	function getmsg($getter){
		$sql="select * from webmessage where getter='$getter' and isGet=1";
		file_put_contents("C:\AppServ\www\webqq\logs.txt", "sql=".$sql."\r\n",FILE_APPEND);
		
		$sqlhelper=new sqltool();
		
		$sqlhelper->sqlconn();
		
		$array=$sqlhelper->selesql2($sql);
		//file_put_contents("C:\AppServ\www\webqq\logs.txt", "$array=".$array."\r\n",FILE_APPEND);
		//file_put_contents("C:\AppServ\www\webqq\logs.txt", "$array=".$array[0]."\r\n",FILE_APPEND);

		$messageinfo="<msg>";
		//$messageinfo="";
		for($i=0;$i<count($array);$i++){
			$row=$array[$i];
			//file_put_contents("C:\AppServ\www\webqq\logs.txt", "$row=".$row."\r\n",FILE_APPEND);
			$messageinfo.="<webmid>{$row['webmid']}</webmid><sender>{$row['sender']}</sender><getter>{$row['getter']}</getter>";
			$messageinfo.="<content>{$row['content']}</content><sendtime>{$row['sendtime']}</sendtime><isGet>{$row['isGet']}</isGet>";
			//$messageinfo.=$row['content']."   ".$row['stime'];
		}
		$messageinfo.="</msg>";
	
		
		//$sql="update webmessage set isGet=1 where getter='$getter' and sender='$sender'";
		//$sqlhelper->execsql($sql);
		

		$sqlhelper->closesql();
		//echo "msgservice class";
		
		return $messageinfo;
	}

	
		function getmsg2($getter,$sender){
		$sql="select * from webmessage where getter='$getter' and sender='$sender' and isGet=1";
		file_put_contents("C:\AppServ\www\webqq\logs.txt", "sql=".$sql."\r\n",FILE_APPEND);
		
		$sqlhelper=new sqltool();
		
		$sqlhelper->sqlconn();
		
		$array=$sqlhelper->selesql2($sql);
		//file_put_contents("C:\AppServ\www\webqq\logs.txt", "$array=".$array."\r\n",FILE_APPEND);
		//file_put_contents("C:\AppServ\www\webqq\logs.txt", "$array=".$array[0]."\r\n",FILE_APPEND);

		$messageinfo="<msg>";
		//$messageinfo="";
		for($i=0;$i<count($array);$i++){
			$row=$array[$i];
			//file_put_contents("C:\AppServ\www\webqq\logs.txt", "$row=".$row."\r\n",FILE_APPEND);
			$messageinfo.="<webmid>{$row['webmid']}</webmid><sender>{$row['sender']}</sender><getter>{$row['getter']}</getter>";
			$messageinfo.="<content>{$row['content']}</content><sendtime>{$row['sendtime']}</sendtime><isGet>{$row['isGet']}</isGet>";
			//$messageinfo.=$row['content']."   ".$row['stime'];
		}
		$messageinfo.="</msg>";
	
		
		//$sql="update webmessage set isGet=1 where getter='$getter' and sender='$sender'";
		//$sqlhelper->execsql($sql);
		

		$sqlhelper->closesql();
		//echo "msgservice class";
		
		return $messageinfo;
	}

	
	
	function getmsgNummer($getter,$sender){
		$sql="select count(*) from webmessage where getter='$getter' and sender='$sender' and isGet=1";
		file_put_contents("C:\AppServ\www\webqq\logs.txt", "sql=".$sql."\r\n",FILE_APPEND);
		
		$sqlhelper=new sqltool();
		
		$sqlhelper->sqlconn();
		
		$array=$sqlhelper->selesql($sql);
		file_put_contents("C:\AppServ\www\webqq\logs.txt", "$array=".$array."\r\n",FILE_APPEND);
		

		$sqlhelper->closesql();
		//echo "msgservice class";
		
		return $array;
	}

	
	
	
	
	
	
	
	
	
	
}     


