<?php

include "connect_to_mysql.php";

if (mysql_error()) {
    //echo "<h2>Failure:</h2><em>" . mysql_error() . "</em>";
} else {
    //echo "<h1>Success in database connection.</h1>";
}

$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name");

if ($_FILES["image"]["error"] > 0) {
    //echo "Error: " . $_FILES["image"]["error"] . "<br>";
} else {
    //echo "Upload: " . $_FILES["image"]["name"] . "<br>";
    //echo "Type: " . $_FILES["image"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
    //echo "Stored in: " . $_FILES["image"]["tmp_name"];
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["image"]["name"]);
$extension = end($temp);
if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png") || ($_FILES["image"]["type"] == "image/png")) && ($_FILES["image"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["image"]["error"] > 0) {
        //echo "Error: " . $_FILES["image"]["error"] . "<br>";
    } else {
        //echo "Upload: " . $_FILES["image"]["name"] . "<br>";
        //echo "Type: " . $_FILES["image"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
        //echo "Stored in: " . $_FILES["image"]["tmp_name"];
    }
} else {
    //echo "Invalid file Restriction";
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["image"]["name"]);
$extension = end($temp);
if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/pjpeg") || ($_FILES["image"]["type"] == "image/x-png") || ($_FILES["image"]["type"] == "image/png")) && ($_FILES["image"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["image"]["error"] > 0) {
        //echo "Return Code: " . $_FILES["image"]["error"] . "<br>";
    } else {
        //echo "Upload: " . $_FILES["image"]["name"] . "<br>";
        //echo "Type: " . $_FILES["image"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br>";

        if (file_exists("profile/" . $_FILES["image"]["name"])) {
            //echo $_FILES["image"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["image"]["tmp_name"], "image/profile/" . $_FILES["image"]["name"]);
            //echo "Stored in: " . "../upload/" . $_FILES["image"]["name"];
            
            $image = $_FILES['image']['name'];
         }
    }
} else {
    //echo "Invalid file Saving";
}
