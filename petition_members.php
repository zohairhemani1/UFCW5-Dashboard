<?php
include 'headers/checkloginstatus.php'; 
include 'headers/connect_to_mysql.php';
include 'headers/session.php';
include 'headers/_user-details.php';
$first_name = "";
$last_name = "";
$email = "";
$address = "";
if(!isset($publish_date))
{
	$publish_date = "" ;
}
$query_select = "SELECT * FROM `petition_people` where app_id = $appID ";
$result_select = mysqli_query($con,$query_select)
 or die ('error');

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Petition People</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/custom.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />
   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

   <script>
   if(<?php echo $redirect;?> == 1){
			//alert('redirecting');
			window.location.href = '<?php echo $url; ?>';
   }
	</script>
<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>
   <script>
   setTimeout(function(){
  if ($('#closed').length > 0) {
    $('#closed').remove();
  }
  else if($('#added').length > 0) {
    $('#added').remove();
  }
  else if($('#removed').length > 0) {
    $('#removed').remove();
  }
}, 8000)
   </script>
<script type="text/javascript">
function ConfirmDelete() {
  return confirm('Do you really want to delete?');
}
</script>
 </head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
<?php
include 'headers/menu-top-navigation.php'; 
?>      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
			
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Petition People
                     <small>View All people </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Petition People</a><span class="divider-last">&nbsp;</span>
                       </li>
                       
                       </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN ADVANCED TABLE widget-->
                      <?php
			if(isset($_GET['insert']) == 'true')
			{
				echo"
			<div id='added' class='alert alert-success'>
					<button class='close' data-dismiss='alert'>×</button>
					<strong>Success!</strong> The Petition People has been added.
				</div>";
			}
	 	else if(isset($_GET['update']) == 'true'){
      echo"
	    <div id='closed' class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The Petition People has been updated.
            </div>";
		}
		else if(isset($_GET['delete']) == 'true'){
      echo"
	    <div id='removed' class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The Petition People has been Deleted.
            </div>";
		}
?>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
             

                            <h4><i class="icon-tags"></i>Petition People</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
<div class="widget-body">
			<div class="btn-group" id="addButton">
               <a href="insert_petition.php" <button type="button" class="btn btn-primary"> Add New <i class="icon-plus"></i> </button></a>
             </div>

                            <div class="portlet-body">
                                
                                <div id="width" class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
								 <th style="width:30px;">S No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
									<th>Address</th>
									<th>Action</th>
                                        <div class="widths">
                                        <th style="display:none">Edit</th>
                                        <th style="display:none">Delete</th>
                                    </div>
                                    </tr>
                     
                                           </thead>
                                    <tbody>

				
					<?php
						$count = 0;				
						while($row = mysqli_fetch_array($result_select))
					{
						$member_id = $row['member_id'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$email = $row['email'];
						$address=  $row['address'];
						$count++;
						
					echo"
					<tr class=''> 
								  <td style='width:6%'><a href='#'>{$count}</a></td>
								  <td  id='news_button' style='width:24% !important'><a href='institutionDetail.php'>{$first_name}</a></td>
								  <td style='width:24% !important'>{$last_name}</span></td>
								 <td style='width:3%'>{$email}</span></td>
								 <td style='width:15%'>{$address}</span></td>
								  <td><a href='insert_petition.php?member_id=$member_id' 
								  id='update_button' class='btn btn-success'> <i class='icon-edit'></i></a>																					 							 	 
								  <a href='delete.php?member_id={$member_id}' onclick='return ConfirmDelete()' id='delete_button' class='btn btn-danger'>
								  <i class='icon-trash'></i> </a></td>
								  <td style='display:none'><a class='' href='javascript:;'>Edit</a></td>
								 <td style='display:none'><a class='' href='javascript:;'>Delete</a></td>
								  </tr>";
					}
					?>	
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

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
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/scripts.js"></script>

   <script src="js/table-editable.js"></script>

   <script>
       jQuery(document).ready(function() {
           App.init();
           TableEditable.init();
       });
   </script>

   <script>
		<!-- determining if the current categoryID is a cat or a subcat. If subcat and count is 1, then hide the add new button  -->
		//var count = '<?php echo $count;?>';
		//var category = '<?php echo $categoryID; ?>';
		//if(count == 1 && (!(category % 1 === 0)))
	//	{
	//		$("#addButton").hide();
	//	}
   </script>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:55 GMT -->
</html>
