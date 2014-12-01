<?php
	ini_set('session.gc_maxlifetime', 31556926);
	session_start();
	
	//include 'session.php';	
	
	if($_POST)
	{
		include 'headers/connect_to_mysql.php';	
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$qyery = "SELECT * from user  where user_name = '$user_name' AND password = '$password'"
		or die('error');
		$result = mysqli_query($con,$qyery);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		if($count == 1)
		{


		$user_id = $row['user_id'];
		
	
			$_SESSION['user_name'] = $user_name;
			$_SESSION['app_id'] = $row['app_id'];
	
			

			if(isset($_POST['remember'])) 
	
			{
				$rand  = (rand(10,100));
				$md5Number = md5($rand);
				
				setcookie('username', $md5Number, time()+31556926 );
				$query = "UPDATE user SET cookie = '$md5Number' where user_id = '$user_id'";
				mysqli_query($con,$query);
				
				
					
			}
			
			
				 
				
		header ('Location: index.php');						
		
		}

	else{ 	
	
		echo"
			 <div id='alert1' class='alert alert-danger' role='alert'><b>Error:</b>The Username or Password you have provide is not valid</div>";	
		
	}
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
<script src="jquery/bootstrap.min.js"></script>
<script src="jquery/jquery-1.11.1.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body><div id="wrapper">
    <div id="logo">
    <center><img src="images/logo.png" name="logo" alt="">
    </center>
    </div>

	

    	<?php
    if($_GET['login'] == 'true'){

    echo"<div  class='alert alert-success' role='alert'><b>Success:</b>Now You can login with your new password
			</div>";
	}
	?>

	<div class="form">
    <form id="box1" name="form" class="form-horizontal" role="form" 
    action="login.php" method="post" enctype="multipart/form-data">      
    <div class="form-group"> 
         <label for="inputEmail3" class="col-sm-2 control-label" id="input" >Username</label><br><br>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="name" placeholder="Enter Username" name="user_name"  />  
         </div>
         </div>
    <div class="form-group"> 
         <label for="inputEmail3" class="col-sm-2 control-label" id="input" >Password</label><br><br>
        <div class="col-sm-10">
          <input required type="password" class="form-control" id="name" placeholder="Enter Password" name="password"   />  
         </div>
         </div><br>
         <p class="checkbox1"><input type="checkbox" name="remember">&nbsp;&nbsp;Remember me</p>
          <button type="submit" class="btn btn-default" id="submit" name="login">Login</button>
</form>
		<p class="forget"><a href="forget_password.php">Forget your Password ?</a></p>
         
	</div>
	</div>
	<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>

    </body>
	</html>



