<?php

include("dbconfig.php");


if(empty($_POST) || !isset($_POST['api'])) die('{"error": "error"}');


if($_POST['api'] == 'map'){

  $result=mysqli_query($con,
  "SELECT `dkey`,`lat`,`long`,`alt`,`timestamp` FROM `Data`
   WHERE `timestamp` BETWEEN  '".$_POST["starttime"]."'
   AND IFNULL(
       (SELECT Min(`timestamp`) FROM `Mission_time` WHERE `fly`=0 AND `timestamp` >= '".$_POST["starttime"]."'),
       NOW()
     )
   ORDER bY `dkey` "
  );


  $data=array();
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    $data[] = $row;

  $result = mysqli_query($con,
    "SELECT `mkey` FROM `Mission_time` WHERE `fly`='0' AND `timestamp` >= '".$_POST["starttime"]."'"
  );

  $currentMissionTime = mysqli_query($con,
    "SELECT Max(`timestamp`) FROM `Mission_time` WHERE `fly`='1'"
  );



  $is_last = (mysqli_num_rows($result) == 0 && $currentMissionTime == $_POST["starttime"]);


  echo json_encode(array("jdata"=>$data, "last"=>$is_last), JSON_PRETTY_PRINT);

}

else {
  die('{"error":"No such api!"}');
}

mysqli_close($con);
?>