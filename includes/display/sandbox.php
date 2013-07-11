<?php

CLASS ISC_SANDBOX_PANEL extends PANEL
{
	public function curl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	public function SetPanelSettings()
	{

		$jsonurl = "../sandbox/data.txt";
		$json = $this->curl($jsonurl);
		$result = json_decode($json);
		
		$GLOBALS['ActiveFaces'] = '';
		$GLOBALS['ActiveStraps'] = '';
		
		$username = "modiwatc_modify";
		$password = "Oski2010!";
		$hostname = "localhost"; 
		
		//connection to the database
		$dbhandle = mysql_connect($hostname, $username, $password) 
		  or die("Unable to connect to MySQL");  
		
		$selected = mysql_select_db("modiwatc_store",$dbhandle) 
		  or die("Could not select examples");
		
		//Get Sold Out Products
		$soldSQL = "SELECT prodcode FROM isc_products WHERE prodcurrentinv = 0";

		$soldResult = mysql_query($soldSQL);
		$soldout = array();
		while ($row = mysql_fetch_array($soldResult)) {
			$soldout[] = $row['prodcode'];
		}
		
		
		// Get Categories
		$getCats = mysql_query("SELECT DISTINCT productline FROM sandbox_base WHERE producttype = 'faces'")
			or die(mysql_error());
		
		// Loop Through Possible Categories
		while($row = mysql_fetch_array( $getCats )) {
			if ($row['productline'] == "Classic") {
				$productPrice = "25";	
			}
			else {
				$productPrice = "30";	
			}
			$GLOBALS['ActiveFaces'] .= "<div id=\"".$row['productline']."\" class=\"selectorSubHeader\">
                                " . $row['productline'] . " - $<span class=\"price\">". $productPrice . "</span>
                            </div>
                            <ul class=\"thumb\">";
			// Get the products in that category

			$sql = "SELECT * FROM sandbox_base WHERE productline = '" . $row['productline'] ."' AND producttype = 'faces' and productsize='bigger' ORDER BY productid ASC";
			$getProducts = mysql_query($sql)
				or die(mysql_error());		
			while($row2 = mysql_fetch_array( $getProducts )) {
				$inArrayCurrent = in_array($row2['facesku'], $soldout);
				$inArrayCurrentSmall = in_array(substr_replace($row2['facesku'], 2, -3, 1), $soldout);
				
				if($row2['facesku'] != "81750201104" && $row2['facesku'] != "81750201204") {
			
					if ($row2['productactive'] == 1 && $inArrayCurrent != 1 && $inArrayCurrentSmall != 1) {
						$GLOBALS['ActiveFaces'] .= "\t\t\t<li><a href=\"" . $row2['thumbnailimageurl'] . "\" name=\"" . $row2['productname'] . "\" id=\"" . $row2['facesku'] . "\"><img src=\"" . 
						$row2['swatchurl'] . "\" /></a></li> \n";
					}
					else if ($row2['productactive'] == 1 && $inArrayCurrent == 1 && $inArrayCurrentSmall == 1) {
						$GLOBALS['ActiveFaces'] .= "\t\t\t<li><a href=\"" . $row2['thumbnailimageurl'] . "\" name=\"" . $row2['productname'] . "\" id=\"" . $row2['facesku'] . "\"><img src=\"" . 
						$row2['swatchurl'] . "\" /></a><img class=\"biggerSoldOut bigSoldOut\" src=\"templates/modify/images/blue/sandbox/soldout.png\" /></li> \n";
					}
					else if ($row2['productactive'] == 1 && $inArrayCurrent == 1) {
						$GLOBALS['ActiveFaces'] .= "\t\t\t<li><a href=\"" . $row2['thumbnailimageurl'] . "\" name=\"" . $row2['productname'] . "\" id=\"" . $row2['facesku'] . "\"><img src=\"" . 
						$row2['swatchurl'] . "\" /></a><img class=\"biggerSoldOut\" src=\"templates/modify/images/blue/sandbox/soldout.png\" /></li> \n";
					}
					else if ($row2['productactive'] == 1 && $inArrayCurrentSmall == 1) {
						$GLOBALS['ActiveFaces'] .= "\t\t\t<li><a href=\"" . $row2['thumbnailimageurl'] . "\" name=\"" . $row2['productname'] . "\" id=\"" . $row2['facesku'] . "\"><img src=\"" . 
						$row2['swatchurl'] . "\" /></a><img class=\"bigSoldOut\" src=\"templates/modify/images/blue/sandbox/soldout.png\" /></li> \n";
					}
				
				}
			}
			$GLOBALS['ActiveFaces'] .= "</ul>";
		}
		
		$getCats = mysql_query("SELECT DISTINCT productline FROM sandbox_base WHERE producttype = 'strap'")
			or die(mysql_error());
			
		while($row = mysql_fetch_array( $getCats )) {
			$sql = "SELECT * FROM sandbox_base WHERE productline = '" . $row['productline'] ."' AND producttype = 'strap' AND productsize = 'bigger' ORDER BY productid ASC";
			$getProducts = mysql_query($sql)
				or die(mysql_error());
				
			if ($row['productline'] == "Classic") {
				$productPrice = "15";	
			}
			else {
				$productPrice = "20";	
			}
			$GLOBALS['ActiveStraps'] .= "<div class=\"selectorSubHeader\">
                                " . $row['productline'] . " - $<span class=\"price\">". $productPrice . "</span>
                            </div>
                            <ul class=\"thumb\">";
			while($row = mysql_fetch_array( $getProducts )) {
				$inArrayCurrent = in_array($row['strapsku'], $soldout);
				$inArrayCurrentSmall = in_array(substr_replace($row['strapsku'], 4, -3, 1), $soldout);
				
				if ($row['productactive'] == 1 && $inArrayCurrent != 1 && $inArrayCurrentSmall != 1) {
					$GLOBALS['ActiveStraps'] .= "\t\t\t<li><a href=\"" . $row['thumbnailimageurl'] . "\" name=\"" . $row['productname'] . "\" id=\"" . $row['strapsku'] . "\"><img src=\"" . 
					$row['swatchurl'] . "\" /></a></li> \n";
				}
				else if ($row['productactive'] == 1 && $inArrayCurrent == 1 && $inArrayCurrentSmall == 1) {
					$GLOBALS['ActiveStraps'] .= "\t\t\t<li><a href=\"" . $row['thumbnailimageurl'] . "\" name=\"" . $row['productname'] . "\" id=\"" . $row['strapsku'] . "\"><img src=\"" . 
					$row['swatchurl'] . "\" /></a><img class=\"biggerSoldOut bigSoldOut\" src=\"templates/modify/images/blue/sandbox/soldout.png\" /></li> \n";
				}
				else if ($row['productactive'] == 1 && $inArrayCurrent == 1) {
					$GLOBALS['ActiveStraps'] .= "\t\t\t<li><a href=\"" . $row['thumbnailimageurl'] . "\" name=\"" . $row['productname'] . "\" id=\"" . $row['strapsku'] . "\"><img src=\"" . 
					$row['swatchurl'] . "\" /></a><img class=\"biggerSoldOut\" src=\"templates/modify/images/blue/sandbox/soldout.png\" /></li> \n";
				}
				else if ($row['productactive'] == 1 && $inArrayCurrentSmall == 1) {
					$GLOBALS['ActiveStraps'] .= "\t\t\t<li><a href=\"" . $row['thumbnailimageurl'] . "\" name=\"" . $row['productname'] . "\" id=\"" . $row['strapsku'] . "\"><img src=\"" . 
					$row['swatchurl'] . "\" /></a><img class=\"bigSoldOut\" src=\"templates/modify/images/blue/sandbox/soldout.png\" /></li> \n";
				}
			}
			$GLOBALS['ActiveStraps'] .= "</ul>";
		}

		
	}
}
