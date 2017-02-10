<?php 
	session_start();
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php'; 

		$query_email = "SELECT email FROM `user` where user_id = '{$user_id}'";
        $result = mysqli_query($con,$query_email);
        $row = mysqli_fetch_array($result);
        $email = $row['email'];
        

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/image.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 08:01:42 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Profile | <?php echo $appName; ?></title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/custom.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />

   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
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

                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                       Profile
                     <small>View profile page</small>
                  </h3>
                   <ul class="breadcrumb">
 						<li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">image</a><span class="divider-last">&nbsp;</span>
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-user"></i>image</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <div class="span3">
                                <div class="text-center image-pic">
                                    <img src="img/image/<?php echo $image; ?>" alt="">
                                </div>
                            </div>
                            <div class="span6">
                                <h4> <?php echo  $username_allcaps; ?> <br/><small style="display:none;">Web Developer</small></h4>
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td class="span2">User Name :</td>
                                        <td>
                                            <?php echo  $username_allcaps; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="span2">Password :</td>
                                        <td>
                                           <p id="password"><?php echo $password; ?></p> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="span2">Email :</td>
                                        <td>
                                            <?php echo $email; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="span2">Joined :</td>
                                        <td>
                                            <?php echo $time_cone; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="span2"></td>
                                        <td>
                                        </td>
                                    </tr>
   
                                    </tbody>
                                </table>
       
                            </div>
       
                            <div class="space5"></div>
       
                        </div>
       
                                              <div  class="form-actions clearfix">
                                              <div id="image_button">
			<a href="update_profile.php?user_id=<?Php echo $user_id ?>"><button  type="button"  class="btn btn-success " />Update</button></a>
            <div>
                   </div>                  

                  </div>
       </div></div>
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
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
<script>
    $(document).ready(function(){
    var text = document.getElementById('password').innerText;
        document.getElementById('password').innerHTML = text.replace(/./g, '*')
    });
    
</script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/image.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 08:01:44 GMT -->
</html>