<?php

include "connect_to_mysql.php";

if (mysql_error()) {
    //echo "<h2>Failure:</h2><em>" . mysql_error() . "</em>";
} else {
    //echo "<h1>Success in database connection.</h1>";
}

$con = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name");

if ($_FILES["cover"]["error"] > 0) {
    //echo "Error: " . $_FILES["cover"]["error"] . "<br>";
} else {
    //echo "Upload: " . $_FILES["cover"]["name"] . "<br>";
    //echo "Type: " . $_FILES["cover"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["cover"]["size"] / 1024) . " kB<br>";
    //echo "Stored in: " . $_FILES["cover"]["tmp_name"];
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["cover"]["name"]);
$extension = end($temp);
if ((($_FILES["cover"]["type"] == "cover/gif") || ($_FILES["cover"]["type"] == "cover/jpeg") || ($_FILES["cover"]["type"] == "cover/jpg") || ($_FILES["cover"]["type"] == "cover/pjpeg") || ($_FILES["cover"]["type"] == "cover/x-png") || ($_FILES["cover"]["type"] == "cover/png")) && ($_FILES["cover"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["cover"]["error"] > 0) {
        //echo "Error: " . $_FILES["cover"]["error"] . "<br>";
    } else {
        //echo "Upload: " . $_FILES["cover"]["name"] . "<br>";
        //echo "Type: " . $_FILES["cover"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["cover"]["size"] / 1024) . " kB<br>";
        //echo "Stored in: " . $_FILES["cover"]["tmp_name"];
    }
} else {
    //echo "Invalid file Restriction";
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["cover"]["name"]);
$extension = end($temp);
if ((($_FILES["cover"]["type"] == "cover/gif") || ($_FILES["cover"]["type"] == "cover/jpeg") || ($_FILES["cover"]["type"] == "cover/jpg") || ($_FILES["cover"]["type"] == "cover/pjpeg") || ($_FILES["cover"]["type"] == "cover/x-png") || ($_FILES["cover"]["type"] == "cover/png")) && ($_FILES["cover"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["cover"]["error"] > 0) {
        //echo "Return Code: " . $_FILES["cover"]["error"] . "<br>";
    } else {
        //echo "Upload: " . $_FILES["cover"]["name"] . "<br>";
        //echo "Type: " . $_FILES["cover"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["cover"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["cover"]["tmp_name"] . "<br>";

        if (file_exists("cover/" . $_FILES["cover"]["name"])) {
            //echo $_FILES["cover"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["cover"]["tmp_name"], "image/cover/" . $_FILES["cover"]["name"]);
            //echo "Stored in: " . "../upload/" . $_FILES["cover"]["name"];
            
            $cover = $_FILES['cover']['name'];
         }
    }
} else {
    //echo "Invalid file Saving";
}
