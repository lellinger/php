<?php
//created by Logan Ellinger
require("lsconnection.php");
//Location where uploaded images go
$target_dir = "images/";
//Filepath for uploaded image
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//Valid file checker, used as a condition before the file is processed
$uploadCheck = 1;
//Determine the file extension
$target_file_extension = pathinfo($target_file,PATHINFO_EXTENSION);
//Determine if file is a real picture
/*$image_check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if ($image_check !== false) {
	echo "File is an image <br>";
	$uploadCheck = 1;
} else {
	echo "File is not an image...nice try. ";
	$uploadCheck = 0;
} */
//check for file type
echo $target_file_extension . "<br>";
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$file_type = finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]) . "<br>";
switch ($file_type) {
	case "image/jpeg";
	$uploadCheck = 1;
	break;
	case "text/plain";
	$uploadCheck = 1;
	break;
	default:
	$uploadCheck = 0;
	echo "Not approved file type";
}
	
	
//check for duplicate file names
if (file_exists($target_file)){
	echo "A file with that name already exists. ";
	$uploadCheck = 0;
}
//check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
	echo "Your file was too big. ";
	$uploadCheck = 0;
}

//Time to do the uploading
if ($uploadCheck == 0) {
	echo "Your file was not uploaded. ";
}
if ($uploadCheck == 1) {
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	echo "The file was uploaded to $target_file <br>";
}

?>