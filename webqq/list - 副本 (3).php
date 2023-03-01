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
/*
const array1 = [1, 4, 9, 16];

// Pass a function to map
const map1 = array1.map(x => x * 2);

// Arrow function
map((element) => {  })
map((element, index) => {  })
map((element, index, array) => {  })

// Callback function
map(callbackFn)
map(callbackFn, thisArg)

// Inline callback function
map(function (element) {  })
map(function (element, index) { })
map(function (element, index, array) {  })
map(function (element, index, array) {  }, thisArg)

*/

/*function openchatroom(obj){
	//打开新窗口
	window.open("list.php?username="+encodeURI(obj.innerText),"_blank");
}*/

//window.resizeTo(500,700);
//window.setInterval("getMessage()",3000);


function getMessage(){
var myXmlHttpRequest=getXmlHttpObject();
	
	if(myXmlHttpRequest){

		obj_lis = document.getElementById("list").getElementsByTagName("li");
		//见鬼了，放在函数外面就不行，里面就可以
	    for(i=0;i<obj_lis.length;i++){
		
		//创建ajax引擎
		//var url="getNummer.php";
		var data=new Array();
		data[i]="getter=<?php echo $loginuser; ?>"+"&sender="+obj_lis[i].innerHTML;
		//window.alert(obj_lis[i].innerHTML);
		window.alert(data[i]);

		}

		//创建ajax引擎
		var url="get.php";
		//var data="getter=<?php echo $loginuser; ?>"+"&sender="+obj_lis.innerText;
		//window.alert(data);
		
		myXmlHttpRequest.open("post",url,true);

		myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
/*
        

		myXmlHttpRequest.onreadystatechange=function (){
			
			if(myXmlHttpRequest.readyState==4){
				
				if(myXmlHttpRequest.status==200){
				//接收$messageinfo
						
			var messageXML=myXmlHttpRequest.responseXML;
			window.alert("0");
			//window.alert(data[i]);
			
				///window.alert(myXmlHttpRequest.responseText);
				window.alert("0");
				window.alert(messageXML);
			var cons=messageXML.getElementsByTagName("content");
				//window.alert(cons.length);
			var stimes=messageXML.getElementsByTagName("sendtime");

			//var cons=myXmlHttpRequest.responseText;

						
						if(cons.length!=0){
								for(var i=0;i<cons.length;i++){
											var str=obj_lis.innerText+"对<?php echo $loginuser; ?>说:"+cons[i].childNodes[0].nodeValue+"      "+stimes[i].childNodes[0].nodeValue;
											$('txt1').value+=str+"\r\n";
											//window.alert(str);
											
									  }
							//$('txt').value+=cons+"\r\n";
							}

						
				}
			}
		}
		
				//data[i] = data[i].substr(2);
	myXmlHttpRequest.send(data);
    
		//myXmlHttpRequest.send(data);		//发送到url
		*/
	}
}


/*
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

*/
</SCRIPT>

</head>

<body>
<h2>列表:</h2>
<ul  id="list">
<li onmouseover="change1('over',this)" onmouseout="change1('out',this)" onclick="openchatroom(this)" id="list1">保罗</li>
<TEXTAREA  rows="20" cols="70" id="txt1"></TEXTAREA><br/><br/>
<li onmouseover="change1('over',this)" onmouseout="change1('out',this)" onclick="openchatroom(this)">詹姆斯</li>
<TEXTAREA  rows="20" cols="70" id="txt"></TEXTAREA><br/><br/>
<li onmouseover="change1('over',this)" onmouseout="change1('out',this)" onclick="openchatroom(this)">库里</li>
<TEXTAREA  rows="20" cols="70" id="txt"></TEXTAREA><br/><br/>
</ul>

</body>

</html>
