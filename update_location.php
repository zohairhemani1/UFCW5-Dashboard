<?php
	include 'session.php';

	include 'headers/connect_to_mysql.php';	
	$office_id = $_GET['office_id'];
	$category = $_GET['category'];
	
	if($_POST)
	{
		include 'headers/image_upload.php';
		$office_title = $_POST['office_title'];
		$address = $_POST['address'];
		$phone_no = $_POST['phone_no'];
		$website = $_POST['website'];
		$query = "UPDATE location SET time_cone = now(),  office_title = '$office_title',file = '$file', address = '$address',
		 phone_no = '$phone_no',website = '$website'  WHERE office_id = '$office_id'";
		$result = mysqli_query($con,$query);
		header ('Location: location.php?update=true');
	}
	else
	{
		$query = "SELECT * FROM location where office_id = ${office_id}";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_assoc($result)
		or die ('error3');
		$office_title = $row['office_title'];
		$address = $row['address'];
		$file = $row['file'];
		$phone_no = $row['phone_no'];
		$website = $row['website'];
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5</title>
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
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
    <button type="submit" class="btn btn-success">Search</button>

      </div>
    </form>
  </div>
  <div id="box">
    <form id="box1" class="form-horizontal" role="form" action="<?php 'update_location.php?office_id=${office_id}'?>" method="post" enctype="multipart/form-data">
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Insert Location</font> </p>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Office title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="office_title" value="<?php echo $office_title;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
          Maximum Character
          <input readonly type="text" name="countdown" value="200" />
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
        <label for="inputEmail3" class="col-sm-2 control-label" >Phone-No</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="phone_no" value="<?php echo $phone_no;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
          Maximum Character
          <input readonly type="text" name="countdown" value="200" />
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Website</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="website" value="<?php echo $website;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
          Maximum Character
          <input readonly type="text" name="countdown" value="200" />
        </div>
      </div>

      <div class="form-group" id="image">
        <label for="file">News Image</label>
        <input type="file" name="file" value =""  >
        <br>
      </div>
      <div class="display"> <img src="upload/<?php echo $file;?>" id="display"/> </div>
      <button type="submit" class="btn btn-default" id="button" formmethod="post">Post</button>
    </form>
  </div>
</div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>
    </div>

</body>
</html>
