<?php

$db = mysqli_connect("localhost", "root", "", "manzi");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $targetDir = "uploads/";
    $fileName = basename($_FILES["file_name"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath))
        {
            
            $insert = $db->query("INSERT INTO images (image_data) VALUES ('".$targetFilePath."')");
            if ($insert) {
                echo "The file ".$fileName. " has been uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type.";
    }
}
?>
