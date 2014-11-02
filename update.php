<?php
	include 'headers/connect_to_mysql.php';	
	$news_id = $_GET['news_id'];
	
	
	if($_POST)
	{
	include 'headers/image_upload.php';

	$title = $_POST['title'];
	$description = $_POST['description'];
	$query = "UPDATE news SET time_cone = Now(),  title = '$title',file = '$file', description = '$description' WHERE news_id = '$news_id'";
	$result = mysqli_query($con,$query)
	
	or die ('error2');
	header ('Lcation: news.php?message=true');
	}
	else
	{
		$query = "SELECT * FROM news where news_id = ${news_id} LIMIT 50 ";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_assoc($result)
		or die ('error3');
		$title = $row['title'];
		$description = $row['description'];
		$file = $row['file'];


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
    <div id="logo">
    <center><img src="images/logo.png" name="logo" alt="">
	<p class="large_text">YOUR NEIGHBORHOOD UNION</p>
    <p class="small_text">Standing together to improve the lives of our members, our families and our community.</p>
	</center>
</div>
     <div class="nav1">
     	<?php include 'headers/header_navigation.php'; ?>
	 </div>
<div class="fomr">
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data"
    action="<?php 'update.php?news_id=${news_id}'?>" method="post">
      <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
    <a href="insert.html">  <button type="button" onClick="resets()" class="btn btn-primary">Add News</button></a> 
      <a href="NegotiationUpdates_insert.html"><button type="button" onClick="resets()" class="btn btn-primary">Add Negotiation Updates</button></a>
</form>
  </div> 
   <div id="box">
<form id="box1" class="form-horizontal" role="form" action="<?php 'update.php?news_id=${news_id}'?>" method="post" enctype="multipart/form-data">
  <div class="list-group">
  <p class="list-group-item disabled">
    <font size="3px">Insert News</font>
  </p>  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" >News title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="title" value="<?php echo $title;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
Maximum Character <input readonly type="text" name="countdown" value="200" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea rows="5" class="form-control" id="inputEmail3" placeholder="" name="description" onKeyDown="limitText(this.form.title,this.form.countdown1,2000);" onKeyUp="limitText(this.form.title,this.form.countdown1,2000);" />
<?php echo $description;  ?>
      </textarea><br>
      <input type="button" value="Bold" onClick="formatText (description,'b');" />
<input type="button" value="Italic" onClick="formatText (description,'i');" />
<input type="button" value="Underline" onClick="formatText (description,'u');" />
<input type="file" name="file" id="uploadit" onClick="formatText (description,'img');"  />



      Maximum Character <input readonly type="text" name="countdown1" value="2000" />
    </div>
  </div>
  <div class="form-group" id="image"> 
 <label for="file">News Image</label>
<input type="file" name="file" value =""  ><br>
</div>
	<div class="display">
    <img src="upload/<?php echo $file;?>" id="display"/>
</div>


  <button type="submit" class="btn btn-default" id="button" formmethod="post">Post</button>
 
</form>
</div>
</div>
</body>
</html>
