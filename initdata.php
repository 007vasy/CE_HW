<?php
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