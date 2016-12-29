
<?php
mysql_connect("127.0.0.1","root","") or  die(mysql_error());
mysql_select_db("a");
$name=$_REQUEST['user'];
$detail=$_REQUEST['pass'];
$sql=mysql_query("select * from demo where name='$name' and detail='$detail'") or die("cant cal");

$row=mysql_num_rows($sql);


echo $row;
mysql_close();
?>
