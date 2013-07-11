<?php

$link = mysql_connect('localhost', 'modify', 'Oski2010!'); 
mysql_select_db('modify_store');

$handleme = Array();
$row = 1;
if (($handle = fopen("names3.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",", "|")) !== FALSE) {
        $row++;
		$query = "SELECT st1.assocbaseid
   				  FROM isc_product_associations st1
				  INNER JOIN isc_product_variation_combinations st2 ON(
					st1.assocprodid = vcproductid 
					AND st2.vcsku IN ('" . mysql_real_escape_string($data[0]) . "', '" . mysql_real_escape_string($data[1]) . "')
				  )
				  GROUP BY st1.assocbaseid 
				  HAVING COUNT(*)=2";
		$result = mysql_query($query);
		if($result) {
			while ($row2 = mysql_fetch_assoc($result)) {
				$handleme[] = Array(mysql_real_escape_string($data[2]), mysql_real_escape_string($data[3]), mysql_real_escape_string($data[4]), mysql_real_escape_string($row2['assocbaseid']), mysql_real_escape_string($data[5]));
			}
		}
    }
    fclose($handle);
}

foreach($handleme as $handlethis) {
	$updateQuery = "UPDATE isc_products 
					SET 
						prodname = '". $handlethis[0] ."',
						prodfundesc = '". $handlethis[1] ."',
						proddesc = '". $handlethis[2] ."',
						prodquoteauthor = '" . $handlethis[4] . "'
					WHERE
						productid = '". $handlethis[3]. "'
				   ";
	echo $updateQuery . "<br />";
	echo $handlethis[0] . "<br/><br/>";
	$result2 = mysql_query($updateQuery, $link);
}
mysql_query("COMMIT");
mysql_close($link);
?>
