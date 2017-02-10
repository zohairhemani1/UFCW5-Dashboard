<!DOCTYPE HTML>
<head>
<link rel="shortcut icon" type="image/x-icon" href="http://www.scribbletribe.com/wp-content/themes/scribble/images/favi.ico?v=2">
<link rel="stylesheet" type="text/css" href="css/generic.css" />

<link rel="stylesheet" type="text/css" href="media/css/style.css" />
<script type='text/javascript' src='media/js/select.js'></script>


</head>
<body>
<div class="control-group">
<label class="control-label">Category</label>
<div class="controls">
			<?php
		/*	if($_GET['category_id'])
			{
			$q = $_GET['category_id'];	
			}
			else{
			$q = intval($_GET['q']);
			}*/
			$q = intval($_GET['q']);

			$con = mysqli_connect('localhost','root','','ufcwfive');
if (!$con) {

    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM categories WHERE app_id = '".$q."'";
$result = mysqli_query($con,$sql);
echo"
<select id='catID' name='catID' placeholder='Choose your parent' class='turnintodropdown'>
 			<option>Choose your Category</option>";
while($row = mysqli_fetch_array($result)) 
{
  $id = $row['id'];
  $app_id = $row['app_id']; 
  $name = $row['name'];
 echo "

			<option value='$id'>$name</option>";
}
?>
</select>
</div>
</div>
