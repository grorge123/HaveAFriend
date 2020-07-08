<?php
require_once("dbtools.inc.php");
$key="insert";
$account=$_POST['account'];
$password=$_POST['password'];
$username = "";
$link=create_connection();
$sql="SELECT * FROM users where account='$account'";
$result=execute_sql($link,"member",$sql);
$font=mysqli_fetch_row($result);
if($font != NULL && $font[2]==$password){
    $username = $font[3];
    setrawcookie("UserName","$username");
    echo "<h1>Hi ".$username."</hi>";
}else{
        echo"<script type='text/javascript'>";
        echo"alert('你的帳號密碼錯誤');";
        echo"history.back();";
        echo"</script>";
}

?>
<html>
<head>
</head>
<body>

</body>
</html>