<?php 
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php';
	
	$employe_name = "";
	$address = "";
	$state = "";
	$city = "";
	$area = "";
	$store_number = "";	
	$zip = "";
	$phone = "";
	$formAction = "";
	
	if(isset($_GET['shop_id']))
	{
			$shop_id = $_GET['shop_id'];
			$formAction = "?shop_id=$shop_id";
			$select_shop = "SELECT * FROM shopunion where shop_id = $shop_id";
			$fetch_result = mysqli_query($con,$select_shop);
			$row = mysqli_fetch_array($fetch_result)
			or die('error');
			$employe_name = $row['employe_name'];
			$area = $row['area'];
			$state = $row['state'];
			$store_number = $row['store_number'];
			$zip = $row['zip'];
			$phone = $row['phone'];
			$address = $row['address'];
			$city = $row['city'];
	}
if($_POST)
{
	if(isset($_GET['shop_id']))
	  {
			$employe_name = $_POST['employe_name'];
			$area = $_POST['area'];
			$state = $_POST['state'];
			$store_number = $_POST['store_number'];
			$zip = $_POST['zip'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$query = "UPDATE `shopunion` SET `area`='$area',`employe_name`='$employe_name',`store_number`='$store_number'
			,`address`='$address',`city`='$city',`state`='$state',`zip`='$zip',`phone`='$phone' WHERE shop_id = $shop_id";
			$result = mysqli_query($con,$query);
			$url = "shop_union.php?update=true";
			$redirect = 1;
		}
	else
	  {
			$employe_name = $_POST['employe_name'];
			$area = $_POST['area'];
			$state = $_POST['state'];
			$store_number = $_POST['store_number'];
			$zip = $_POST['zip'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$query_location = "INSERT INTO `shopunion`(`area`, `employe_name`, `store_number`, `address`, `city`, `state`, `zip`, `phone`,app_id) 
			VALUES ('$area','$employe_name','$store_number','$address','$city','$state','$zip','$phone','$appID')";
			mysqli_query($con,$query_location)
			or die('error1');
			$url = "shop_union.php?insert=true";
			$redirect = 1;
	 }
	
}
	?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:57:43 GMT -->
<head>   <meta charset="utf-8" />
   <title>Shop Union</title>
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
                     Shop Union
                     <small>Insert your Shop Union </small>
                  </h3>
                   <ul class="breadcrumb">

                       
                   <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert Shop Union</a><span class="divider-last">&nbsp;</span>
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
                        <h4><i class="icon-reorder"></i>Shop Union</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="insert_shopUnion.php<?php echo $formAction ?>" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Employe Name</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Employe Name" name="employe_name" 
                                 value="<?php echo $employe_name; ?>" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Area</label>
                              <div class="controls">
                                 <textarea required placeholder="Enter Your Area" name="area" class="span6 " /><?php echo $area; ?></textarea>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Phone </label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Phone No" name="phone" value="<?php echo $phone?>" type="text" class="span6 " />
                              </div>
                           </div>
						   	<div class="control-group">
                              <label class="control-label">City </label>
                              <div class="controls">
                                 <input required placeholder="Enter Your City" name="city" value="<?php echo $city ?>" type="text" class="span6 " />
                              </div>
                           </div>
						      <div class="control-group">
                              <label class="control-label">State </label>
                              <div class="controls">
                                 <input required placeholder="Enter Your State" name="state" value="<?php echo $state ?>" type="text" class="span6 " />
                              </div>
                           </div>
						      <div class="control-group">
                              <label class="control-label">Store Number </label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Phone No" name="store_number" value="<?php echo $store_number ?>" type="text" class="span6 " />
                              </div>
                           </div>
						      <div class="control-group">
                              <label class="control-label">Address</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Address" name="address" value="<?php echo $address ?>" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Zip</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Zip" name="zip" value="<?php echo $zip; ?>" type="text" class="span6 " />
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
   <script>
function toggle() {
	var ele = document.getElementById("ToggleText");
	var text = document.getElementById("DisplayText");
	if(ele.style.display == "block") {
 		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
} 
</script>
<script>
function Toggle() {
	var ele = document.getElementById("toggletext");
	var text = document.getElementById("displaytext");
 	if(ele.style.display == "block") {
 		ele.style.display = "none";
 
  	}
	else {
		ele.style.display = "block";
	}
} 
</script>


   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:52 GMT -->
</html>

