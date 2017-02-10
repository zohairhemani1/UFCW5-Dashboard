<?php
	include '../headers/connect_to_mysql.php';
	$formAction = "";
if(isset($_GET['uniqueID']))
{	
		$uniqueID = $_GET['uniqueID'];
		$formAction = "?uniqueID=$uniqueID";
		$query = "SELECT * FROM app_relation where id = {$uniqueID}";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_array($result)
		or die ('error3');
		$catID = $row['catID'];
		$parentID = $row['parentID'];
		
if($_POST)
	{
		$uniqueID = $_GET['uniqueID'];
		$catID = $_POST['catID'];
		$parentID = $_POST['parentID'];
		$query = "UPDATE app_relation SET  catID = '$catID', parentID = '$parentID' WHERE id = '$uniqueID'";
		$result = mysqli_query($con,$query);
		header("Location: parent.php?update=true");
	}
}	
else 
{
	if($_POST)
	{
		$catID = $_POST['catID'];
		$parentID = $_POST['parentID'];
		$query_inserting = "INSERT INTO app_relation(catID,parentID)
		VALUES ('$catID','$parentID')";
		mysqli_query($con,$query_inserting)
		or die('error while inserting Parrent');
		header("Location: parent.php?insert=true");	
	}	
}

?>

<!doctype html>
<html>
<head>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   	<link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   	<link href="../css/style.css" rel="assets" />
   	<link href="../css/style_responsive.css" rel="stylesheet" />
   	<link href="../css/style_default.css" rel="stylesheet" id="style_color" />
   	<link href="../assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   	<link rel="stylesheet" type="text/css" href="../assets/uniform/css/uniform.default.css" />
   	<link rel="stylesheet" type="text/css" href="../assets/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
   	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   	<link rel="stylesheet" type="text/css" href="../assets/jquery-tags-input/jquery.tagsinput.css" />    
   	<link rel="stylesheet" href="../assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   	<link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="../assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" />
	<link href="../css/style_responsive.css" rel="stylesheet" />
	<link href="../css/custom.css" rel="stylesheet" />
	<link href="../css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" href="../assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="../assets/chosen-bootstrap/chosen/chosen.css" />
      <script src="../js/jquery-1.8.3.min.js"></script>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } 
	else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
            $('#loader-icon').show();
				$("#catID").prop("disabled", true);
		} else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				$('#loader-icon').hide();
				$("#catID").prop("disabled", false);
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			}
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
	}
	var selectBox = document.getElementById("change");
    var selectedValue = selectBox.options[change.selectedIndex].value;
	var selectBox1 = document.getElementById("child");
    var selectedValue1 = selectBox.options[child.selectedIndex].value;
    if(selectedValue == selectedValue1){
		alert('Sorry parrent name and child name can not be same  ');
				$("#buttonActivate").prop("disabled", true);
	}
	else
	{
				$("#buttonActivate").prop("disabled", false);
	}
	
	}

</script>

<title>LinkedUnion -Dashboard </title>

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
                     Parent Child
                     <small>Adjust your Parent Child</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                           <a href="app.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="webservices.php">Parent Child</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert Parent Child</a><span class="divider-last">&nbsp;</span></li>
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
                        <h4><i class="icon-reorder"></i>Insert Webservice Category</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                         </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="insert_parent.php<?php echo $formAction; ?>" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Parent</label>
                              <div class="controls">
                                 <select required id="change" class="span6 chosen" name="parentID" data-placeholder="Choose your parent" tabindex="1">
									<?php echo include 'headers/app_detail.php'; ?>
                                 </select>
                              </div>
                           </div>
                            <div class="control-group">
                              <label class="control-label">Child</label>
                              <div class="controls">
                                 <select required id="child" onchange="showUser(this.value)" class="span6 chosen" name="child" data-placeholder="Choose your Child" tabindex="1">
									<?php echo include 'headers/app_detail.php'; ?>
                                 </select>
                              </div>
							  <img id="loader-icon" style = "display:none;" width="70px" src="../assets/pre-loader/LoaderIcon.gif" alt="Triangles indicator" />
							  
							<br>
							<div id="txtHint"><b></b></div>
                           </div>
    			<div class="form-actions clearfix">
				<input id="buttonActivate" type="submit" class="btn btn-success " />
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

 
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="../js/jquery-1.8.3.min.js"></script>
   <script src="../assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
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
   <script type="text/javascript" src="../assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="../assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="../assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
	<script type="text/javascript" src="../assets/bootstrap-daterangepicker/date.js"></script> 
    <script type="text/javascript" src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
    <script type="text/javascript" src="../assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> 
    <script type="text/javascript" src="../assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> 
   <script src="../js/scripts.js"></script>
      <script src="../js/table-editable.js"></script>
         <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
		 UIJQueryUI.init();
      });
   </script>

</body>
</html>

