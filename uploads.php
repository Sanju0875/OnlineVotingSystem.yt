<?php
require("./connect.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["profile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["profile"]["name"])) . " has been uploaded.";
        var_dump($_POST);
        $fullname = $_POST["fullname"];
        $position = $_POST["position"];

        $insert_query = "Insert into candidate(name, position, profile)  values('$fullname', '$position', '$target_file');";
        $insert_res = $conn->query($insert_query);

        if ($insert_res) {
            echo "Sucessfully Inserted";
        } else {
            echo "Failed";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



?>