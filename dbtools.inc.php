<?php
  function create_connection()
{
    $link=mysqli_connect("127.0.0.1","root","")
      or die("無法連結:1:".mysqli_connect_error());
      mysqli_query($link,"SET NAME utf8");
      return $link;
}  
  function execute_sql($link,$database,$sql)
{ 
mysqli_select_db($link,$database)
      or die("無法連結:2:".mysqli_error($link)); 
      $result=mysqli_query($link,$sql);    
      return $result;
} 
?>