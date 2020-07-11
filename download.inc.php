<?php
require_once("dbtools.inc.php");
session_start();
$check=$_SESSION['key'];
//当需要使用时进行解密
$link=create_connection();
$sql="SELECT * FROM random where compare='$check'";
$result=execute_sql($link,"member",$sql);
  if(mysqli_num_rows($result) != 0)
  {
	  mysqli_free_result($result);
$sleep=$_COOKIE['username'];
$method='DES-ECB';
$str=var_dump(openssl_decrypt($sleep,$method,$check,0));
}
 else
{
	  mysqli_free_result($result);
	  
	  echo"<script type='text/javascript'>";
	  echo"alert('請重新登入');";
	  echo"session_destroy();";
	  echo"window.location.href='http://127.0.0.1/HaveAFriend/index.html';";
	  echo"</script>";
  }
?>