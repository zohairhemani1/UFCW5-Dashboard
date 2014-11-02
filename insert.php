<?php
$category = $_GET['category'];

if($_POST)
{
	include 'headers/connect_to_mysql.php';	
	include 'headers/image_upload.php';
	
    
    
	$title = $_POST['title'];
	$description = $_POST['description'];
	$query = "INSERT INTO news(title,description,file,time_cone,category)
	VALUES ('$title','$description','$file',now(),'$category')";
	mysqli_query($con,$query)
	or die('error');
}	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UFCW 5 -<?php echo $category; ?></title>
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
  <div id="logo">
    <center>
      <img src="images/logo.png" name="logo" alt="">
      <p class="large_text">YOUR NEIGHBORHOOD UNION</p>
      <p class="small_text">Standing together to improve the lives of our members, our families and our community.</p>
    </center>
  </div>
  <div class="nav1">
    <?php include 'headers/header_navigation.php'; ?>
  </div>
  <div class="fomr">
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data"
    action="insert.php?category=<?php echo $category; ?>" method="post" >
      <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <a href="insert.html">
      <button type="button" onClick="resets()" class="btn btn-primary">Add News</button>
      </a> <a href="NegotiationUpdates_insert.html">
      <button type="button" onClick="resets()" class="btn btn-primary">Add Negotiation Updates</button>
      </a>
    </form>
  </div>
  <div id="box">
    <form id="box1" name="form" class="form-horizontal" role="form" action="insert.php?category=<?php echo $category; ?>" method="post" enctype="multipart/form-data" onsubmit = "return validateForm()">
      <div class="list-group">
        <p class="list-group-item disabled"> <font size="3px">Insert News</font> </p>
      </div>
      <div class="form-group"> 
        <!--<div id="errorMessage1"></div>-->
        <label for="inputEmail3" class="col-sm-2 control-label" >News title</label>
        <div class="col-sm-10">
          <input required type="text" class="form-control" id="inputEmail3" placeholder="Enter  News title" name="title" onKeyDown="limitText(this.form.title,this.form.countdown,200);" 
onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
          Maximum characters:
          <input readonly type="text" name="countdown" size="1"  value="200">
          <br>
        </div>
      </div>
      <!--<div id="errorMessage2"></div>-->
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          <textarea  required  class="form-control" id="inputEmail3" placeholder="Enter Description" name="description" onKeyDown="limitText(this.form.description,this.form.countdown1,2000);" onKeyUp="limitText(this.from.description,this.form.countdown1,2000);"></textarea>
          <br>
          <input type="button" value="Bold" onClick="formatText (description,'b');" />
          <input type="button" value="Italic" onClick="formatText (description,'i');" />
          <input type="button" value="Underline" onClick="formatText (description,'u');" />
          Maximum Charachter:
          <input readonly type="text" name="countdown1" value="2000" size="2"  />
        </div>
      </div>
      <div class="form-group" id="image">
        <label for="file">News Image</label>
        <input type="file" name="file" id="file" >
        <br>
      </div>
      <button type="submit" class="btn btn-default" id="button">Post</button>
    </form>
  </div>
</div>
</body>
</html>