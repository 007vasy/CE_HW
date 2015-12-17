
<?php
	echo('<canvas id="canvas" height="600" width="1000"></canvas>');

	include("initdata.php");
?>

<script>
	var jdata = <?php echo json_encode($data, JSON_PRETTY_PRINT)?>;
	var alt=[];
	var timescale=[];

	for (i = 0; i<jdata.length; i++) {
	        alt.push(jdata[i]['alt']);
	        timescale.push(String(jdata[i]['timestamp']));
	    }

	function refreshGraph(start){

	    $.post("api.php", {
	        api: "alt",
	        starttime: start
	    }, function( data ) {
	    	alert("asd");
		   	if(data.jdata[data.jdata.length-1].dkey != jdata[jdata.length-1].dkey){
		        jdata = data.jdata;

	      	for (i = 0; i<jdata.length; i++) {
		        alt.push(jdata[i]['alt']);
		        timescale.push(jdata[i]['timestamp']);
		    }
	 		
	      }

	      if(data.last){
	        setTimeout("refreshGraph('"+start+"');", 1000);
	      }
	    }, "json");
	}


	/*$("#map").submit(function(event){
	    event.preventDefault();
	    refreshGraph($("input[name='starttime']").val());
	});*/
		

	var lineChartData = {
		labels : timescale,
		datasets : [
			{
				fillColor : "rgba(220,220,120,0.5)",
				strokeColor : "rgba(220,220,120,1)",
				pointColor : "rgba(220,220,120,1)",
				pointStrokeColor : "#fff",
				data : alt
			}
			
		]
	
	}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	   
</script>
