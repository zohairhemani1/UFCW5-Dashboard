<?php
	include 'session.php';
	include 'headers/connect_to_mysql.php';	
	$stayConected_id = $_GET['stayConected_id'];
	$category = $_GET['category'];
	
	if($_POST)
	{
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$address = $_POST['address'];
		$phone_no1 = $_POST['phone_no1'];
		$phone_no2 = $_POST['phone_no2'];
		$fax_no = $_POST['fax_no'];
		$email =  $_POST['email']; 
		$query = "UPDATE stayConected  SET   name = '$name',designation = '$designation', address = '$address',
		 phone_no1 = '$phone_no1', phone_no2 = '$phone_no2',fax_no = '$fax_no', email = '$email',time_cone = Now()  WHERE stayConected_id = '$stayConected_id'";
		$result = mysqli_query($con,$query);
		header ("Location: stayConected.php?update=true");
	}
	else
	{
		$query = "SELECT * FROM stayConected  where stayConected_id = ${stayConected_id}";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_assoc($result)
		or die ('error31');
		$name = $row['name'];
		$designation = $row['designation'];
		$address = $row['address'];
		$phone_no1 = $row['phone_no1'];
		$phone_no2 = $row['phone_no2'];
		$fax_no = $row['fax_no'];
		$email =  $row['email']; 

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
<script src="jquery/bootstrap.min.js"></script>
<script src="jquery/jquery-1.11.1.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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

function formatText(el,tag,img)
{
	alert(tag +"  el"+el);
if (tag!='img')
{
	var textField=document.selection?document.selection.createRange().text:el.value.substring(el.selectionStart,el.selectionEnd);// IE:Moz1

}

else 
	{

		var textField=el;	
		
		alert('image tag inserted' );

	}

		var newText='<'+tag+'>'+textField+'</'+tag+'>';


if(document.selection){//IE

	document.selection.createRange().text=newText;
}
else{//Moz

el.value=el.value.substring(0,el.selectionStart)+newText+el.value.substring(el.selectionEnd,el.value.length);

}
		$(document).ready( function() {
		
		$('#uploadit').change(function(e){
			
	
	 alert(e.target.files[0].name);
	 
  formatText (e.target.files[0].name,'img');
	
});


	});


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
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert_stayConected.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
    <button type="submit" class="btn btn-success">Search</button>

    </form>
  </div>
  <div id="box">
    <form id="box1" class="form-horizontal" role="form" action="<?php 'update_stayConected.php?stayConected_id=${stayConected_id}'?>" method="post" enctype="multipart/form-data">
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Update Stay Conected</font> </p>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="name" value="<?php echo $name;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
          Maximum Character
          <input readonly type="text" name="countdown" value="200" />
        </div>
      </div>
     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Designation</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="designation" value="<?php echo $designation;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <textarea rows="5" class="form-control" id="inputEmail3" placeholder="" name="address" onKeyDown="limitText(this.form.title,this.form.countdown1,2000);" onKeyUp="limitText(this.form.title,this.form.countdown1,2000);" />
          <?php echo $address;  ?>
          </textarea>
          <br>
          <input type="button" value="Bold" onClick="formatText (description,'b');" />
          <input type="button" value="Italic" onClick="formatText (description,'i');" />
          <input type="button" value="Underline" onClick="formatText (description,'u');" />
          <input type="file" name="file" id="uploadit" onClick="formatText (description,'img');"  />
          Maximum Character
          <input readonly type="text" name="countdown1" value="2000" />
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Phone-No(1)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="phone_no1" value="<?php echo $phone_no1;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Phone-No(2)</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="phone_no2" value="<?php echo $phone_no2;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />

        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >fax_No</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="fax_no" value="<?php echo $fax_no;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="email" value="<?php echo $email;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
         </div>
      </div>
      <button type="submit" class="btn btn-default" id="button_stay">Submit StayConected</button>
      </form>
<br>
</div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>
    </div>
</body>
</html>
