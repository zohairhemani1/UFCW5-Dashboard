<?php
	include 'simple_html_dom.php';
	echo str_get_html('<div>hello world</div>')->plaintext; 
	
?>