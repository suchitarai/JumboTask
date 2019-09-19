<?php
include("../database.php");

if (isset($_POST["upload"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg",
		"JPG"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "messageSt" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "messageSt" => "Upload valiid images. Only PNG and JPEG are allowed."
        );
      //  echo $result;
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
        $response = array(
            "type" => "error",
            "messageSt" => "Image size exceeds 2MB"
        );
    }    // Validate image file dimension
    else if ($width > "3000" || $height > "2000") {
        $response = array(
            "type" => "error",
            "messageSt" => "Image dimension should be within 3000X2000"
        );
    } else {
        $target = "image/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
			$db=new database();
			 $pet_id=$_POST['pet_id'];
			 $add_data=$_POST['add_data'];
			 $query=$db->query_run("update pet set photoUrls='".$_FILES["file-input"]["name"]."' where id=".$pet_id);
			 $responseApi = array(
				"code"=> 200,
                "type" => "success",
                "message" => "additionalMetadata: ".$add_data." \n File uploaded to ".$_FILES["file-input"]["name"]." ".$_FILES["file-input"]["size"].""
            );
			echo json_encode($responseApi);
			$response = array(
                "type" => "success",
                "messageSt" => "Image uploaded successfully."
            );
        } else {
            $response = array(
                "type" => "error",
                "messageSt" => "Problem in uploading image files."
            );
        }
    }
}
?>
<html>
<head>
<title>Pet</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#f9f9f9; margin:30px auto; width:600px; padding:15px; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;">
    <h2>Pet Image Upload </h2>
    <form id="frm-image-upload" action="uploadimage.php" name='img'
        method="post" enctype="multipart/form-data">
		<div class="form-row">
            <div>ID of pet to update:</div>
            <div>
                <input type="text"   name="pet_id" id="pet_id" required onkeypress="return isNumber(event)" >
            </div>
        </div>
		<div class="form-row">
            <div>Additional data to pass to server:</div>
            <div>
                <input type="text"   name="add_data" id="add_data"   >
            </div>
        </div>
        <div class="form-row">
            <div>File to upload:</div>
            <div>
                <input type="file" class="file-input" name="file-input">
            </div>
        </div>

        <div class="button-row">
            <input type="submit" id="btn-submit" name="upload"
                value="Upload">
        </div>
    </form>
    <?php if(!empty($response)) { ?>
    <div class="response <?php echo $response["type"]; ?>"><?php echo $response["messageSt"]; ?></div>
    <?php }?>
</body>
</html>





