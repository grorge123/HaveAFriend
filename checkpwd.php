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
$sql = "describe users";
$result = execute_sql($link, "member", $sql);
$data = array();
$tmp = 0;
while($rol = mysqli_fetch_row($result)){
    $rol[0];
    $data[$rol[0]] = $font[$tmp];
    $tmp += 1;
}
if($data != NULL && $data['password']==$password){
    $username = $data['name'];
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