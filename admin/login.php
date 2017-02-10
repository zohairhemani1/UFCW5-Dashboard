<?php
	session_start();
	include '../headers/connect_to_mysql.php';
	
	if($_POST)
	{
		$name = $_POST['name'];
		$password = $_POST['password'];
		$query = "SELECT * from `super_admin` where name like '$name' AND password like '$password'"
		or die('error2');
		$result = mysqli_query($con,$query);
		$row =  mysqli_fetch_assoc($result);
			if(mysqli_num_rows($result) == 1)
		{
			$_SESSION['user_id'] = $row['user_id'];
			header('Location:app.php');		
		}
		else{
			}
	}
	
?>

<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.3
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:53:14 GMT -->
<head>
  <meta charset="utf-8" />
  <title>Signin - Avialdo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet" />
  <link href="../css/style_responsive.css" rel="stylesheet" />
  <link href="../css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div style="height:90px" class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          <img src="../img/linkedunion.png" class="Logo" alt="Avialdo" class="center" />
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
?>
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
          <h4>Login</h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span><input id="input-username" type="text" name="name" placeholder="Username" />
                  </div>
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

      <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
      <form id="forgotform" class="form-vertical no-padding no-margin hide" action="login.php" method="post">
    <input type="hidden" value="forget" name="type">
    <p class="center">Enter your e-mail address below to reset your password.</p>
    <?php 
	if(isset($_GET['forget']) && $_GET['forget']=="false"){

      echo"<div class='alert alert-danger' role='alert'>
  Email Doesnt Exist In Our Database</div>";
}
?>
    <div class="control-group">
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"><i class="icon-envelope"></i></span>
          <input required id="input-email" type="text" name="email" placeholder="Email Address"  />
        </div>
      </div>
      <div class="space20"></div>
    </div>
    <input type="submit" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
  </form>

    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="http://thevectorlab.net/adminlab/index.html">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
  <!-- END FORGOT PASSWORD FORM --> 
  
  <!-- BEGIN REGISTER FORM -->
  <form id="registerform" class="form-vertical no-padding no-margin hide" action="login.php" method="post">
    <center>
      <h4>Linked Union Registeration</h4>
    </center>
    <p class="center">Enter the required details below</p>
    <?php 
	if(isset($_GET['register']) && $_GET['register']=="false"){

      echo"<div class='alert alert-danger' role='alert'><center>
  Email Already in Use</center></div>";
}
?>
    <input type="hidden" value="register" name="type">
    <div class="control-group">
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"><i class="icon-user"></i></span>
          <input id="input-name" class="span5" name="name" type="text" placeholder="Full Name"  required/>
        </div>
      </div>
      <div class="space20"></div>
    </div>
    <div class="control-group">
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"><i class="icon-th-large"></i></span>
          <input id="input-institute" name="institute" type="text" placeholder="Institute Name"  required/>
        </div>
      </div>
      <div class="space20"></div>
    </div>
    <div class="control-group">
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"><i class="icon-envelope-alt"></i></span>
          <input id="input-email" type="email" name="email" placeholder="Email Address"  required/>
        </div>
      </div>
      <div class="space20"></div>
    </div>
    <div class="control-group">
      <div class="controls">
        <div class="input-prepend"> <span class="add-on"><i class="icon-phone"></i></span>
          <input id="input-phone" type="text" name="phone" placeholder="Phone Number"  required/>
        </div>
      </div>
      <div class="space20"></div>
    </div>
    <input type="submit" id="register-btn" class="btn btn-block login-btn" style="width:100%" value="Register" />
  </form>
  <!-- END REGISTER FORM --> 

  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
     <font color="#22878E">2015 &copy;</font><a href="http://avialdo.com/"> Avialdo.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="../js/jquery-1.8.3.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/jquery.blockui.js"></script>
  <script src="../js/scripts.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
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
	
	
	});

    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:53:14 GMT -->
</html>