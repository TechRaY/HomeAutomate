<?php

/* $con=mysqli_connect("localhost","root","") or die ("Couldn't connect to database" . mysql_error());
mysqli_select_db("Homeautomation",$con) or die ("Couldn't select to database" . mysql_error());     */

$con=mysqli_connect("localhost","root","","home automation") or die("couldn't to the  server");

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($con,"select * from users where username='$username' and password='$password'") or die(mysqli_error($con));
$row=mysqli_fetch_array($result);

if($row)
{
	echo "You are now successfully Logged In" ;
	echo $username . $password ;
	echo "<a href = 'home.html'>Click HERE For HOME</a>" ;
	header("Location:Home.html");
	exit;
}
else
{
	echo "<h1><center>Invalid Username <center></h1>";
	echo "<center><img src='Wrong.png'/><center><br>";
	echo "<center><a style='color:red; text-decoration:none;' href = '1.html'>Click HERE For Login Again</a></center>" ;
}

mysqli_close($con);

?>	