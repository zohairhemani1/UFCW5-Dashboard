		<?php 
			include 'headers/connect_to_mysql.php';
			include 'session.php';
			include 'image.php';
			include 'headers/image_info.php';
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
			<p class="left">	
 
             <ul class="nav navbar-nav navbar-right">
 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="nav" data-toggle="dropdown" role="button" aria-expanded="false">
          <img src="image/<?php echo $image; ?>" width="15px" height="20px"> &nbsp;<?php echo  strtoupper($username);?>
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

			<div id="logo" style="background-color:<?php echo $color; ?>">
			<center><img src="logo/<?php echo $logo; ?>" name="logo" alt="">
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
