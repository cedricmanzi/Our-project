<?php
$targetDir="uploads/";
$targetFile=$targetDir.basename($_FILES["file"]["name"]);

$uploadOk= 1;
$imageFileType=pathinfo($targetFile,PATHINFO_EXTENSION);

if(isset($_POST["submit"]))
$check=getimagesize($_FILES["file"]["tmp_name"]);
if($check!==false)
{
	echo "File is an image - ".$check["mime"].".";
    $uploadOk=1;
}
else
{
	echo "File is not an image.";
    $uploadOk=0;
}

if ($_FILES["fileToUpload"]["size"]>500000){
    echo "Sorry, your file is too large.";
    $uploadOk=0;
}