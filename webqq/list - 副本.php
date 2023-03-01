<html>
<head>
<title>好友列表</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<?php 

session_start();
$loginuser=$_SESSION['loginuser'];

?>

<SCRIPT type="text/javascript" src="my.js"></SCRIPT>

<SCRIPT type="text/javascript">

function change1(val,obj){
	if(val=='over'){
			obj.style.color="red";
			obj.style.cursor='hand';
		}else if(val=='out'){
			obj.style.color="black";			
			}
}

function openchatroom(obj){
	//打开新窗口
	window.open("chatroom.php?username="+encodeURI(obj.innerText),"_blank");
}

//显示新信息的数目
/*window.setInterval("showMessageNummer()",10000);

function showMessageNummer(){
var myXmlHttpRequest=getXmlHttpObject();
	
	if(myXmlHttpRequest){
	var obj_lis = document.getElementById("list").getElementsByTagName("li");
	for(i=0;i<obj_lis.length;i++){
		
		//创建ajax引擎
		var url="getNummer.php";
		var data[i]="getter=<?php echo $loginuser; ?>"+"sender="+obj_lis[i].innerHTML;
		window.alert(obj_lis[i].innerHTML);
		window.alert(data[i]);

		}
	
	
		
		//var data="getter=<?php echo $loginuser; ?>"+"sender="+encodeURI(obj.innerText);

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
			/*var cons=messageXML.getElementsByTagName("content");
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
*/
</SCRIPT>

</head>

<body>
<h2>列表:</h2>
<ul  id="list">
<li onmouseover="change1('over',this)" onmouseout="change1('out',this)" onclick="openchatroom(this)">保罗</li>
<li onmouseover="change1('over',this)" onmouseout="change1('out',this)" onclick="openchatroom(this)">詹姆斯</li>
<li onmouseover="change1('over',this)" onmouseout="change1('out',this)" onclick="openchatroom(this)">库里</li>
</ul>

</body>

</html>
