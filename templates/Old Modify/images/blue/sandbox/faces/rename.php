<?php


// Define the path as relative
$path = $_SERVER['DOCUMENT_ROOT']."/store/templates/modify/images/blue/sandbox/faces/";
 
// Using the opendir function
$dir_handle = @opendir($path) or die("ERROR: Cannot open  <b>$path</b>");


while ($file = readdir($dir_handle))
{
	preg_match("/\.([^\.]+)$/", $file, $match);
	echo $match[0];
	if($match[0] == ".JPG"){
		echo $file . "<br />";
	}

}