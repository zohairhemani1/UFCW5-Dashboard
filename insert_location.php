<?php 
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php';
	
	$office_title = "";
	$address = "";
	$phone_no = "";
	$website = "";
	$formAction = "";
	
	if(isset($_GET['office_id']))
	{
			$office_id = $_GET['office_id'];
			$formAction = "?office_id=$office_id";
			$select_location = "SELECT * FROM location where office_id = $office_id";
			$fetch_result = mysqli_query($con,$select_location);
			$row = mysqli_fetch_array($fetch_result)
			or die('error');
			$office_title = $row['office_title'];
			$address = $row['address'];
			$file = $row['file'];
			$phone_no = $row['phone_no'];
			$website = $row['website'];
			$order = $row['order'];
	}
if($_POST)
{
	if(isset($_GET['office_id']))
	  {
		include 'headers/image_upload.php';
		$office_title = $_POST['office_title'];
		$address = $_POST['address'];
		$phone_no = $_POST['phone_no'];
		$website = $_POST['website'];
		$order = $_POST['order'];
		$query = "UPDATE location SET time_cone = now(),  office_title = '$office_title', address = '$address',
		 phone_no = '$phone_no',website = '$website',`order` = $order  WHERE office_id = '$office_id'";
		$result = mysqli_query($con,$query);
		$url = "office_location.php?update=true";
		$redirect = 1;

		}
	else
	  {
		$office_title = $_POST['office_title'];
		$address = $_POST['address'];
		$phone_no = $_POST['phone_no'];
		$website = $_POST['website'];
		$query_location = "INSERT INTO location(office_title,address,phone_no,website,time_cone,app_id,`order`)
		VALUES ('$office_title','$address','$phone_no','$website',now(),'$appID',
		(SELECT ifnull(max(l.order)+1,1) FROM location l WHERE l.app_id= '$appID'))";
		mysqli_query($con,$query_location)
		or die('error1');
		$url = "office_location.php?insert=true";
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
   <title>Contact Reprensentative</title>
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
                     Office Location
                     <small>Insert your office Location </small>
                  </h3>
                   <ul class="breadcrumb">

                       
                   <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert Office Location</a><span class="divider-last">&nbsp;</span>
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
                        <h4><i class="icon-reorder"></i>Office Location Form</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="insert_location.php<?php echo $formAction ?>" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Office title</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Office title" name="office_title" 
                                 value="<?php echo $office_title; ?>" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Address</label>
                              <div class="controls">
                                 <textarea required placeholder="Enter Your Address" name="address" class="span6 " /><?php echo $address; ?></textarea>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Phone No</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Phone No" name="phone_no" value="<?php echo $phone_no ?>" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Website</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Website" name="website" value="<?php echo $website; ?>" type="text" class="span6 " />
                              </div>
                           </div>
                            <div class="control-group" style=" <?php if(!isset($_GET['office_id'])){echo "display:none;";} ?>">
                              <label class="control-label">Order</label>
                              <div class="controls">
                                 <input placeholder="Enter Your Order" name="order" value="<?php echo $order; ?>" type="text" class="span6 " />
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

