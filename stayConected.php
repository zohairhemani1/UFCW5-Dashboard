<?php
	include 'session.php';
	$app_id = $_SESSION['app_id'];

	include 'headers/connect_to_mysql.php';
	$category = $_GET['category'];
	
	$query = "SELECT * FROM stayConected where app_id = '$app_idd' LIMIT 50";
	$result = mysqli_query($con,$query);

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name=viewport content="width=device-width, initial-scale=1">
<title>UFCW 5-StyaConeted</title>
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
    <p class="left">	<?php echo  strtoupper($username);?> &nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a> </h4>	
    </div>    

    <div id="logo">
    <center><img src="images/logo.png" name="logo" alt="">
 <div class="nav1">
     	<?php include 'headers/header_navigation.php';?>
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
      <a href="insert_stayConnected.php">
      	<button type="button" class="btn btn-primary">Add Stay Connected	
        </button>
      </a>


    </form>
  </div>
	   <?php
  if($_GET['delete']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your StyaConeted has been deleted.</div>";
  }
   else{
	
	}
	  if($_GET['update']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your  StyaConeted has been updated</div>";	 
	}
	else{
	
	}
     	if($_GET['insert'] == 'true'){
    echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your StyaConeted has been inserted</div>";
	}
	else{
	
	}
    ?> 
    
       <form class="table1" action="insert_stayConected.php" method="post">
          <table class="table table-bordered">
        <thead>
          <tr>
            <th class="small">Id</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Address</th>
            <th>Phone-No(1)</th>
            <th>Phone-No(2)</th>
            <th>Fax-No</th>
            <th>Email</th>
            <th>ACTION</th>
  	          </tr>
        </thead>
        <tbody>
<?php			
  	$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
echo "<div class='empty'><h1 class ='news'><img src='images/1.png' width='50px' height='44px' class='face'>No Stay Connected found.</h1>  <br>Are you looking for some Stay Connected?<br> <a href='insert_stayConected.php'> Add some Stay Connected</a> </div>";
}
else{ 
	while($row = mysqli_fetch_array($result)){
	$stayConected_id = $row['stayConected_id'];
		$name = $row['name'];
		$designation = $row['designation'];
		$address = $row['address'];
		$phone_no1 = $row['phone_no1'];
		$phone_no2 = $row['phone_no2'];
		$fax_no = $row['fax_no'];
		$email =  $row['email']; 
		 echo"<tr>";

    echo"<td>${stayConected_id}</td>";
 	echo "<td class='office'>${name}</td>";
	echo "<td>${designation}</td>";
	echo "<td>${address}</td>";
	echo "<td>${phone_no1}</td>";
	echo "<td>${phone_no2}</td>";
	echo "<td>${fax_no}</td>";
	echo "<td>${email}</td>";
	
 	echo"<td>
        <a href='update_stayConected.php?stayConected_id=${stayConected_id}'<button type='button' class='btn btn-primary btn-lg btn-block' id='button1'>UPDATE</button></a>
        <a href='delete_stayConected.php?stayConected_id=${stayConected_id}' onClick='return deleteConfirm(30);'><button type='button' class='btn btn-danger' id='button2'>DELETE</button></a>
        <a href='view_stayConected.php?stayConected_id=${stayConected_id}'><button type='button' class='btn btn-success' id='button2'>VIEW HTML</button></a>
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
 <?php  include 'headers/header_footer.php';?>
</body>
</html>
