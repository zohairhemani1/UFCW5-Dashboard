<?php 
	include 'headers/connect_to_mysql.php';
	include 'session.php';
	$app_id = $_SESSION['app_id'];
	$query_index = "SELECT * FROM app_name where app_id='$app_id' ";
	$result_index = mysqli_query($con,$query_index);
	$row = mysqli_fetch_array($result_index);
	$logo = $row['logo'];
	$cover = $row['cover']; 
	$about_us = $row['about_us'];
?>
<!doctype html>
<html><head>
<meta charset="utf-8">

<title>UFCW 5</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<script src="jquery/bootstrap.min.js"></script>
<script src="jquery/jquery-1.11.1.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div id="wrapper">
    <div id="login">
    <p class="left">	<?php echo strtoupper($username) ; ?>&nbsp; | &nbsp; <a href="logout.php">Logout</a> </p>
    </div>    
<div id="logo">
 <center>
    <img src="logo/<?php echo $logo; ?>" name="logo" alt="">
     
     </div>
     <div class="nav1">
  <?php include 'headers/header_navigation.php'; ?>
  </center>
  </div>



    <!--<p class="large_text">YOUR NEIGHBORHOOD UNION</p>
    <p class="small_text">Standing together to improve the lives of our members, our families and our community.</p>
 -->
 
</div>
 <div class="image"> <img src="cover/<?php echo $cover; ?>" name="img" width="100%"> </div> 
<!--<div nav 1>-->
<div class="content">
  <h2 class="heading">About Us</h2>
  <p class="border"><?php echo $about_us;?></p>   
</div>

</div>
<div id="footer_index">
 <?php  include 'headers/header_footer.php'; ?>
    </div>
</body>
</html>
