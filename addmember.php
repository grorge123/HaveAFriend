<?php
  require_once("dbtools.inc.php");
  $account = $_POST['account'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];
  $telephone = $_POST['telephone'];
  $cellphone = $_POST['cellphone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $url = $_POST['url'];
  $comment = $_POST['comment'];
  
  $link = create_connection();
  $sql = "SELECT * FROM 'users' Where account = '$account'";
  $result = execute_sql($link, "memeber", $sql);
  if(mysqli_num_rows($result) != 0)
  {
	  mysqli_free_result($result);
	  
	  echo"<script type='text/javascript'>";
	  echo"alert('你所指定的帳號已經有人使用，請使用其他帳號');";
	  echo"history.back();";
	  echo"</script>";
  }
  else
  {
	  mysqli_free_result($result);
	  
      $sql = "INSERT INTO users (account, password, name, sex, year, month, day, telephone,
              cellphone, address, email, url, comment) VALUES('$account', '$password', '$name', '$sex', 
		      '$year', '$month', '$day', '$telephone', '$cellphone', '$address', '$email', '$url', 
			  '$comment')";
      $result = execute_sql($link, "member", $sql);
  }
  mysqli_close($link);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
	<title>新增帳號成功</title>
  </head>
  <body bgcolor="#FFFFFF">
    <p align="center">恭喜您已經註冊成功</br>
	請記下您的帳號密碼，然後<a href="index.html">登入網站</a>
	</p>
  </body>
</html>