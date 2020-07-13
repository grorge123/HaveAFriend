<?php
require_once("dbtools.inc.php");
require("key.inc.php");
$link = create_connection();
$sql = "INSERT INTO random (compare, time) VALUES('123456', 500)";
// $result = execute_sql($link, "member", $sql); 
check_time_random('oGfA0A8gvn',0);