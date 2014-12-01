<?php	

		include 'headers/connect_to_mysql.php';	


if($_POST){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "select * from user where email like '$email'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);

	$row = mysqli_fetch_array($result);
	$user_id = $row['user_id'];
	$email = $row['email'];
	if($count == 1)
			{
		 		
			
			
			
				$to = $email;
				$headers = "From: Ufcw5.org <Ufcw5.org>";
                $subject = 'Your New Password...';
				$message = "Hello User\nE-mail: {$email} \nNow you can Reset Ur Password with this email and for that u just have to click this link \n http://fajjemobile.info/ufcw5/password.php?user_id=${user_id} ";
					if(mail($to, $subject, $message,$headers ))
					{
						
						echo  "
						<div id='alert2' class='alert alert-success' role='alert'><b>Success </b>Request For New Password has been sent to your mail, <b>Please</b> check your mail and LogIn</div>" ;
					
					}
			}
				else	
			{
				  echo "<div id='alert' class ='alert alert-danger'<b>Sorry</b>the Email address you provide is not valid </div>";
			}
			 
		
				   }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5-forget password</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
  <div class="main">
      <div id="logo">
    <center><img src="images/logo.png" name="logo" alt="">
    </center>
    </div>

    <hr/>
    <form  action="forget_password.php" method="post" class="form1">
   <div class="form-group"> 
         <label for="inputEmail3" class="col-sm-2 control-label" id="input" >Email</label><br><br>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="name" placeholder="Enter your email" name="email"  />  
         </div>
         </div>
      <input type="submit"  class="reset" Value="Submit"/>
    </form>
    <p class="notice"><b>Note : </b>Enter your email, to reset password.</p>
  </div>
</div>
	<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>

</body>
</html>
