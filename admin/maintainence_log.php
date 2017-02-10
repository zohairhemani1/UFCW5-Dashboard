
<?php	
session_start();
include '../headers/connect_to_mysql.php';
include '../headers/_user-details.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>Maintainence Log</title>
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
   <link rel="stylesheet" type="text/css" href="../assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" href="../assets/data-tables/DT_bootstrap.css" />


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
                     Maintainence Log
                     <small>view All </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Maintainence Log</a><span class="divider-last">&nbsp;</span>
                       </li>
                       
                       </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN ADVANCED TABLE widget-->
        
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">

                            <h4><i class="icon-tags"></i>Maintainence Log</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
<div class="widget-body">


                            <div class="portlet-body">
                                
                                <div id="width" class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                     				<th>App Id</th>
                                    <th>Payment Date</th>
                                    <th>Valid Upto</th>
                                    <th>Transaction Id</th>
                                    <th>Last Four</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Brand</th>
                                    <th>Country</th>
									<th>User Id</th>
                                    <th>Amount</th>
                                    <th>Exp Month</th>
                                    <th>Exp Year</th>
									<div class="widths">
                                        <th style="display:none">Edit</th>
                                        <th style="display:none">Delete</th>
                                    </div>
                                    </tr>
                     
                                           </thead>
                                    <tbody>

				
					<?php
					$query_app = "SELECT * FROM  maintainence_log limit 50";
					$result_app = mysqli_query($con,$query_app);
					while($row = mysqli_fetch_assoc($result_app))
					{
						$app_id = $row['app_id'];
						$paymentDate = $row['paymentDate'];
						$validUpto = $row['validUpto'];
						$transactionID = $row['transactionID'];
						$lastFour = $row['lastFour'];
						$name = $row['name'];
						$status = $row['status'];
						$brand = $row['brand'];
						$country = $row['country'];
						$user_id = $row['user_id'];
						$amount = $row['amount'];
						$exp_month = $row['exp_month'];
						$exp_year = $row['exp_year'];								
					echo"
										<tr class=''> 
								  <td style='width:1.5%'><a href='#'>{$app_id}</a></td>
								  <td style='width:1.5%'><a href='#'>{$paymentDate}</a></td>
								  <td style='width:1.5%'><a href='#'>{$validUpto}</a></td>
								  <td style='width:1.5%'><a href='#'>{$transactionID}</a></td>
								  <td style='width:1.5%'><a href='#'>{$lastFour}</a></td>
								  <td style='width:1.5%'><a href='#'>{$name}</a></td>
								  <td style='width:1.5%'><a href='#'>{$status}</a></td>
								  <td style='width:1.5%'><a href='#'>{$brand}</a></td>
								  <td style='width:1.5%'><a href='#'>{$country}</a></td>
								  <td style='width:1.5%'><a href='#'>{$user_id}</a></td>
								  <td style='width:1.5%'><a href='#'>{$amount}</a></td>
								  <td style='width:1.5%'><a href='#'>{$exp_month}</a></td>
								  <td style='width:1.5%'><a href='#'>{$exp_year}</a></td>
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
   <script>
$(document).ready(function () {
    $('button.popupOpen').click(function () {

        var popup = $(this).attr('data-href');

        $(popup).fadeIn(300);

        //Set the center alignment padding + border
    

        $(popup).css({
            'margin-top': '20px',
                'margin-left': '40px'
        });

        // Add the mask to body
        $('div.container').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);

        return false;
    });

    $('a.close, #mask').live('click', function () {
        $('#mask , .largWin').fadeOut(300, function () {
            $('#mask').remove();
        });
        return false;
    });
});  
  </script>
   
   <script src="../js/jquery-1.8.3.min.js"></script>
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
   <script src="../js/scripts.js"></script>

   <script src="../js/table-editable.js"></script>

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
