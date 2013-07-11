<?php

	$username = "modiwatc_modify";
	$password = "Oski2010!";
	$hostname = "localhost"; 

	//connection to the database
	$dbhandle = mysql_connect($hostname, $username, $password) 
	  or die("Unable to connect to MySQL");
	$selected = mysql_select_db("modiwatc_store",$dbhandle) 
	  or die("Could not select examples");	

	$dataInfo = new stdClass();
	$productInfo = new stdClass();
	
	$sqlProducts = "SELECT prodcode, productid FROM isc_products";
	$resultProducts = mysql_query($sqlProducts);
	
	while($row = mysql_fetch_array( $resultProducts )) {
		$productInfo -> SKU[$row['prodcode']] -> product_id = $row['productid'];
	}
	?>
    <pre>
    <?
	var_dump($productInfo);
	?>
    </pre>
    <?

	$sql = "SELECT * FROM sandbox_base";
	$result = mysql_query($sql)
		or die(mysql_error());
		
	$i = 0;	
	$j = 0;
	$k = 0;
	
	while($row = mysql_fetch_array( $result )) {
		if ($row['producttype'] == "faces") {
			$dataInfo -> SKU[$row['facesku']] -> productName = $row['productname'];
			$dataInfo -> SKU[$row['facesku']] -> productID = $productInfo -> SKU[$row['facesku']] -> product_id;
			echo $row['facesku'] . "<br />";
			$dataInfo -> SKU[$row['facesku']] -> productType = $row['producttype'];
			$dataInfo -> SKU[$row['facesku']] -> productDescription = $row['productdescription'];
			$dataInfo -> SKU[$row['facesku']] -> productImage = $row['bigimageurl'];
			$dataInfo -> SKU[$row['facesku']] -> productImageThumbnail = $row['thumbnailimageurl'];
			$dataInfo -> SKU[$row['facesku']] -> productSwatch = $row['swatchurl'];
			$dataInfo -> SKU[$row['facesku']] -> productActive = $row['productactive'];
			$dataInfo -> SKU[$row['facesku']] -> productSize = $row['productsize'];
			$dataInfo -> faces -> SKU[$i] -> faceSKU = $row['facesku'];
			$dataInfo -> faces -> SKU[$i] -> productName = $row['productname'];
			$dataInfo -> faces -> SKU[$i] -> productDescription = $row['productdescription'];
			$dataInfo -> faces -> SKU[$i] -> productImage = $row['bigimageurl'];
			$dataInfo -> faces -> SKU[$i] -> productImageThumbnail = $row['thumbnailimageurl'];
			$dataInfo -> faces -> SKU[$i] -> productSwatch = $row['swatchurl'];
			$dataInfo -> faces -> SKU[$i] -> productActive = $row['productactive'];
		}
		$i++;
		if ($row['producttype'] == "strap") {
			$dataInfo -> SKU[$row['strapsku']] -> productName = $row['productname'];
			$dataInfo -> SKU[$row['strapsku']] -> productID = $productInfo -> SKU[$row['strapsku']] -> product_id;
			$dataInfo -> SKU[$row['strapsku']] -> productType = $row['producttype'];
			$dataInfo -> SKU[$row['strapsku']] -> productDescription = $row['productdescription'];
			$dataInfo -> SKU[$row['strapsku']] -> productImage = $row['bigimageurl'];
			$dataInfo -> SKU[$row['strapsku']] -> productImageThumbnail = $row['thumbnailimageurl'];
			$dataInfo -> SKU[$row['strapsku']] -> productSwatch = $row['swatchurl'];
			$dataInfo -> SKU[$row['strapsku']] -> productActive = $row['productactive'];
			$dataInfo -> SKU[$row['strapsku']] -> productSize = $row['productsize'];
			$dataInfo -> straps -> SKU[$i] -> strapSKU = $row['strapsku'];
			$dataInfo -> straps-> SKU[$i] -> productName = $row['productname'];
			$dataInfo -> straps -> SKU[$i] -> productDescription = $row['productdescription'];
			$dataInfo -> straps -> SKU[$i] -> productImage = $row['bigimageurl'];
			$dataInfo -> straps -> SKU[$i] -> productImageThumbnail = $row['thumbnailimageurl'];
			$dataInfo -> straps -> SKU[$i] -> productSwatch = $row['swatchurl'];
			$dataInfo -> straps -> SKU[$i] -> productActive = $row['productactive'];
		}
		$j++;
		if ($row['producttype'] == "combo") {
			$sku = $row['facesku'] . $row['strapsku'];
			$dataInfo -> SKU[$sku] -> faceSKU = $row['facesku'];
			$dataInfo -> SKU[$sku] -> strapSKU = $row['strapsku'];
			$dataInfo -> SKU[$sku] -> productType = $row['producttype'];
			$dataInfo -> SKU[$sku] -> productName = $row['productname'];
			$dataInfo -> SKU[$sku] -> productDescription = $row['productdescription'];
			$dataInfo -> SKU[$sku] -> productImage = $row['bigimageurl'];
			$dataInfo -> SKU[$sku] -> productImageThumbnail = $row['thumbnailimageurl'];
			$dataInfo -> SKU[$sku] -> productActive = $row['productactive'];
			$dataInfo -> combos -> SKU[$sku] -> faceSKU = $row['strapsku'];
			$dataInfo -> combos -> SKU[$sku] -> strapSKU = $row['strapsku'];
			$dataInfo -> combos -> SKU[$sku] -> productName = $row['productname'];
			$dataInfo -> combos -> SKU[$sku] -> productDescription = $row['productdescription'];
			$dataInfo -> combos -> SKU[$sku] -> productImage = $row['bigimageurl'];
			$dataInfo -> combos -> SKU[$sku] -> productImageThumbnail = $row['thumbnailimageurl'];
			$dataInfo -> combos -> SKU[$sku] -> productActive = $row['productactive'];
		}
		$k++;
	}
	
	$sql2 = "SELECT * FROM sandbox_photos";
	$results2 = mysql_query($sql2);
	
	
	$i = 0;
	while($row = mysql_fetch_array( $results2 )) {
		if (!($row['facesku'] == "")) {
			$dataInfo -> photos -> SKU[$row['facesku']] -> photoURL[$i] = $row['bigimageurl'];
			$dataInfo -> photos -> SKU[$row['facesku']] -> thumbnailURL[$i] = $row['thumbnailurl'];
		}
		if (!($row['strapsku'] == "")) {
			$dataInfo -> photos -> SKU[$row['strapsku']] -> photoURL[$i] = $row['bigimageurl'];
			$dataInfo -> photos -> SKU[$row['strapsku']] -> thumbnailURL[$i] = $row['thumbnailurl'];
		}
		if (!($row['strapsku'] == "") && !($row['facesku'] == "")) {
			$sku = $row['facesku'] . $row['strapsku'];
			$dataInfo -> photos -> SKU[$sku] -> photoURL[$i] = $row['bigimageurl'];
			$dataInfo -> photos -> SKU[$sku] -> thumbnailURL[$i]= $row['thumbnailurl'];
		}
		$i++;
	}
	
	$filename = '../data.txt';
	$somecontent = json_encode($dataInfo);
	
	if (!$handle = fopen($filename, 'w')) {
		 echo "Cannot open file ($filename)";
		 exit;
	}
	
	// Write $somecontent to our opened file.
	if (fwrite($handle, $somecontent) === FALSE) {
		echo "Cannot write to file ($filename)";
		exit;
	}
	
	fclose($handle);
	