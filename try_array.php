<?php
  require_once("dbtools.inc.php");
  $key="insert";
  $account=$_POST['account'];
  $password=$_POST['password'];
$link=create_connection();
$sql="SELECT account FROM users";
$result=execute_sql($link,"member",$sql);
$font=mysqli_fetch_row($result);
if(in_array($account,$font)){
    $key=array_search($account,$font);
}
else{
       echo"<script type='text/javascript'>";
	  echo"alert('你的帳號錯誤');";
	  echo"history.back();";
	  echo"</script>";
}
$sql="SELECT password FROM users";
$result=execute_sql($link,"member",$sql);
$pass=mysqli_fetch_row($result);
if($pass[$key]==$password){
}
else{
       echo"<script type='text/javascript'>";
	  echo"alert('你的帳號錯誤');";
	  echo"history.back();";
	  echo"</script>";
}
$sql="SELECT name FROM users";
$result=execute_sql($link,"member",$sql);
$name=mysqli_fetch_row($result);
$username=$name[$key];
setrawcookie("UserName","$username");
?>
<html>
<head>
</head>
<body>
<h1>hi</hi>
</body>
</html>