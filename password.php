<?php		
        include 'headers/connect_to_mysql.php';	
		$user_id = $_GET['user_id'];
		if($_POST){
		$password = $_POST['password'] ;       
        $query = "UPDATE user SET password  = '$password' Where user_id like '$user_id'"; 
		$result = mysqli_query($con,$query)
		or die('error');
		header ('Location: login.php?login=true');
	
		}
        

?>	
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5-Location</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
  <script>
function checkPass()
{
    var pass = document.getElementById('pass');
    var pass1 = document.getElementById('pass1');
     var message = document.getElementById('confirmMessage');
     var goodColor = "#66cc66";
    var badColor = "#ff6666";
     if(pass.value == pass1.value){
         pass1.style.borderColor = goodColor;
        message.style.color  = goodColor;
        message.innerHTML ="<p class='match'> Passwords Match!</p>"
    }else{
        pass1.style.borderColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "<p class='match'>Passwords Do Not Match!</p>"
    }
}    
  </script>
  <div class="main">
      <div id="logo">
    <center><img src="images/logo.png" name="logo" alt="">
    </center>
    </div>
    <form action="password.php?user_id=<?php echo $user_id; ?>" method="post"  class="form2">
    <div class="form-group"> 
         <label for="inputEmail3" class="col-sm-2 control-label" id="input1" >Password</label><br><br>
        <div class="col-sm-10">
          <input required type="password" class="form-control" id="pass" placeholder="Enter Password" name="password"   />  
         </div>
         </div>    
             <div class="form-group"> 
         <label for="inputEmail3" class="col-sm-2 control-label" id="input1" >Confirm Password</label><br><br>
        <div class="col-sm-10">
          <input required type="password" class="form-control" id="pass1" onBlur="checkPass(); return false;" placeholder="Confirm Password" name="password"   />  
          <span id="confirmMessage" class="confirmMessage"></span>
         </div>
         </div>
             <input type="submit"  class="reset" Value="Reset Password"/>
         </form>
         </div>
         <div id="footer">
 <?php  include 'headers/header_footer.php'; ?>

    </head>
    </html>