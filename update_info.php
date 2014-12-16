<?php
	include 'headers/connect_to_mysql.php';	
	$app_id = $_SESSON['app_id'];
	include 'session.php';
	include 'image.php';
	$user_id = $_GET['user_id'];
	$category = $_GET['category'];
	
	
	if($_POST)
	{
		include 'headers/image_upload.php';
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$query_update = "UPDATE user SET  user_name = '$user_name',image = '$image', password = '$password'   WHERE user_id = '$user_id'";
		$result_update = mysqli_query($con,$query_update)
		or die('error');	
	}

	else
	{
		$query_info = "SELECT * FROM user WHERE user_id = '$app_id' limit 50";
		$result_info = mysqli_query($con,$query_info);	
		$row = mysqli_fetch_assoc($result_info)
		or die ('error3');
		$user_name = $row['user_name'];
		$password = $row['password'];
		$image = $row['image'];
		$email = $row['email'];
	
		}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>


</head>

<body>
	<div id="wrapper">
		 	<div id="login">
             <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="nav" data-toggle="dropdown" role="button" aria-expanded="false">
          <img src="images/arbish.jpg" width="15px" height="20px"> &nbsp;<?php echo  strtoupper($username);?>
           <span class="caret"></span></a>
         
          <ul class="dropdown-menu" role="menu">
            <li><a href="info.php">Account info</a></li>
            <li><a href="help.php">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>

      </ul>
</p>
</div>

			<div id="logo">
			<center><img src="logo/<?php echo $logo; ?>" name="logo" alt="">
			</center>
			</div>
			 <div class="nav1">
		  <?php include 'headers/header_navigation.php'; ?>
  <div id="box">
    <form id="box1" class="form-horizontal" role="form" 
    action="update_info.php?user_id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data" />
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Update Your Profile</font> </p>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" 
          placeholder="" name="user_name" value="<?php echo $user_name;  ?>" />       
           </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" 
          placeholder="" name="password" value="<?php echo $password;  ?>" />       
           </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" 
          placeholder="" name="email" value="<?php echo $email;  ?>" />       
           </div>
      </div>
<input id="uploadFile" placeholder="Choose File" disabled="disabled" />
<div class="fileUpload btn btn-primary">
    <span>Upload</span>
    <input id="uploadBtn" type="file" class="upload" />
</div><br>
    <button type="submit" class="info_submit">Save changes</button>
     <div id="footer">
  <?php  include 'headers/header_footer.php'; ?>
</div>
</body>
</html>

