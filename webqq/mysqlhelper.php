<?php

class sqltool{

	private $conn;
	private $host="localhost";
	private $user="root";
	private $password="20032003";
	private $db="sharing";

//连接数据库
	function sqlconn(){
		$this->conn=mysqli_connect($this->host,$this->user,$this->password);
		if(!$this->conn){
							die("连接数据库失败<br>");	
						}else{
								//echo "connecting succeed<br>";
								//file_put_contents("C:\AppServ\www\webqq\logs.txt", "连接数据库succeed".$user."\r\n",FILE_APPEND);
								}
mysqli_select_db($this->conn,$this->db);
mysqli_query($this->conn,"set names utf8");
					  }


//cuid
function execsql($sql){
			$b=mysqli_query($this->conn,$sql) or die(mysqli_error());//返回布尔值
			    if(!$b){
						return 0;  //失败
				       }
			    else{
							if(mysqli_affected_rows($this->conn)>0){
																		return 1;  //成功
																  }
							else{
									return 2; //没有影响行数
								}
				    }
		                    }

//select
function selesql($sql){
						 $res=mysqli_query($this->conn,$sql) or die(mysqli_error());
						 return $res;
					  }

//select，返回的是一个数组
function selesql2($sql){
	$arr=array();
	$res=mysqli_query($this->conn,$sql) or die(mysqli_error());
	
	//把$res结果集数据转移到一个数组
	while ($row=mysqli_fetch_assoc($res)){
		$arr[]=$row;
	}
	mysqli_free_result($res);
	return $arr;
}

//关闭连接
function closesql(){
	if(!empty($this->conn)){
		//mysqli_free_result($res);
		mysqli_close($this->conn);
	}
}
}
?>