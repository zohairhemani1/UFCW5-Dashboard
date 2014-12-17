<?php
	include 'headers/image_cover.php';
	include 'headers/image_info.php';
	include'session.php';
	include 'headers/connect_to_mysql.php';
	include 'image.php';
	$app_id = $_SESSION['app_id'];
	$query_user = "SELECT * FROM user WHERE user_id = '$app_id' ";
	$result_user = mysqli_query($con,$query_user)
	or die('error');
	$row = mysqli_fetch_array($result_user);
	$user_name = $row['user_name'];
	$password = $row['password'];
	$email = $row['email'];
	$image = $row['image'];
?>

	
    	<!doctype html>
		<html><head>
		<meta charset="utf-8">

		<title>UFCW 5</title>
		<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="css/style.css" type="text/css" rel="stylesheet">
		<link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/jquery.alerts.js" type="text/javascript"></script>

	</head>
	<body>

		 			<div id="login">
			<p class="left">    <img src="image/<?php echo $image; ?>" width="20px" height="20px" class="info_image" name="info" alt="">
	<?php echo strtoupper($username) ; ?>&nbsp; | &nbsp; <a href="logout.php">Logout</a> </p>
			 </div>    

			<div id="logo">
			<center><img src="logo/<?php echo $logo; ?>" name="logo" alt="">
			</center>
			</div>
			 <div class="nav1">
		  <?php include 'headers/header_navigation.php'; ?>

</div>
     
<form id="form1">
	<div class="account">
    <P>Account Information</P>
    </div>
    <img src="image/<?php echo $image; ?>" width="20px" height="20px" class="info_image" name="info" alt="">
<label for="name" class="change">Username<span class="name"><?php echo $user_name ;?></span></label><br>
<label for="password" class="change1" >Password<span class="password"><?php echo $password; ?></span></label><br>
<label for="email" class="change2">Email<span class="email"><?php echo $email ; ?></span></label><br>
	

	<a href="update_info.php?user_id=<?php echo $app_id; ?>"><button type='button' class='info_button' >Update</button></a>
	</form>

</div>
</div></div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>

</div>    



