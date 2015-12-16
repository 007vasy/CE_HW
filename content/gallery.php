<h2>
				On the fly...
</h2>
<center>
	<?php
		if ($handle = opendir('image')) {
    		while (false !== ($entry = readdir($handle)))
			{
		        if ($entry != "." && $entry != "..")
				{


		            $kepek[] = $entry;



		        }

			}
		    closedir($handle);
			}

		error_reporting(E_ALL ^ E_NOTICE);

		if(empty($_POST["y"]))
		$y=0;
		$max=count($kepek);
		$kep = $_GET["y"];
		//echo($max);
		$filename = 'image/'.$kep.'.jpg';
		if (empty($kep)||$kep>$max-1)
			$kep=$max-1;
		if ($kep<"1")
			$kep="1";

		echo ('<a href="?np='.$_GET["np"].'&y='.($kep-1).'"> Old </a>

		&nbsp;&nbsp;&nbsp;&nbsp;

		<a href="?np='.$_GET["np"].'&y='.($kep+1).'"> New </a><hr />');







	

echo (' <a class="img" href="image/'.$kepek[$kep].'" target="_blank"> <img id="img" src="image/'.$kepek[$kep].'"  width="320"/> </a>');

	/*
if ($handle = opendir('image'))
	{
	$entry = (readdir($handle));
    echo $entry["kep"];
    echo (' <a class="img" href="image/'.$entry[$kep].'" target="_blank"> <img id="img" src="image/'.$entry[$kep].'"  width="320"/> </a>');


    closedir($handle);
	}
*/








?>
</center>
