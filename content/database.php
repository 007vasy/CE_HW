	<table align="center">
					<tr class="wh">

						<td>dkey</td>
						<td>timestamp</td>
						<td>lat</td>
						<td>long</td>
						<td>alt</td>
						<td>tmp_e</td>
						<td>press</td>
						<td>obc_tmp</td>
						<td>obc_vcc</td>
						<td>obc_curr</td>
						<td>com_tmp</td>
						<td>com_vcc</td>
						<td>com_curr</td>
						<td>snw_tmp</td>
						<td>snw_vcc</td>
						<td>snw_curr</td>
						<td>eps_tmp</td>
						<td>eps_vcc</td>
						<td>bat_vcc</td>
					</tr>
				<?php




					include("dbconfig.php");
					$data=mysqli_query($con,"SELECT * FROM Data ORDER BY dkey ASC");
					mysqli_close($con);
							while($row = mysqli_fetch_array($data, MYSQLI_ASSOC))
							{
								echo ('
									<tr>
										<td>'.$row["dkey"].'</td>
										<td>'.$row["timestamp"].'</td>
										<td>'.$row["lat"].'</td>
										<td>'.$row["long"].'</td>
										<td>'.$row["alt"].'</td>
										<td>'.$row["tmp_e"].'</td>
										<td>'.$row["press"].'</td>
										<td>'.$row["obc_tmp"].'</td>
										<td>'.$row["obc_vcc"].'</td>
										<td>'.$row["obc_curr"].'</td>
										<td>'.$row["com_tmp"].'</td>
										<td>'.$row["com_vcc"].'</td>
										<td>'.$row["com_curr"].'</td>
										<td>'.$row["snw_tmp"].'</td>
										<td>'.$row["snw_vcc"].'</td>
										<td>'.$row["snw_curr"].'</td>
										<td>'.$row["eps_tmp"].'</td>
										<td>'.$row["eps_vcc"].'</td>
										<td>'.$row["bat_vcc"].'</td>
									</tr>');
							}

				?>
	</table>