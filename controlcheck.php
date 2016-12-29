<?php
	$host='127.0.0.1';
	$uname='root';
	$pwd='';
	$db="homeautomation";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	$output = array(); 
	//date_default_timezone_set('India/Kolkata');	
	$cquery=mysql_query("select appliances,state from devices where port=8");
	//$statesOfAppliances = mysql_fetch_array($cquery);
	//$sql=mysql_query("select * from demo");
	while($row=mysql_fetch_assoc($cquery))
		$output[]=$row;
	
	//$output['appliances'] = "light";
	//$output['state'] = "true";
	//$row=mysql_fetch_assoc($cquery)
	print(json_encode($output));
	mysql_close();
	//print(json_encode($statesOfAppliances));
	
?>