
<?php
	include'session.php';
	include 'headers/connect_to_mysql.php';
	$app_id = $_SESSION['app_id'];
	$query_user = "SELECT * FROM user WHERE user_id = '$app_id' ";
	$result_user = mysqli_query($con,$query_user)
	or die('error');
	$row = mysqli_fetch_array($result_user);
	$user_name = $row['user_name'];
	$password = $row['password'];
	$email = $row['email'];
	$image = $row['image'];
	include 'image.php';

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
			<p class="left">	<?php echo strtoupper($username) ; ?>&nbsp; | &nbsp; <a href="logout.php">Logout</a> </p>
			 </div>    

			<div id="logo">
			<center><img src="logo/<?php echo $logo; ?>" name="logo" alt="">
			</center>
			</div>
			 <div class="nav1">
		  <?php include 'headers/header_navigation.php'; ?>

</div>
     
<div class="container">
	<div class="account">
    <P>Account Information</P>
    </div>
<form id="form1">
        <div class="setting">
<label for="name" class="name">Username</label>
	<span class="replace1"><?php echo $user_name ;?></span><br>
<label for="password" class="password" >Password</label>
	<span class="replac1"><?php echo $password; ?></span><br>
<label for="email" class="email">Email</label>
	<span class="replace3"><?php echo $email ; ?></span><br>

	<a href="update_info.php?user_id=<?php echo $app_id; ?>"><button type='button' class='submit' >Update</button></a>
	

</div>
</div></div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>

</div>    



