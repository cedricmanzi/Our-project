<?php

$db = mysqli_connect("localhost", "root", "", "manzi");


if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


$result = $db->query("SELECT * FROM images");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageURL = $row['image_data'];
        echo '<img src="'.$imageURL.'" alt="Uploaded Image">';
    }
} else {
    echo "No image found.";
}
?>
