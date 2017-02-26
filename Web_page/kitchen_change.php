<?php
	$sent_url = $_POST['url']; 
	echo $sent_url;
	$port = fopen('COM5', "w"); //You have to check which port your Arduino is connected to and change this (this one is for Ubuntu and Arduino 2009)
	/*$con=mysql_connect("localhost","root","") or die ("Couldn't connect to database" . mysql_error());
	mysql_select_db("Homeautomation",$con) or die ("Couldn't select to database" . mysql_error());  */
	
	
	$con=mysqli_connect("localhost","root","","home automation") or die("couldn't to the  server");
	$result_ligth = mysqli_query($con,"select state from devices where appliances='light_kitchen'") or die(mysqli_error($con));
	$result_fan = mysqli_query($con,"select state from devices where appliances='temperature_sensor'") or die(mysqli_error($con));
	$row_light = mysqli_fetch_array($result_ligth) or die(mysqli_error($con));
	$row_fan = mysqli_fetch_array($result_fan) or die(mysqli_error($con));
	if($sent_url=="L"&&$row_light[0]=="false")
	{
		mysqli_query($con,"update devices set state='true' where appliances='light_kitchen'");
		fwrite($port,"F");		
	}
	if($sent_url=="L"&&$row_light[0]=="true")
	{
		mysqli_query($con,"update devices set state='false' where appliances='light_kitchen'");
		fwrite($port,"f");		
	}
	if($sent_url=="F"&&$row_fan[0]=="false")
	{
		mysqli_query($con,"update devices set state='true' where appliances='temperature_sensor'");
	}
	if($sent_url=="F"&&$row_fan[0]=="true")
	{
		mysqli_query($con,"update devices set state='false' where appliances='temperature_sensor'");
	}
	header("Location:kitchen.php");
?>