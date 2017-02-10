<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this tag, the sky will fall on your head -->
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>VIEW PAGE</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>
<link rel="stylesheet" type="text/css" href="assets/css/custom.css" />
<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>    
<body>
<div id="load_screen"><div id="loading"><img width="100px" src="../assets/pre-loader/Thin fading line.gif" alt="Triangles indicator" /></div></div>
<div class="wrapper">
<?php

	include 'headers/connect_to_mysql.php';
	
	$facebook = "";
	$twitter = "";
	$google = "";
	$pinterest = "";
	$title= "";
	$description = "";
	$news_id = "";
	$app_id = "";
	$display = "display:none";

	
	$app_id = $_GET['appID'];
	
	if(isset($_GET['newsID']))
		$news_id = $_GET['newsID'];
	
	if(isset($_GET['category']))
		$category = $_GET['category'];
	
	
	
	if(isset($category))
	{
		// this is called from the sub menu which directly opens webview
		
		$query = "SELECT * from `news` WHERE `category` = '{$category}' and published = 1 LIMIT 1";
		$result = mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($result);
		$title = $row['title'];
		$description = $row['description'];
		$social = $row['social'];
        $new_image = $row['new_image'];
		$time_stamp = strtotime($row['time_cone']);
        
        //Changeing date format
        $month = date('F', $time_stamp);
		$day = date('d',$time_stamp);
		$year = date('Y',$time_stamp);
        
        $time_stamp = "{$month} {$day}, {$year}";
		if(isset($new_image) != null){ echo "<img src='../img/news/$new_image' style='width: 100%;' />";}
		echo "<p class='title'>{$title}</p>";
        echo "<p class='time'>$time_stamp</p>";
        echo"<div class='descript'>{$description}</div>";
	}
	else
	{
		$query = "select * from news WHERE `news_id` = '{$news_id}' and `app_id` = '{$app_id}'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
        $description = $row['description'];
        $new_image = $row['new_image'];
        $time_stamp = strtotime($row['time_cone']);

        //Changeing date format
        $month = date('F', $time_stamp);
        $day = date('d',$time_stamp);
        $year = date('Y',$time_stamp);

        $time_stamp = "{$month} {$day}, {$year}";

		
		if(isset($new_image) != null){ echo "<img src='../img/news/$new_image' style='width: 100%;' />";}
		echo "<p class='title'>{$title}</p>";
        echo "<p class='time'>$time_stamp</p>";
        $description = $row['description'];
		$social = $row['social'];
		echo"<div class='descript'>{$description}</div>";

	}
	
		if($social == "on")
		{
			$facebook = $row['facebook'];
			$twitter = $row['twitter'];
			$google = $row['google'];
			$pinterest = $row['pinterest'];
			$display = "display:block;";
		}
		
		if($facebook == "" & $twitter == "" & $google == "" & $pinterest == "")
		{
			$display  = "display:none";
		}
		?>
<div style="<?php echo $display; ?>" id="content" class="box">

                <div class="sharing-box">
<?php		
			if ($facebook != ""){
			echo"
           <a class='facebook' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F{$facebook}&t=' 
target='_blank' onclick='window.open('https://www.facebook.com/sharer/sharer.php?u=' + www.linkedunion.com + '&t=' + encodeURIComponent(document.URL)); return false;'>
		   <img width='20' height='33' src='images/facebook.png' class='attachment-full-size wp-post-image' alt='facebook'><h2 class='face'></h2></a>

			   ";
			}
			if ($twitter != ""){			   
			echo"

              <a class='twitter' href='https://twitter.com/intent/tweet?source=http%3A%2F%2F
	$twitter;?>&text=:%20http%3A%2F%2F{$twitter}' target='_blank' title='Tweet' onclick='window.open('https://twitter.com/intent/tweet?text=' + ':%20'  + 	encodeURIComponent(document.URL)); return false;'>
			  <img width='40' height='33' src='images/twitter.png' class='attachment-full-size wp-post-image' alt='tweet'><h2 class='twet'></h2></a>
		";
			}
//			if ($google != ""){	
//			echo"	
//				<section class='platform box'>
//              <div class='wrap'>
//              <a href='https://plus.google.com/share?url=http%3A%2F%2F{$google}' target='_blank' title='Share on Google+' onclick='window.open('https://plus.google.com/share?url=') ; return false;'>
//			<img width='250' height='250' src='images/g++.png' class='attachment-full-size wp-post-image' alt='g++'><h2></h2></a>
//              </div>
//            </section>
//		";
//			}
//			if ($pinterest != ""){
//			echo"             
//			 <section class='platform box'>
//              <div class='wrap'>
//             <a href='http://pinterest.com/pin/create/button/?url=http%3A%2F%2F{$pinterest}&description=' target='_blank' title='Pin it' onclick='window.open('http://pinterest.com/pin/create/button/?url=' + '&description=' +  encodeURIComponent); return false;'>
//			 <img width='250' height='250' src='images/pint.png' class='attachment-full-size wp-post-image' alt='pinterest'><h2 class='pin'></h2></a>
//              </div>
//            </section>
//		
//		";
//			}
		
?>
		
				</div>
      </section>
        
          <section id="promo_wrapper" class="section box">
        
      </section>
      </div>
	</div>
	</body>