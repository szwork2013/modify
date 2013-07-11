<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding</title>
</head>
<body>

<?php
	$dbhost = 'localhost';
	$dbuser = 'modiwatc_fb';
	$dbpass = 'Oski2010!';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');
	
	$dbname = 'modiwatc_facebook';
	mysql_select_db($dbname, $conn) or die ("Can't select database.");

	$name = $_POST['name'];
	$haiku = $_POST['haiku'];
	$haiku = nl2br($haiku);
	$email = $_POST['email'];
	$subscribe = $_POST['subscribe'];
	
	$SQL = "INSERT INTO haikus (name, email, subscribe, haikutext)
			VALUES ('$name', '$email', '$subscribe', '$haiku')";

	mysql_query($SQL)
		or die('Something happened' . mysql_error());
	
?>

</body>
</html>