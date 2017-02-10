<?php
	session_start();
	include '../headers/connect_to_mysql.php';
	include 'headers/_user-details.php';
	$name = "";
	$formAction = "";
	
	if(isset($_GET['id']))
{
		$id = $_GET['id'];
		$formAction = "?ANDid=$id";
		$query = "SELECT * FROM categories where id = $id ";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_array($result)
		or die ('error3');
		$name = $row['name'];
		$app_id = $row['app_id'];

	if($_POST)
	{
		$id=  $_GET['app_id'];
		$name = $_POST['app_name'];
		$app_id = $_POST['app_id'];
		$query = "UPDATE categories SET  name = '$name',app_id = '$app_id' WHERE id = '$id'";
		$result = mysqli_query($con,$query);
		header("Location: category.php?update=true");
	}
}	
else 
{
	if($_POST)
	{
		$name = $_POST['name'];
		$app_id = $_POST['app_id'];
		$query_inserting = "INSERT INTO categories(name,app_id)
		VALUES ('$name','$app_id')";
		mysqli_query($con,$query_inserting)
		or die('error while inserting Category');
		header("Location: category.php?insert=true");	
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
	<link href="../css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" href="../assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="../assets/chosen-bootstrap/chosen/chosen.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="../js/jquery-1.8.3.min.js"></script>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","insert_category.php?q="+str,true);
        xmlhttp.send();
	}
}
</script> 
<title>Avialdo -Dashboard </title>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script><script type="text/javascript">
//$(document).ready(function(){
		$("#subcategory").prop("disabled", false);

//});
</script>

   <script>
$(function () {
    var scntDiv = $('#addcategory');
    var i = $('#addCategory input').size() + 1;

    $('#addCategory').live('click', function () {
        $('<p><br /><label for="p_scnts"><span class="controls">\
		<input type="text" class="span5" id="p_scnt" size="20" name="p_scnt_' + i + '" value="" placeholder="Enter Category" /></label>\
		<button class="btn-danger" href="#" id="remScnt">Remove</button></span></p>').appendTo(scntDiv);
        i++;
        return false;
    });

    $('#remScnt').live('click', function () {
        $(this).parents('p').remove();


        return false;
    });
});
</script>
  <script>
$(function () {
    var scntDiv = $('#addSubcategory');
    var i = $('#addsubCategory input').size() + 1;

    $('#addsubCategory').live('click', function () {
        $('<p><br /><label for="p_scnts"><span class="controls">\
		<input type="text" class="span5" id="p_scnt" size="20" name="Sub_category_' + i + '" value="" placeholder="Enter Sub category" /></label>\
		<button class="btn-danger" href="#" id="remScnt">Remove</button></span></p>').appendTo(scntDiv);
        i++;
        return false;
    });

    $('#remScnt').live('click', function () {
        $(this).parents('p').remove();


        return false;
    });
});
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
                     Category
                     <small>Make your own Category</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                           <a href="app.php"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="category.php">Categorya</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Insert Category</a><span class="divider-last">&nbsp;</span></li>
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
                        <h4><i class="icon-reorder"></i>Insert Category</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                         </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM 1-->
						  <div class="control-group">
                               <div class="controls">
                                 <label class="radio">
                                 <input onClick="myFunction()" id="hide" type="radio" name="optionsRadios1" value="option1" checked  />
                                 Category
                                 </label>
                                 <label class="radio">
                                 <input onClick="myFunction()" id="show" type="radio" name="optionsRadios1" value="option2"   />
                               Sub Category
                                 </label> 
								</div>
							</div>								 
                        <form style="display:block;" action="insert_category.php<?php echo $formAction; ?>" method="post" id="form1"
                         class="form-horizontal">
                             <div class="control-group">
                              <label class="control-label">App Name</label>
                              <div class="controls">
                                 <select class="span6 chosen" name="app_id" data-placeholder="Choose a Category"  tabindex="1">
									<?php echo include 'headers/app_detail.php'; ?>
                                 </select>
                              </div>
                           </div>
                         <div class="control-group">
                              <label class="control-label">Category Name</label>
                              <div id="addcategory">
							  <div class="controls">
                                 <input required name="name" value="<?php echo $name; ?>" 
                                 placeholder="Enter Your Category Name" type="text" class="span6 " />
                              </div>
							  </div>
                          </div>
                      <span id="responce"></span>
    			<div class="form-actions clearfix">
				<input type="submit"  class="btn btn-success " />
             <button name="button" id="addCategory" type="button" class="btn btn-warning"> Add New <i class="icon-plus"></i> </button>
                   </div>
                              </form>
                            <!-- END FORM 1-->
                            <!--BRGIN FORM 2-->
                 <form action="insert_category.php<?php echo $formAction; ?>" id="form2" 
                 style="display:none" method="post" class="form-horizontal">
                             <div class="control-group">
                              <label class="control-label">App Name</label>
                              <div class="controls">
                                 <select onchange="showUser(this.value)" class="span6 chosen" id="category" style="width: 428px;" 
                                 name="app_id" data-placeholder="Choose a Category" tabindex="1">
									<?php $query_select = "SELECT * FROM app";
									$result_select = mysqli_query($con,$query_select)
									or die ('error'); 
									while($row = mysqli_fetch_array($result_select))
									{
									$app_id = $row['app_id'];
									$app_name = $row['app_name'];
									echo"
									<option value=''></option>
									<option value='$app_id'>$app_name</option>
									";                                
									 } 
									 ?>
                                 </select>
                              </div>
							   </div>
                           <div class="control-group">
                              <label class="control-label">Category Name</label>
                              <div class="controls">
							  <div id="txtHint"><b>First info will be listed here...</b></div>
                                 <?php echo include 'headers/category_detail.php'; ?>
                                  </div>
                           </div>
						    <div id="addSubcategory">
                         <div class="control-group">
                              <label class="control-label">Subcategory Name</label>
                              <div class="controls">
                                 <input  required name="name" value="" 
                                 placeholder="Enter Your Category Name" type="text" class="span6 " />
                                 </div>
                              </div>
                          </div>

                      			 <span id="responce1"></span>
    			<div class="form-actions clearfix">
				<input type="submit"  class="btn btn-success " />
             <button name="button" id="addsubCategory" type="button" class="btn btn-warning"> Add New <i class="icon-plus"></i> </button>

                   </div>
                              </form>

                            
                            <!--END FORM 2-->
                        
                        
                        
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
<script src="../js/jquery-1.4.4.min.js"></script>  
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

 <script>
function myFunction() {
	var ele1 = document.getElementById("form1");
	var ele2 = document.getElementById("form2");
	if(ele1.style.display == "block")
	{
		ele1.style.display = "none";
		ele2.style.display = "block";
  	}
	else if (ele1.style.display == "none"){
	ele1.style.display = "block";
		ele2.style.display = "none";
	
	}
}
</script>



</body>
</html>

