<?php
session_start();
include '../headers/_user-details.php';
include '../headers/connect_to_mysql.php';

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

		<script type="text/javascript">
$(document).ready(function(){
     $('#sample_editable_1').dataTable()
		  .columnFilter({
			aoColumns: [ { type: "select",id:"arbish", values: [ 'Gecko', 'Trident', 'KHTML', 'Misc', 'Presto', 'Webkit', 'Tasman']  },
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
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-bordered" id="sample_editable_1">
	<thead>
		<tr>
			<th>All</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tfoot>
		<tr>

			<th>All</th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>

		</tr>
	</tfoot>
	<tbody>
		<tr class="odd_gradeX" id="2">
			<td class="read_only">Trident</td>
			<td>Internet Explorer 4.0</td>
			<td>Win 95+</td>
			<td class="center">4</td>

			<td class="center">X</td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>Trident</td>
			<td>Internet Explorer 5.0</td>
			<td>Win 95+</td>
			<td class="center">5</td>

			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Trident</td>
			<td>Internet Explorer 5.5</td>
			<td>Win 95+</td>
			<td class="center">5.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Trident</td>
			<td class="read_only">Internet Explorer 6</td>
			<td>Win 98+</td>
			<td class="center">6</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Trident</td>
			<td>Internet Explorer 7</td>
			<td class="read_only">Win XP SP2+</td>
			<td class="center">7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Trident</td>
			<td>AOL browser (AOL desktop)</td>
			<td>Win XP</td>
			<td class="center">6</td>

			<td class="center read_only">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko (UTF-8: $¢€)</td>
			<td>Firefox 1.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Firefox 1.5</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">2.0</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Firefox 2.0</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Firefox 3.0</td>
			<td>Win 2k+ / OSX.3+</td>
			<td class="center">1.9</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Camino 1.0</td>
			<td>OSX.2+</td>
			<td class="center">2.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Camino 1.5</td>
			<td>OSX.3+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Netscape 7.2</td>
			<td>Win 95+ / Mac OS 8.6-9.2</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Netscape Browser 8</td>
			<td>Win 98SE+</td>
			<td class="center">1.7</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Netscape Navigator 9</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.1</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.2</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.2</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.3</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.3</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.4</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.4</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.5</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.6</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">1.6</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Mozilla 1.7</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">2.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Mozilla 1.8</td>
			<td>Win 98+ / OSX.1+</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Gecko</td>
			<td>Seamonkey 1.1</td>
			<td>Win 98+ / OSX.2+</td>
			<td class="center">2.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Gecko</td>
			<td>Epiphany 2.20</td>
			<td>Gnome</td>
			<td class="center">1.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>Safari 1.2</td>
			<td>OSX.3</td>
			<td class="center">125.5</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Webkit</td>
			<td>Safari 1.3</td>
			<td>OSX.3</td>
			<td class="center">312.8</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>Safari 2.0</td>
			<td>OSX.4+</td>
			<td class="center">419.3</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Webkit</td>
			<td>Safari 3.0</td>
			<td>OSX.4+</td>
			<td class="center">522.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>OmniWeb 5.5</td>
			<td>OSX.4+</td>
			<td class="center">420</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Webkit</td>
			<td>iPod Touch / iPhone</td>
			<td>iPod</td>
			<td class="center">420.1</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Webkit</td>
			<td>S60</td>
			<td>S60</td>
			<td class="center">413</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 7.0</td>
			<td>Win 95+ / OSX.1+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera 7.5</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 8.0</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera 8.5</td>
			<td>Win 95+ / OSX.2+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 9.0</td>
			<td>Win 95+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera 9.2</td>
			<td>Win 88+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Opera 9.5</td>
			<td>Win 88+ / OSX.3+</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Opera for Wii</td>
			<td>Wii</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Presto</td>
			<td>Nokia N800</td>
			<td>N800</td>
			<td class="center">-</td>

			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Presto</td>
			<td>Nintendo DS browser</td>
			<td>Nintendo DS</td>
			<td class="center">8.5</td>

			<td class="center">C/A<sup>1</sup></td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>KHTML</td>
			<td>Konqureror 3.1</td>
			<td>KDE 3.1</td>

			<td class="center">3.1</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>KHTML</td>
			<td>Konqureror 3.3</td>
			<td>KDE 3.3</td>

			<td class="center">3.3</td>
			<td class="center">A</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>KHTML</td>
			<td>Konqureror 3.5</td>
			<td>KDE 3.5</td>

			<td class="center">3.5</td>
			<td class="center">A</td>
		</tr>
		<tr class="odd_gradeX" id="2">
			<td>Tasman</td>
			<td>Internet Explorer 4.5</td>
			<td>Mac OS 8-9</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>Tasman</td>
			<td>Internet Explorer 5.1</td>
			<td>Mac OS 7.6-9</td>

			<td class="center">1</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeC" id="3">
			<td>Tasman</td>
			<td>Internet Explorer 5.2</td>
			<td>Mac OS 8-X</td>

			<td class="center">1</td>
			<td class="center">C</td>
		</tr>
		<tr class="even_gradeA" id="1">
			<td>Misc</td>
			<td>NetFront 3.1</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeA" id="5">
			<td>Misc</td>
			<td>NetFront 3.4</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">A</td>
		</tr>
		<tr class="even_gradeX" id="11">
			<td>Misc</td>
			<td>Dillo 0.8</td>
			<td>Embedded devices</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="odd_gradeX" id="2">
			<td>Misc</td>
			<td>Links</td>
			<td>Text only</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="even_gradeX" id="11">
			<td>Misc</td>
			<td>Lynx</td>
			<td>Text only</td>

			<td class="center">-</td>
			<td class="center">X</td>
		</tr>
		<tr class="odd_gradeC" id="3">
			<td>Misc</td>
			<td>IE Mobile</td>
			<td>Windows Mobile 6</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="even_gradeC" id="4">
			<td>Misc</td>
			<td>PSP browser</td>
			<td>PSP</td>

			<td class="center">-</td>
			<td class="center">C</td>
		</tr>
		<tr class="odd_gradeU" id="10">
			<td>Other browsers</td>
			<td>All others</td>
			<td>-</td>

			<td class="center">-</td>
			<td class="center">U</td>
		</tr>
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
</html>