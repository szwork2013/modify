<?php
  $faceskus = array("0015", "0014", "0013", "0012", "0011", "0010", "0021", "0020", "0019", "0027", "0026", "0025");
  $strapskus = array("0031", "0032", "0033", "0009", "0008", "0007", "0039", "0038", "0037");

  for ($i = 0; $i < count($faceskus); $i++) {
	  for ($j = 0; $j < count($strapskus); $j++) {
		  $both = $faceskus[$i].$strapskus[$j];
		  if ($both == "0012009" || $both == "0012008" || $both == "0012007" || $both == "0011009" || $both == "0011008" || $both == "0011007" ||
		  $both == "0010009" || $both == "0010008" || $both == "0010007") {
			  
		  }
		  else {
			  $source = "005001.jpg";
			  $dest = $both . "jpg";
			  if (!copy($source, $dest)) {
					echo "failed to copy $file...\n";
				}
		  }
	  }
  }
  
 ?>
 
 Hey there