		<?php 
		include 'headers/connect_to_mysql.php';
		include 'session.php';
		include 'image.php';
		include 'headers/image_info.php';
		$category = $_GET['category'];
		$app_id = $_SESSION['app_id'];
		$query_news = "SELECT * FROM news where category like '$category' AND app_id = '$app_id' limit 50";
		$result_news = mysqli_query($con,$query_news)
		or die('error1');

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
      <div class='logo'><img class="size" src="logo/<?php echo $logo;?>" style='' border="0" alt="Null"></div>
		  </center>
		  <?php include 'headers/header_navigation.php'; ?>
</div>
</div>
     </header>
 <div class="fomr">

    <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" 
    action="insert.php" method="post">
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
  if($_GET['delete']== 'true'){
	   echo"
    <div class='alert alert-success' role='alert'><b>Success:</b>Your $category has been deleted.</div>";
  }
   else{
	
	}
	  if($_GET['update']== 'true'){
	   echo"<div class='alert alert-success' role='alert'><b>Success:</b>Your  $category has been updated</div>";	 
	}
     	if($_GET['insert'] == 'true'){
    echo"<div class='alert alert-success' role='alert'><b>Success:</b>Your $category has been inserted</div>";
	}
    ?> 
    
       <form class="table1" action="" method="post">
          <table class="table table-bordered">
        <thead>
          <tr>
            <th class="small">#</th>
            <th><?php echo strtoupper($category) ;?></th>
            <th>ACTION</th>
  	          </tr>
        </thead>
        <tbody>
      
<?php			
  	$num_rows = mysqli_num_rows($result_news);

if($num_rows == 0){
echo "<div class='empty'><h1 class ='news'><img src='images/1.png' width='50px' height='44px' class='face'>No News found.</h1>  <br>Are you looking for some News?<br> <a href='insert.php?category=${category}'> Add some news</a> </div>";
}
else{ 
	while($row = mysqli_fetch_assoc($result_news))
	{
		
	$news_id = $row['news_id'];
    $title = $row['title'];
         echo"<tr>";

    echo"<td>${news_id}</td>";
 	echo "<td class='table_width'>${title}</td>";
 echo"<td  class='action'>
        <a href='update.php?category={$category}&&news_id=${news_id}'><button type='button' class='btn btn-primary' id='button1'>UPDATE &nbsp; &nbsp;</button></a>
          <a href='delete.php?category={$category}&&news_id=${news_id}' onClick='return deleteConfirm(30);'><button type='button' class='btn btn-danger' id='button2'>DELETE</button></a>
        <a href='view.php?category={$category}&&news_id=${news_id}'<button type='button' class='btn btn-success' id='button2'>VIEW HTML</button></a>
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