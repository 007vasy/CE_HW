
<canvas id="canvas" height="450" width="600"></canvas>

<?php

include("initdata.php");
?>


<script>
	var jdata = <?php echo json_encode($data, JSON_PRETTY_PRINT)?>;
	var alt=[];
	var timescale=[];
	//alert(jdata.length);

	for (i = 0; i<jdata.length; i++) {
		        alt.push(jdata[i]['alt']);
		        timescale.push(String(jdata[i]['timescale']));
		    }

	// function refreshGraph(start){

	//     $.post("api.php", {
	//         api: "alt",
	//         starttime: start
	//     }, function( data ) {
	// 	   	if(data.jdata[data.jdata.length-1].dkey != jdata[jdata.length-1].dkey){
	// 	        jdata = data.jdata;

	      	

	// 	  	for (i = 0; i<jdata.length; i++) {
	// 	        alt.push(jdata[i]['alt']);
	// 	        timescale.push(String(jdata[i]['timescale']));
	// 	    }
	 		
	//       }

	//       if(data.last){
	//         setTimeout("refreshGraph('"+start+"');", 1000);
	//       }
	//     }, "json");
	// }

	// $("#map").submit(function(event){
	//     event.preventDefault();
	//     refreshGraph($("input[name='starttime']").val());
	// });
		

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

	/*var lineChartData = {
		labels : ["a","b","c","d"],
		datasets : [
			{
				fillColor : "rgba(220,220,120,0.5)",
				strokeColor : "rgba(220,220,120,1)",
				pointColor : "rgba(220,220,120,1)",
				pointStrokeColor : "#fff",
				data : [1,2,3,4]
			}
			
		]
	
	}*/

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
	   
</script>
