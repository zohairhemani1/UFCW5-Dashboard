	<?php 
$sql="SELECT * FROM categories";
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

?>
