<?php
	$sent_url = $_POST['url']; 
	echo $sent_url;
	/*$con=mysql_connect("localhost","root","") or die ("Couldn't connect to database" . mysql_error());
	mysql_select_db("Homeautomation",$con) or die ("Couldn't select to database" . mysql_error());     */
	$con=mysqli_connect("localhost","root","","home automation") or die("couldn't to the  server");
	
	$result_ligth = mysqli_query($con,"select state from devices where appliances='light_study_room'") or die(mysqli_error());
	$row_light = mysqli_fetch_array($result_ligth) or die(mysqli_error());
	if($sent_url=="L"&&$row_light[0]=="false")
	{
		mysqli_query($con,"update devices set state='true' where appliances='light_study_room'");
	}
	if($sent_url=="L"&&$row_light[0]=="true")
	{
		mysqli_query($con,"update devices set state='false' where appliances='light_study_room'");
	}
	header("Location:studyroom.php");
?>