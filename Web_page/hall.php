<html>
	<head><title>Hall</title>
	<link rel="stylesheet"  type="text/css" href="light_fan.css"></link>
	<?php
		/* $con=mysql_connect("localhost","root","") or die ("Couldn't connect to database" . mysql_error());
		mysql_select_db("Homeautomation",$con) or die ("Couldn't select to database" . mysql_error());       */
		
		
		$con=mysqli_connect("localhost","root","","home automation") or die("couldn't to the  server");
		
		$result_ligth = mysqli_query($con,"select state from devices where appliances='light_hall'") or die(mysql_error());
		$result_fan = mysqli_query($con,"select state from devices where appliances='fan_hall'") or die(mysql_error());
		
		$row_light = mysqli_fetch_array($result_ligth) or die(mysql_error());
		$row_fan = mysqli_fetch_array($result_fan) or die(mysql_error());
		
		/*$b = $_GET["a"];
		if($b==1)
		{
			echo $b;
			//mysql_query("update devices set state='true' where appliances='light_bedroom_1'");
		}
		if($b==0)
		{
			echo "         ".$b;
			//mysql_query("update devices set state='true' where appliances='light_bedroom_1'");
		}
		/*if($flag==0 && $row_light[0]=='false')
		{
			mysql_query("update devices set state='true' where appliances='light_bedroom_1'");
			$flag=1;
		}
		if($flag==1 && $row_light[0]=='true')
		{
			mysql_query("update devices set state='false' where appliances='light_bedroom_1'");
			$flag=0;
		}*/
	?>
	</head>
	<body>
		<p class="light">
			Tube Light:</p>
			<?php
			if($row_light[0]=='false')
			{
				$url="L";
				echo "<form action='hall_change.php'  method='post'>";
				echo '<input type="hidden" name="url" value="L" >';
				echo "<input class='imgClassL' style='background-image: url(off.png);' type = 'submit' value=''  />";
				echo "</form>";				
			}
			if($row_light[0]=='true')
			{
				$url="L";
				echo "<form action='hall_change.php' method='post'>";
				echo '<input type="hidden" name="url" value="L" >';
				echo "<input class='imgClassL' style='background-image: url(on.png);' type = 'submit' value=''  />";
				echo "</form>";
			}
			?>
			<p class="fan">Fan:</p>
			<?php
			if($row_fan[0]=='false')
			{
				$url="F";
				echo "<form action='hall_change.php' method='post'>";
				echo '<input type="hidden" name="url" value="F" >';
				echo "<input class='imgclassF' style='background-image: url(fan1.jpg);' type = 'submit' value='' />";
				echo "</form>";				
			}
			if($row_fan[0]=='true')
			{
				$url="F";
				echo "<form action='hall_change.php' method='post'>";
				echo '<input type="hidden" name="url" value="F" >';
				echo "<input class='imgclassF' style='background-image: url(fan2.gif);' type = 'submit' value='' />";
				echo "</form>";
			}
			?>			
	</body>
</html>