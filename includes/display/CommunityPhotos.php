<?php

CLASS ISC_COMMUNITYPHOTOS_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		$conn = mysql_connect("localhost", "modiwatc_sandbox", "oski2010!!!") or die(mysql_error());
		mysql_select_db("modiwatc_store", $conn) or die(mysql_error());
		
		$results = mysql_query("SELECT url FROM sandbox_photos") or die(mysql_error());
		
		$i = 0;
		
		$GLOBALS['PhotoArray'] = "[";
		while($row = mysql_fetch_array($results)) {
			if($i!=0) $GLOBALS['PhotoArray'] .= ",";
			$GLOBALS['PhotoArray'] .= "'" . $row['url'] . "'";
			$i++;
		}
		$GLOBALS['PhotoArray'] .= "]";
		
	}
}
