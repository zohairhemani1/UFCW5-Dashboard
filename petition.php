<?php 
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php';
	
	$email = "";	
	if ($_GET['email'] == "no")
	{
	$email = "no";
	$readonly = "";	
	}
	else if($_GET['email'])
	{
	$email = $_GET['email'];
	$readonly = "readonly";	
	}
	$first_name = "";
	$last_name = "";
	$address = "";
	$zipcode = "";
	$success = "";
	$query_select = "SELECT * FROM petition_people WHERE email = '$email'";
	$result_query = mysqli_query($con,$query_select)
	or die ('error while selection email');
	$count = mysqli_num_rows($result_query);
	$row = mysqli_fetch_array($result_query);
	$first_name = $row['first_name'];
	$address = $row['address'];
	$last_name = $row['last_name'];
	$zipcode = $row['zipcode'];
	if($address != null)
	{
	$address = "<br>{$address}";
	}
	if($_POST)
	{
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$zipcode = $_POST['zipcode'];
	$query_update = "UPDATE petition_people set zipcode = '$zipcode' WHERE email = '$email'";
	$result_update = mysqli_query($con,$query_update)
	or die('error while updating Zip Coe');	
	//update zip code ned here //
	
	//send mail begin here//

$sub = "Union Jobs = Good Jobs";
$msg =  "
        Dear Hawaii State Legislature,
    </p>
    <p>
    I, {$first_name} {$last_name}  , am in support of the intent of HB321, the creation of a Medical Marijuana Dispensary system in Hawaii.
    </p>
    <p>
        85% of people in Hawaii favor medical marijuana for patients who are seriously ill with cancer or other such diseases.
    </p>
    <p>
    Our fifteen year old medical marijuana law (our legislators trumpet it as 'The First in The Nation') does not work.  Of the thousands of Kaiser cancer patients who may be able to benefit from these treatments, none of them are being prescribed Medical Marijuana, and very few HMSA patients are able to get prescriptions either. 
    </p>
    <p>
    Why not? Because the law mandates that patients have to either grow their own medicine, or get it from an illegal drug dealer. What kind of cruel hoax is that?  
    </p>
    <p>
    We need safe, secure, doctor and pharmacist supervised Medical Marijuana dispensaries. And they should all be manned by unionized workers. Why unionized?  Because in this situation we all want a trained, safe and stable work force with roots in the community that offers decent pay and good benefits. We all want workers in these dispensaries who will be backed up by a solid employee organization that is bound by laws, work rules and are proven that it can be trusted.  
    </p>
    <p>
    Unions are the key to creating a successful dispensary system, and making sure the new Medical Marijuana laws are enforced. They will serve as a solid partner in preventing this industry from being run by fly-by-night operations, and those more interested in profit than worker protection, patient health and consistent levels of production and integrity.
    </p>
    <p>
    <b> 
    <u>
     As a Hawaii voter, I ask you to take seriously the advantages of including Labor Peace language in  Bill 321, and set up a system that is safe, secure and protect patients, doctors and workers.
    </b>
    </u>
    </p>    
    Signed: <br>{$first_name} {$last_name} {$address}
	{$zipcode}	
    </p>
	</div>";
$to = "repmckelvey@Capitol.hawaii.gov,senkim@Capitol.hawaii.gov,sengreen@capitol.hawaii.gov,repbelatti@Capitol.hawaii.gov,senkeithagaran@capitol.hawaii.gov,reprhoads@Capitol.hawaii.gov,senespero@capitol.hawaii.gov,
repsoui@Capitol.hawaii.gov,jones436@gmail.com​";	
$headers = "From: " . "local480cwr@gmail.com" . "\r\n";
$headers .= "Reply-To: ". "local480cwr@gmail.com" . "\r\n";
$headers .= "BCC: zohairhemani1@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

     $retval = mail($to,$sub,$msg,$headers);
	if($retval) 
	{
		$success = "<div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>x</button>
                <strong>Success!</strong> The Mail has been Sent.
            </div>";	
	} 
	else 
	{
	var_dump($retval);   
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
   <title>Petition </title>
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
      <script src="js/jquery-1.8.2.min.js"></script>    
   <script>
   if(<?php echo $redirect;?> == 1){
		window.location.href = '<?php echo $url; ?>';
   }
	</script>
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

   </head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!-- BEGIN LOGO -->
               <a class="brand" href="index.html">
                   <img style="margin-top:-13px" src="img/logo/logo_ufcw480.png" alt="Admin Lab" />
               </a>
         
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid sidebar-closed">
      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">
</div>
</div<
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content" style="  margin-right: 25px;margin-top: 21px !important;">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                 
                   <!-- END THEME CUSTOMIZER-->
                  <h3 class="page-title">
                     Petition 
                     <small>Insert your Name </small>
                  </h3>
                   <ul class="breadcrumb">
                       <li><a href="#">Petition Members</a><span class='divider-last'>&nbsp;</span>
                       </li>
                       
                   </ul> 
                                 </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
<?php 
	if($count == 1 || $_GET['email'] == "no"){
	
echo"		
		<div class='row-fluid'>
               <div class='span12'>
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class='widget'>
                     <div class='widget-title'>
                        <h4><i class='icon-reorder'></i>Petition Members Form</h4>
                        <span class='tools'>
                           <a href='javascript:;' class='icon-chevron-down'></a>
                        </span>
                     </div>
                     <div class='widget-body form'>
                        {$success}
						<!-- BEGIN FORM-->
						<div ng-app=''>
                        <form action='petition.php?email=$email' method='post' class='form-horizontal'>
                           <div class='control-group '>
                            <input required style='width:29.717949% !important;' class='span6 one-half' placeholder='Enter Your First Name' name='first_name' 
                                 value='$first_name' ng-model='first_name' type='text' class=''  $readonly />
                            <input required style='width:29.717949% !important;margin-right:16px;' class='span6' required 
							placeholder='Enter Your Last Name' ng-model='last_name' name='last_name' 
                                 value='$last_name' type='text' class='' $readonly />
							<input required style='width:29.717949% !important;' class='span6 one-half' name='zipcode' ng-model='zip' value='$zipcode'
                             placeholder='Enter Your Zip' type='text' >
                            </div>
						
							<div id='a4size'>
                        <!--   <img src='img/ufcw480.PNG' alt='ufcw480'/>
							<div id='logo_text'>
                            <p>
							United Food & Comercial Workers Union, Local 480                            
                            </p>
                            <p>
                            808 Factory Street Honolulu Hawaii 96819
                            </p>
                            <p>
                            Phone: 808924.778
                            </p>
							</div>
                            <div id='myDIV'>
                            <p>
                            <b>Patrick K.Loo</b>
                            </p>
                            <p>
                            President
                            </p>
                            <div id='left'>
                            <p>
                             <b>Gwen K.Rulona</b>
                            </p>
                            <p>
                            Secretary Treasurer
                            </p>
                            </div>
                            <img src='img/thumbnail.PNG'/>
							</div>-->
                           <p>{{firstname + ' ' + lastname}}<p>

							   <p>
        Dear Hawaii State Legislature,
    </p>
    <p>
    I, {{first_name}}  {{last_name}} $first_name  $last_name  , am in support of the intent of HB321, the creation of a Medical Marijuana Dispensary system in Hawaii.
    </p>
    <p>
        85% of people in Hawaii favor medical marijuana for patients who are seriously ill with cancer or other such diseases.
    </p>
    <p>
    Our fifteen year old medical marijuana law (our legislators trumpet it as 'The First in The Nation') does not work.  Of the thousands of Kaiser cancer patients who may be able to benefit from these treatments, none of them are being prescribed Medical Marijuana, and very few HMSA patients are able to get prescriptions either. 
    </p>
    <p>
    Why not? Because the law mandates that patients have to either grow their own medicine, or get it from an illegal drug dealer. What kind of cruel hoax is that?  
    </p>
    <p>
    We need safe, secure, doctor and pharmacist supervised Medical Marijuana dispensaries. And they should all be manned by unionized workers. Why unionized?  Because in this situation we all want a trained, safe and stable work force with roots in the community that offers decent pay and good benefits. We all want workers in these dispensaries who will be backed up by a solid employee organization that is bound by laws, work rules and are proven that it can be trusted.  
    </p>
    <p>
    Unions are the key to creating a successful dispensary system, and making sure the new Medical Marijuana laws are enforced. They will serve as a solid partner in preventing this industry from being run by fly-by-night operations, and those more interested in profit than worker protection, patient health and consistent levels of production and integrity.
    </p>
    <p>
    <b> 
    <u>
     As a Hawaii voter, I ask you to take seriously the advantages of including Labor Peace language in  Bill 321, and set up a system that is safe, secure and protect patients, doctors and workers.
    </b>
    </u>
    </p>    
    Signed: <br>  {{first_name}}  {{last_name}} $first_name  $last_name
		$address
    <p id='zip'>
    {{zip}}
    </p>
	</div>
</div>
</div>

							<div class='form-actions clearfix'>
							<input type='submit' style='margin-left: 27.7%;' class='btn btn-success ' />
                                              		</div>
</div>
 </div>

</form>  
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END EXTRAS widget-->
                </div>
            </div>";
			}
		
			else{
				echo"
				   <div class='row-fluid'>
                 <div class='span12'>
                     <div class='space20'></div>
                     <div class='space20'></div>
                     <div class='widget-body'>
                         <div class='error-page' style='min-height: 800px'>
                             <img src='img/500.png' alt='500 error'>
                             <h1>
                                 <strong>500!</strong> <br/>
                                 OOPS! Something went wrong.
                             </h1>
                         </div>
                     </div>
                 </div>
             </div>";
			}
				?>
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

