<?php
	$host='127.0.0.1';
	$uname='root';
	$pwd='';
	$db="homeautomation";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	$port = fopen("COM15", "w");
	
	 echo $port;
	//date_default_timezone_set('India/Kolkata');	
	//$cquery=mysql_query("select * from devices");
	//$statesOfAppliances = mysql_fetch_array($cquery);
	
	//print(json_encode($statesOfAppliances));
	
	$light=$_REQUEST['light_hall'];
	$tv=$_REQUEST['fan_hall'];
	//$light="on";
	
	//$flag = array();
	//$flag['light']=0;
	//$flag['tv']=0;
	/*if($light=="on")
	{
			$query=mysql_query("UPDATE devices SET state = 'true' where appliances = 'light'");
			//$flag['slight']=true;
	}
	if($light=="off")
	{
			$query=mysql_query("UPDATE devices SET state = 'false' where appliances = 'light'");
			//$flag['slight']=false;
	}
	if($tv=="on")
	{
			//tv == fan
		$query2=mysql_query("UPDATE devices SET state = 'true' where appliances = 'tv'");
		//$flag['stv']=true;
	}
	if($tv=="off")
	{
			//tv == fan
		$query2=mysql_query("UPDATE devices SET state = 'false' where appliances = 'tv'");
		//$flag['stv']=false;
	}*/
	if ($light=="on")
	{
		//echo " 3rd LED Turned on";
		mysql_query("Update `devices` set `state`='true' where `port`=8");
		$ff=fwrite($port, "F");
			echo $port."   ".$ff;
	}

	if ($light=="off")
	{
		//echo "11th LED Turned off";
		mysql_query("Update `devices` set `state`='false' where `port`=8");
		$ff=fwrite($port, 'f');
			echo "       ".$port."   ".$ff;
	}
	
	//$row=mysql_num_rows($query);
	
	/*if($row && $user)
	{
		$flag['code']=1;
		mysql_query("INSERT INTO logged_users (username,timestamp) VALUES ('$user','$timestamp') ");
		
	}*/
	
	//print(json_encode($flag));
	
	mysql_close($con);
?>