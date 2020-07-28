<?php
require("dbtools.inc.php");
require("key.inc.php");
session_start();
$_SESSION['key']=produce_random();
echo $_SESSION['key']."<br>";
$account=$_POST['account'];
$password=$_POST['password'];
$username = "";
$link=create_connection();
$sql="SELECT * FROM users where account='$account'";
$result=execute_sql($link,"member",$sql);
$data = fetch_row_to_dic($link, $result, 'member', 'users');
if($data != NULL && $data['password']==$password){
    $username = $data['name'];
    echo "<h1>Hi</hi>";
}else{
        echo"<script type='text/javascript'>";
        echo"alert('你的帳號密碼錯誤');";
        echo"history.back();";
        echo"</script>";
}
$method='DES-ECB';
$str = serialize($username); //将用户信息序列化

$str =openssl_encrypt($str, $method, $_SESSION['key'],0);
echo "用户信息加密后：".$str;
//将加密后的用户数据存储到cookie中
setcookie('username', $str);

?>
<html>
<head>
</head>
<body>

</body>
</html>