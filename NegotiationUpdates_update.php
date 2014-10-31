<?php
	include 'headers/connect_to_mysql.php';	
	$update_id = $_GET['update_id'];
	
	
	if($_POST)
	{
	include 'headers/image_upload.php';

	$title = $_POST['title'];
	$description = $_POST['description'];
	$query = "UPDATE Negotiation_Updates SET time_cone = now(),  title = '$title',file = '$file', description = '$description' WHERE update_id = '$update_id'";
	$result = mysqli_query($con,$query)
	or die ('error2');
		
	}
	else
	{
		$query = "SELECT * FROM Negotiation_Updates where update_id = ${update_id} LIMIT 50 ";
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
    <center><img src="images/logo.png" name="logo" alt="">
	<p class="large_text">YOUR NEIGHBORHOOD UNION</p>
    <p class="small_text">Standing together to improve the lives of our members, our families and our community.</p>
	</center>
</div>
     <div class="nav1">
     <nav id='myNavbar' class='navbar navbar-default' role='navigation'>

            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav'>
                    <li><a href='index.html'>Home</a></li>
                     <li class='dropdown'>
                        <a href='#' data-toggle='dropdown' class='dropdown-toggle'>NEWS <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
						    <li><a href='insert.html'>ADD NEWS</a></li>
                            <li><a href='news.php'>UPDATE NEWS</a></li>
                        </ul>
                    </li>

                     <li class='dropdown'>
                        <a href='#' data-toggle='dropdown' class='dropdown-toggle'>Negotiation Updates <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
						    <li><a href='NegotiationUpdates_insert.html'>ADD NEGOTIATION UPDATES</a></li>
                            <li><a href='NegotiationUpdates_news.php'>UPDATE NEGOTIATION UPDATES</a></li>
                        </ul>
                    </li>
</ul>
</div>
</nav>
</div>
<div class="fomr">
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data"
    action="<?php 'NegotiationUpdates_update.php?update_id=${update_id}'?>" method="post">
      <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
          <button type="submit" class="btn btn-success">Search</button>
          <a href="insert.html"><button type="button" onclick="resets()" class="btn btn-primary">Add News</button></a>

    <a href="NegotiationUpdates_insert.html">  <button type="button" onclick="resets()" class="btn btn-primary">Add Negotiation Updates</button></a> 
</form>
  </div> 
   <div id="box">
<form id="box1" class="form-horizontal" role="form" action="<?php 'NegotiationUpdates_update.php?update_id=${update_id}'?>" method="post" enctype="multipart/form-data">
  <div class="list-group">
  <p class="list-group-item disabled">
    <font size="3px">Insert Negotiation Updates</font>
  </p>  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" >News title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="" name="title" value="<?php echo $title;  ?>" onKeyDown="limitText(this.form.title,this.form.countdown,200);" onKeyUp="limitText(this.form.title,this.form.countdown,200);" />
Maximum Character <input readonly type="text" name="countdown" value="200" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">News Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputEmail3" placeholder="" name="News description" onKeyDown="limitText(this.form.title,this.form.countdown1,2000);" onKeyUp="limitText(this.form.title,this.form.countdown1,2000);" />
<?php echo $description;  ?>
      </textarea><br>
            <input type="button" value="Bold" onclick="formatText (description,'b');" />
<input type="button" value="Italic" onclick="formatText (description,'i');" />
<input type="button" value="Underline" onclick="formatText (description,'u');" />

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
