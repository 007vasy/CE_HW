<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>UPRA GND</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />
	<meta name="author" content="Vasy" />
	<meta name="copyright" content="Vasy" />
	<!<meta name="keywords" content="fából bútor,bútorlap,konyha,ágy,emeletes ágy,éjjeli szekrény,esztergált láb,rönkbútor,faajtó" />
	<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
	<!<link rel="shortcut icon" href="favicon.ico">
</head>
<body>

<div id="frame">
	<div id="contain">
		<div id="head">
				<h1 valign="center" align="middle">
					UPRA
				</h1>
		
		</div><! &head>
		<div id="menu">
			<ul class="menu" >
				<li><a href="?np=gallery">Galéria</a></li>
			</ul>
		</div><! &menu>
		<div id="top" >
		<?php
		
			if(empty($_GET["np"]))
				$pp="gallery";
			else
				$pp=$_GET["np"];
			
			include('content/'.$pp.'.php');
			
		?>
		</div><! &top>
		<div id="imp">
			Minden jog fenntartva! Copyright© Vasy
		</div><! &imp>
	</div><! &contain>
</div><! &frame>

</body>
</html>