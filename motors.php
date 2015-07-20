<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Motors</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			function refreshTable() 
			{
				$('#secondContent').load( "motors.php #secondContent");
			}
			setInterval(refreshTable, 1000);
		</script>
		
		<?php 
			session_start();
			
			require_once('motorFunctions.php');
			
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
			
			if (isset($_POST['resetSession']))
			{
				unset($_SESSION['motorSelectedData']);
				unset($_SESSION['motorSelectedEFlags']);
				unset($_SESSION['motorSelectedLFlags']);
			}
			else if (isset($_POST['selectedData']) ||isset($_POST['selectedEFlags']) || isset($_POST['selectedLFlags']))
			{
				if (!empty($_POST['selectedData']))
				{
					$_SESSION['motorSelectedData'] = Array();
					$_SESSION['motorSelectedData'] = $_POST['selectedData'];
				}
				if (!empty($_POST['selectedEFlags']))
				{
					$_SESSION['motorSelectedEFlags'] = Array();
					$_SESSION['motorSelectedEFlags'] = $_POST['selectedEFlags'];
				}
				if (!empty($_POST['selectedLFlags']))
				{
					$_SESSION['motorSelectedLFlags'] = Array();
					$_SESSION['motorSelectedLFlags'] = $_POST['selectedLFlags'];
				}
			}
			
			?>
		
	</head>
	<body>
		<div id="container">
			<div id="headerbar">
				<h1>UWS Solar Car Project - Motors</h1>
				<p>
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
				<?php if (!isset($_SESSION['motorSelectedData']) & !isset($_SESSION['motorSelectedEFlags']) && !isset($_SESSION['motorSelectedLFlags']))
				{ ?>
				<div id="firstContent">
					<form method="post" action="motors.php">
						<p>
							<fieldset>
								<legend>Please select the data to be shown.</legend>
								<table id = "motorTable">
									<tr>
										<th colspan="7">
											Motor Data
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "DCBusAmpHours" name = "selectedData[]" value = "DC Bus Amp Hours"> <label for = "DCBusAmpHours"> DC Bus Amp Hours </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorSlipSpeed" name = "selectedData[]" value = "Motor Slip Speed"> <label for = "motorSlipSpeed"> Motor Slip Speed </label>
										</th> 
										<th>
											<input type = "checkbox" id = "vehicleVelocity" name = "selectedData[]" value = "Vehicle Velocity"> <label for = "vehicleVelocity"> Vehicle Velocity </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorVelocity" name = "selectedData[]" value = "Motor Velocity"> <label for = "motorVelocity"> Motor Velocity </label>
										</th> 
										<th>
											<input type = "checkbox" id = "busCurrent" name = "selectedData[]" value = "Bus Current"> <label for = "busCurrent"> Bus Current </label>
										</th> 
										<th>
											<input type = "checkbox" id = "busVoltage" name = "selectedData[]" value = "Bus Voltage"> <label for = "busVoltage"> Bus Voltage </label>
										</th> 
										<th>
											<input type = "checkbox" id = "phaseBCurrent" name = "selectedData[]" value = "Phase B Current"> <label for = "phaseBCurrent"> Phase B Current </label>
										</th> 
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "phaseCCurrent" name = "selectedData[]" value = "Phase C Current"> <label for = "phaseCCurrent"> Phase C Current </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorCurrentD" name = "selectedData[]" value = "Motor Current D"> <label for = "motorCurrentD"> Motor Current D </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorCurrentQ" name = "selectedData[]" value = "Motor Current Q"> <label for = "motorCurrentQ"> Motor Current Q </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorVoltageD" name = "selectedData[]" value = "Motor Voltage D"> <label for = "motorVoltageD"> Motor Voltage D </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorVoltageQ" name = "selectedData[]" value = "Motor Voltage Q"> <label for = "motorVoltageQ"> Motor Voltage Q </label>
										</th> 
										<th>
											<input type = "checkbox" id = "backEMFD" name = "selectedData[]" value = "Back EMF D"> <label for = "backEMFD"> Back EMF D </label>
										</th> 
										<th>
											<input type = "checkbox" id = "backEMFQ" name = "selectedData[]" value = "Back EMF Q"> <label for = "backEMFQ"> Back EMF Q </label>
										</th> 
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "IPMHeatsinkTemp" name = "selectedData[]" value = "IPM Heatsink Temperature"> <label for = "IPMHeatsinkTemp"> IPM Heatsink Temperature </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorTemp" name = "selectedData[]" value = "Motor Temperature"> <label for = "motorTemp"> Motor Temperature </label>
										</th> 
										<th>
											<input type = "checkbox" id = "IPMDSPBoardTemp" name = "selectedData[]" value = "IPM DSP Board Temp"> <label for = "IPMDSPBoardTemp"> IPM DSP Board TempQ </label>
										</th> 
										<th>
											<input type = "checkbox" id = "15VRail" name = "selectedData[]" value = "15V Rail"> <label for = "15VRail"> 15V Rail </label>
										</th> 
										<th>
											<input type = "checkbox" id = "3.3VRail" name = "selectedData[]" value = "3.3V Rail"> <label for = "3.3VRail"> 3.3V Rail </label>
										</th> 
										<th>
											<input type = "checkbox" id = "1.9VRail" name = "selectedData[]" value = "1.9V Rail"> <label for = "1.9VRail"> 1.9V Rail </label>
										</th> 
										<th>
											<input type = "checkbox" id = "receiveErrors" name = "selectedData[]" value = "Receive Errors"> <label for = "receiveErrors"> Receive Errors </label>
										</th> 
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "transmitErrors" name = "selectedData[]" value = "Transmit Errors"> <label for = "transmitErrors"> Transmit Errors </label>
										</th> 
										<th>
											<input type = "checkbox" id = "odometer" name = "selectedData[]" value = "Odometer"> <label for = "odometer"> Odometer </label>
										</th> 
										<th>
											<input type = "checkbox" id = "tritiumMotorID" name = "selectedData[]" value = "Tritium Motor ID"> <label for = "tritiumMotorID"> Tritium Motor ID </label>
										</th> 
										<th>
											<input type = "checkbox" id = "tritiumMotorSerial" name = "selectedData[]" value = "Tritium Motor Serial Number"> <label for = "tritiumMotorSerial"> Tritium Motor Serial Number </label>
										</th> 
										<th>
										</th>
										<th>
										</th>
										<th>
										</th>
									</tr>
									<tr>
										<th colspan="7">
											Error Flags
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "desatFault" name = "selectedEFlags[]" value = "Desaturation Fault"> <label for = "desatFault"> Desaturation Fault </label>
										</th> 
										<th>
											<input type = "checkbox" id = "15RailUnder" name = "selectedEFlags[]" value = "15V Rail Under Voltage"> <label for = "15RailUnder"> 15V Rail Under Voltage </label>
										</th> 
										<th>
											<input type = "checkbox" id = "configReadError" name = "selectedEFlags[]" value = "Config Read Error"> <label for = "configReadError"> Config Read Error </label>
										</th> 
										<th>
											<input type = "checkbox" id = "watchdog" name = "selectedEFlags[]" value = "Watchdog Caused Last Reset"> <label for = "watchdog"> Watchdog Caused Last Reset </label>
										</th> 
										<th>
											<input type = "checkbox" id = "badMotor" name = "selectedEFlags[]" value = "Bad Motor Position Hall Sequence"> <label for = "badMotor"> Bad Motor Position Hall Sequence </label>
										</th> 
										<th>
											<input type = "checkbox" id = "DCBusOverVolt" name = "selectedEFlags[]" value = "DC Bus Over Volt"> <label for = "DCBusOverVolt"> DC Bus Over Volt </label>
										</th> 
										<th>
											<input type = "checkbox" id = "SWOC" name = "selectedEFlags[]" value = "Software Over Current"> <label for = "SWOC"> Software Over Current </label>
										</th> 
									</tr>
									<tr>
										<th>
										</th>
										<th>
										</th>
										<th>
										</th>
										<th>
											<input type = "checkbox" id = "HWOC" name = "selectedEFlags[]" value = "Hardware Over Current"> <label for = "HWOC"> Hardware Over Current </label>
										</th>
										<th>
										</th>
										<th>
										</th>
										<th>
										</th>
									</tr>
									<tr>
										<th colspan="7">
											Limit Flags
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "outputVoltPWM" name = "selectedLFlags[]" value = "Output Voltage PWM"> <label for = "outputVoltPWM"> Output Voltage PWM </label>
										</th> 
										<th>
											<input type = "checkbox" id = "motorCurrentFlag" name = "selectedLFlags[]" value = "Motor Current"> <label for = "motorCurrentFlag"> Motor Current </label>
										</th> 
										<th>
											<input type = "checkbox" id = "velocity" name = "selectedLFlags[]" value = "Velocity"> <label for = "velocity"> Velocity </label>
										</th> 
										<th>
											<input type = "checkbox" id = "busCurrentFlag" name = "selectedLFlags[]" value = "Bus Current"> <label for = "busCurrentFlag"> Bus Current </label>
										</th> 
										<th>
											<input type = "checkbox" id = "BVUL" name = "selectedLFlags[]" value = "Bus Voltage Upper Limit"> <label for = "BVUL"> Bus Voltage Upper Limit </label>
										</th> 
										<th>
											<input type = "checkbox" id = "BVLL" name = "selectedLFlags[]" value = "Bus Voltage Lower Limit"> <label for = "BVLL"> Bus Voltage Lower Limit </label>
										</th> 
										<th>
											<input type = "checkbox" id = "IPMorMotor" name = "selectedLFlags[]" value = "IPM Temp or Motor Temp"> <label for = "IPMorMotor"> IPM Temp or Motor Temp </label>
										</th> 
									</tr>
								</table>
								<br/>
								<input type="submit" value="Submit"></input>
							</fieldset>
						</p>
					</form>
				</div>
				<?php }
				else
				{?>
				<div id="secondContent">
				<form method = "post" action = "motors.php">
					<table>
						<tr>
						<?php if (isset($_SESSION['motorSelectedData']))
						{?>
							<th colspan="12">
								Motor Data
							</th>
						</tr>
						<tr>
							<?php 
							$count = 0;
							$arrayLength = sizeof($_SESSION['motorSelectedData']);
							$numRows = (int)($arrayLength / 6);
							foreach ($_SESSION['motorSelectedData'] as $key => $entry)
							{
								if ( $count % 6 != 0)
								{
									$sqlSelect = sqlLookup($entry);
									$result = mysqli_query($conn, $sqlSelect);
									$row =  mysqli_fetch_assoc($result);
									$tableName = dataNameLookup($entry);
									echo "<th>$entry</th>";
									if (!empty($row[$tableName]))
										echo "<td>$row[$tableName]</td>";
									else 
										echo "<td class = 'highWarn'>N/A</td>";
								}
								else
								{
									$sqlSelect = sqlLookup($entry);
									$result = mysqli_query($conn, $sqlSelect);
									$row =  mysqli_fetch_assoc($result);
									$tableName = dataNameLookup($entry);
									echo "</tr>";
									echo "<tr>";
									echo "<th>$entry</th>";
									if (!empty($row[$tableName]))
										echo "<td>$row[$tableName]</td>";
									else 
										echo "<td class = 'highWarn'>N/A</td>";
								}
								$count++;
							} 
						}?>
						</tr>
						<tr>
						<?php if (isset($_SESSION['motorSelectedEFlags']))
						{?>
							<th colspan="12">
								Error Flags
							</th>
						</tr>
						<tr>
							<?php 
							$count = 0;
							$arrayLength = sizeof($_SESSION['motorSelectedEFlags']);
							$numRows = (int)($arrayLength / 6);
							foreach ($_SESSION['motorSelectedEFlags'] as $key => $entry)
							{
								if ( $count % 6 != 0)
								{
									$sqlSelect = sqlLookup($entry);
									$result = mysqli_query($conn, $sqlSelect);
									$row =  mysqli_fetch_assoc($result);
									$tableName = dataNameLookup($entry);
									echo "<th>$entry</th>";
									if (!empty($row[$tableName]))
										echo "<td>$row[$tableName]</td>";
									else 
										echo "<td class = 'highWarn'>N/A</td>";
								}
								else
								{
									$sqlSelect = sqlLookup($entry);
									$result = mysqli_query($conn, $sqlSelect);
									$row =  mysqli_fetch_assoc($result);
									$tableName = dataNameLookup($entry);
									echo "</tr>";
									echo "<tr>";
									echo "<th>$entry</th>";
									if (!empty($row[$tableName]))
										echo "<td>$row[$tableName]</td>";
									else 
										echo "<td class = 'highWarn'>N/A</td>";
								}
								$count++;
							} 
						}?>
						</tr>
						<tr>
						<?php if (isset($_SESSION['motorSelectedLFlags']))
						{?>
							<th colspan="12">
								Limit Flags
							</th>
						</tr>
						<tr>
							<?php 
							$count = 0;
							$arrayLength = sizeof($_SESSION['motorSelectedLFlags']);
							$numRows = (int)($arrayLength / 6);
							foreach ($_SESSION['motorSelectedLFlags'] as $key => $entry)
							{
								if ( $count % 6 != 0)
								{
									$sqlSelect = sqlLookup($entry);
									$result = mysqli_query($conn, $sqlSelect);
									$row =  mysqli_fetch_assoc($result);
									$tableName = dataNameLookup($entry);
									echo "<th>$entry</th>";
									if (!empty($row[$tableName]))
										echo "<td>$row[$tableName]</td>";
									else 
										echo "<td class = 'highWarn'>N/A</td>";
								}
								else
								{
									$sqlSelect = sqlLookup($entry);
									$result = mysqli_query($conn, $sqlSelect);
									$row =  mysqli_fetch_assoc($result);
									$tableName = dataNameLookup($entry);
									echo "</tr>";
									echo "<tr>";
									echo "<th>$entry</th>";
									if (!empty($row[$tableName]))
										echo "<td>$row[$tableName]</td>";
									else 
										echo "<td class = 'highWarn'>N/A</td>";
								}
								$count++;
							} 
						}?>
						</tr>
						
					</table>
					<input type = "submit" value = "Reset Choices" name = "resetSession"/>
				</form>
				<?php } ?>
				
		</div>
	</body>
</html> 

