<?php
	include 'session.php';
	include 'image.php';
	include 'headers/connect_to_mysql.php';	
	$app_id = $_SESSION['app_id'];


if($_POST)
{
//	include 'parse.php';
	
    
    
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$address = $_POST['address'];
		$phone_no1 = $_POST['phone_no1'];
		$phone_no2 = $_POST['phone_no2'];
		$fax_no = $_POST['fax_no'];
		$email =  $_POST['email']; 
		
	$query = "INSERT INTO stayConected (name,designation,address,phone_no1,phone_no2,fax_no,email,time_cone,app_id)
	VALUES ('$name','$designation','$address','$phone_no1','$phone_no2','$fax_no','$email',now(),'$app_id')";
	mysqli_query($con,$query)
	or die('error1');
		header ("Location: stayConected.php?insert=true");

	

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5 -StayConected </title>
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
			<p class="left">	<?php echo strtoupper($username) ; ?>&nbsp; | &nbsp; <a href="logout.php">Logout</a> </p>
			 </div>    

			<div id="logo">
			<center><img src="logo/<?php echo $logo; ?>" name="logo" alt="">
			</center>
			</div>
			 <div class="nav1">
		  <?php include 'headers/header_navigation.php'; ?>

</div> 
   <div class="fomr">
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert_stayConected.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <a href="insert_stayConected.php">
      	<button type="button" class="btn btn-primary">Add Stay Conected
        </button>
      </a>

    </form>
  </div>
  <div id="box">
    <form id="box1" name="form" class="form-horizontal" role="form" action="insert_stayConected.php" method="post" enctype="multipart/form-data" onsubmit = "return validateForm()">
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Insert StayConected </font> </p>
      </div>
      <div class="form-group"> 
        <label for="inputEmail3" class="col-sm-2 control-label" >Name</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter  News title" name="name" />
          <br>
        </div>
      </div>
      <div class="form-group"> 
        <label for="inputEmail3" class="col-sm-2 control-label" >Designation</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter  Designation" name="designation">
          <br>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <textarea  required  class="form-control" id="inputEmail3" placeholder="Enter Address" name="address"></textarea>
          <br>
        </div>
      </div>
            <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Phone_No(1)</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter Phone_no(1)" name="phone_no1" onKeyDown="limitText(this.form.title,this.form.countdown2,10);" onKeyUp="limitText(this.form.title,this.form.countdown2,10);" />
         </div>
      </div>
            <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Phone_No(2)</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter phone_no(2)" name="phone_no2" onKeyDown="limitText(this.form.title,this.form.countdown3,10);" onKeyUp="limitText(this.form.title,this.form.countdown3,10);" />
         </div>
      </div>
	            <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Fax_No</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter Fax_no" name="fax_no" onKeyDown="limitText(this.form.title,this.form.countdown4,10);" onKeyUp="limitText(this.form.title,this.form.countdown4,10);" />
         </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter Email" name="email" />
        </div>
      </div>

        <button type="submit" class="btn btn-default" id="button_stay">Submit StayConected</button>
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

