<?php

include 'session.php';
include 'image.php';
	include 'headers/connect_to_mysql.php';	
	$app_id = $_GET['app_id'];
	$category = $_GET['category'];
	if($_POST)
	{
		include 'headers/image_logo.php';
		include 'headers/image_cover.php';		
		$name = $_POST['name'];
		$query = "UPDATE app_name SET time_cone = now(),  name = '$name', logo = '$logo', cover = '$cover' WHERE app_id = '$app_id'";
		$result = mysqli_query($con,$query);
		header("Location: app_name.php?update=true");
		}
	else
	{
		$query = "SELECT * FROM app_name where app_id like ${app_id}";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_array($result)
		or die ('error3');
		$name = $row['name'];
		$logo = $row['logo'];
		$cover = $row['cover'];
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<name>UFCW 5 update</name>
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
			
	
	 alert(e.target.covers[0].name);
	 
  formatText (e.target.covers[0].name,'img');
	
});


	});


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
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>

    </form>
  </div>
  <div id="box">
    <form id="box1" class="form-horizontal" role="form" action="<?php 'update_app.php?app_id=${app_id}'?>" method="post" enctype="multipart/form-data">
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Update App</font> </p>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label" >Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" placeholder="" name="name" value="<?php echo $name;  ?>" onKeyDown="limitText(this.form.name,this.form.countdown,200);" onKeyUp="limitText(this.form.name,this.form.countdown,200);" />
          Maximum Character
          <input readonly type="text" name="countdown" value="200" />
        </div>
      </div>
     <!-- <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>
        <div class="col-sm-10">
          <textarea rows="5" class="form-control" id="inputEmail3" placeholder="" name="logo" onKeyDown="limitText(this.form.name,this.form.countdown1,2000);" onKeyUp="limitText(this.form.name,this.form.countdown1,2000);" />
          php echo $logo;  ?>
          </textarea>
          <br>
          <input type="button" value="Bold" onClick="formatText (logo,'b');" />
          <input type="button" value="Italic" onClick="formatText (logo,'i');" />
          <input type="button" value="Underline" onClick="formatText (logo,'u');" />
          <input type="cover" name="cover" id="uploadit" onClick="formatText (logo,'img');"  />
          Maximum Character
          <input readonly type="text" name="countdown1" value="2000" />
        </div>
      </div>
      <div class="form-group" id="image">
        <label for="cover">News Image</label>
        <input type="cover" name="cover" value =""  >
        <br>
      </div>
      <!--<div class="display"> <img src="upload/</div>/?php echo $cover;?>" id="display"/> </div>-->-->
      <button type="submit" class="btn btn-default" id="button" formmethod="post">Post</button>
    </form>
  </div>
</div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>
    </div>

</body>
</html>
