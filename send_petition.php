<?php
include 'headers/connect_to_mysql.php';
include 'headers/_user-details.php';
	$success = "";
/*	var_dump($_POST);
	if($_POST['email'] == "all")
	{
	echo"successfully send email to all";
	var_dump($_POST);
	$query_mail = "SELECT email FROM petition_people";
	$result_mail = mysqli_query($con,$query_mail);
	$row = mysqli_fetch_array($result_mail);
	$mailall = $row['email'];
$sub = "Union Jobs = Good Jobs";
$msg =  "<img style='marginbottom:5px;margin-top:5px;' src='http://myunionapp.com/img/ufcw480.PNG'/>
<div id='a4size' style='width: 560px;margin-right: auto;margin-left: auto;padding: 4px;'>
                           <div style='line-height: 15px ;margin-top: 8px;' id='logo_text'>
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
							<div id='myDIV' style='background: url(http://myunionapp.com/img/line.png) repeat-x;
                            height: 10px;padding-top: 10px;font-size: 16px;line-height:15px ;dispay:block;'>
                            <p>
							<div style='float:right;'>
							<p>
							<b>Gwen K.Rulona</b>
                            </p>
							<p>
							Secretary Treasurer
							</p>
							</div>
							<div style='padding-top: 1px;'>
                            <b>Patrick K.Loo</b>
                            </p>
                            <p>
                            President
                            </p>
							</div>

							
							<img style='marginbottom:5px;margin-top:5px;' src='http://myunionapp.com/img/thumbnail.PNG'/>
							<p>
							Aloha Brothers & Sisters,
							</p>
							<p>
							This is your President Pat Loo with a message of RIGHTS, RESPONSIBILITY OF YOUR UNION TO REPRESENT WORKERS.  There is a new emerging industry that is requiring our HELP and a call to action by you now.  
							</p>
							<p>
							Your Union has initiated the program UFCW 480 CANNABIS WORKERS RAISING.
							</p>
							<p>
							In 2000, Hawaii’s legislature was the first in the nation to pass medical marijuana legislation to provide medical relief for the state’s seriously ill.  While the existing law recognizes the benefits of marijuana for alleviating pain and other symptoms associated with certain debilitating illnesses, patients until now have to buy marijuana on the “black market” or grow it themselves.
							We are engaged in protecting workers in the legal Medical Marijuana dispensary industry House Bill 321 and SB 682.
							I urge our member to support HB 321 and SB 682 “UFCW 480 CANNABIS WORKERS RAISING”, by selecting completing the information below on this e-mail.  Once you click 'Submit' your legislator will be contacted by email of your support.
							</p>
							<p>
							Your Union will continue to communicate with you to keep you up to date on information we believe that benefits our membership.  
							Stay informed, get involved and help keep our contracts and Union strong.
							</p>
							<p>
							Thanks for your participation and your ongoing support of your Union!
							</p>
							<p>
							In 2000, Hawaii’s legislature was the first in the nation to pass medical marijuana legislation to provide medical relief for the state’s seriously ill.  While the existing law recognizes the benefits of marijuana for alleviating pain and other symptoms associated with certain debilitating illnesses, patients until now have to buy marijuana on the “black market” or grow it themselves.
							We are engaged in protecting workers in the legal Medical Marijuana dispensary industry House Bill 321 and SB 682
							</p>
			</div>
Signed: $first_name $last_name,
$zipcode";

$headers = "From: " . "info@myunionapp.com" . "\r\n";
$headers .= "Reply-To: ". "info@myunionapp.com" . "\r\n";
$headers .= "BCC: zohairhemani1@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

foreach($mailall AS $Add=>$ToEmail){
     $retval = mail($ToEmail,$sub,$msg,$headers);
	if($retval) 
	{	
	echo $to;
	echo "Done";
	} 
	else 
	{
	echo $to;
var_dump($retval);   
	//send mail end here//
	}		
	}
	}
	else*/ 
	if ($_POST)
{
	var_dump($_POST);
$email = $_POST['email'];
$headers = "From: " . "local480cwr@gmail.com" . "\r\n";
$headers .= "Reply-To: ". "local480cwr@gmail.com" . "\r\n";
$headers .= "BCC: jones436@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$sub = "Union Jobs = Good Jobs";



foreach($email AS $Add=>$ToEmail){
	$ToEmail = preg_replace("/&#?[a-z0-9]{2,8};/i","",$ToEmail);
$msg ="
<div id='a4size' style='width: 560px;margin-right: auto;margin-left: auto;padding: 4px;'>
<img style='marginbottom:5px;margin-top:5px;' src='http://myunionapp.com/img/ufcw480.PNG'/>         
		 <div style='line-height: 15px ;margin-top: 8px;' id='logo_text'>
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
							<div id='myDIV' style='background: url(http://myunionapp.com/img/line.png) repeat-x;
                            height: 10px;font-size: 16px;line-height:15px ;dispay:block;'>
                            <p>
							<div style='float:right;  padding-top:2px !important'>
							<p>
							<b>Gwen K.Rulona</b>
                            </p>
							<p>
							Secretary Treasurer
							</p>
							</div>
							<div style='padding-top: 19px;'>
                            <b>Patrick K.Loo</b>
                            </p>
                            <p>
                            President
                            </p>
							</div>

							
							<img style='marginbottom:5px;margin-top:5px;' src='http://myunionapp.com/img/thumbnail.PNG'/>
							<p>
							Aloha Brothers & Sisters,
							</p>
							<p>
							This is your President Pat Loo with a message of RIGHTS, RESPONSIBILITY OF YOUR UNION TO REPRESENT WORKERS.  There is a new emerging industry that is requiring our HELP and a call to action by you now.  
							</p>
							<p>
							Your Union has initiated the program UFCW 480 CANNABIS WORKERS RAISING.
							</p>
							<p>
							In 2000, Hawaii’s legislature was the first in the nation to pass medical marijuana legislation to provide medical relief for the state’s seriously ill.  While the existing law recognizes the benefits of marijuana for alleviating pain and other symptoms associated with certain debilitating illnesses, patients until now have to buy marijuana on the “black market” or grow it themselves.
							We are engaged in protecting workers in the legal Medical Marijuana dispensary industry House Bill 321 and SB 682.
							I urge our member to support HB 321 and SB 682 “UFCW 480 CANNABIS WORKERS RAISING”, by selecting completing the information below on this e-mail.  Once you click 'Submit' your legislator will be contacted by email of your support.
							</p>
							<p>
							Your Union will continue to communicate with you to keep you up to date on information we believe that benefits our membership.  
							Stay informed, get involved and help keep our contracts and Union strong.
							</p>
							<p>
							Thanks for your participation and your ongoing support of your Union!
							</p>
							<p>
							In 2000, Hawaii’s legislature was the first in the nation to pass medical marijuana legislation to provide medical relief for the state’s seriously ill.  While the existing law recognizes the benefits of marijuana for alleviating pain and other symptoms associated with certain debilitating illnesses, patients until now have to buy marijuana on the “black market” or grow it themselves.
							We are engaged in protecting workers in the legal Medical Marijuana dispensary industry House Bill 321 and SB 682
							</p>
							<p>
<a href='http://myunionapp.com/petition.php?email={$ToEmail}'>Click here</a>
							</p>	
							</div>";	
	
	
     $retval = mail($ToEmail,$sub,$msg,$headers);
}

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
	//send mail end here/
	}

}

?>

<!doctype html>
<html>
<head>
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
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

<title>LinkedUnion -Dashboard </title>
<script>
			 if(<?php echo $redirect;?> == 1){
			//alert('redirecting');
			window.location.href = '<?php echo $url; ?>';
	}
	</script>


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
                     Send Email
                     <small>Send Mail</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                           <a href="index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
					   
                       <li><a href="#">Send Email</a><span class="divider-last">&nbsp;</span></li>
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
                        <h4><i class="icon-reorder"></i>Send Email</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                         </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <?php echo $success;?>
						<form action="send_petition.php" method="post" class="form-horizontal">
                             <div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                                 <select data-placeholder="Select Your email" name="email[]" class="span6 chosen" multiple="multiple" tabindex="1">
										<!--<option value='all'>all</option>-->
                                	    <option value=''></option>
							<?php echo include 'headers/petition_people.php'; ?> 
                               </select>
							<br>
							<span class="help-inline">Select Name to send email</span>
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

 
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
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
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
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
		 UIJQueryUI.init();
      });
   </script>

</body>
</html>

