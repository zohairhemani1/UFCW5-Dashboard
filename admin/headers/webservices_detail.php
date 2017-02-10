	<?php 
	$query_select = "SELECT * FROM webservices";
    $result_select = mysqli_query($con,$query_select)
    or die ('error'); 
    while($row = mysqli_fetch_array($result_select))
	{
    $id = $row['id'];
	$name = $row['name'];
    echo"
    <option value=''></option>
    <option value='$id'>{$name}</option>
    ";                                
     }
	 ?>