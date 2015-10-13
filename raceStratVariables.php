<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<?php
		session_start();

		if (!isset($_SESSION["hostname"]))
			header("location: home.php");
		else 
		{
			//Set SQL Database Settings
			$servername = $_SESSION["hostname"];
			$username = $_SESSION["username"];
			$password = $_SESSION["password"];
			$dbname = $_SESSION["dbname"];
			$port = $_SESSION["port"];
			$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
		}
	?>
	
		<script src="jquery-2.1.4.min.js"></script>
		<script>
			function refreshTable() 
			{
				$('#content').load( "raceStratVariables.php #content");
			}
			setInterval(refreshTable, 1000);
		</script>
		
	<head>
		<title>UWS Solar Car Project - Home</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 		
	</head>
	<body>
		<?php require_once("headerBar.php") ?>
		<div id="content">
			<p>
				<table>
					<tr>
						<th colspan="8">Temperatures</th>
					</tr>
					<tr>
						<th>
							Motor Controller Temp
						</th>
						<td>
							Cheese
						</td>
						<th>
							IPM DSP Temp
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT1 Temp
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT2 Temp
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th>
							CMU Max Temp
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th colspan="8"> 
							Voltages
						</th>
					</tr>
					<tr>
						<th>
							Minimum Cell Voltage
						</th>
						<td>
							Cheese
						<td>
						<th>
							CMU with Minimum Voltage
						<th>
						<td>
							Cheese
						</td>
						<th>
							Cell with Minimum Voltage
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th>
							Maximum Cell Voltage
						</th>
						<td>
							Cheese
						<td>
						<th>
							CMU with Maximum Voltage
						<th>
						<td>
							Cheese
						</td>
						<th>
							Cell with Maximum Voltage
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th colspan="8">
							Motor Error Flags
						</th>
					</tr>
					<tr>
						<th>
							Desaturation Fault
						</th>
						<td>
							Cheese
						</td>
						<th>
							15V Rail Under Volt
						</th>
						<td>
							Cheese
						</td>
						<th>
							Config Read Error
						</th>
						<td>
							Cheese
						</td>
						<th>
							Watchdog Caused Last Reset
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th>
							Bad Motor Position Hall Sequence
						</th>
						<td>
							Cheese
						</td>
						<th>
							DC Bus Over Volt
						</th>
						<td>
							Cheese
						</td>
						<th>
							Software Over Current
						</th>
						<td>
							Cheese
						</td>
						<th>
							Hardware Over Current
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th colspan="8">
							Motor Limiting Flags
						</th>
					</tr>
					<tr>
						<th>
							Output Voltage PWM
						</th>
						<td>
							Cheese
						</td>
						<th>
							Motor Current
						</th>
						<td>
							Cheese
						</td>
						<th>
							Velocity
						</th>
						<td>
							Cheese
						</td>
						<th>
							Bus Current
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th>
							Bus Voltage Upper Limiting
						</th>
						<td>
							Cheese
						</td>
						<th>
							Bus Voltage Lower Limiting
						</th>
						<td>
							Cheese
						</td>
						<th>
							IPM Temp or Motor Temp
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th colspan="8">
							Tracker Error Flags
						</th>
					</tr>
					<tr>
						<th>
							MPPT1 Battery Over Voltage
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT1 Over Temp
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT1 No Connection
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT1 Input Under Voltage
						</th>
						<td>
							Cheese
						</td>
					</tr>
					<tr>
						<th>
							MPPT2 Battery Over Voltage
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT2 Over Temp
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT2 No Connection
						</th>
						<td>
							Cheese
						</td>
						<th>
							MPPT2 Input Under Voltage
						</th>
						<td>
							Cheese
						</td>
					</tr>
					
				</table>
			</p>
		</div>
	</body>

</html> 