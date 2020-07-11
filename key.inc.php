<?php
require_once("dbtools.inc.php");
error_reporting(0);
$random=10;
for ($i=1;$i<=$random;$i=$i+1)
{
$c=rand(1,3);
if($c==1){$a=rand(97,122);$b=chr($a);}
if($c==2){$a=rand(65,90);$b=chr($a);}
if($c==3){$b=rand(0,9);}
$randoma=$randoma.$b;
}
echo($randoma);
$link = create_connection();
$sql = "SELECT * FROM random";
$result = execute_sql($link, "member", $sql);
mysqli_free_result($result);
    
    $sql = "INSERT INTO random (compare) VALUES('$randoma')";
    $result = execute_sql($link, "member", $sql);

?>