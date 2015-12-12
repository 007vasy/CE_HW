<?php

$con = mysqli_connect("localhost","root","","upra")or die("Connection Error".mysql_error());
					
mysqli_query($con,"SET names 'utf8'");

mysqli_select_db($con, "upra");

$data[]=array();

$result=mysqli_query($con,"SELECT `dkey`,`lat`,`long`,`alt` FROM `Data` ORDER bY `dkey`");

		//var_dump($row = mysqli_fetch_array($, MYSQLI_ASSOC));
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
							$data[] = $row;
							}

mysqli_close($con);


//echo json_encode($data, JSON_PRETTY_PRINT);

?>


<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script type="text/javascript">

var jdata = <?php echo json_encode($data, JSON_PRETTY_PRINT)?>;

var x=new google.maps.LatLng(String(jdata[1]['lat']),String(jdata[1]['long']));
/*
var stavanger=new google.maps.LatLng(58.983991,5.734863);
var amsterdam=new google.maps.LatLng(52.395715,4.888916);
var london=new google.maps.LatLng(51.508742,-0.120850);*/

/*var myTrip
for (i = 1; i <= jdata.length; i++) { 
    myTrip += new google.maps.LatLng(jdata[i]["lat"]+","+jdata[i]["long"]);
}*/


function initialize()
{
var mapProp = {
  center:x,
  zoom:8,
  mapTypeId:google.maps.MapTypeId.SATELLITE
  };
  
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

// var myTrip=[stavanger,amsterdam,london];

var flightPath=new google.maps.Polyline({
  path:myTrip,
  strokeColor:"#ff9900",
  strokeOpacity:0.8,
  strokeWeight:2
  });

flightPath.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="googleMap" style="width:1000px;height:640px;"></div>