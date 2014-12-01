<?php
	include 'session.php';
	include 'headers/connect_to_mysql.php';	
	include 'headers/image_upload.php';

$category = $_GET['category'];

if($_POST)
{
//	include 'parse.php';
	
    
    
		$office_title = $_POST['office_title'];
		$address = $_POST['address'];
		$phone_no = $_POST['phone_no'];
		$website = $_POST['website'];
		
	$query = "INSERT INTO location(office_title,address,phone_no,website,file,time_cone)
	VALUES ('$office_title','$address','$phone_no','$website','$file',now())";
	mysqli_query($con,$query)
	or die('error1');
	header ('Location: location.php?insert=true');
	
/*	$pushNotification = $_POST['pushNotification'];
	$notificationMessage = "A new news has been inserted.";
	
	if(isset($pushNotification))
	{
		pushNotification($notificationMessage);
		echo "Push Sent.";
	}
	
	*/
	//header ('location.php?insert=true');
		
	

}	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5 -location</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/highlight.css" rel="stylesheet">
<link href="css/bootstrap-switch.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="jquery/bootstrap.min.js"></script>
<script src="js/highlight.js"></script>
<script src="js/bootstrap-switch.js"></script>

<script type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
<script type="text/javascript">
function formatText(el,tag){
var selectedText=document.selection?document.selection.createRange().text:el.value.substring(el.selectionStart,el.selectionEnd);// IE:Moz1
var newText='<'+tag+'>'+selectedText+'</'+tag+'>';
if(document.selection){//IE
document.selection.createRange().text=newText;
}
else{//Moz
el.value=el.value.substring(0,el.selectionStart)+newText+el.value.substring(el.selectionEnd,el.value.length);
}
}
</script>
</head>

<body>
<div id="wrapper">
     <div id="login">
    <p class="left">	<?php echo  strtoupper($username);?> &nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a> </h4>	
    </div>    

  <div id="logo">
    <center>
      <img src="images/logo.png" name="logo" alt="">
     <div class="nav1">
    <?php include 'headers/header_navigation.php'; ?>
  </div>
    </center>
  </div>
    <div class="fomr">
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert_location.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <a href="insert_location.php">
      	<button type="button" class="btn btn-primary">Add Location</button></a>

    </form>
  </div>
  <div id="box">
    <form id="box1" name="form" class="form-horizontal" role="form" action="insert_location.php" method="post" enctype="multipart/form-data" onsubmit = "return validateForm()">
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Insert Location</font> </p>
      </div>
      <div class="form-group"> 
 
        <label for="inputEmail3" class="col-sm-2 control-label" >Office title</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter  News title" name="office_title" />
          <br>
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Adress</label>
        <div class="col-sm-10">
          <textarea  required  class="form-control" id="inputEmail3" placeholder="Enter Description" name="address" ></textarea>
        </div>
      </div>
            <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Phone_No</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="" name="phone_no"/>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Website</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="" name="website" />
        </div>
      </div>

 <!--            <div class="form-group" id="image">
        
        <input type="file" name="file" id="file" >
        </p>
        <br>
      </div>-->
      <button type="submit" class="btn btn-default" id="button">Submit Location</button>
    </form>
         
</div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>
    </div>

<script>
$("[name='pushNotification']").bootstrapSwitch();
</script>

</body>
</html>

