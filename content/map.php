<?php



include("initdata.php");

?>

<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script>

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

$("#map").changed(function(event){
    event.preventDefault();
    refreshMap($("input[name='starttime']").val());
});

</script>

<div id="googleMap" style="width:1000px;height:640px;"></div>