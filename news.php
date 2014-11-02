<?php
	include 'headers/connect_to_mysql.php';
	$category = $_GET['category'];
	
	$query = "SELECT * FROM news WHERE category like '$category' LIMIT 50";
	$result = mysqli_query($con,$query);

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
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <a href="insert.php?category=<?php echo $category; ?>">
      	<button type="button" class="btn btn-primary">Add <?php echo $category; ?>
        </button>
      </a>


    </form>
  </div>
	   <?php
  if($_GET['messag']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'>Your News <b>successfully</b> deleted</div>";
   	header  ('location: news.php') ; 	 
	}
	else{
	
	}
   
	  if($_GET['message']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'>Your News <b>successfully</b> updated</div>";
   	header  ('Location: news.php') ; 	 
	}
	else{
	
	}
     	if($_GET['mesage']== 'true'){
    echo"
    <div class='alert alert-success' role='alert'>Your News <b>successfully</b> inserted</div>";
   	header  ('Location: news.php') ; 	 
	}
    ?> 
    
       <form class="table1" action="" method="post">
          <table class="table table-bordered">
        <thead>
          <tr>
            <th class="small">#</th>
            <th>NEWS</th>
            <th>ACTION</th>
  	          </tr>
        </thead>
        <tbody>
<?php			
  	$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
echo "<div class='empty'><h1 class ='news'><img src='images/1.png' width='50px' height='44px' class='face'>No News found.</h1>  <br>Are yoy looking for some News?<br> <a href='NegotiationUpdates_insert.html'>Add Some News</a>  </div>";
}
else{ 
	while($row = mysqli_fetch_array($result)){
	$news_id = $row['news_id'];
    $title = $row['title'];
         echo"<tr>";

    echo"<td>${news_id}</td>";
 	echo "<td>${title}</td>";
 echo"<td>
        <a href='update.php?news_id=${news_id}'<button type='button' class='btn btn-primary btn-lg btn-block' id='button1'>UPDATE</button></a>
        <a href='delete.php?news_id=${news_id}' onClick='return deleteConfirm(30);'><button type='button' class='btn btn-default btn-lg btn-block' id='button2'>DELETE</button></a>
        <a href='view.php?news_id=${news_id}'><button type='button' class='btn btn-default btn-lg btn-block' id='button2'>VIEW HTML</button></a>
</td>
          </tr>";
       }        
}
?>
           </tboby>
		  </table>
	</form>
</div>