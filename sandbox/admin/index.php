<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Modify Watches Sandbox Editor!</title>
    <LINK href="admincss.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	
</head>

<body>
	<script type="text/javascript">
		$(function() {
			$("#addAnother").click(function() {
				var i = $("#numberOfPhotos").attr("value");
				i++;
				$("#uploadPhotos").append("<input id=\"file_photo_" + i + "\" type=\"file\" name=\"uploaded_photo_" + i + "\"> <br />");
				$("#numberOfPhotos").attr("value", i);
			});
		});
	</script>
        	<?php
		$username = "modiwatc_sandbox";
		$password = "oski2010!!!";
		$hostname = "localhost"; 
	
		//connection to the database
		$dbhandle = mysql_connect($hostname, $username, $password) 
		  or die("Unable to connect to MySQL");
		$selected = mysql_select_db("modiwatc_store",$dbhandle) 
		  or die("Could not select examples");
	?>
	<div id="container">
    	<div id="header">
        	<a href="index.php" style="text-decoration:none;color:inherit;">Sandbox Editor!</a>
        </div>
        <?
		if ($_GET['action'] !== "editproduct" || (isset($_POST['producttype']) && $_GET['action'] == "editproduct")) {
		?>
    	<div id="addproduct">    
        	<form action="index.php?action=addproduct" method="post" enctype="multipart/form-data">
                <div class="headerfont">Add New Product</div>
                <div id="alertBar"></div>
                <div class="addLeft">
	                <span class="label">Product Type:</span>
                    <select name="producttype">
                        <option value="faces">Face</option>
                        <option value="strap">Strap</option>
                        <option value="combo">Combo</option>
                    </select>
                    <br />
                    <span class="label">Product Name:</span>
                    <input type="text" name="productname" />
                    <br />
                    <span class="label">Product Description:</span>
                    <input type="text" name="productdescription" />
                     <br />
                    <span class="label">Product Face:</span>
                    <select name="facesku">
                    	<option value="">None</option>
                    	<?
							$getFaceSKU = mysql_query("SELECT prodname, prodcode FROM isc_products WHERE prodcatids = 10")
								or die(mysql_error());
							while($row = mysql_fetch_array( $getFaceSKU )) {
								echo "<option value=\"" . $row['prodcode'] . "\">" . $row['prodname'] . "</option>";
							}
						?>
                    </select>
					<br />
                    <span class="label">Product Strap:</span>
                    <select name="strapsku">
                    	<option value="">None</option>
                    	<?
							$getStrapSKU = mysql_query("SELECT prodname, prodcode FROM isc_products WHERE prodcatids = 11")
								or die(mysql_error());
							while($row = mysql_fetch_array( $getStrapSKU )) {
								echo "<option value=\"" . $row['prodcode'] . "\">" . $row['prodname'] . "</option>";
							}
						?>
                    </select>
                    <br />
                    <span class="label">Product Size:</span>
                    <select name="size">
                    	<option value="big">Smaller Size</option>
                        <option value="bigger">Bigger Size</option>
                    </select>
                </div>
                <div class="addRight">
                    <label>Product Image:</label><span class="description"> (Upload the biggest square image of physical product)</span><br />
                    <input id="file_image" type="file" name="uploaded_image"> 
                    <br /><br />
                    <label>Sandbox Color Preview</label><span class="description"> (46x46 pixel sample of design for sandbox)</span><br />
                    <input id="file_swatch" type="file" name="uploaded_swatch">
                    <br /><br />
                    <label>Photos On Customers:</label>
                    <div id="uploadPhotos">
	                    <input id="file_photo_1" type="file" name="uploaded_photo_1"> <br />
                    </div>
                    <input type="hidden" name="numberOfPhotos" id="numberOfPhotos" value="1" />
                    <a href="#" id="addAnother" class="linkFont">Add Another Photo</a>
                </div>
                <div class="addPhotos">
                	
                </div>
                <div class="addBottom">
                    <span class="label">Show Product in Sandbox right now?</span>
                    <input type="checkbox" name="productactive" value="1" />
                    <br />
                    <input type="submit" class="submit" value="Add Product" />
                </div>
            </form>
            
            <?php
			   if( isset($_POST['producttype']) && $_GET['action'] == "addproduct") {
				   //Product Information//
				  $productname = $_POST['productname'];
				  $productdescription = $_POST['productdescription'];
				  $productactive = $_POST['productactive'];
				  $producttype = $_POST['producttype'];
				  $facesku = $_POST['facesku'];
				  $strapsku = $_POST['strapsku'];
				   //Start Upload Handling//
				  include('uploadfile.php');
				  $location = "../../store/templates/modify/images/blue/sandbox/" . $_POST['producttype'] . "/";
				  $file = $_FILES["uploaded_image"]["name"];
				  $swatch = $_FILES["uploaded_swatch"]["name"];
				  $uploadedfile = $_FILES['uploaded_image']['tmp_name'];
				  $uploadedswatch = $_FILES['uploaded_swatch']['tmp_name'];
				  
				  if ($productname == "" || $productdescription == "" || $file == "" || $swatch == "") {
				  ?>
                  	<script type="text/javascript">
						$(function () {
							$("#alertBar").text("Please fill out all fields. :)").css({ 'background-color' : '#ffd6d6', 'border' : '1px solid #ff8383' }).fadeIn();
						});
					</script>
                  <?php
				  }
				  else {
					  if (file_exists($location . $facesku . $strapsku . ".jpg")) {
						  unlink($location . $facesku . $strapsku . ".jpg");
					  }
					  if (file_exists($location . $facesku . $strapsku . "thumb.jpg")) {
						  unlink($location . $facesku . $strapsku . "thumb.jpg");
					  }
					  if (file_exists($location . $facesku . $strapsku . "swatch.jpg")) {
						  unlink($location . $facesku . $strapsku . "swatch.jpg");
					  }
					  $uploadMain = uploadFile($uploadedfile, $file, $location, $facesku . $strapsku, 190);
					  if ($producttype == "combo") {
						  $uploadSwatch = 1;
					  }
					  else {
						  $uploadSwatch = uploadFile($uploadedswatch, $swatch, $location, $facesku . $strapsku . "swatch");
					  }	
					  
					  $numberOfPhotos = $_POST['numberOfPhotos'];
					  for ($i=1; $i <= $numberOfPhotos; $i++) {
						  $photoID = "uploaded_photo_" . $i;
						  $photoName = $_FILES[$photoID]['name'];
				 		  $photoLocation = $_FILES[$photoID]['tmp_name'];
						  echo ("This:" . $photoLocation . " " . $photoName);
						  $photoLocationPath = "../../store/templates/modify/images/blue/sandbox/";
						  $uploadPhotos = uploadFile($photoLocation, $photoName, $photoLocationPath, $facesku . $strapsku . $i, 209, 44);
						  $sqlLocation = "images/photos/" . $facesku . $strapsku . $i . "thumb.jpg";
						  $sqlLocationThumb = "images/photos/" . $facesku . $strapsku . $i . "secondthumb.jpg";
						  $sql = "INSERT INTO sandbox_photos (facesku, strapsku, bigimageurl, thumbnailurl) VALUES
						  ('$facesku', '$strapsku', '$sqlLocation', '$sqlLocationThumb')";
						  $results = mysql_query($sql)
						  	or die("Could not update product:" . mysql_error());
					  }
					  //End Upload Handling//
					  //URLS//
					  $bigimageurl = "/templates/modify/images/blue/sandbox/" . $_POST['producttype'] . "/" . $facesku . $strapsku . ".jpg";
					  $thumbnailimageurl = "/templates/modify/images/blue/sandbox/" . $_POST['producttype'] . "/"  . $facesku . $strapsku . "thumb.jpg";
					  $swatchurl = "/templates/modify/images/blue/sandbox/" . $_POST['producttype'] . "/"  . $facesku . $strapsku . "swatch.jpg";
					  
					  if ($uploadMain == 1 && $uploadSwatch == 1) { //Confirm that the images uploaded properly
						$sql = "INSERT INTO sandbox_base (producttype, facesku, strapsku, productname, productdescription, thumbnailimageurl, bigimageurl, productactive, swatchurl)
						VALUES ('$producttype', '$facesku', '$strapsku', '$productname', '$productdescription', '$thumbnailimageurl', '$bigimageurl', '$productactive', '$swatchurl')";
						$results = mysql_query($sql) 
							or die("Could not update product:" . mysql_error());
						include('getJson.php');
						?>
                        <script type="text/javascript">
							$(function () {
								$("#alertBar").text("Product has been added!").css({ 'background-color' : '#c0ffba', 'border' : '1px solid #6fff60' }).fadeIn();
							});
						</script>
                        <?php
					  }
					  else {
						echo "Something went wrong!";  
					  }
				  }
			   }
			?>
		</div>
        <? } ?>
        <?php
			if (!isset($_POST['producttype']) && $_GET['action'] == "editproduct") {
				$id = $_GET['id'];
				$result = mysql_query("SELECT producttype, productname, productdescription, facesku, strapsku, bigimageurl, thumbnailimageurl, productactive, swatchurl FROM sandbox_base WHERE productid = $id") 
							or die(mysql_error());
				while($data = mysql_fetch_array( $result )) {
		?>
        <div id="editindivproduct">    
        	<form action="index.php?action=editproduct" method="post" enctype="multipart/form-data">
                <div class="headerfont">Edit Product</div>
                <div class="addLeft">
	                <span class="label">Product Type:</span>
                    <select name="producttype" id="producttype">
                        <option value="face" <?php if($data['producttype'] == "face") echo "SELECTED"; ?>>Face</option>
                        <option value="strap" <?php if($data['producttype'] == "strap") echo "SELECTED"; ?>>Strap</option>
                        <option value="combo" <?php if($data['producttype'] == "combo") echo "SELECTED"; ?>>Combo</option>
                    </select>
                    <br />
                    <span class="label">Product Name:</span>
                    <input type="text" name="productname" value="<? echo $data['productname']; ?>" />
                    <br />
                    <span class="label">Product Description:</span>
                    <input type="text" name="productdescription" value="<? echo $data['productdescription'];  ?>" />
                     <br />
                    <span class="label">Product Face:</span>
                    <select name="facesku">
                    	<option value="">None</option>
                    	<?
							$getFaceSKU = mysql_query("SELECT prodname, prodcode FROM isc_products WHERE prodcatids = 10")
								or die(mysql_error());
							while($row = mysql_fetch_array( $getFaceSKU )) {
								if ($row['prodcode'] == $data['facesku']) {
									echo "<option value=\"" . $row['prodcode'] . "\" SELECTED>" . $row['prodname'] . "</option>";
								}
								else {
									echo "<option value=\"" . $row['prodcode'] . "\">" . $row['prodname'] . "</option>";
								}
							}
							
						?>
                    </select>
					<br />
                    <span class="label">Product Strap:</span>
                    <select name="strapsku">
                    	<option value="">None</option>
                    	<?
							$getStrapSKU = mysql_query("SELECT prodname, prodcode FROM isc_products WHERE prodcatids = 11")
								or die(mysql_error());
							while($row = mysql_fetch_array( $getStrapSKU )) {
								if ($row['prodcode'] == $data['strapsku']) {
									echo "<option value=\"" . $row['prodcode'] . "\" SELECTED>" . $row['prodname'] . "</option>";
								}
								else {
									echo "<option value=\"" . $row['prodcode'] . "\">" . $row['prodname'] . "</option>";
								}
							}
						?>
                    </select>
                </div>
                <div class="addRight">
                    <span class="label">Product Image:</span><span class="description"> (Upload the biggest square image of physical product)</span><br />
                    <img src="../<? echo $data['bigimageurl'];  ?> " style="height:100px;" /><span class="description" style="position:relative;top:-20px;"> (Upload new image to change this one)</span> <br />
                    <input id="file" type="file" name="uploaded_image"> 
                    <br /><br />
                    <span class="label">Sandbox Color Preview</span><span class="description"> (46x46 pixel sample of design for sandbox)</span><br />
                    <img src="../<? echo $data['swatchurl'];  ?>" /><span class="description" style="position:relative;top:-20px;"> (Upload new image to change this one)</span> <br />
                    <input id="file" type="file" name="uploaded_swatch"> 
                </div>
                <div class="addBottom">
                    <span class="label">Show Product in Sandbox right now?</span>
                    <input type="checkbox" name="productactive" value="1" <?php if ($data['productactive'] == 1) { ?> checked="yes" <?php } ?> />
                    <br />
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" class="submit" value="Edit Product" />
                </div>
            </form>
            </div>
       
            <?php } } ?>
            
            <?php
			   if( isset($_POST['producttype']) && $_GET['action'] == "editproduct") {
				   //Product Information//
				  $id = $_POST['id'];
				  $productname = $_POST['productname'];
				  $productdescription = $_POST['productdescription'];
				  $productactive = $_POST['productactive'];
				  $producttype = $_POST['producttype'];
				  $facesku = $_POST['facesku'];
				  $strapsku = $_POST['strapsku'];
				   //Start Upload Handling//
				  include('uploadfile.php');
				  $location = "../../store/templates/modify/images/blue/sandbox/" . $_POST['producttype'] . "s/";
				  $uploadMain = 1;
				  $uploadSwatch = 1;
				  if ($_FILES["uploaded_image"]['size'] > 0) {
					  if (file_exists($location . $facesku . $strapsku . ".jpg")) {
						  unlink($location . $facesku . $strapsku . ".jpg");
					  }
					  if (file_exists($location . $facesku . $strapsku . "thumb.jpg")) {
						  unlink($location . $facesku . $strapsku . "thumb.jpg");
					  }
					  
					  $file = $_FILES["uploaded_image"]["name"];
					  $uploadedfile = $_FILES['uploaded_image']['tmp_name'];
					  $uploadMain = uploadFile($uploadedfile, $file, $location, $facesku . $strapsku, 190);
				  }
				  if ($_FILES["uploaded_swatch"]['size'] > 0) {
					  if (file_exists($location . $facesku . $strapsku . "swatch.jpg")) {
						  unlink($location . $facesku . $strapsku . "swatch.jpg");
					  }
					  $swatch = $_FILES["uploaded_swatch"]["name"];
					  $uploadedswatch = $_FILES['uploaded_swatch']['tmp_name'];
					  $uploadSwatch = uploadFile($uploadedswatch, $swatch, $location, $facesku . $strapsku . "swatch");
				  }
				  //End Upload Handling//
				  //URLS//
				  $bigimageurl = $location . $facesku . $strapsku . ".jpg";
				  $thumbnailimageurl = $location . $facesku . $strapsku . "thumb.jpg";
				  $swatchurl = $location . $facesku . $strapsku . "swatch.jpg";
				  
				  if ($uploadMain == 1 && $uploadSwatch == 1) { //Confirm that the images uploaded properly
					$sql = "UPDATE sandbox_base SET producttype = '$producttype', facesku = '$facesku', strapsku = '$strapsku', productname = '$productname', productdescription = '$productdescription', thumbnailimageurl = '$thumbnailimageurl', bigimageurl = '$bigimageurl', productactive = '$productactive', swatchurl = '$swatchurl' WHERE productid = '$id'";
					$results = mysql_query($sql) 
		  				or die("Could not update product:" . mysql_error());
					include('getJson.php');
				  }
				  else {
				  	echo "Something went wrong!";  
				  }
			   }
			 ?>
        
        <? 
		if(  $_GET['action'] == "deleteproduct") {
			$deleteId = $_GET['id'];
			$sql = "DELETE FROM sandbox_base WHERE productid = $deleteId";
			mysql_query($sql)
				or die(mysql_error());
			include('getJson.php');
		}
		?>
        <div class="editproduct">    
                <div class="headerfont">Edit Existing Products</div>
                <?php
				$getProducts= mysql_query("SELECT bigimageurl, facesku, strapsku, productid FROM sandbox_base ORDER BY producttype")
								or die(mysql_error());
				while($row = mysql_fetch_array( $getProducts )) { ?>
					<div class="productbox">
						<div class="productimage"><img src="../<? echo $row['bigimageurl']; ?>" style="width:190px;" /></div>
						<div class="productfacesku">Face SKU: <? echo $row['facesku']; ?></div>
						<div class="productstrapsku">Strap SKU: <? echo $row['strapsku']; ?></div>
						<div class="editthisproduct"><a href="index.php?action=editproduct&id=<?php echo $row['productid']; ?>">Edit Product</a></div>
                        <div class="deletethisproduct"><a href="index.php?action=deleteproduct&id=<?php echo $row['productid']; ?>" onclick="if(confirm('Do you really want to remove this product ?')){ return; } else { return false };">Delete Product</a></div>
					</div>
				<?php } ?>
         </div>
	</div>
</body>
<?php mysql_close($dbhandle);
?>
</html>