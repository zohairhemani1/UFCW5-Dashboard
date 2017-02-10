<?php

		include 'headers/connect_to_mysql.php';
		include 'session.php';
		include 'image.php';
		include 'headers/image_info.php';
	$app_id = $_GET['app_id'];
	$category = $_GET['category'];
	if($_POST)
	{
		include 'headers/image_logo.php';
		include 'headers/image_cover.php';		
		$name = $_POST['name'];
		$query = "UPDATE user SET time_cone = now(),  name = '$name', logo = '$logo', cover = '$cover' WHERE app_id = '$app_id'";
		$result = mysqli_query($con,$query);
		header("Location: info.php?update=true");
		}
	else
	{
		$query = "SELECT * FROM user where app_id like ${app_id}";
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
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>UFCW 5</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" >
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/styles.css" type="text/css" rel="stylesheet">
<script src="jquery/bootstrap.min.js"></script>
<script src="jquery/jquery-1.11.1.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		if(result == true){
			return true;
			}
		else{
			return false;
		}
	}
	</script>
       <script src="js/responsive-nav.js"></script>
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
             <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="nav" data-toggle="dropdown" role="button" aria-expanded="false">
          <img src="images/arbish.jpg" width="15px" height="20px"> &nbsp;<?php echo  strtoupper($username);?>
           <span class="caret"></span></a>
         
          <ul class="dropdown-menu" role="menu">
            <li><a href="info.php">Account info</a></li>
            <li><a href="help.php">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>

      </ul>
</p>
</div>
		</div></div>	
			<div id="logo">
		    <header style="background-color:<?php echo $color;?>">
           <center>
      <div class='logo'><img class="size" src="images/logo/<?php echo $logo;?>" border="0" alt="Null"></div>
		  </center>
		  <?php include 'headers/header_navigation.php'; ?>
</div>
</div>
     </header>
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
 <script src='js/fastclick.js'></script>
<script src='js/scroll.js'></script>
<script src='js/fixed-responsive-nav.js'></script>
 
    </body>
    </html>
 
    <script>
      var navigation = responsiveNav("#nav1", {
        customToggle: "#nav-toggle"
      });
    </script>
