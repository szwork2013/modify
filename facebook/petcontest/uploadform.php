<?php
include ($_SERVER['DOCUMENT_ROOT']."/store/includes/classes/upload_class.php");
error_reporting(E_ALL);
ini_set("memory_limit", "64M");
set_time_limit(60);

class Foto_upload extends file_upload {
	
	var $x_size;
	var $y_size;
	var $x_max_size = 1024;
	var $y_max_size = 800;
	var $x_max_thumb_size = 200;
	var $y_max_thumb_size = 200;
	var $thumb_folder;
	var $foto_folder;
	var $larger_dim;
	var $larger_curr_value;
	var $larger_dim_value;
	var $larger_dim_thumb_value;
	var $timestamp;
	
	var $use_image_magick = true; // switch between true and false
	// I suggest to use ImageMagick on Linux/UNIX systems, it works on windows too, but it's hard to configurate
	// check your existing configuration by your web hosting provider
	
	function process_image($landscape_only = false, $create_thumb = false, $delete_tmp_file = false, $compression = 85) {
		$filename = $this->upload_dir.$this->file_copy;
		$this->check_dir($this->thumb_folder); // run these checks to create not existing directories
		$this->check_dir($this->foto_folder); // the upload dir is created during the file upload (if not already exists)
		$thumb = $this->thumb_folder.$this->timestamp.$this->get_extension($this->the_file);
		$foto = $this->foto_folder.$this->timestamp.$this->get_extension($this->the_file);
		if ($landscape_only) {
			$this->get_img_size($filename);
			if ($this->y_size > $this->x_size) {
				$this->img_rotate($filename, $compression);
			}
		}
		$this->check_dimensions($filename); // check which size is longer then the max value
		if ($this->larger_curr_value > $this->larger_dim_value) {
			$this->thumbs($filename, $foto, $this->larger_dim_value, $compression);
		} else {
			copy($filename, $foto);
		}
		if ($create_thumb) {
			if ($this->larger_curr_value > $this->larger_dim_thumb_value) {
	 			$this->thumbs($filename, $thumb, $this->larger_dim_thumb_value, $compression); // finally resize the image
			} else {
				copy($filename, $thumb);
			}
		}
		if ($delete_tmp_file) $this->del_temp_file($filename); // note if you delete the tmp file the check if a file exists will not work
	}
	function get_img_size($file) {
		$img_size = getimagesize($file);
		$this->x_size = $img_size[0];
		$this->y_size = $img_size[1];
	}
	function check_dimensions($filename) {
		$this->get_img_size($filename);
		$x_check = $this->x_size - $this->x_max_size;
		$y_check = $this->y_size - $this->y_max_size;
		if ($x_check < $y_check) {
			$this->larger_dim = "y";
			$this->larger_curr_value = $this->y_size;
			$this->larger_dim_value = $this->y_max_size;
			$this->smaller_dim = "x";
			$this->smaller_curr_value = $this->x_size;
			$this->smaller_dim_value = $this->x_max_size;
			$this->larger_dim_thumb_value = $this->y_max_thumb_size;
		} else {
			$this->larger_dim = "x";
			$this->larger_curr_value = $this->x_size;
			$this->larger_dim_value = $this->x_max_size;
			$this->smaller_dim = "y";
			$this->smaller_curr_value = $this->y_size;
			$this->smaller_dim_value = $this->y_max_size;
			$this->larger_dim_thumb_value = $this->x_max_thumb_size;
		}
	}
	function img_rotate($wr_file, $comp) {
		$new_x = $this->y_size;
		$new_y = $this->x_size;
		if ($this->use_image_magick) {
			exec(sprintf("mogrify -rotate 90 -quality %d %s", $comp, $wr_file));
		} else {
			$src_img = imagecreatefromjpeg($wr_file);
			$rot_img = imagerotate($src_img, 90, 0);
			$new_img = imagecreatetruecolor($new_x, $new_y);
			imageantialias($new_img, TRUE);
			imagecopyresampled($new_img, $rot_img, 0, 0, 0, 0, $new_x, $new_y, $new_x, $new_y);
			imagejpeg($new_img, $this->upload_dir.$this->file_copy, $comp);
		}
	}
	function thumbs($file_name_src, $file_name_dest, $target_size, $quality = 80) {
		//print_r(func_get_args());
		$size = getimagesize($file_name_src);
		if ($this->larger_dim == "x") {
			$w = number_format($target_size, 0, ',', '');
			$h = number_format(($size[1]/$size[0])*$target_size,0,',','');
		} else {
			$h = number_format($target_size, 0, ',', '');
			$w = number_format(($size[0]/$size[1])*$target_size,0,',','');
		}
		if ($this->use_image_magick) {
			exec(sprintf("convert %s -resize %dx%d -quality %d %s", $file_name_src, $w, $h, $quality, $file_name_dest));
		} else {
			$dest = imagecreatetruecolor($w, $h);
			imageantialias($dest, TRUE);
			$src = imagecreatefromjpeg($file_name_src);
			imagecopyresampled($dest, $src, 0, 0, 0, 0, $w, $h, $size[0], $size[1]);
			imagejpeg($dest, $file_name_dest, $quality);
		}
	}
}

