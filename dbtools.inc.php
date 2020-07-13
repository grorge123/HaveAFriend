<?php
function create_connection(){
    $link=mysqli_connect("127.0.0.1","root","") or die("無法連結:1:".mysqli_connect_error());
    mysqli_query($link,"SET NAME utf8");
    return $link;
}  
function execute_sql($link,$database,$sql){ 
    mysqli_select_db($link,$database) or die("無法連結:2:".mysqli_error($link)); 
    $result=mysqli_query($link,$sql);
    return $result;
}
function fetch_row_to_dic($result, $name, $table){
    $font=mysqli_fetch_row($result);
    $sql = "describe $table";
    $result = execute_sql($link, $name, $sql);
    $data = array();
    $tmp = 0;
    while($rol = mysqli_fetch_row($result)){
        $rol[0];
        $data[$rol[0]] = $font[$tmp];
        $tmp += 1;
    }
    return $data;
} 
?>