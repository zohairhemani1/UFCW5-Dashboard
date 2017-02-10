<?php
session_start();
	include '../headers/_user-details.php';
	include '../headers/connect_to_mysql.php';
	$query_app = "SELECT distinct app_name FROM categories c, app a where c.app_id = a.app_id limit 50";
	$result_app = mysqli_query($con,$query_app);
	$query_app1 = "SELECT c.id, c.name as category_name, sc.submenu_id, sc.name as subCategory_name, app.app_id, app.app_name FROM `categories` c
					LEFT JOIN `subcategories` sc
					ON c.id=sc.menu_id
					LEFT JOIN `app` app
					ON c.app_id=app.app_id";
	$result_app1 = mysqli_query($con,$query_app1);
	
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Avialdo</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="../css/style.css" rel="stylesheet" />
   <link href="../css/custom.css" rel="stylesheet" />
   <link href="../css/style_responsive.css" rel="stylesheet" />
   <link href="../css/style_default.css" rel="stylesheet" id="style_color" />
   <link href="../assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="../stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <link rel="../stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<script type="text/javascript">
	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		if(result == true){
			return true;
			}
		else{
			return false;
		}
	}
	</script>
                <script src="media/js/jquery-1.4.4.min.js" type="text/javascript"></script>

       <script src="media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

<?php 
$returnArray = array();
					while($row = mysqli_fetch_assoc($result_app))
					{
						$app_name = $row['app_name'];
						$returnArray[] = $app_name;
					}
					
						 ?>

		<script type="text/javascript">
$(document).ready(function(){
     $('#sample_editable_1').dataTable()
		  .columnFilter({
			aoColumns: [ { type: "select", values:<?php echo json_encode($returnArray); ?>},
				     { type: "text" },
				     null,
				     { type: "number" }
				]
		  				
		});
});

		</script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
<?php
include '../headers/_user-details.php';
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
                     App
                     <small>view All </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">App</a><span class="divider-last">&nbsp;</span>
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
			<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>×</button>
					<strong>Success!</strong> The App has been added.
				</div>";
			}
	 	else if(isset($_GET['update']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The App has been updated.
            </div>";
		}
		else if(isset($_GET['delete']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The App has been Deleted.
            </div>";
		}
?>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">

                            <h4><i class="icon-tags"></i>App Name</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
<div class="widget-body">
			<div class="btn-group">
               <a href="insert_category.php"><button type="button" class="btn btn-primary"> Add New <i class="icon-plus"></i> </button></a>
                              </div>

                            <div class="portlet-body">
                                
                                <div id="width" class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                    <th>App Name</th>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Id</th>
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                                        <div class="widths">
                                        <th style="display:none">Edit</th>
                                        <th style="display:none">Delete</th>
                                    </div>
                                    </tr>
                                    </thead>
                                    <tbody>

				
					<?php
					while($row = mysqli_fetch_array($result_app1))
					{
						$id = $row['id'];
						$app_name = $row['app_name'];
						$subCategory_name = $row['subCategory_name'];
						$submenu_id = $row['submenu_id'];
						$category_name = $row['category_name'];
					echo"
					<tr class=''> 
								  <td style='width:1% !important'><a href='#'>{$app_name}</a></td>
								  <td style='width:2%'><a href='#'>{$id}</a></td>
								<td style='width:3%'><a href='#'>{$category_name}</a></td>
								<td style='width:3%'><a href='#'>{$submenu_id}</a></td>
								<td style='width:3%'><a href='#'>{$subCategory_name}</a></td>
								  <td style='width:6%;text-align:center;'><a href='insert_category.php?id={$id}'> 
	  <button style='width:34% !important' type='button' id='update_button' class='btn btn-success'> <i class='icon-edit'></i></button></a>								    <a href='delete_category.php?id={$id}'>
								<button style='width:34% !important' type='button'	id='delete_button'  class='btn btn-danger'>
								  <i class='icon-trash'></i></button></a>
									  <td style='display:none'><a class='' href='javascript:;'>Edit</a></td>
								 <td style='display:none'><a class='' href='javascript:;'>Delete</a></td>
								  </tr>";
					}

					?>	
                                    </tbody>
                                    <tfoot> 
                                	    <tr>	

                                            <th>All</th>
                                         	</tr>
									</tfoot>

                     
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
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>   
   <script src="../js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="../assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="../assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="../assets/data-tables/DT_bootstrap.js"></script>


   <script>
       jQuery(document).ready(function() {
           App.init();
           TableEditable.init();
       });
   </script>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:55 GMT -->
</html>
