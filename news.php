<?php
include 'headers/checkloginstatus.php'; 
include 'headers/connect_to_mysql.php';
include 'headers/session.php';
include 'headers/_user-details.php';
$categoryID = $_GET['categoryID'];
$url = "";
$redirect="";
$name = "";
$query = "SELECT w.name FROM `webservice_category` wc, `webservices` w WHERE wc.`category` like '{$categoryID}' AND wc.webservice = w.id";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$fileName = $row['name'];
if(isset($fileName))
{
	if($fileName != "view.php" && $fileName != "news_category.php"){
		$url = "{$fileName}?categoryID={$categoryID}";
		$redirect = 1;
		//header("Location: {$fileName}?categoryID={$categoryID}");
	}
}

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>News Articles</title>
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
				
				<?php 
		  		  $query = "select name from (select c.name ,c.id from `categories` c union select sc.name,sc.submenu_id from `subcategories` sc) `dd` where id ={$categoryID}";
				  $sth = $dbh->prepare($query);
				  $sth->execute();
				  $row = $sth->fetch(PDO::FETCH_ASSOC);
				  $name = $row['name'];
				?>
				
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     <?php echo $name; ?>
                     <small>view All </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">News</a><span class="divider-last">&nbsp;</span>
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
					<strong>Success!</strong> The {$name} has been added.
				</div>";
			}
	 	else if(isset($_GET['update']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The {$name} has been updated.
            </div>";
		}
		else if(isset($_GET['delete']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The {$name} has been Deleted.
            </div>";
		}
?>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
             

                            <h4><i class="icon-tags"></i> <?php echo $name; ?> Articles</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
<div class="widget-body">
			<div class="btn-group" id="addButton">
               <a href="insert_form.php?categoryID=<?php echo $categoryID; ?>"><button type="button" class="btn btn-primary"> Add New <i class="icon-plus"></i> </button></a>
             </div>

                            <div class="portlet-body">
                                
                                <div id="width" class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
								 <th style="width:30px;">S No</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                        <div class="widths">
                                        <th style="display:none">Edit</th>
                                        <th style="display:none">Delete</th>
                                    </div>
                                    </tr>
                     
                                           </thead>
                                    <tbody>

				
					<?php

				$categoryID = $_GET['categoryID'];
				//if ((int) $category_id == $category_id) 
				//{
					
					$query = "SELECT n.* from `news` n where category = {$categoryID}";
					$sth = $dbh->prepare($query);
					$sth->execute();
					$count = 0;
					while($row = $sth->fetch(PDO::FETCH_ASSOC))
					{
						$news_id = $row['news_id'];
						$count++;
						$published = "Unpublished";
						
						
						if($row['published']==1)
							$published = "Published";
							
					echo"
					<tr class=''> 
								  <td style='width:6%'><a href='#'>{$count}</a></td>
								  <td  id='news_button' style='width:58%'><a href=''>{$row['title']}</a></td>
								  <td style='width:3%'><span id='published' class='label label-warning label-mini'>{$published}</span></td>
								  <td><a href='insert_form.php?categoryID=$categoryID&news_id={$news_id}' 
								  id='update_button' class='btn btn-success'> <i class='icon-edit'></i></a>																					 							 	 
								  <a href='delete.php?categoryID=$categoryID&news_id={$news_id}' id='delete_button' class='btn btn-danger'>
								  <i class='icon-trash'></i> </a>
								  <a href='view.php?news_id={$news_id}' id='view_button' class='btn btn-info'> 
								  <i class='icon-eye-open'></i> </a></td>
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
		var count = '<?php echo $count;?>';
		var category = '<?php echo $categoryID; ?>';
		if(count == 1 && (!(category % 1 === 0)))
		{
			$("#addButton").hide();
		}
   </script>
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:55 GMT -->
</html>
