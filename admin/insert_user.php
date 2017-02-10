<?php
session_start();
	include '../headers/connect_to_mysql.php';
	
	$user_id = "";
	$user_name = "";
	$app_id = "";
	$password = "";
	$image ="";
	$formAction = "";
	$name = "";
	$email = "";
	$image = "";
	
if(isset($_GET['user_id']))
{
		include 'headers/user_image.php';
		$user_id = $_GET['user_id'];
		$formAction = "?user_id=$user_id";
		$query = "SELECT * FROM user where user_id = $user_id ";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_array($result)
		or die ('error3');
		$user_name = $row['user_name'];
		$app_id = $row['app_id'];
		$password = $row['password'];
		$email = $row['email'];
		$image = $row['image'];
		
	if($_POST)
	{
		include 'headers/user_image.php';
		$user_id = $_GET['user_id'];
		$user_name = $_POST['user_name'];
		$app_id = $_POST['app_id'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$query = "UPDATE user SET  user_name = '$user_name',app_id = '$app_id',password = '$password',
		image = '$image',email = '$email',time_cone = now() WHERE user_id = '$user_id'";
		$result = mysqli_query($con,$query)
		or die('error while updating user');
		echo "image-->{$image}";
		//header("Location: user.php?update=true");
	}
}	
else 
{
	if($_POST)
	{
		include 'headers/user_image.php';
		$user_name = $_POST['user_name'];
		$app_id = $_POST['app_id'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$query_inserting = "INSERT INTO user(user_name,password,image,app_id,email,time_cone)
		VALUES ('$user_name','$password','$image','$app_id','$email',now())";
		$result = mysqli_query($con,$query_inserting)
		or die('error while inserting Webservices');
		echo "image-->{$image}";
			//header("Location: user.php?insert=true");	
	}	
}

?>

<!doctype html>
<html>
<head>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="../assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="../css/style.css" rel="stylesheet" />
   <link href="../css/style_responsive.css" rel="stylesheet" />
   <link href="../css/style_default.css" rel="stylesheet" id="style_color" />
   <link href="../assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="../assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="../assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="../assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />   
   <link rel="stylesheet" type="text/css" href="../css/custom.css" />
   <link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="../assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="../assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link rel="stylesheet" type="text/css" href="../css/highlight.css" />
   <link rel="stylesheet" type="text/css" href="../css/main.css" />

<title>Avialdo -Dashboard </title>

</head>

<body>
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
                     User
                     <small>Add User name</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                           <a href="app.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="user.php">user</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert User</a><span class="divider-last">&nbsp;</span></li>
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
                        <h4><i class="icon-reorder"></i>Insert User</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                         </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="insert_user.php<?php echo $formAction; ?>" method="post" class="form-horizontal">
                             <div class="control-group">
                              <label class="control-label">User Name</label>
                              <div class="controls">
                                 <input required name="user_name" value="<?php echo $user_name; ?>" 
                                 placeholder="Enter Your Name" type="text" class="span6 " />
                              </div>
                           </div>
                         <div class="control-group">
                              <label class="control-label">Password</label>
                              <div class="controls">
                                 <input required name="password" value="<?php echo $password; ?>" 
                                 placeholder="Enter Your Password" type="text" class="span6 " />
                              </div>
                          </div>
						   <div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                                 <input required name="email" value="<?php echo $email; ?>" 
                                 placeholder="Enter Your Password" type="email" class="span6 " />
                              </div>
                          </div>
                             <div class="control-group">
                              <label class="control-label">App Name</label>
                              <div class="controls">
                                 <select class="span6 chosen" name="app_id" data-placeholder="Choose a Category" tabindex="1">
                                    <?php $query_select = "SELECT * FROM app";
									$result_select = mysqli_query($con,$query_select)
									or die ('error'); 
									while($row = mysqli_fetch_array($result_select)){
										$app_id = $row['app_id'];
                                    	$app_name = $row['app_name'];
									echo"
									
                                    <option value='$app_id'>{$app_name}</option>
 										";                                
									}?>
                                 </select>
                              </div>
                           </div>
                           <div class="control-group">
                            <label class="control-label">Profile</label>
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
                               <input type="file" name="image" class="default" /></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                    </div>
                                </div>
    			<div class="form-actions clearfix">
				<input type="submit"  class="btn btn-success " />
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
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
 
 <script src="../js/jquery-1.8.2.min.js"></script>    
   <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="../js/jquery.blockui.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->   

   <script type="text/javascript" src="../assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="../assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="../assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="../assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="../assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="../assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/scripts.js"></script>
         <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
		 UIJQueryUI.init();
      });
   </script>

</body>
</html>


