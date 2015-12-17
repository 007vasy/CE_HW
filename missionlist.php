<?php

$result_start=mysqli_query($con,"SELECT `timestamp` FROM `Mission_time` WHERE `fly`=1 ORDER bY `timestamp` ASC");

echo('
		<table align="center">
			<form action="" method="post" id="map" >
				<tr>
					<td>
						<input list="starttime" name="starttime">
							<datalist id="starttime">
	');	


		
		while($row_start = mysqli_fetch_array($result_start, MYSQLI_ASSOC))
							{
								echo('<option value="'.$row_start["timestamp"].'">');
							}
echo('
							</datalist>
					</td>

					<td>
						<input type="submit" id="view" value="View">
					</td>
				</tr>
        	</form>
        </table>
	');



?>