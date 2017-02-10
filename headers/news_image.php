<?php
$new_image="";

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["new_image"]["name"]);
$extension = end($temp);
if ((($_FILES["new_image"]["type"] == "image/gif") || ($_FILES["new_image"]["type"] == "image/jpeg") || ($_FILES["new_image"]["type"] == "image/jpg") || ($_FILES["new_image"]["type"] == "image/pjpeg") || ($_FILES["new_image"]["type"] == "image/x-png") || ($_FILES["new_image"]["type"] == "image/png")) && ($_FILES["new_image"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["new_image"]["error"] > 0) {
        echo "Return Code: " . $_FILES["new_image"]["error"] . "<br>";
    } else {
//        echo "Upload: " . $_FILES["new_image"]["name"] . "<br>";
        //echo "Type: " . $_FILES["new_image"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["new_image"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["new_image"]["tmp_name"] . "<br>";

        if (file_exists("img/news/" . $_FILES["new_image"]["name"])) {
            //echo $_FILES["new_image"]["name"] . " already exists. ";
//			$randKey = md5(microtime().rand());
//			$randKey=substr($randKey.'',0,5);
            $_FILES["new_image"]["name"] = substr(md5(time()), 0, 10) . '.' . $extension;
          move_uploaded_file($_FILES["new_image"]["tmp_name"], "img/news/".$_FILES["new_image"]["name"]);
//            echo "Stored in: " . "../upload/" . $_FILES["new_image"]["name"];
            
            $new_image = $_FILES["new_image"]["name"];
		} else {
            $_FILES["new_image"]["name"] = substr(md5(time()), 0, 10) . '.' . $extension;
            move_uploaded_file($_FILES["new_image"]["tmp_name"], "img/news/" . $_FILES["new_image"]["name"]);
//            echo "Stored in: " . "../upload/" . $_FILES["new_image"]["name"];
            $new_image = $_FILES["new_image"]["name"];
            ;
        }
    }
} else {
    echo "Invalid file Saving";
}
?>