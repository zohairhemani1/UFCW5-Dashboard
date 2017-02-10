 <select id="" class="span6 chosen" name="category" data-placeholder="Choose a Category" >
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','ufcwfive');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM categories WHERE app_id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) 
{
  $id = $row['id'];
  $app_id = $row['app_id']; 
  $name = $row['name'];
 echo "
    <option value=''></option>
    <option value='$id'>$name</option>";
}

mysqli_close($con);
?>
</select>
