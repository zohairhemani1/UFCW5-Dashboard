<?php 
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php';

	$name = "";
	$designation = "";
	$address = "";
	$phone_no1 = "";
	$phone_no2 = "";
	$fax_no = "";
	$email = "";
	$time_cone = "";
	$formAction = "";
	$order = "";
	$url = "";
	$redirect = "";
	if(isset($_GET['contact_id']))
	{
			$conatct_id = $_GET['contact_id'];
			$formAction = "?contact_id={$conatct_id}";
			$select_contact = "SELECT * FROM contact where contact_id = '$conatct_id'";
			$fetch_result = mysqli_query($con,$select_contact);
			$row = mysqli_fetch_array($fetch_result);
			$name = $row['name'];
			$designation = $row['designation'];
			$address = $row['address'];
			$phone_no1 = $row['phone_no1'];
			$phone_no2 = $row['phone_no2'];
			$fax_no = $row['fax_no'];
			$email = $row['email'];
			$time_cone = $row['time_cone'];
			$order= $row['order'];
	}
if($_POST)
{
	if(isset($_GET['contact_id']))
	  {
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$address = $_POST['address'];
		$phone_no1 = $_POST['phone_no1'];
		$phone_no2 = $_POST['phone_no2'];
		$fax_no = $_POST['fax_no'];
		$email = $_POST['email'];
		$time_cone = $_POST['time_cone'];
		$order = $_POST['order'];
		$update_contact = "UPDATE contact SET name = '$name', designation = '$designation', address = '$address', phone_no1 = '$phone_no1', 
		phone_no2 = '$phone_no2', fax_no = '$fax_no', email = '$email', time_cone = now(), `order` = $order where contact_id = '$conatct_id' "
		or die ('error while Updating contact');
		$contact_update = mysqli_query($con,$update_contact);
		$url = "union_representatives.php?update=true";
		$redirect = 1;

		//header ('Location:union_representatives.php?update=true'); 
		}
	else
	  {
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$address = $_POST['address'];
		$phone_no1 = $_POST['phone_no1'];
		$phone_no2 = $_POST['phone_no2'];
		$fax_no = $_POST['fax_no'];
		$email = $_POST['email'];
		$time_cone = $_POST['time_cone'];
		$insert_contatct = "INSERT INTO contact (name,designation,address,phone_no1,phone_no2,fax_no,email,time_cone,app_id,`order`)
		VALUES ('$name','$designation','$address','$phone_no1','$phone_no2','$fax_no','$email',now(),'$appID',
		(SELECT ifnull(max(c.order)+1,1) FROM contact c WHERE c.app_id= '$appID')) "
		or die('error while inserting Contact');
		$result = mysqli_query($con,$insert_contatct);
		$url = "union_representatives.php?insert=true";
		$redirect = 1;
		//header ('Location:union_representatives.php?insert=true');
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
			//alert('redirecting');
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
                     Contact Representative
                     <small>Insert your Contact </small>
                  </h3>
                   <ul class="breadcrumb">

                       
                   <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert Contact representative</a><span class="divider-last">&nbsp;</span>
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
                        <h4><i class="icon-reorder"></i>Contact Form</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="insert_contact.php<?php echo $formAction ?>" name="myform" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Name</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Name" name="name" value="<?php echo $name; ?>" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Designation</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Designation"  name="designation" 
                                 value="<?php echo $designation; ?>" type="text" class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Address</label>
                              <div class="controls">
                                 <textarea required placeholder="Enter Your Address" name="address" class="span6 " /><?php echo $address; ?></textarea>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Phone # (1)</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Phone No" name="phone_no1" value="<?php echo $phone_no1; ?>"
                                  type="text" class="span6 " onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" />
 								   <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
 
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Phone # (2)</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Phone No" name="phone_no2" value="<?php echo $phone_no2; ?>" type="text" 
                                 class="span6 " onkeypress="return isNumeric(event);" ondrop="return false;" onpaste="return false;" />
 								   <span id="error1" style="color: Red; display: none">* Input digits (0 - 9)</span>
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Fax #</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Fax No" name="fax_no" value="<?php echo $fax_no; ?>" type="text" 
                                 class="span6 " />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Email" name="email" value="<?php echo $email; ?>" type="email" class="span6 " />
                              </div>
                           </div>
                             <div class="control-group" style=" <?php if(!isset($_GET['contact_id'])){echo "display:none;";} ?>">
                              <label class="control-label">Order</label>
                              <div class="controls">
                                 <input placeholder="Enter Your Order" name="order" value="<?php echo $order; ?>" type="text" class="span6 " />
                              </div>
                           </div>
   						<div class="form-actions clearfix">
							<input type="submit" class="btn btn-success " />
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
         var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) 
		{
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 37 && keyCode <= 65 )  || specialKeys.indexOf(keyCode) != -1)            
			document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
		}
		</script>
 <script>
 var specialKeys1 = new Array();
        specialKeys1.push(8); //Backspace
        function isNumeric(e) 
		{
			var keyCode1 = e.which ? e.which : e.keyCode1
            var ret1 = ((keyCode1 >= 37 && keyCode1 <= 65) || specialKeys1.indexOf(keyCode1) != -1);
            document.getElementById("error1").style.display = ret1 ? "none" : "inline";
            return ret1;
		}
</script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:52 GMT -->
</html>

