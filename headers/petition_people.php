
<?php
			$select_petition = "SELECT * FROM petition_people where email != '' ";
			$fetch_result = mysqli_query($con,$select_petition);
			$row = mysqli_fetch_array($fetch_result)
			or die('error');
			while($row = mysqli_fetch_array($fetch_result)) 
{
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
 echo "
    <option value='$email'>$first_name $last_name</option>";
}

?>