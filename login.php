<?php
	session_start();
	include 'headers/connect_to_mysql.php';
	
	
	if(!empty($_POST['login']))
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$query = "SELECT * from `user` where user_name like '{$user_name}' AND password like '{$password}'"
		or die('error2');
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);

		if($count == 1)
		{
			$_SESSION['user_id'] = $row['user_id'];
			header("Location: index.php?uniqueID=1");		
		}
	}

	if(!empty($_POST['forget']))
	{

		$email = $_POST['email'];
		$query = "SELECT user_name from user WHERE email like 'arbishpalla@gmail.com'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		if($count == 1 )
		{
			echo "count-->".$count;			
			$str = "Hello";
			$user_name = $row['user_name'];
			$forgot_password =  md5($str);	
			$query_forget =  "UPDATE user set forgot_password = '$forgot_password' where email like '$email'"
			or die('errosr in');
			$result_query = mysqli_query($con,$query_forget);
			echo "md5-->{$forgot_password}";
			$to      = $email;
			$subject = 'Forget Password';
			$message = "Now you can Reset your Password By click this link\n <http://myunionapp.com/forget_password.php?uniqueID=$forgot_password>";
			$headers = 'From: linkedunion.com' . "\r\n" .
			'Reply-To: Linked Union' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
			if(mail($to, $subject, $message, $headers))
			{
				echo "to-->{$message}";
			}
			else
			{
				echo "error";	
			}
		
		}	
		else 
		{
			$error =  "The email address u provide is not valid";	
		}

	}
	
?>

<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Login page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/style_responsive.css" rel="stylesheet" />
  <link href="css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          <img src="img/linkedunion.png" alt="logo" class="center" />
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
       <form id="loginform" class="form-vertical no-padding no-margin" action="login.php" method="post">
        <?php 
	if(isset($_GET['fail']) && $_GET['fail']=="true"){
      echo"<div class='alert alert-danger' role='alert'>
  <strong>Oh dear!</strong> Something went awry!
It seems that the Delegation ID/Password you entered were not found in our database, please try again
</div>";
} else if(isset($_GET['register']) && $_GET['register']=="true"){

      echo"<div class='alert alert-danger' role='alert'>
  <center>Kindly Check your email for the credentials</center></div>";
}
else if(isset($_GET['forget']) && $_GET['forget']=="true"){

      echo"<div class='alert alert-danger' role='alert'>
<center> Kindly Check your email for the credentials</center></div>";
}
else if(!empty($_GET['invalid-link'])){
      echo"<div class='alert alert-danger' role='alert'>
<center> Sorry! The requested Link is not valid </center></div>";
}
else if(!empty($_GET['reset']) =="true"){

      echo"<div class='alert alert-success' role='alert'>
<center> Success! Now you can login with your new password </center></div>";
}
?>
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
          <h4>User Login</h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
           <span class="add-on"><i class="icon-user"></i></span><input id="input-username" type="text" name="user_name" placeholder="Username" />                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
              <span class="add-on"><i class="icon-key"></i></span><input id="input-password" name="password" type="password" placeholder="Password" />
       
                  </div>
                  <div class="mtop10">
                      <div class="block-hint pull-left small">
                          <input type="checkbox" id=""> Remember Me
                      </div>
                      <div class="block-hint pull-right">
                          <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                      </div>
                  </div>

                  <div class="clearfix space5"></div>
              </div>

          </div>
      </div>

      <input type="submit" id="login-btn" name="login" class="btn btn-block login-btn" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" method="post" class="form-vertical no-padding no-margin hide" action="login.php">
      <p class="center">Enter your e-mail address below to reset your password.</p>
	     <?php 
	if(isset($_GET['forget']) && $_GET['forget']=="false"){

      echo"<div class='alert alert-danger' role='alert'>
  Email Doesnt Exist In Our Database</div>";
}
?>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" name="email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="submit" name="forget" id="" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2015 &copy; <a href="http://linkedunion.com">Linked Union</a>.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.blockui.js"></script>
  <script src="js/scripts.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
    	<?php 
	if(isset($_GET['register']) && $_GET['register']=="false"){
	
	echo "
	
	$('#register').click();
	
	";
	}
	?>
	
	<?php 
	if(isset($_GET['forget']) && $_GET['forget']=="false"){
	
	echo "
	
	$('#forget-password').click();
	
	";
	}
	?>
	
  </script>

  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>