<?php
		session_start();
		include 'headers/connect_to_mysql.php';
		include 'headers/_user-details.php';
		include 'headers/session.php';
		
	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/news_details.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 08:04:57 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Index</title>
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
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">

                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Index
                     <small>Home Page</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li><a href="#"<i class="icon-home"></i></a><span class="divider-last">&nbsp;</span>
                       </li>
                                 
                                          </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
		<?php 
			if($_GET['uniqueID'] = 1){
//      echo"
//	    <div class='alert alert-danger'>
//                <button class='close' data-dismiss='alert'>×</button>
//                <strong>Success!</strong> Your text will go here.
//            </div>";
		}
		else
		{
			echo"";
			
		}
            ?>
			<div class="row-fluid">
               <div class="span12">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-edit"></i> ABOUT us</h4>
                           <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>                    
                        </div>
                        <div class="widget-body">
                            <div class="row-fluid blog">

                                <div class="span12">
                                    <img src="img/cover/<?php echo $cover ;?>" alt="">
                                    <div>
                                        <p>
                                        <?php echo $about_us ;?>
                                        </p>
                                    </div>
                                    <!--end media-->
                                    <!--begin post comments-->
                                    <!--end post comments-->
                                </div>
                            </div>

                        </div>
                  </div>
               </div>
<!--               <div class="span3">
                   <div class="blog-side-bar">
                       <h2>categories</h2>
                       <ul class="unstyled">
                           <li><a href="#"><i class="icon-chevron-right"></i>  Sports</a></li>
                           <li><a href="#"><i class="icon-chevron-right"></i> Funny</a></li>
                           <li><a href="#"><i class="icon-chevron-right"></i> Finance</a></li>
                           <li><a href="#"><i class="icon-chevron-right"></i> Travel</a></li>
                       </ul>
						<hr>
                        <h2>Latest news</h2>
                      <?php 
	/*				$query_select = "SELECT SUBSTRING(`description`, 1, 44) as description,title,news_id FROM news where app_id = '$appID' ORDER BY `order` desc LIMIT 3"
					or die('error while selecing value');
					$result_select = mysqli_query($con,$query_select);
					   while($row = mysqli_fetch_array($result_select))
					   	{
						   	$news_id = $row['news_id'];
							$title = $row['title'];
							$description = $row['description'];
							   echo"
							<div class='space15'></div>
                       <div class='row-fluid'>
                           <div class='span3'>
                               <img alt='' src='img/avialdo.png'>
                           </div>
                           <div class='span9'>
                                <h5>
                                   <a href='view.php?news_id=$news_id'>$title</a>
                               </h5>
                               <p>$description,...</p>
                           </div>
                       </div>
                       
							";						   
							}
						   ?>
                           

                   </div>*/
             ?>
			   -->
               </div>
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
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/news_details.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 08:04:58 GMT -->
</html>