$max_size = 1024*1024; // the max. size for uploading (~1MB)
define("MAX_SIZE", $max_size);
$foto_upload = new Foto_upload;

$foto_upload->upload_dir = $_SERVER['DOCUMENT_ROOT']."/facebook/petcontest/photos/"; // "files" is the folder for the uploaded files (you have to create these folder)
$foto_upload->foto_folder = $_SERVER['DOCUMENT_ROOT']."/facebook/petcontest/photos/";
$foto_upload->thumb_folder = $_SERVER['DOCUMENT_ROOT']."/facebook/petcontest/photos/thumb/";
$foto_upload->extensions = array(".jpg", ".gif", ".png"); // specify the allowed extension(s) here
$foto_upload->language = "en";
$foto_upload->x_max_size = 1024;
$foto_upload->y_max_size = 1024;
$foto_upload->x_max_thumb_size = 200;
$foto_upload->y_max_thumb_size = 200;
$foto_upload->timestamp = time();
		
if (isset($_POST['Submit']) && $_POST['Submit'] == "Upload") {
	$conn = mysql_connect("localhost", "modiwatc_fb", "Oski2010!") or die(mysql_error());
	mysql_select_db("modiwatc_facebook", $conn) or die(mysql_error());
	
	$foto_upload->the_temp_file = $_FILES['upload']['tmp_name'];
	$foto_upload->the_file = $_FILES['upload']['name'];
	$foto_upload->http_error = $_FILES['upload']['error'];
	$foto_upload->replace = (isset($_POST['replace'])) ? $_POST['replace'] : "n"; // because only a checked checkboxes is true
	$foto_upload->do_filename_check = "n"; 
	if ($foto_upload->upload()) {
		$foto_upload->process_image(false, true, true, 80);
		$personname = strip_tags($_POST['name']);
		$email = strip_tags($_POST['email']);
		if(isset($_POST['subscribe'])) { 
			$sub = true; 
		}
		else $sub = false;
		$url = $foto_upload->timestamp.$foto_upload->get_extension($foto_upload->the_file);
		mysql_query("INSERT INTO petphotos (name, email, subscribe, photourl) VALUES ('$personname', '$email', '$sub', '$url')") or die(mysql_error());
		die("<link href=\"http://www.modifywatches.com/store/templates/modify/Styles/blue.css?186\" media=\"all\" type=\"text/css\" rel=\"stylesheet\" /> <div class=\"uploadText\">Thanks!</div><div class=\"uploadBody\" stlye='font-size:16px;'>The file has been uploaded. It should appear on the voting page shortly!</div>");
	}
}
$error = $foto_upload->show_error_string();
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Upload</title>

	<link href="http://www.modifywatches.com/store/templates/modify/Styles/blue.css?186" media="all" type="text/css" rel="stylesheet" /> 
	<script type="text/javascript" src="http://www.modifywatches.com/store/javascript/upload.js"></script>
    <script type="text/javascript" src="http://www.modifywatches.com/store/javascript/jquery.js"></script>
    <script type="text/javascript"> 
        // wait for the DOM to be loaded 

        $(document).ready(function() { 
           $('#Submit').click(function() {
			   $('#error').hide();  
				  var name = $("input#name").val();  
					if (name == "") {  
				  $("#error").show(); 
				  return false;  
				}  
					var email = $("input#email").val();  
					if (email == "") {  
				  $("#error").show();
				  return false;  
				}  
				
				var file = $("input#upload").val();  
					if (file == "") {  
				  $("#error").show();
				  return false;  
				} 
				
			  $(".uploadBody").html("<img src='htp://www.modifywatches.com/store/templates/modify/images/blue/sandbox/ajax-loader.gif' />"); 
		   });
        }); 
		
    </script> 
</head>
<body style="background:none;">


<div class="uploadForm">
    <div class="uploadText">
        Upload Your Photo!
    </div>	
    
    <div id="error" style="margin-top:3px;">
    	Please fill out all fields :)
    </div>
    
    <div class="uploadBody">
    	<form action="http://www.modifywatches.com/facebook/petcontest/uploadform.php" id="actualForm" method="post" enctype="multipart/form-data">
	        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_size; ?>">
            <span class="uploadLabel">Your Name</span><br />
            <input type="text" class="uploadInput" id="name" name="name" /><br /><br />
            <span class="uploadLabel">Your E-mail</span><br />
            <input type="text" class="uploadInput" id="email" name="email" /><br /><br />
			<input type="checkbox" id="subcribe" name="subscribe" value="yes" CHECKED /><span class="uploadLabel">Subscribe to Newsletter?</span><br /> <br />
            <span class="uploadLabel">File</span><br />
            <input type="file" value="Choose File" id="upload" class="uploadFile" name="upload" /><br /><br />
            <input type="image" src="http://www.modifywatches.com/store/templates/modify/images/blue/uploadbutton.png" name="Submit" id="Submit" value="Upload" style="margin-top:5px;float:left;cursor:pointer;"/>
		</form>
         <p><?php echo $error; ?></p>
    </div>

</div>

</body>
</html>