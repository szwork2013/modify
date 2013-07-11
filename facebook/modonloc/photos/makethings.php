<?php
  $dbhost = 'localhost';
	$dbuser = 'modiwatc_fb';
	$dbpass = 'Oski2010!';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');
	
	$dbname = 'modiwatc_facebook';
	mysql_select_db($dbname, $conn) or die ("Can't select database.");
	
	if ($handle = opendir('.')) {
	
		/* This is the correct way to loop over the directory. */
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$name = RemoveExtension($file);
				$newfile = str_replace(" ", "", strtolower($name));
				$newfile = strtolower(preg_replace("/[^a-zA-Z0-9\s]/", "", $newfile));
				$newfile .= ".jpg";
				if (!copy($file, $newfile)) {
					print "Copy failed";
				}
				else {
					
					$SQL = "INSERT INTO location (name, photoloc, votes) VALUES ('$name', '$newfile', '0')";
					mysql_query($SQL)
						or die("Failed to insert");
				}
			}
			
		}
		
		closedir($handle);
	}
	
	function RemoveExtension($strName)  
	{  
		 $ext = strrchr($strName, '.');  
	
		 if($ext !== false)  
		 {  
			 $strName = substr($strName, 0, -strlen($ext));  
		 }  
		 return $strName;  
	}  
  
 ?>
 
 Hey there