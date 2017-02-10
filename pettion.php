<?php 
	include 'headers/connect_to_mysql.php';
	include 'headers/_user-details.php';
	
	$first_name = "";
	$last_name = "";
	$email = "";
	$email = $_GET['email'];
	if($_POST)
	{
	$query_select = "SELECT * FROM petition_people WHERE email like $email";
	$result_query = mysqli_query($con,$query_select)
	or die ('error while selection email');
	$row = mysqli_fetch_array($result_query);
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	}
	if($_POST['zip'])
	{
	$zipcode = $_POST['zipcode'];
	$query_update = "UPDATE petition_people set zipcode  = $zipcode WHERE email LIKE $email";
	$result_update = mysqli_query($con,$query_update)
	or die('error while updating Zip Coe');	
	}
	
	
	
	?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:57:43 GMT -->
<head>   <meta charset="utf-8" />
   <title>Petition Members</title>
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
                     Petition Members
                     <small>Insert your Petition Members </small>
                  </h3>
                   <ul class="breadcrumb">

                       
                   <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert Petition Members</a><span class="divider-last">&nbsp;</span>
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
                        <h4><i class="icon-reorder"></i>Petition Members Form</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
						<div ng-app="">
                        <form action="send_petition.php<?php echo $formAction ?>" method="post" class="form-horizontal">
                           <div id="form-left">
                           <div class="control-group">
                              <label class="control-label">first Name</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your First Name" name="first_name" 
                                 value="<?php echo $first_name; ?>" type="text" class="" readonly />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Last Name</label>
                              <div class="controls">
                                 <input required placeholder="Enter Your Last Name" name="last_name" 
                                 value="<?php echo $last_name; ?>" type="text" class="" readonly />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label">Zip</label>
                              <div class="controls">
							<input onclick="$('#zip')[0].focus()" onKeyPress="appent();" id="foo" name="zipcode" ng-model="zip" value="<?php echo  $zipcode; ?>"
                             class="" placeholder="Enter Your Zip" type="text" name="zipCode">
                              </div>
								</div>
							</div>
                           <img src="img/ufcw480.PNG" alt="ufcw480"/>
							<div id="logo_text">
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
                            <div id="myDIV">
                            <p>
                            <b>Patrick K.Loo</b>
                            </p>
                            <p>
                            President
                            </p>
                            <div id="left">
                            <p>
                             <b>Gwen K.Rulona</b>
                            </p>
                            <p>
                            Secretary Treasurer
                            </p>
                            </div>
                            <img src="img/thumbnail.PNG"/>
							</div>
                           <p>{{firstname + " " + lastname}}<p>

							   <p>
        Dear Hawaii State Legislature,
    </p>
    <p>
    We, <?php echo $first_name." ".$last_name ?> , are in support of the intent of HB321, the creation of a Medical Marijuana Dispensary system in Hawaii.
    </p>
    <p>
        85% of people in Hawaii favor medical marijuana for patients who are seriously ill with cancer or other such diseases.
    </p>
    <p>
    Our fifteen year old medical marijuana law (our legislators trumpet it as "The First in The Nation") does not work.  Of the thousands of Kaiser cancer patients who may be able to benefit from these treatments, none of them are being prescribed Medical Marijuana, and very few HMSA patients are able to get prescriptions either. 
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
    Signed: <?php echo $first_name." ".$last_name?>
    <br>
    <p id="zip">
    {{zip}}
    </p>
</div>
</div>

							<div class="form-actions clearfix">
							<input type="submit" name="zip"  class="btn btn-success " />
                                              		</div>
</div>
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

  <script>
  function appent(){ 
$( "#foo" ).appendTo( "#zip" );
    document.getElementById("foo").focus();
  }
</script>
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

