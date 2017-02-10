<?php 
include 'headers/connect_to_mysql.php';
include 'headers/_user-details.php';


	if($_GET['news_id']){
		$categoryID = $_GET['categoryID'];
		$news_id = $_GET['news_id'];
		$formAction = "$categoryID&news_id=$news_id"; 

		//$formAction = "{$categoryID}&&news_id=$news_id";
		//$formAction = "{$categoryID}&&news_id=$news_id";
	}
	else if($_GET['categoryID'])
	{
		$categoryID = $_GET['categoryID'];
		$formAction = $categoryID;
	}
	
	
	$title = "";	
	$description = "";
	$facebook = "";
	$twitter = "";
	$google = "";
	$pinterest = "";
	$social = "";
	$notification= "";
	$order = "";
	$social = "";
	$url = "";
	$redirect="";

			
if(isset($_GET['news_id']))
{
			$query_select = "SELECT * FROM news WHERE news_id = $news_id"
			or die ('error3');
			$fetch_result = mysqli_query($con,$query_select);
			$row = mysqli_fetch_array($fetch_result);
			$title = $row['title'];
			$description = $row['description'];
			$file = $row['file'];
			$facebook = $row['facebook'];
			$twitter = $row['twitter'];
			$google = $row['google'];
			$pinterest = $row['pinterest']; 	
			$social = $row['social'];
			$order = $row['order'];
			if ($social == "on")
			{
			$social = "block";
			$checked = "checked";
			}
			else{
			$social = "none";
			}

}
if($_POST)
{
		if(isset($_GET['news_id']))
		  {
			$title = $_POST['title'];
			$title = str_replace("'","\'",$title); 	
			$description = $_POST['description'];
			$description = str_replace("'","\'",$description); 	
			$facebook = $_POST['facebook'];
			$twitter = $_POST['twitter'];
			$google = $_POST['google'];
			$pinterest = $_POST['pinterest'];
			$social = $_POST['social'];
			$notification= $_POST['notification'];
			$order = $_POST['order'];
			$query_update = "UPDATE news SET time_cone = now(), title = '$title',file = '$file', description = '$description',
			facebook = '$facebook', twitter = '$twitter', google = '$google', pinterest = '$pinterest', social = '$social'
			  WHERE news_id = '$news_id'";
			$result_update = mysqli_query($con,$query_update)
			or die('update error');		
			$url = "news.php?categoryID=$categoryID&update=true";
			$redirect = 1;
			
		  
			//header ("Location:news.php?categoryID=$categoryID&update=true");
			
			//header ("Location:news.php?category_id={$category_id}&&update=true");
}
else
	  {
		//include 'parse.php';
		$title = $_POST['title'];
		$title = str_replace("'","\'",$title); 	
		$description = $_POST['description'];
		$description = str_replace("'","\'",$description);
		$facebook = $_POST['facebook'];
		$twitter = $_POST['twitter'];
		$google = $_POST['google'];
		$notification = $_POST['notification'];
		$pinterest = $_POST['pinterest'];
		$social = $_POST['social'];
		$query = "INSERT INTO news(title,description,file,time_cone,category,app_id,facebook,twitter,google,pinterest,social)
				  VALUES ('$title','$description','$file',now(),'$categoryID','$appID','$facebook','$twitter','$google','$pinterest','$social')"
				 or die ('error');
		$result = mysqli_query($con,$query)
	or die('error1');
		if($social = "on")
		{
			$required = "required";
		}
			$url = "news.php?categoryID=$categoryID&insert=true";
			$redirect = 1;
			//header ("Location:news.php?categoryID=$categoryID&insert=true");
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
   <title>Form Components</title>
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
   <link rel="stylesheet" type="text/css" href="css/custom.css"/>
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

                   <!-- END THEME CUSTOMIZER-->
                  <h3 class="page-title">
                     Insert News
                     <small>Insert News page</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                           <a href="index.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="news.php?categoryID=<?php echo $categoryID ?>">News</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert News</a><span class="divider-last">&nbsp;</span></li>
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
                        <h4><i class="icon-reorder"></i>Insert Form</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form name="myform" action="insert_form.php?categoryID=<?php echo $formAction; ?>" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">News</label>
                              <div class="controls">
                                 <input name="title" value="<?php echo $title; ?>" type="text" class="span12 " 
                                 onKeyDown="limitText(this.form.title,this.form.countdown,200);" 
                                 onKeyUp="limitText(this.from.title,this.form.countdown,200);"/>
  								<div class="space3"></div>
								<font size="2">Maximum Charachter</font>
                              <input style="height:0px" readonly type="text" id="space" class="span1" name="countdown" value="200" size="1" />
                              </div>
                           </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" class="span12 ckeditor" name="editor1" rows="6"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
                              <div class="control-group">
                                  <label class="control-label">Social</label>
                                  <div class="controls">
                          <div class="onoffswitch">
                    <input name="social" type="checkbox" name="social"  class="onoffswitch-checkbox" id="myonoffswitch" <?php echo $checked; ?>>
                    <label class="onoffswitch-label" for="myonoffswitch"> 
                    <span onClick="Toggle();" id="displaytext" class="onoffswitch-inner"></span>
                    <span onClick="Toggle();" id="displaytext" class="onoffswitch-switch"></span> 
                    </label>
                    </div>
                    </div>
                    </div>
                        <div class="controls">
                        
                    <div id="toggletext" style="display:<?php echo $social; ?>">
                    <div class="row-fluid">
                             <div class="span8">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Social Icon</h4>
                                </div>
                                <div class="widget-body">
                               <div class="control-group">
                      <label class="control-label">Facebook</label>
                              <div class="controls">
                          <div class="input-icon left"> <i class="icon-facebook"></i>
                          <input <?php echo $required; ?> name="facebook" placeholder="www.Facebook.com" type="text" 
                          class="span12" value="<?php echo $facebook; ?>" />
                      </div>
                      </div>
                      </div>
                       <div class="control-group">
                      <label class="control-label">Twitter</label>
                              <div class="controls">
                          <div class="input-icon left"> <i class="icon-twitter"></i>
                          <input <?php echo $required; ?> name="twitter" placeholder="www.Twitter.com" type="text" 
                          class="span12" value="<?php echo $twitter; ?>" />
                      </div>
                      </div>
                      </div>
                      <div class="control-group">
                      <label class="control-label">Pinterest</label>
                              <div class="controls">
                          <div class="input-icon left"> <i class="icon-pinterest"></i>
                          <input <?php echo $required; ?> name="pinterest" placeholder="www.Pinterest.com" type="text" 
                          class="span12" value="<?php echo $pinterest; ?>" />
                      </div>
                      </div>
                      </div>

                       <div class="control-group">
                      <label class="control-label">Google</label>
                              <div class="controls">
                          <div class="input-icon left"> <i class="icon-google-plus"></i>
                          <input <?php echo $required; ?> name="google" placeholder="www.Google++.com" type="text" 
                          class="span12" value="<?php echo $google; ?>" />
                      </div>
                      </div>
                      </div>
                    
                    </div>
                    </div>
                            </div>
                            </div>
                            <!-- END GRID SAMPLE PORTLET-->
                        </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Notification</label>
                   <div class="controls">            
                        <div class="pushNotification">
                        <input type="checkbox" name="social" class="pushNotification-checkbox" id="mypushNotification" >
                        <label class="pushNotification-label" for="mypushNotification">
                        <span onClick="toggle();" id="DisplayText" class="pushNotification-inner"></span>
                        <span onClick="toggle();" id="DisplayText" class="pushNotification-switch"></span> 
                        </label>
                        </div> 
                        </div>
                              <div class="controls">
                                <div id="ToggleText" style=" display:none">
                            <div class="row-fluid">
                             <div class="span8">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Social Icon</h4>
                                </div>
                                <div class="widget-body">
						<div class="control-group">
                      <label class="control-label">Message</label>
                      <div class="controls">
                                 <input placeholder="Type your message" type="text" class="span11 " />
                                </div></div>
                                </div>
                             </div> 
                            </div>
                          </div>
                       </div>
                          </div>
                              </div>
	                         <div class="control-group">
                      <label class="control-label">Publish</label>
                    <div class="controls">            
                        <div class="publish">
                        <input type="checkbox" name="" class="publish-checkbox" id="mypublish" >
                        <label class="publish-label" for="mypublish">
                        <span class="publish-inner"></span>
                        <span class="publish-switch"></span> 
                        </label>
                        </div> 
                        </div>
                        </div>
   			<div class="form-actions clearfix">
				<input type="submit"  class="btn btn-success " />
                   </div>
                              </form>
 
 										</div>
					 </div>                      
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
<script>
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:52 GMT -->
</html>

