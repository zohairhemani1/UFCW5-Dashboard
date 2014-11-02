<?php
	include 'headers/connect_to_mysql.php';	
	
	$query = "SELECT * FROM Negotiation_Updates LIMIT 50 ";
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
		var message = confirm("Want to delete?");
	if(message == true){
	return true;
	}
	else{
		return false;
	}
	}
	
   </script>


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
    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" action="NegotiationUpdates_insert.php">
      <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
        <button type="submit" class="btn btn-success">Search</button>
         <a href="insert.html"><button type="button" onclick="resets()" class="btn btn-primary">Add News</button></a>
 
      <a href="NegotiationUpdates_insert.html"><button type="button" onclick="resets()" class="btn btn-primary">Add Negotiation Updates</button></a>
    </form>
  </div> 
 <div class="table-responsive">
	   <?php
  if($_GET['message']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'>Your News <b>successfully</b> deleted</div>";
   	header  ('location: NegotiationUpdates_news.php') ; 	 
	}
	else{
	
	}
   ?>
	 
   
    <form class="table1" action="NegotiationUpdates_insert.php" method="post">
          <table class="table table-bordered">
        <thead>
          <tr>
            <th class="small">#</th>
            <th>Negotiation Updates</th>
            <th>ACTION</th>
  	          </tr>
        </thead>
        <tbody>
<?php			
  	$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
echo "<div class='empty'><h1 class ='news'><img src='images/2.png'>No News found.</h1>  <br>Are yoy looking for some News?<br> <a href='NegotiationUpdates_insert.html'>Add Some News</a>  </div>";
}
else{ 
	while($row = mysqli_fetch_array($result)){
	$update_id = $row['update_id'];
    $title = $row['title'];
         echo"<tr>";

    echo"<td>${update_id}</td>";
 	echo "<td>${title}</td>";
 echo"<td><a href='NegotiationUpdates_update.php?update_id=${update_id}'<button type='button' class='btn btn-primary btn-lg btn-block' id='button1'>UPDATE</button></a> <a href='NegotiationUpdates_delete.php?update_id=${update_id}' onClick='return deleteConfirm(30);'><button type='button' class='btn btn-default btn-lg btn-block' id='button2'>DELETE</button></a></td>
          </tr>";
       } 
}
	mysql_close($con); 
?>
           </tboby>
		  </table>
	</form>
</div>