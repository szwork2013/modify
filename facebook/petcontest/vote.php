<?php
	$dbhost = 'localhost';
	$dbuser = 'modiwatc_fb';
	$dbpass = 'Oski2010!';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');
	
	$dbname = 'modiwatc_facebook';
	mysql_select_db($dbname, $conn) or die ("Can't select database.");
	
	function get_real_ip()
		{
	
		if (isset($_SERVER["HTTP_CLIENT_IP"]))
		{
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
		{
			return $_SERVER["HTTP_X_FORWARDED"];
		}
		elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
		{
			return $_SERVER["HTTP_FORWARDED_FOR"];
		}
		elseif (isset($_SERVER["HTTP_FORWARDED"]))
		{
			return $_SERVER["HTTP_FORWARDED"];
		}
		else
		{
			return $_SERVER["REMOTE_ADDR"];
		}
	}

	$id = $_POST['id'];
	$ip = get_real_ip();
	
	$SQL = "SELECT * FROM petphotovotes WHERE petphotoid = '$id' AND ip = '$ip'";
	
	$result = mysql_query($SQL) or die(mysql_error());
	
	if (mysql_num_rows($result) == 0) {		
		$SQL = "INSERT INTO petphotovotes (petphotoid, ip)
				VALUES ('$id', '$ip')";
		
		mysql_query($SQL)
			or die('Something happened' . mysql_error());
			
		$result = mysql_query("SELECT * FROM petphotos WHERE ID = '$id'") or die(mysql_error());
		$row = mysql_fetch_array( $result );
		$currentVotes = $row['votes'];
		$currentVotes++;
		
		mysql_query("UPDATE petphotos SET votes = $currentVotes WHERE ID = '$id'")
			or die(mysql_error());
		echo "1";
	}
	else {
		var_dump($result);
	}
?>