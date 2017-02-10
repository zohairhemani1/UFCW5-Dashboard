<?php 
	session_start();
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php';

	$user_name = "";
	$password = "";
	$email ="";
	$formAction = "";
	$time_cone = "";
	$url = "";
	$redirect = "";
	$image = "";
	$time_cone = "";
	
if($_POST)
{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$time_cone = $_POST['time_cone'];
        if(!empty($_FILES["image"]["name"])){
		include 'headers/image_upload.php';
        $update_user = "UPDATE `user` SET user_name = '$user_name',image = '$image', password = '$password',email ='$email' WHERE user_id = '$user_id' "
		or die ('error while Updating user');
        }
        else{
        $update_user = "UPDATE `user` SET user_name = '$user_name', password = '$password',email ='$email' WHERE user_id = '$user_id' "
		or die ('error while Updating user');
        }
        $result_user = mysqli_query($con,$update_user);
		$url = "profile.php?update=true";
		$redirect = 1;
		header ('Location: stay_connected.php?update=true'); 
	
}
	else
	{
		$user_id = $_GET['user_id'];
		$formAction = "?user_id={$user_id}";
		$select_user = "SELECT * FROM user where user_id = '$user_id'";
		$fetch_result = mysqli_query($con,$select_user);
		$row = mysqli_fetch_array($fetch_result);
		$user_name = $row['user_name'];
		$email = $row['email'];
		$time_cone = $row['time_cone'];
		$image = $row['image'];
		$password = $row['password'];
	}
	

	?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:57:43 GMT -->
<head>   <meta charset="utf-8" />
   <title>Profile</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />
   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />   
   <link rel="stylesheet" type="text/css" href="css/custom.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link rel="stylesheet" type="text/css" href="css/highlight.css" />
   <link rel="stylesheet" type="text/css" href="css/main.css" />
 <script type="text/javascript">

function validation(){
    var password = document.getElementById('password');
    var pass = document.getElementById('pass');
    var solution = document.getElementById('solution');

    if(password.value ==  pass.value)
   {
	 $("#pass1").prop("disabled", false);
	 $("#pass2").prop("disabled", false);
     message.innerHTML = "Passwords Do Not Match!"
   }
  else
   {
       $("#pass1").prop("disabled", true);
	   $("#pass2").prop("disabled", true);
   }
}
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    //Compare the values in the password field
    //and the confirmation field

	if(pass1.value == pass2.value)
	{
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
		$("#buttonActivate").prop("disabled", false);
  
    }
	else
	 {
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
       $("#buttonActivate").prop("disabled", true);

	 }

}
</script>
 <script>
     $('#buttonActivate').click(function() {
    	if(pass1.value != pass2.value){
        alert('wrong password');
            return false;
        }
       else{
       alert('hell');
       }                         
    });
     
 </script>
    <script>
   if(<?php echo $redirect;?> == 1){
			window.location.href = '<?php echo $url; ?>';
   }
	</script>
   
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<?php
include 'headers/menu-top-navigation.php'; 
?>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                 
                   <!-- END THEME CUSTOMIZER-->
                  <h3 class="page-title">
                     User Profile
                     <small>Update your Profile </small>
                  </h3>
                   <ul class="breadcrumb">

                       
                   <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Update Profile </a><span class="divider-last">&nbsp;</span>
                       </li>
                       
                   </ul> 
                                 </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Update image</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="update_profile.php?user_id=<?php echo $user_id; ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Name</label>
                              <div class="controls">
                                 <input placeholder="Enter Your Name" value="<?php echo $user_name; ?>" name="user_name" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Old Password</label>
                              <div class="controls">
                                 <input type="text" style="display:none;" id="pass" name="password" value="<?php echo $password; ?>" />
                                 <input placeholder="Enter your old password" id="password" onKeyUp="validation();" type="password" class="span6 " />
                              	<span id="solution" class="solution"></span>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">New Password</label>
                              <div class="controls">
                                 <input id="pass1" placeholder="Enter Your New Password" disabled="disabled" name="password" type="password" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Confirmed Password</label>
                              <div class="controls">
                                 <input id="pass2" placeholder="Confirme Your New Password" disabled="disabled" onKeyUp="checkPass(); return true;" type="password" class="span6 " />
                              <span id="confirmMessage" class="confirmMessage"></span>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                                 <input placeholder="Enter Your Email" value="<?php echo $email; ?>" name="email" type="email" class="span6 " />
                              </div>
                           </div>
                         <div class="control-group">
                            <label class="control-label">Profile Image</label>
                            <div class="controls">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="<?php if($image == null) {echo "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image";}
                                        else{echo "img/image/{$image}" ;}?>" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                               <span class="fileupload-exists">Change</span>
                               <input type="file" name="image" <?php if(!isset($_GET['user_id'])){echo "required";}  ?> class="default" /></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                    </div>
                                </div>
 
   				<div class="form-actions clearfix">
				<input type="submit" onclick='btnClick();' id="buttonActivate" class="btn btn-success " />
                   </div>
                              </form>

                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END EXTRAS widget-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
  <?php  
	include 'headers/footer.php';
	?>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->

   </script>
   <script src="js/jquery-1.8.2.min.js"></script>    
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>

  <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:52 GMT -->
</html>

