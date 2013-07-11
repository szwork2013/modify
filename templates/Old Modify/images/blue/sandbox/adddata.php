<?php
  $faceskus = array("0012", "0011", "0010");
  $strapskus = array("0009", "0008", "0007");
  $faceskus1 = array("0006", "0005", "0004");
  $strapskus1 = array("0003", "0002", "0001");

  for ($i = 0; $i < count($faceskus); $i++) {
	  for ($j = 0; $j < count($strapskus); $j++) {
		$both = $faceskus[$i].$strapskus[$j];
		$both1 = $faceskus1[$i].$strapskus1[$j];
		$source = "./combo/". $both1 . ".jpg";
		$dest = "combo/" . $both . ".jpg";
		if (!copy($source, $dest)) {
			  echo "failed to copy $file...\n";
		  }
		 else {
			  echo "copied $dest... \n";   
		 }
	  }
  }
  
 ?>
 
 Hey there