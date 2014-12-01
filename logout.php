<?php
session_start();
if (isset($_COOKIE['username'])) {
	   unset($_COOKIE['username']);
		setcookie('username', null, time()-1);
		header ('Location: login.php');
	
	}

else{
	session_destroy(); 
		header ('Location: login.php');
	
}
?>