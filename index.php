		<?php 
				$app_id = $_SESSION['app_id'];
			include 'headers/connect_to_mysql.php';
			include 'session.php';
			include 'image.php';
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
                <p style="background-color:<?php echo $color;?>"  style="width:100px">
           <img src="logo/<?php echo $logo; ?>" name="logo" alt="">
	</p>

    
			</center>
			</div>
			 <div class="nav1">
		  <?php include 'headers/header_navigation.php'; ?>

</div>
		
		 <div class="image"> <img src="cover/<?php echo $cover; ?>" name="img" width="100%"> </div> 
			<div class="content">
		  <h2 class="heading">About Us</h2>
		  <p class="border"><?php echo $about_us;?></p>   
		</div>

		
		<div id="footer_index">
		 <?php  include 'headers/header_footer.php'; ?>
			</div>
			</div>
		</body>
		</html>
