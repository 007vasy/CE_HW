<?php

include("dbconfig.php");



$result_start=mysqli_query($con,"SELECT `timestamp` FROM `Mission_time` WHERE `fly`=1 ORDER bY `timestamp` ASC");

echo('
		<div><table align="center"><form action="" method="post" id="map" ><tr>
								<td><input list="starttime" name="starttime"><datalist id="starttime">
	');	


		
		while($row_start = mysqli_fetch_array($result_start, MYSQLI_ASSOC))
							{
								echo('<option value="'.$row_start["timestamp"].'">');
							}
echo('
		</td><td><input type="submit" id="view
        " value="View"></td>
									</tr>
		</datalist></form></div>
	');

if(!empty($_POST))
{
	$result=mysqli_query($con,"SELECT `dkey`,`lat`,`long`,`alt`,`timestamp` FROM `Data` WHERE `timestamp` BETWEEN  '".$_POST["starttime"]."' AND IFNULL((SELECT Min(`timestamp`) FROM `Mission_time` WHERE `fly`=0 AND `timestamp` >= '".$_POST["starttime"]."'),NOW())  ORDER bY `dkey` ");
}
else
{
	$result=mysqli_query($con,"SELECT `dkey`,`lat`,`long`,`alt`,`timestamp` FROM `Data` WHERE`timestamp` >= (SELECT Max(`timestamp`) FROM `Mission_time` WHERE `fly`=1) ORDER bY `dkey`");
}

$data=array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	$data[] = $row;


?>

<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script type="text/javascript">

var jdata = <?php echo json_encode($data, JSON_PRETTY_PRINT)?>;
var x=new google.maps.LatLng(String(jdata[0]['lat']),String(jdata[0]['long']));
/*
var stavanger=new google.maps.LatLng(58.983991,5.734863);
var amsterdam=new google.maps.LatLng(52.395715,4.888916);
var london=new google.maps.LatLng(51.508742,-0.120850);*/

function initialize()
{
    var mapProp = {
        center:x,
        zoom:9,
        mapTypeId:google.maps.MapTypeId.SATELLITE
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    // var myTrip=[stavanger,amsterdam,london];

    var myTrip=[];
    for (i = 0; i<jdata.length; i++) {
        var pos=new google.maps.LatLng(String(jdata[i]['lat']),String(jdata[i]['long']));
        myTrip.push(pos);
    }

    var flightPath=new google.maps.Polyline({
        path:myTrip,
        strokeColor:"#ff9900",
        strokeOpacity:0.8,
        strokeWeight:2
    });

    flightPath.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

function refreshMap(start){
    clearTimeout(refreshTimeOut);
    $.post("api.php", {
        api: "map",
        starttime: start
    }, function( data ) {
      if(data.jdata[data.jdata.length-1].dkey != jdata[jdata.length-1].dkey){
        jdata = data.jdata;

        for(j=0;j<(jdata.length)/2;j++)

        x=new google.maps.LatLng(String(jdata[j]['lat']),String(jdata[j]['long']));
        initialize();
      }

      if(data.last){
        setTimeout("refreshMap('"+start+"');", 1000);
      }
    }, "json");
}

$("#map").submit(function(event){
    event.preventDefault();
    refreshMap($("input[name='starttime']").val());
});


</script>

<div id="googleMap" style="width:1000px;height:640px;"></div>