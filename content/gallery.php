<h2>
				On the fly...
</h2>
<center>
	<?php
		error_reporting(E_ALL ^ E_NOTICE);
		
		if(empty($_POST["y"]))
		$y=0;
		
		$kep = $_GET["y"];
		
		$filename = 'image/'.$kep.'.jpg';	
		if (empty($kep)||$kep<"0") 
			$kep="0";
		
		echo ('<a href="?np='.$_GET["np"].'&y='.($kep-1).'"> <<< </a>
	
		&nbsp;&nbsp;&nbsp;&nbsp;
	
		<a href="?np='.$_GET["np"].'&y='.($kep+1).'"> >>> </a><hr />'); 
	
		




	
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
