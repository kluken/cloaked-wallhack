<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Motors</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script src="jquery-2.1.4.min.js"></script>
		<script>
			function refreshTable() 
			{
				$('#content').load( "motors.php #content");
			}
			setInterval(refreshTable, 1000);
		</script>
		
	</head>
	<body>
		<div id="container">
			<div id="headerbar">
				<h1>UWS Solar Car Project - Motors</h1>
				<p>
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
			<div id="content">
				<br/>
					<table>
						<tr>
							<th>
								DC Bus Amp Hours
							</th>
							<td>
								test
							</td>
							<th>
								Motor Slip Speed
							</th>
							<td>
								test
							</td>
							<th>
								Vehicle Velocity
							</th>
							<td>
								Test
							</td>
							<th>
								Motor Velocity
							</th>
							<td>
								test
							</td>
						</tr>
						<tr>
							<th>
								Bus Current
							</th>
							<td>
								test
							</td>
							<th>
								Bus Voltage
							</th>
							<td>
								test
							</td>
							<th>
								Phase B Current
							</th>
							<td>
								test
							</td>
							<th>
								Phase C Current
							</th>
							<td>
								test
							</td>
						</tr>
						<tr>
							<th>
								Motor Current d
							</th>
							<td> 
								Test
							</td>
							<th>
								Motor Current q
							</th>
							<td>
								Test
							</td>
							<th>
								Motor Voltage d
							</th>
							<td>
								Test
							</td>
							<th>
								Motor Voltage q
							</th>
							<td>
								Test
							</td>
						</tr>
						<tr>
							<th>
								Back EMF d
							</th>
							<td>
								Test
							</td>
							<th>
								Back EMF q
							</th>
							<td>
								Test
							</td>
							<th>
								IPM Heatsink Temp
							</th>
							<td>
								Test
							</td>
							<th>
								Motor Temp
							</th>
							<td>
								Test
							</td>
						</tr>
						<tr>
							<th>
								IPM DSP Board Temp
							</th>
							<td>
								Test
							</td>
							<th>
								15V Rail
							</th>
							<td>
								Test
							</td>
							<th>
								3.3V Rail
							</th>
							<td>
								Test
							</td>
							<th>
								1.9V Rail
							</th>
							<td>
								Test
							</td>
						</tr>
						<tr>
							<th>
								Receive/Transmit Errors
							</th>
							<td>
								Test/Test
							</td>
							<th>
								Odometer
							</th>
							<td>
								Test
							</td>
							<th>
								Motor Tritium ID
							</th>
							<td>
								Test
							</td>
							<th>
								Motor Serial Number
							</th>
							<td>
								Test
							</td>
						</tr>
						<tr>
							<th colspan = "8">
								Error Flags
							</th>
						</tr>
						<tr>
							<th>
								Desaturation Fault
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								15V Rail Under Voltage
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Config Read Error
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Watchdog Caused last Reset
							</th>
							<td class = "goodData">
								OK
							</td>
						</tr>
						<tr>
							<th>
								Bad Motor Position Hall Sequence
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								DC Bus Over Volt
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Software Over Current
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Hardware Over Current
							</th>
							<td class = "goodData">
								OK
							</td>
						</tr>
						<tr>
							<th colspan = "8">
								Limit Flags
							</th>
						</tr>
						<tr>
							<th>
								Output Voltage PWM
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Motor Current
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Velocity
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Bus Current
							</th>
							<td class = "goodData">
								OK
							</td>
						</tr>
						<tr>
							<th>
								Bus Voltage Upper Limit
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								Bus Voltage Lower Limit
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
								IPM Temp or Motor Temp
							</th>
							<td class = "goodData">
								OK
							</td>
							<th>
							</th>
							<td>
							</td>
						</tr>
				</table>
			</div>
		</div>
	</body>
</html> 

