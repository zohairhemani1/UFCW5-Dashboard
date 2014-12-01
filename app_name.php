<?php

	include 'session.php' ;
	$category = $_GET['category'];

	include 'headers/connect_to_mysql.php';
	
	
	$query = "SELECT * FROM app_name";
	$result = mysqli_query($con,$query);

?>



<!doctype html>
<html>
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UFCW 5-Apps</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" >
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
     	<?php include 'headers/header_navigation.php'; ?>
	 </div>
     
     </center>
</div>
    
     
     
     
 <div class="fomr">
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="insert.php" method="post">
       <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <a href="insert_app.php">
      	<button type="button" class="btn btn-primary">Add App Name
        </button>
      </a>


    </form>
  </div>
	   <?php
  if($_GET['delete']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your $category has been deleted.</div>";
  }
   else{
	
	}
	  if($_GET['update']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your  $category has been updated</div>";	 
	}
	else{
	
	}
     	if($_GET['insert'] == 'true'){
    echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your $category has been inserted</div>";
	}
	else{
	
	}
    ?> 
    
       <form class="table1" action="" method="post">
          <table class="table table-bordered">
        <thead>
          <tr>
            <th class="small">#</th>
            <th>App Name</th>
            <th>ACTION</th>
  	          </tr>
        </thead>
        <tbody>
      
<?php			
  	$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
echo "<div class='empty'><h1 class ='news'><img src='images/1.png' width='50px' height='44px' class='face'>No App name found.</h1>  <br>Are you looking for some App?<br> <a href='insert_app.php'> Add some App</a> </div>";
}
else{ 
	while($row = mysqli_fetch_array($result)){
	$app_id = $row['app_id'];
    $name = $row['name'];
       echo "app_id-->".$app_id;
	   echo "app+name-->".$name;  
		 echo"<tr>";

    echo"<td>${app_id}</td>";
 	echo "<td class='table_width'>${name}</td>";
 echo"<td>
        <a href='update_app.php?app_id=${app_id}'<button type='button' class='btn btn-primary btn-lg btn-block' id='button1'>UPDATE</button></a>
        <a href='delete_app.php?app_id=${news_id}' onClick='return deleteConfirm(30);'><button type='button' class='btn btn-danger' id='button2'>DELETE</button></a>
        <a href='view_app.php?app_id=${app_id}'><button type='button' class='btn btn-success' id='button2'>VIEW HTML</button></a>
</td>
          </tr>";
       }        
}
?>
           </tboby>
		  </table>
	</form>
    </div>
<div id="footer">
 <?php  include 'headers/header_footer.php'; ?>

</div>    
    </body>
    </html>