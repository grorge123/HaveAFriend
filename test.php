<?php
require_once("dbtools.inc.php");
$key="insert";
$username = "";
$link=create_connection();
$sql="SELECT * FROM users where account='grorge'";
$result=execute_sql($link,"member",$sql);
$font=mysqli_fetch_row($result);
$sql = "describe users";
$result = execute_sql($link, "member", $sql);
$data = array();
$tmp = 0;
while ($rol = mysqli_fetch_row($result)){
    $rol[0];
    $data[$rol[0]] = $font[$tmp];
    $tmp += 1;
}
foreach($data as $key => $value){
    echo $key.'=>'.$value.'<br>';
}
?>