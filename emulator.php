<?php 
		include 'headers/connect_to_mysql.php';
	    $news_id = $_GET['news_id'];
?>

<!DOCTYPE html>
<html>
<head>
<style>
div#load_screen{
	background: #fff;
	opacity: 0.5;
	position: fixed;
    z-index:10;
	top: 0px;
	width: 100%;
	height: 1600px;
	
}
div#load_screen > div#loading{
	color: black;
	font-size:20px;
	width:120px;
	height:24px;
	margin: 300px auto;
}
.exit{
	background-repeat: no-repeat;
	left: 568px;
	border: none;
	cursor: pointer;
	padding-left: 5px;
	position: absolute;
	height: 48px;
	width: 53px;
	top: 0px;
	padding-left: 12px;

}
img {
  padding-top: 8px;
}
a
{
	hieght:40px !important;
	width: 53px !important;

	}
a:hover {
    background-color: rgba(0,0,0,0.05);;
	hieght:50px !important;
	width: 53px !important;
	padding-left:12px !important;	

	}
.toolbar-group {
  height: 50px;
    padding: 0 0 0 5px;
  }
.toolbar-group>li {
  list-style: none;
  margin: 0;
  float: left;
  position: absolute;
  font-weight: 200;
  left: 561px;
  top: 0px;
}
 .toolbar-group>li>a {
  display: block;
  height: 50px;
  line-height: 50px;
  padding: 0 10px;
  overflow: hidden;
  color: #333;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.5);
  border-right: 1px solid rgba(255,255,255,0.15);
  border-left: 1px solid rgba(0,0,0,0.05);
}
.toolbar-group>li>a>span.label {
  display: none;
  position: absolute;
  top: 57px;
  left: 0;
  min-width: 54px;
  text-align: center;
  background: #000;
  background: rgba(0,0,0,0.75);
  color: #fff;
  font-size: 11px;
  line-height: 12px;
  text-shadow: none;
  padding: 4px 5px;
  white-space: nowrap;
  z-index: 2;
} 
	</style>
<script>
window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});
</script>
</head>
<body>
					<div id="load_screen"><div id="loading"><img width="100px" src="assets/pre-loader/LoaderIcon.gif" alt="Triangles indicator" />
						<br>Please Wait</div></div>
					<!-- Your normal document content lives here -->
			<ul class="toolbar-group">
						<li class="share small-screen-optional">
				<a id="" class="" href="view.php?news_id=<?php echo $news_id?>">
				<img width="40px" src="img/exit.png">
				<span class="icon" data-icon=""></span>
					<span class="label">Share</span>
				</a>
				</li>
		

					<div id="content">
					<div style="height:0px;" >
					<iframe  id="optomaFeed" src="http://quirktools.com/screenfly/#u=http%3A//myunionapp.com/view.php?news_id=<?php echo $news_id?>&w=1024&h=600&s=1" scroll="no"
						frameborder="" height="100%" width="100%" style="height: 816px; clip:rect(-19px,1599px,879px,4px);
						  margin-top: -66px; margin-left: -13px;"></iframe>
					</div>
</body>
</html>