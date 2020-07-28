<?php
require_once("dbtools.inc.php");
function produce_random(){
    $randoma = '';
    $random=10;
    for ($i=1;$i<=$random;$i=$i+1){
        $c=rand(1,3);
        if($c==1){$a=rand(97,122);$b=chr($a);}
        if($c==2){$a=rand(65,90);$b=chr($a);}
        if($c==3){$b=rand(0,9);}
        $randoma=$randoma.$b;
    }
    $link = create_connection();
    $sql = "SELECT * FROM random where compare = '$randoma'";
    $result = execute_sql($link, "member", $sql);
    if(mysqli_num_rows($result) != 0){
        return produce_random();
    }
    mysqli_free_result($result);
    $time = getdate()[0];
    $sql = "INSERT INTO random (compare, time) VALUES('$randoma', $time)";
    $result = execute_sql($link, "member", $sql);
    return $randoma;
}

function check_time_random($check, $limit){

    //当需要使用时进行解密
    $link=create_connection();
    $time_li = getdate()[0] - ($limit * 60);
    execute_sql($link, "member", "delete from random where time < $time_li");
    $sql="SELECT * FROM random where compare='$check'";
    $result=execute_sql($link,"member",$sql);
    if(mysqli_num_rows($result) != 0){
	    mysqli_free_result($result);
        return true;
    }else{
            mysqli_free_result($result);
            echo"<script type='text/javascript'>";
            echo"alert('請重新登入');";
            echo"session_destroy();";
            echo"window.location.href='http://127.0.0.1/index.html';";
            echo"</script>";
            return false;
    }
}
function decode_cookie($check){
    $sleep=$_COOKIE['username'];
    $method='DES-ECB';
    $str=var_dump(openssl_decrypt($sleep,$method,$check,0));
}
?>