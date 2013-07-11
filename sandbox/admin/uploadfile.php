<?php 

 $errors=0;
 
 function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
function uploadFile($uploadedfile, $image, $location, $name, $resizewidth = 0, $secondresize = 0) {
	 if ($image)  {
		  $filename = stripslashes($image);
		  $extension = getExtension($filename);
		  $extension = strtolower($extension);
		  if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
		  	  return 'Unknown Image extension';
			  $errors=1;
		  }
		  else {
			  
			  if ($resizewidth > 0) {
				  if($extension=="jpg" || $extension=="jpeg" ) {
					  $src = imagecreatefromjpeg($uploadedfile);
				  }
				  else if($extension=="png") {
					$src = imagecreatefrompng($uploadedfile);
				  }
				  else {
					$src = imagecreatefromgif($uploadedfile);
				  }
				 
				  list($width,$height)=getimagesize($uploadedfile);
			  
				  $newwidth= $resizewidth;
				  $newheight=($height/$width)*$newwidth;
				  $tmp=imagecreatetruecolor($newwidth,$newheight);
				
				  imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
				  $width,$height);
				
				  $filename = "$location". $name . "thumb.jpg";
			  	  $smallVersion = imagejpeg($tmp,$filename,80);
				  imagedestroy($tmp);
				  imagedestroy($src); 	
			  }
			  
			  if ($secondresize > 0) {
				  if($extension=="jpg" || $extension=="jpeg" ) {
					  $src2 = imagecreatefromjpeg($uploadedfile);
				  }
				  else if($extension=="png") {
					$src2 = imagecreatefrompng($uploadedfile);
				  }
				  else {
					$src2 = imagecreatefromgif($uploadedfile);
				  }
				 
				  list($width,$height)=getimagesize($uploadedfile);
			  
				  $newwidth = $secondresize;
				  $newheight =($height/$width)*$newwidth;
				  $tmp2=imagecreatetruecolor($newwidth,$newheight);
				
				  imagecopyresampled($tmp2,$src2,0,0,0,0,$newwidth,$newheight,
				  $width,$height);
				
				  $filename = $location . $name . "secondthumb.jpg";
			  	  $smallVersion2 = imagejpeg($tmp2,$filename,80);
				  imagedestroy($tmp2);
				  imagedestroy($src2); 	
			  }
			  
			    $normalfilename = $location . $name . "." . $extension ;
				$copied = copy($uploadedfile, $normalfilename);
				if (!$copied && !$smallVersion  && !$smallVersion2) {
					return 0;
					$errors=1;
				}
				else return 1;
				}  
		  }
}
?>