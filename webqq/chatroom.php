<html>
<head>
<title>用户注册</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>


<?php 
$user=trim($_GET['username']);//获取接收人的名字
session_start();
$loginuser=$_SESSION['loginuser'];

?>



<SCRIPT type="text/javascript" src="my.js"></SCRIPT>

<SCRIPT type="text/javascript">
window.resizeTo(500,700);
window.setInterval("getMessage()",5000);

function getMessage(){
var myXmlHttpRequest=getXmlHttpObject();
	
	if(myXmlHttpRequest){
	
		//创建ajax引擎
		var url="getNummer.php";
		var data="getter=<?php echo $loginuser; ?>&sender=<?php echo $user; ?>";
		
		myXmlHttpRequest.open("post",url,true);

		myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

		myXmlHttpRequest.onreadystatechange=function (){
			
			if(myXmlHttpRequest.readyState==4){
				
				if(myXmlHttpRequest.status==200){
				//接收$messageinfo
			//window.alert("0000000");
			var messageXML=myXmlHttpRequest.responseXML;
			
				///window.alert(myXmlHttpRequest.responseText);
				//window.alert("0");
				//window.alert(messageXML);
			var cons=messageXML.getElementsByTagName("content");
				//window.alert(cons.length);
			var stimes=messageXML.getElementsByTagName("sendtime");

			//var cons=myXmlHttpRequest.responseText;

						
						if(cons.length!=0){
								for(var i=0;i<cons.length;i++){
											var str="<?php echo $user; ?>对<?php echo $loginuser; ?>说:"+cons[i].childNodes[0].nodeValue+"      "+stimes[i].childNodes[0].nodeValue;
											$('txt').value+=str+"\r\n";
											
									  }
							//$('txt').value+=cons+"\r\n";
							}

							
				}
			}
		}
		
		myXmlHttpRequest.send(data);		//发送到url
	}
}



function sendmessage(){
	var myXmlHttpRequest=getXmlHttpObject();
	console.log('myXmlHttpRequest',myXmlHttpRequest);
	if(myXmlHttpRequest){
	
		//创建ajax引擎
		var url="send.php";
		var data="con="+$('con').value+"&getter=<?php echo $user; ?>&sender=<?php echo $loginuser; ?>";
		
		myXmlHttpRequest.open("post",url,true);

		myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

		myXmlHttpRequest.onreadystatechange=function (){
			
			//接收数据json 
			if(myXmlHttpRequest.readyState==4){
				console.log('myXmlHttpRequest.readyState',myXmlHttpRequest.readyState);
				if(myXmlHttpRequest.status==200){
					console.log('myXmlHttpRequest.status',myXmlHttpRequest.status);
				}
			}	
		}
		myXmlHttpRequest.send(data);		//发送到url
        console.log('data',data);

		//把聊天内容显示
		$('txt').value+="你对<?php echo $user; ?>说："+$('con').value+"      "+new Date().toLocaleString()+"\r\n";
	}

}

</SCRIPT>
</head>





<body>
<h2><font color="red"><?php echo $loginuser;?></font>正在和<font color="red"><?php echo $user;?></font>聊天</h2>

<TEXTAREA  rows="20" cols="70" id="txt"></TEXTAREA><br/><br/>

<input type="text" name="username" id="con" style="width: 200px;height:100px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="发   送"  onclick="sendmessage()"/><br/>

</body>


</html>