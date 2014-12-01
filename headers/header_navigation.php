<?php
	
	include 'session.php';
	$app_id = $_SESSION['app_id'];
	
echo"	
<nav id='myNavbar' class='navbar navbar-default' role='navigation'>
  <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
    <ul class='nav navbar-nav'>
      <li> <a href='index.php'>Home</a></li>
      <li> <a href='news.php?category=news'>Union News</a> </li>
      <li> <a href='news.php?category=negotiation'>Negotiation Updates </a> </li>
      <li> <a href='news.php?category=member'>Member Resources </a> </li>
      <li> <a href='news.php?category=events'>Upcoming Events </a> </li>
      <li> <a href='news.php?category=union'>Shop Union</a> </li>
      <li> <a href='location.php'>Office Locations</a> </li>
      <li> <a href='stayConected.php'>Stay Conected</a> 

            </li>
    </ul>
  </div>
</nav>";




?>