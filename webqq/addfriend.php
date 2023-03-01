<html>
<head>
<title>用户注册</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>


<?php 
//$user=trim($_GET['username']);//获取接收人的名字
$user="hello";

?>


<SCRIPT type="text/javascript">

function addFriend(){

var friend1= document.getElementById("friend3").innerHTML;
//window.alert(friend1);
//header("Location: list.php?name="+friend1);
//transfer friend 1 to list page
//location.href="Location: list.php?name="+friend1;
location.href="list.php?"+"name="+encodeURI(friend1);
//window.alert(friend1);
//alert(location.href);
/**/
var sentList = document.querySelector("#sentList");

var li = document.createElement("li");
li.innerText =friend1;
sentList.append(li);

}


</SCRIPT>
</head>





<body>
<h2 id="friend3" color="red">Joe Biden</h2>

<input type="button" value="add friend"  onclick="addFriend()"/><br/>

<ul id="sentList"></ul>

</body>


</html>