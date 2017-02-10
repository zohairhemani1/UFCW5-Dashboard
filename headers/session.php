<?php
	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else
	{
		$url = "login.php";
		$redirect = 1;
		//header('Location: login.php');	
	}
?>	
	<script>
   if(<?php echo $redirect;?> == 1){
			//alert('redirecting');
			window.location.href = '<?php echo $url; ?>';
   
   }
	</script>