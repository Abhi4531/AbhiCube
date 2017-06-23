<?php
$logoFileName = $_FILES['coverFile']['name'];
$logoFileType = $_FILES['coverFile']['type'];
$logoFileTmpLocation = $_FILES['coverFile']['tmp_name'];

$validFileTypes = ['image/jpg', 'image/png', 'image/svg', 'image/gif', 'image/jpeg'];
$fileType = mime_content_type($coverFileTmpLocation);
        echo 'file type is :'.$fileType.'<br />';
        //store the file on our server
        if (in_array($fileType, $validFileTypes)) {
            $fileName = "uploads/" . uniqid("", true) . "-" . $coverFileName;
            move_uploaded_file($coverFileTmpLocation, $fileName);
        }

            ?>

