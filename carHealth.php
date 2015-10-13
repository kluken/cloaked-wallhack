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
		
		$motorTempSelect = "SELECT round((avg(Motor_Temp)), 2) AS Motor_Temp FROM (SELECT `Motor_Temp` FROM `IPM_Heatsink_and_Motor_Temperature_Measurement` ORDER BY time_stamp DESC LIMIT 10) `Motor_Temp`";
		$IPMSelect = "SELECT round((avg(dsp_board_temp)), 2) AS dsp_board_temp FROM (SELECT `dsp_board_temp` FROM `ipm_dsp_board_temperature_measurement` ORDER BY time_stamp DESC LIMIT 10) `dsp_board_temp`";
		$mppt1TempSelect = "SELECT round((avg(Temperature)), 2) AS Temperature FROM (SELECT `Temperature` FROM `MPPT1` ORDER BY time_stamp DESC LIMIT 10) `Temperature`";
		$mppt2TempSelect = "SELECT round((avg(Temperature)), 2) AS Temperature FROM (SELECT `Temperature` FROM `MPPT2` ORDER BY time_stamp DESC LIMIT 10) `Temperature`";
		$shuntVoltSelect = "select round((avg(`bus_voltage_(V)`)), 2) AS `bus_voltage` from (select `bus_voltage_(V)` from `bmu_bus_measurement` order by time_stamp desc limit 10) `bus_voltage`";
		$shuntCurrentSelect = "select round((avg(`bus_current_(A)`)), 2) AS `bus_current` from (select `bus_current_(A)` from `bmu_bus_measurement` order by time_stamp desc limit 10) `bus_current`";
		$shuntPowerSelect = "select round((avg(`bus_current_(A)`)), 2) * round((avg(`bus_voltage_(V)`)), 2) AS `bus_power` from (select `bus_voltage_(V)`, `bus_current_(A)` from `bmu_bus_measurement` order by time_stamp desc limit 10) `bus_voltage`";
		$minCellVoltSelect = "SELECT `Minimum_Cell_Voltage` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cmuWithMinCellVoltSelect = "SELECT `CMU_with_Minimum_Voltage` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cellWithMinCellVoltSelect = "SELECT `Cell_with_Minimum_Voltage` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$maxCellVoltSelect = "SELECT `Maximum_Cell_Voltage` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cmuWithMaxCellVoltSelect = "SELECT `CMU_with_Maximum_Voltage` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cellWithMaxCellVoltSelect = "SELECT `Cell_with_Maximum_Voltage` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$desatFaultSelect = "SELECT (sum(desaturation_fault)) AS desaturation_fault FROM (SELECT `desaturation_fault` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `desaturation_fault`";
		$railUnder15VSelect = "SELECT (sum(15v_rail_under_voltage)) AS 15v_rail_under_voltage FROM (SELECT `15v_rail_under_voltage` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `15v_rail_under_voltage`";
		$configReadErrorSelect = "SELECT (sum(config_read_error)) AS config_read_error FROM (SELECT `config_read_error` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `config_read_error`";
		$watchdogSelect = "SELECT (sum(watchdog_caused_last_reset)) AS watchdog_caused_last_reset FROM (SELECT `watchdog_caused_last_reset` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `watchdog_caused_last_reset`";
		$badMotorPositionSelect = "SELECT (sum(bad_motor_position_hall_sequence)) AS bad_motor_position_hall_sequence FROM (SELECT `bad_motor_position_hall_sequence` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `bad_motor_position_hall_sequence`";
		$dcBusUnderVoltSelect = "SELECT (sum(dc_bus_over_voltage)) AS dc_bus_over_voltage FROM (SELECT `dc_bus_over_voltage` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `dc_bus_over_voltage`";
		$swocSelect = "SELECT (sum(software_over_current)) AS software_over_current FROM (SELECT `software_over_current` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `software_over_current`";
		$hwocSelect = "SELECT (sum(hardware_over_current)) AS hardware_over_current FROM (SELECT `hardware_over_current` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `hardware_over_current`";
		$outputVoltagePWMSelect = "SELECT (sum(output_voltage_pwm)) AS output_voltage_pwm FROM (SELECT `output_voltage_pwm` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `output_voltage_pwm`";
		$motorCurrentFlagSelect = "SELECT (sum(motor_current)) AS motor_current FROM (SELECT `motor_current` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `motor_current`";
		$velocityFlagSelect	= "SELECT (sum(velocity)) AS velocity FROM (SELECT `velocity` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `velocity`";
		$busCurrentFlagSelect = "SELECT (sum(bus_current)) AS bus_current FROM (SELECT `bus_current` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `bus_current`";
		$busVoltUpperLimitFlagSelect = "SELECT (sum(bus_voltage_upper_limit)) AS bus_voltage_upper_limit FROM (SELECT `bus_voltage_upper_limit` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `bus_voltage_upper_limit`";
		$busVoltLowerLimitFlagSelect = "SELECT (sum(bus_voltage_lower_limit)) AS bus_voltage_lower_limit FROM (SELECT `bus_voltage_lower_limit` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `bus_voltage_lower_limit`";
		$ipmOrMotorTempFlagSelect = "SELECT (sum(ipm_temp_or_motor_temp)) AS ipm_temp_or_motor_temp FROM (SELECT `ipm_temp_or_motor_temp` FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `ipm_temp_or_motor_temp`";
		$mppt1BattOverVoltFlagSelect = "SELECT (sum(battery_over_voltage)) AS battery_over_voltage1 FROM (SELECT `battery_over_voltage` FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `battery_over_voltage1`";
		$mppt1OverTempFlagSelect = "SELECT (sum(over_temperature)) AS over_temperature1 FROM (SELECT `over_temperature` FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `over_temperature1`";
		$mppt1NoConnectFlagSelect = "SELECT (sum(no_connection)) AS no_connection1 FROM (SELECT `no_connection` FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `no_connection1`";
		$mppt1InputUnderVoltFlagSelect = "SELECT (sum(under_voltage)) AS under_voltage1 FROM (SELECT `under_voltage` FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `under_voltage1`";
		$mppt2BattOverVoltFlagSelect = "SELECT (sum(battery_over_voltage)) AS battery_over_voltage2 FROM (SELECT `battery_over_voltage` FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `output_voltage_pwm`";
		$mppt2OverTempFlagSelect = "SELECT (sum(over_temperature)) AS over_temperature2 FROM (SELECT `over_temperature` FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `over_temperature2`";
		$mppt2NoConnectFlagSelect = "SELECT (sum(no_connection)) AS no_connection2 FROM (SELECT `no_connection` FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `no_connection2`";
		$mppt2InputUnderVoltFlagSelect = "SELECT (sum(under_voltage)) AS under_voltage2 FROM (SELECT `under_voltage` FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `under_voltage2`";
		
		$result = mysqli_query($conn, $motorTempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$motorTempData = mysqli_fetch_array($result)["Motor_Temp"];
		else 
			$motorTempData = "";
		
		$result = mysqli_query($conn, $IPMSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$IPMData = mysqli_fetch_array($result)["dsp_board_temp"];
		else 
			$IPMData = "";
		
		$result = mysqli_query($conn, $mppt1TempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt1TempData = mysqli_fetch_array($result)["Temperature"];
		else 
			$mppt1TempData = "";
			
		$result = mysqli_query($conn, $mppt2TempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt2TempData = mysqli_fetch_array($result)["Temperature"];
		else 
			$mppt2TempData = "";
			
		$result = mysqli_query($conn, $mppt2TempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt2TempData = mysqli_fetch_array($result)["Temperature"];
		else 
			$mppt2TempData = "";
			
		$result = mysqli_query($conn, $shuntCurrentSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$shuntCurrentData = mysqli_fetch_array($result)["bus_current"];
		else 
			$mppt2TempData = "";
		
		$result = mysqli_query($conn, $shuntVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$shuntVoltData = mysqli_fetch_array($result)["bus_voltage"];
		else 
			$minCellVoltData = "";
			
		$result = mysqli_query($conn, $shuntPowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$shuntPowerData = mysqli_fetch_array($result)["bus_power"];
		else 
			$shuntPowerData = "";
			
		$result = mysqli_query($conn, $minCellVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$minCellVoltData = mysqli_fetch_array($result)["Minimum_Cell_Voltage"];
		else 
			$minCellVoltData = "";
		
		$result = mysqli_query($conn, $cmuWithMinCellVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$cmuWithMinCellVoltData = mysqli_fetch_array($result)["CMU_with_Minimum_Voltage"];
		else 
			$cmuWithMinCellVoltData = "";
		
		$result = mysqli_query($conn, $cellWithMinCellVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$cellWithMinCellVoltData = mysqli_fetch_array($result)["Cell_with_Minimum_Voltage"];
		else 
			$cellWithMinCellVoltData = "";
		
		$result = mysqli_query($conn, $maxCellVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$maxCellVoltData = mysqli_fetch_array($result)["Maximum_Cell_Voltage"];
		else 
			$maxCellVoltData = "";
		
		$result = mysqli_query($conn, $cmuWithMaxCellVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$cmuWithMaxCellVoltData = mysqli_fetch_array($result)["CMU_with_Maximum_Voltage"];
		else 
			$cmuWithMaxCellVoltData = "";
		
		$result = mysqli_query($conn, $cellWithMaxCellVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$cellWithMaxCellVoltData = mysqli_fetch_array($result)["Cell_with_Maximum_Voltage"];
		else 
			$cellWithMaxCellVoltData = "";
		
		$result = mysqli_query($conn, $desatFaultSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$desatFaultData = mysqli_fetch_array($result)["desaturation_fault"];
		else 
			$desatFaultData = "";
		
		$result = mysqli_query($conn, $railUnder15VSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$railUnder15VData = mysqli_fetch_array($result)["15v_rail_under_voltage"];
		else 
			$railUnder15VData = "";
		
		$result = mysqli_query($conn, $configReadErrorSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$configReadErrorData = mysqli_fetch_array($result)["config_read_error"];
		else 
			$configReadErrorData = "";
		
		$result = mysqli_query($conn, $watchdogSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$watchdogData = mysqli_fetch_array($result)["watchdog_caused_last_reset"];
		else 
			$watchdogData = "";
		
		$result = mysqli_query($conn, $badMotorPositionSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$badMotorPositionData = mysqli_fetch_array($result)["bad_motor_position_hall_sequence"];
		else 
			$badMotorPositionData = "";
		
		$result = mysqli_query($conn, $dcBusUnderVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$dcBusUnderVoltData = mysqli_fetch_array($result)["dc_bus_over_voltage"];
		else 
			$dcBusUnderVoltData = "";
		
		$result = mysqli_query($conn, $swocSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$swocData = mysqli_fetch_array($result)["software_over_current"];
		else 
			$swocData = "";
		
		$result = mysqli_query($conn, $hwocSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$hwocData = mysqli_fetch_array($result)["hardware_over_current"];
		else 
			$hwocData = "";
		
		$result = mysqli_query($conn, $outputVoltagePWMSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$outputVoltagePWMData = mysqli_fetch_array($result)["output_voltage_pwm"];
		else 
			$outputVoltagePWMData = "";
		
		$result = mysqli_query($conn, $motorCurrentFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$motorCurrentFlagData = mysqli_fetch_array($result)["motor_current"];
		else 
			$motorCurrentFlagData = "";
		
		$result = mysqli_query($conn, $velocityFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$velocityFlagData = mysqli_fetch_array($result)["velocity"];
		else 
			$velocityFlagData = "";
		
		$result = mysqli_query($conn, $busCurrentFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$busCurrentFlagData = mysqli_fetch_array($result)["bus_current"];
		else 
			$busCurrentFlagData = "";
		
		$result = mysqli_query($conn, $busVoltUpperLimitFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$busVoltUpperLimitFlagData = mysqli_fetch_array($result)["bus_voltage_upper_limit"];
		else 
			$busVoltUpperLimitFlagData = "";
		
		$result = mysqli_query($conn, $busVoltLowerLimitFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$busVoltLowerLimitFlagData = mysqli_fetch_array($result)["bus_voltage_lower_limit"];
		else 
			$busVoltLowerLimitFlagData = "";
			
		$result = mysqli_query($conn, $ipmOrMotorTempFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$ipmOrMotorTempFlagData = mysqli_fetch_array($result)["ipm_temp_or_motor_temp"];
		else 
			$ipmOrMotorTempFlagData = "";
		
		$result = mysqli_query($conn, $mppt1OverTempFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt1OverTempFlagData = mysqli_fetch_array($result)["over_temperature1"];
		else 
			$mppt1OverTempFlagData = "";
		
		$result = mysqli_query($conn, $mppt1OverTempFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt1OverTempFlagData = mysqli_fetch_array($result)["no_connection1"];
		else 
			$mppt1OverTempFlagData = "";
		
		$result = mysqli_query($conn, $mppt1NoConnectFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt1NoConnectFlagData = mysqli_fetch_array($result)["battery_over_voltage1"];
		else 
			$mppt1NoConnectFlagData = "";
		
		$result = mysqli_query($conn, $mppt1InputUnderVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt1InputUnderVoltFlagData = mysqli_fetch_array($result)["under_voltage1"];
		else 
			$mppt1InputUnderVoltFlagData = "";
		
		$result = mysqli_query($conn, $mppt2OverTempFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt2OverTempFlagData = mysqli_fetch_array($result)["over_temperature2"];
		else 
			$mppt2OverTempFlagData = "";
		
		$result = mysqli_query($conn, $mppt2NoConnectFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		$mppt2NoConnectFlagData = mysqli_fetch_array($result)["no_connection2"];
		else 
			$mppt2NoConnectFlagData = "";
		
		$result = mysqli_query($conn, $mppt2BattOverVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
				$mppt2BattOverVoltFlagData = mysqli_fetch_array($result)["battery_over_voltage2"];
		else 
			$mppt2BattOverVoltFlagData = "";
		
		$result = mysqli_query($conn, $mppt2InputUnderVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
			$mppt2InputUnderVoltFlagData = mysqli_fetch_array($result)["under_voltage2"];
		else 
			$mppt2InputUnderVoltFlagData = "";
		
		
		
//SELECT date_add(date(`time_stamp`), INTERVAL hour(`time_stamp`) HOUR) `time_stamp`, avg(`Bus_Current`) `Bus_Current`, avg(`Bus_Voltage`) `Bus_Voltage` from `Bus_Measurement` GROUP BY date_add(date(`time_stamp`), INTERVAL hour(`time_stamp`) HOUR) ORDER BY date_add(date(`time_stamp`), INTERVAL hour(`time_stamp`) HOUR);

	?>
	
		<script src="jquery-2.1.4.min.js"></script>
		<script>
			function refreshTable() 
			{
				$('#content').load( "carHealth.php #content");
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
						<?php 
							if ($motorTempData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $motorTempData; 
						?>
						</td>
						<th>
							IPM DSP Temp
						</th>
						<?php 
							if ($IPMData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $IPMData; 
						?>
						</td>
						<th>
							MPPT1 Temp
						</th>
						<?php 
							if ($mppt1TempData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $mppt1TempData; 
						?>
						</td>
						<th>
							MPPT2 Temp
						</th>
						<?php 
							if ($mppt2TempData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $mppt2TempData; 
						?>
					</tr>
					<tr>
						<th colspan="8"> 
							Power Figures
						</th>
					</tr>
					<tr>
						<th>
							Shunt Voltage
						</th>
						<?php 
							if ($shuntVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $shuntVoltData; 
							}
						?>
						</td>
						<th>
							Shunt Current
						</th>
						<?php 
							if ($shuntCurrentData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $shuntCurrentData;
							}
						?>
						</td>
						<th>
							Power
						</th>
						<?php 
							if ($shuntPowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $shuntPowerData; 
							}
						?>
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
						<?php 
							if ($minCellVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $minCellVoltData; 
						?>
						<th>
							CMU with Minimum Voltage
						</th>
						<?php 
							if ($cmuWithMinCellVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $cmuWithMinCellVoltData; 
						?>
						<th>
							Cell with Minimum Voltage
						</th>
						<?php 
							if ($cellWithMinCellVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $cellWithMinCellVoltData; 
						?>
						<td rowspan="2" colspan="2">
						</td>
					</tr>
					<tr>
						<th>
							Maximum Cell Voltage
						</th>
						<?php 
							if ($maxCellVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $maxCellVoltData; 
						?>
						<th>
							CMU with Maximum Voltage
						</th>
						<?php 
							if ($cmuWithMaxCellVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $cmuWithMaxCellVoltData; 
						?>
						<th>
							Cell with Maximum Voltage
						</th>
						<?php 
							if ($cellWithMaxCellVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $cellWithMaxCellVoltData; 
						?>
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
						<?php 
							if ($desatFaultData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($desatFaultData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							15V Rail Under Volt
						</th>
						<?php 
							if ($railUnder15VData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($railUnder15VData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Config Read Error
						</th>
						<?php 
							if ($configReadErrorData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($configReadErrorData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Watchdog Caused Last Reset
						</th>
						<?php 
							if ($watchdogData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($watchdogData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
					</tr>
					<tr>
						<th>
							Bad Motor Position Hall Sequence
						</th>
						<?php 
							if ($badMotorPositionData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($badMotorPositionData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							DC Bus Over Volt
						</th>
						<?php 
							if ($dcBusUnderVoltData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($dcBusUnderVoltData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Software Over Current
						</th>
						<?php 
							if ($swocData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($swocData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Hardware Over Current
						</th>
						<?php 
							if ($hwocData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($hwocData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
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
						<?php 
							if ($outputVoltagePWMData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($outputVoltagePWMData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Motor Current
						</th>
						<?php 
							if ($motorCurrentFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($motorCurrentFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Velocity
						</th>
						<?php 
							if ($velocityFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($velocityFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Bus Current
						</th>
						<?php 
							if ($busCurrentFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($busCurrentFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
					</tr>
					<tr>
						<th>
							Bus Voltage Upper Limiting
						</th>
						<?php 
							if ($busVoltUpperLimitFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($busVoltUpperLimitFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							Bus Voltage Lower Limiting
						</th>
						<?php 
							if ($busVoltLowerLimitFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($busVoltLowerLimitFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							IPM Temp or Motor Temp
						</th>
						<?php 
							if ($ipmOrMotorTempFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($ipmOrMotorTempFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
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
						<?php 
							if ($mppt1BattOverVoltFlagSelect == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt1BattOverVoltFlagSelect > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							MPPT1 Over Temp
						</th>
						<?php 
							if ($mppt1OverTempFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt1OverTempFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							MPPT1 No Connection
						</th>
						<?php 
							if ($mppt1NoConnectFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt1NoConnectFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							MPPT1 Input Under Voltage
						</th>
						<?php 
							if ($mppt1InputUnderVoltFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt1InputUnderVoltFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
					</tr>
					<tr>
						<th>
							MPPT2 Battery Over Voltage
						</th>
						<?php 
							if ($mppt2BattOverVoltFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt2BattOverVoltFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							MPPT2 Over Temp
						</th>
						<?php 
							if ($mppt2OverTempFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt2OverTempFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							MPPT2 No Connection
						</th>
						<?php 
							if ($mppt2NoConnectFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt2NoConnectFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
						<th>
							MPPT2 Input Under Voltage
						</th>
						<?php 
							if ($mppt2InputUnderVoltFlagData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($mppt2InputUnderVoltFlagData > 0)
							{
								echo "<td class = 'highWarn'>";
								echo "error"; 
							}
							else 
							{
								echo "<td>";
								echo "OK"; 
							}
						?>
						</td>
					</tr>
					
				</table>
			</p>
		</div>
	</body>

</html> 