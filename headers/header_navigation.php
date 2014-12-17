<?php
	
	include 'session.php';
	$app_id = $_SESSION['app_id'];
echo"	

      <nav class='nav-collapse'>
        <ul style='background-color:#00337f'>
      <li style='background-color:#00337f'> <a href='index.php'>Home</a></li>
      <li> <a href='news.php?category=news'>Union News</a> </li>
      <li> <a href='news.php?category=negotiation'>Negotiation Updates </a> </li>
      <li> <a href='news.php?category=member'>Member Resources </a> </li>
      <li> <a href='news.php?category=events'>Upcoming Events </a> </li>
      <li> <a href='news.php?category=union'>Shop Union</a> </li>
      <li> <a href='location.php'>Office Locations</a> </li>
      <li> <a href='stayConected.php'>Stay Connected</a></li>
        </ul>
      </nav>
    </header>

";
?>
