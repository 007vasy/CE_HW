<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>UPRA GND</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="hu" />
	<meta name="author" content="Vasy" />
	<meta name="copyright" content="Vasy" />
	<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
	<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico">
	<script src="http://www.chartjs.org/assets/Chart.js"></script>
	<script type="text/javascript">
	</script>
	


	<style>
			canvas{
			}
		</style>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</head>
<body>

<?php
			include("dbconfig.php");
?>

<div id="frame">
	<div id="contain">
		<div id="menu">
			<ul class="menu" >
				<li><a href="?np=gallery">Galéria</a></li>
				<li><a href="?np=map">Térkép</a></li>
				<li><a href="?np=altitude">Magasság</a></li>
				<li><a href="?np=database">DBTEST</a></li>
			</ul>
			<?php
				include("missionlist.php");
			?>
		</div><!-- &menu-->

		<div id="top" >
		<?php
			
			if(empty($_GET["np"]))
				$pp="gallery";
			else
				$pp=$_GET["np"];

			include('content/'.$pp.'.php');
			
		?>
		</div><!-- &top-->
	
		<div id="imp">
			Minden jog fenntartva! Copyright© Vasy
		</div><!-- &imp-->
	</div><!-- &contain-->
</div><!-- &frame-->

</body>
</html>