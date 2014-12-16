<?php
	include 'session.php';
	include 'image.php';
	include 'headers/connect_to_mysql.php';
	$category = $_GET['category'];
	$app_id = $_SESSION['app_id'];
	$query = "SELECT * FROM location where app_id like '$app_id' LIMIT 50";
	$result = mysqli_query($con,$query);

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name=viewport content="width=device-width, initial-scale=1">
<title>UFCW 5-Location</title>
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
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert_location.php">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <a href="insert_location.php">
      	<button type="button" class="btn btn-primary">Add Location	
        </button>
      </a>


    </form>
  </div>
	   <?php
  if($_GET['delete']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your Location has been deleted.</div>";
  }
   else{
	
	}
	  if($_GET['update']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your  Location has been updated</div>";	 
	}
	else{
	
	}
     	if($_GET['insert'] == 'true'){
    echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your Location has been inserted</div>";
	}
	else{
	
	}
    ?> 
    
       <form class="table1" action="" method="post">
          <table class="table table-bordered">
        <thead>
          <tr>
            <th class="small">Id</th>
            <th>Title</th>
            <th>Address</th>
            <th>Phone-No</th>
            <th>Website</th>
            <th>ACTION</th>
  	          </tr>
        </thead>
        <tbody>
<?php			
  	$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
echo "<div class='empty'><h1 class ='news'><img src='images/1.png' width='50px' height='44px' class='face'>No Location found.</h1>  <br>Are you looking for some Location?<br> <a href='insert_location.php'> Add some Location</a> </div>";
}
else{ 
	while($row = mysqli_fetch_array($result)){
	$office_id = $row['office_id'];
    $office_title = $row['office_title'];
    $address = $row['address'];
	$phone_no = $row['phone_no'];
	$website = $row['website'];    
		 echo"<tr>";

    echo"<td>${office_id}</td>";
 	echo "<td class='office'>${office_title}</td>";
	echo "<td>${address}</td>";
	echo "<td>${phone_no}</td>";
	echo "<td>${website}</td>";
	
 	echo"<td>
        <a href='update_location.php?office_id=${office_id}'<button type='button' class='btn btn-primary btn-lg btn-block' id='button1'>UPDATE</button></a>
        <a href='delete_location.php?office_id=${office_id}' onClick='return deleteConfirm(30);'><button type='button' class='btn btn-danger' id='button2'>DELETE</button></a>
        <a href='view_location.php?office_id=${office_id}'><button type='button' class='btn btn-success' id='button2'>VIEW HTML</button></a>
</td>
          </tr>";
       }        
}
?>

		
           </tboby>
		  </table>
</tbody>
	</form>
</div>

<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>
</body>
</html>
