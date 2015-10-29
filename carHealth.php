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
		
		$motorTempSelect = "SELECT round((avg(Motor_Temp)), 2) AS Motor_Temp, time_stamp FROM (SELECT `Motor_Temp`, time_stamp FROM `IPM_Heatsink_and_Motor_Temperature_Measurement` ORDER BY time_stamp DESC LIMIT 10) `Motor_Temp`";
		$IPMSelect = "SELECT round((avg(ipm_heatsink_temp)), 2) AS dsp_board_temp, time_stamp FROM (SELECT `ipm_heatsink_temp`, time_stamp FROM `ipm_heatsink_and_motor_temperature_measurement` ORDER BY time_stamp DESC LIMIT 10) `dsp_board_temp`";
		$mppt1TempSelect = "SELECT round((avg(Temperature)), 2) AS Temperature, time_stamp FROM (SELECT `Temperature`, time_stamp FROM `MPPT1` ORDER BY time_stamp DESC LIMIT 10) `Temperature`";
		$mppt2TempSelect = "SELECT round((avg(Temperature)), 2) AS Temperature, time_stamp FROM (SELECT `Temperature`, time_stamp FROM `MPPT2` ORDER BY time_stamp DESC LIMIT 10) `Temperature`";
		$instantMotorPowerSelect = "select round(avg(`Bus_Current`) * avg(`Bus_Voltage`), 2) AS pout from (select `Bus_Voltage`, `Bus_Current` from `bus_measurement` order by time_stamp desc limit 2) `pout`";
		$instantSpeedSelect = "select round((avg(`vehicle_velocity`) * 3.6), 2) as `vehicle_velocity` from (select `vehicle_velocity` from `velocity_measurement` order by time_stamp desc limit 5) `vehicle_velocity`";
		$shuntVoltSelect = "select round((avg(`bus_voltage_(V)`)), 2) AS `bus_voltage`, time_stamp from (select `bus_voltage_(V)`, time_stamp from `bmu_bus_measurement` order by time_stamp desc limit 10) `bus_voltage`";
		$shuntCurrentSelect = "select round((avg(`bus_current_(A)`)), 2) AS `bus_current`, time_stamp from (select `bus_current_(A)`, time_stamp from `bmu_bus_measurement` order by time_stamp desc limit 10) `bus_current`";
		$shuntPowerSelect = "select round((avg(`bus_current_(A)`)), 2) * round((avg(`bus_voltage_(V)`)), 2) AS `bus_power`, time_stamp from (select `bus_voltage_(V)`, `bus_current_(A)`, time_stamp from `bmu_bus_measurement` order by time_stamp desc limit 10) `bus_voltage`";
		$shuntWattHours =  "select 	`total_watt_hours` from `total_watt_hours` order by time_stamp desc limit 1";
		$avgMotorPowerSelect = "SELECT avg_motor_power from avg_motor_power_and_total_trackers order by time_stamp desc limit 1";
		$totalTrackerPowerSelect = "select trackers_total_whrs from avg_motor_power_and_total_trackers order by time_stamp desc limit 1";
		$avgTracker1Power = "select avg_tracker_1 from avg_tracker_power order by time_stamp desc limit 1";
		$avgTracker2Power = "select avg_tracker_2 from avg_tracker_power order by time_stamp desc limit 1";
		$mppt1PowerSelect = "select round((avg(`uin`) * 1.5 * 0.1) * (avg(`iin`)  * 0.87 * 0.01 ), 2) AS pin from (select `iin`, `uin` from `mppt1` order by time_stamp desc limit 10) `pin`";
		$mppt2PowerSelect = "select round((avg(`uin`) * 1.5 * 0.1) * (avg(`iin`)  * 0.87 * 0.01 ), 2) AS pin from (select `iin`, `uin` from `mppt2` order by time_stamp desc limit 10) `pin`";
		$minCellVoltSelect = "SELECT `Minimum_Cell_Voltage`, time_stamp FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cmuWithMinCellVoltSelect = "SELECT `CMU_with_Minimum_Voltage`, time_stamp FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cellWithMinCellVoltSelect = "SELECT `Cell_with_Minimum_Voltage, time_stamp` FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$maxCellVoltSelect = "SELECT `Maximum_Cell_Voltage`, time_stamp FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cmuWithMaxCellVoltSelect = "SELECT `CMU_with_Maximum_Voltage`, time_stamp FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$cellWithMaxCellVoltSelect = "SELECT `Cell_with_Maximum_Voltage`, time_stamp FROM `minimum_/_maximum_cell_voltage` ORDER BY packet_number DESC LIMIT 1;";
		$desatFaultSelect = "SELECT (sum(desaturation_fault)) AS desaturation_fault, time_stamp FROM (SELECT `desaturation_fault`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `desaturation_fault`";
		$railUnder15VSelect = "SELECT (sum(15v_rail_under_voltage)) AS 15v_rail_under_voltage, time_stamp FROM (SELECT `15v_rail_under_voltage`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `15v_rail_under_voltage`";
		$configReadErrorSelect = "SELECT (sum(config_read_error)) AS config_read_error, time_stamp FROM (SELECT `config_read_error`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `config_read_error`";
		$watchdogSelect = "SELECT (sum(watchdog_caused_last_reset)) AS watchdog_caused_last_reset, time_stamp FROM (SELECT `watchdog_caused_last_reset`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `watchdog_caused_last_reset`";
		$badMotorPositionSelect = "SELECT (sum(bad_motor_position_hall_sequence)) AS bad_motor_position_hall_sequence, time_stamp FROM (SELECT `bad_motor_position_hall_sequence`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `bad_motor_position_hall_sequence`";
		$dcBusUnderVoltSelect = "SELECT (sum(dc_bus_over_voltage)) AS dc_bus_over_voltage, time_stamp FROM (SELECT `dc_bus_over_voltage`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `dc_bus_over_voltage`";
		$swocSelect = "SELECT (sum(software_over_current)) AS software_over_current, time_stamp FROM (SELECT `software_over_current`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `software_over_current`";
		$hwocSelect = "SELECT (sum(hardware_over_current)) AS hardware_over_current, time_stamp FROM (SELECT `hardware_over_current`, time_stamp FROM `status_information` ORDER BY time_stamp DESC LIMIT 10) `hardware_over_current`";
		$mppt1BattOverVoltFlagSelect = "SELECT (sum(battery_over_voltage)) AS battery_over_voltage, time_stamp FROM (SELECT `battery_over_voltage`, time_stamp FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `battery_over_voltage`";
		$mppt1OverTempFlagSelect = "SELECT (sum(`over temperature`)) AS over_temperature, time_stamp FROM (SELECT `over temperature`, time_stamp FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `over_temperature`";
		$mppt1NoConnectFlagSelect = "SELECT (sum(`no connection`)) AS no_connection, time_stamp FROM (SELECT `no connection`, time_stamp FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `no_connection`";
		$mppt1InputUnderVoltFlagSelect = "SELECT (sum(`under voltage`)) AS under_voltage, time_stamp FROM (SELECT `under voltage`, time_stamp FROM `mppt1` ORDER BY time_stamp DESC LIMIT 10) `under_voltage`";
		$mppt2BattOverVoltFlagSelect = "SELECT (sum(`battery over voltage`)) AS battery_over_voltage, time_stamp FROM (SELECT `battery over voltage`, time_stamp FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `battery over voltage`";
		$mppt2OverTempFlagSelect = "SELECT (sum(`over temperature`)) AS over_temperature, time_stamp FROM (SELECT `over temperature`, time_stamp FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `over_temperature`";
		$mppt2NoConnectFlagSelect = "SELECT (sum(`no connection`)) AS no_connection, time_stamp FROM (SELECT `no connection`, time_stamp FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `no_connection`";
		$mppt2InputUnderVoltFlagSelect = "SELECT (sum(`under voltage`)) AS under_voltage, time_stamp FROM (SELECT `under voltage`, time_stamp FROM `mppt2` ORDER BY time_stamp DESC LIMIT 10) `under_voltage`";
		
		$result = mysqli_query($conn, $motorTempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$motorTempData = mysqli_fetch_array($result)["Motor_Temp"];
		}
		else 
		{
			$motorTempData = "";
		}
		
		$result = mysqli_query($conn, $IPMSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$IPMData = mysqli_fetch_array($result)["dsp_board_temp"];
		}
		else 
		{
			$IPMData = "";
			$IPMTempTimeData = "";
		}
		
		$result = mysqli_query($conn, $mppt1TempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt1TempData = mysqli_fetch_array($result)["Temperature"];
		}
		else 
		{
			$mppt1TempData = "";
		}

		$result = mysqli_query($conn, $mppt2TempSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt2TempData = mysqli_fetch_array($result)["Temperature"];
		}
		else 
		{
			$mppt2TempData = "";
		}
		
		$result = mysqli_query($conn, $instantMotorPowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$instantMotorPowerData = mysqli_fetch_array($result)["pout"];
		}
		else 
		{
			$instantMotorPowerData = "";
		}

		$result = mysqli_query($conn, $instantSpeedSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$instantSpeedData = mysqli_fetch_array($result)["vehicle_velocity"];
		}
		else 
		{
			$instantSpeedData = "";
		}
			
		$result = mysqli_query($conn, $shuntCurrentSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$shuntCurrentData = mysqli_fetch_array($result)["bus_current"];
		}
		else 
		{
			$shuntCurrentData = "";
		}
		
		$result = mysqli_query($conn, $shuntVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$shuntVoltData = mysqli_fetch_array($result)["bus_voltage"];
		}
		else 
		{
			$shuntVoltData = "";
		}
			
		$result = mysqli_query($conn, $shuntPowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$shuntPowerData = mysqli_fetch_array($result)["bus_power"];
		}
		else 
		{
			$shuntPowerData = "";
		}
		
		
		$result = mysqli_query($conn, $shuntWattHours);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$shuntWattHoursData = mysqli_fetch_array($result)["total_watt_hours"] + 2735.37;//3184.66;//1600; //+ 1233.15;//3044.16;//1195.794;//2454.284;//2990.28; //2071.9
		}
		else 
		{
			$shuntWattHoursData = "";
		}
		
		$result = mysqli_query($conn, $avgMotorPowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$avgMotorPowerData = mysqli_fetch_array($result)["avg_motor_power"];
		}
		else 
		{
			$avgMotorPowerData = "";
		}
		
		$result = mysqli_query($conn, $totalTrackerPowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$totalTrackerPowerData = mysqli_fetch_array($result)["trackers_total_whrs"];
		}
		else 
		{
			$totalTrackerPowerData = "";
		}
		
		$result = mysqli_query($conn, $avgTracker1Power);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$avgTracker1Data = mysqli_fetch_array($result)["avg_tracker_1"];
		}
		else 
		{
			$avgTracker1Data = "";
		}
		
		$result = mysqli_query($conn, $avgTracker2Power);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$avgTracker2Data = mysqli_fetch_array($result)["avg_tracker_2"];
		}
		else 
		{
			$avgTracker2Data = "";
		}
		
		$result = mysqli_query($conn, $mppt1PowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt1PowerData = mysqli_fetch_array($result)["pin"];
		}
		else 
		{
			$mppt1PowerData = "";
		}
		
		$result = mysqli_query($conn, $mppt2PowerSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt2PowerData = mysqli_fetch_array($result)["pin"];
		}
		else 
		{
			$mppt2PowerData = "";
		}
		
		$result = mysqli_query($conn, $desatFaultSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$desatFaultData = mysqli_fetch_array($result)["desaturation_fault"];
		}
		else 
		{
			$desatFaultData = "";
		}
		
		$result = mysqli_query($conn, $railUnder15VSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$railUnder15VData = mysqli_fetch_array($result)["15v_rail_under_voltage"];
		}
		else 
		{
			$railUnder15VData = "";
		}
		
		$result = mysqli_query($conn, $configReadErrorSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$configReadErrorData = mysqli_fetch_array($result)["config_read_error"];
		}
		else 
		{
			$configReadErrorData = "";
		}
		
		$result = mysqli_query($conn, $watchdogSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$watchdogData = mysqli_fetch_array($result)["watchdog_caused_last_reset"];
		}
		else 
		{
			$watchdogData = "";
		}
		
		$result = mysqli_query($conn, $badMotorPositionSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$badMotorPositionData = mysqli_fetch_array($result)["bad_motor_position_hall_sequence"];
		}
		else 
		{
			$badMotorPositionData = "";
		}
		
		$result = mysqli_query($conn, $dcBusUnderVoltSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$dcBusUnderVoltData = mysqli_fetch_array($result)["dc_bus_over_voltage"];
		}
		else 
		{
			$dcBusUnderVoltData = "";
		}
		
		$result = mysqli_query($conn, $swocSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$swocData = mysqli_fetch_array($result)["software_over_current"];
		}
		else 
		{
			$swocData = "";
		}
		
		$result = mysqli_query($conn, $hwocSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$hwocData = mysqli_fetch_array($result)["hardware_over_current"];
		}
		else 
		{
			$hwocData = "";
		}
		
		$result = mysqli_query($conn, $mppt1OverTempFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt1OverTempFlagData = mysqli_fetch_array($result)["over_temperature"];
		}
		else 
		{
			$mppt1OverTempFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt1NoConnectFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt1NoConnectFlagData = mysqli_fetch_array($result)["no_connection"];
		}
		else 
		{
			$mppt1NoConnectFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt1BattOverVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt1BattOverVoltFlagData = mysqli_fetch_array($result)["battery_over_voltage"];
		}
		else 
		{
			$mppt1BattOverVoltFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt1InputUnderVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt1InputUnderVoltFlagData = mysqli_fetch_array($result)["under_voltage"];
		}
		else 
		{
			$mppt1InputUnderVoltFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt2OverTempFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt2OverTempFlagData = mysqli_fetch_array($result)["over_temperature"];
		}
		else 
		{
			$mppt2OverTempFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt2NoConnectFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt2NoConnectFlagData = mysqli_fetch_array($result)["no_connection"];
		}
		else 
		{
			$mppt2NoConnectFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt2BattOverVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt2BattOverVoltFlagData = mysqli_fetch_array($result)["battery_over_voltage"];
		}
		else 
		{
			$mppt2BattOverVoltFlagData = "";
		}
		
		$result = mysqli_query($conn, $mppt2InputUnderVoltFlagSelect);
		if ($result != false && mysqli_num_rows($result) > 0)
		{
			$mppt2InputUnderVoltFlagData = mysqli_fetch_array($result)["under_voltage"];
		}
		else 
		{
			$mppt2InputUnderVoltFlagData = "";
		}
		
		
		
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
							Motor Temp
						</th>
						<?php 
							if ($motorTempData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($motorTempData > 85)
								echo "<td class = 'highWarn'>";
							else if ($motorTempData > 65)
								echo "<td class = 'medWarn'>";
							else
								echo "<td>";
							echo $motorTempData; 
						?>
						</td>
						<th>
							Motor Controller Temp
						</th>
						<?php 
							if ($IPMData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($IPMData > 85)
								echo "<td class = 'highWarn'>";
							else if ($IPMData > 65)
								echo "<td class = 'medWarn'>";
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
							else if ($mppt1TempData > 85)
								echo "<td class = 'highWarn'>";
							else if ($mppt1TempData > 65)
								echo "<td class = 'medWarn'>";
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
							else if ($mppt2TempData > 85)
								echo "<td class = 'highWarn'>";
							else if ($mppt2TempData > 65)
								echo "<td class = 'medWarn'>";
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
						</th>
						<th>
						</th>
						<th>
						</th>
						<th>
						</th>
						<th>
							Instant Motor Power
						</th>
						<?php 
							if ($instantMotorPowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $instantMotorPowerData; 
						?>
						</td>
						<th>
							Instant Speed (km/hr)
						</th>
						<?php 
							if ($instantSpeedData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
								echo "<td>";
							echo $instantSpeedData; 
						?>
						</td>
						
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
							Shunt Power
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
								echo round($shuntPowerData, 2); 
							}
						?>
						</td>
						<th>
							Total Watt Hours Used
						</th>
						<?php 
							if ($shuntWattHoursData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else if ($shuntWattHoursData > 0)
							{
								echo "<td class = 'lowWarn'>";
								echo round($shuntWattHoursData, 2); 
							}
							else
							{
								echo "<td class = 'goodData'>";
								echo round($shuntWattHoursData, 2); 
							}
						?>
						</td>							
					</tr>
					<tr>
						<th>
							Total Watt Hours Remaining
						</th>
						<?php 
							if ($shuntWattHoursData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo round(4100 - $shuntWattHoursData, 2); 
							}
						?>
						</td>
						<th>
							Battery SOC
						</th>
						<?php 
							if ($shuntWattHoursData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo round((4100 - $shuntWattHoursData) / 4100 * 100, 2); 
								echo "%";
							}
						?>
						</td>
						<th>
							Average Motor Draw
						</th>
						<?php 
							if ($avgMotorPowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $avgMotorPowerData; 
							}
						?>
						</td>
						<th>
							Total Tracker WHrs
						</th>
						<?php 
							if ($totalTrackerPowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $totalTrackerPowerData; 
							}
						?>
						</td>
						
					</tr>
					<tr>
						<th>
							Average Tracker 1 Power
						</th>
						<?php 
							if ($avgTracker1Data == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $avgTracker1Data; 
							}
						?>
						</td>
						<th>
							Average Tracker 2 Power
						</th>
						<?php 
							if ($avgTracker2Data == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $avgTracker2Data; 
							}
						?>
						</td>	
						<th>
							MPPT1 Instant Power
						</th>
						<?php 
							if ($mppt1PowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $mppt1PowerData; 
							}
						?>
						</td>	
						<th>
							MPPT2 Instant Power
						</th>
						
						<?php 
							if ($mppt2PowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $mppt2PowerData; 
							}
						?>
						</td>	
					</tr>
					<tr>
						<th colspan=3>
							Average Tracker Combined
						</th>
						<?php 
							if ($avgTracker1Data == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $avgTracker1Data + $avgTracker2Data; 
							}
						?>
						</td>
						<th colspan=3>
							Instant Tracker Combined
						</th>
						<?php 
							if ($mppt1PowerData == "")
							{
								echo "<td class = 'missingData'>";
								echo "No Data";
							}
							else
							{
								echo "<td>";
								echo $mppt1PowerData + $mppt2PowerData; 
							}
						?>
						</td>	
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
					<?php
						/*if ($motorTimeData = "" || empty($motorTimeData) || $IPMTempTimeData = "" || empty($IPMTempTimeData) || $mppt1TimeData = "" || empty($mppt1TimeData) || $mppt2TimeData = "" || empty($mppt2TimeData) || $shuntTimeData = "" || empty($shuntTimeData) || $shuntWattHoursTime = "" || empty($shuntWattHoursTime) || $cellVoltTimeData = "" || empty($cellVoltTimeData) || $flagTimeData = "" || empty($flagTimeData))
						{
						?>
						<tr colspan=8>
							Missing Datas
						</tr>
						<tr>
							<?php
								if ($motorTimeData = "" || empty($motorTimeData))
								{
								?>
									<td>
										Motor Temp
									</td>
								<?php
								}
								if ($IPMTempTimeData = "" || empty($IPMTempTimeData))
								{
								?>
									<td>
										IPM Temp
									</td>
								<?php
								}
								if ($mppt1TimeData = "" || empty($mppt1TimeData))
								{
								?>
									<td>
										MPPT1
									</td>
								<?php
								}
								if ($mppt2TimeData = "" || empty($mppt2TimeData))
								{
								?>
									<td>
										MPPT2
									</td>
								<?php
								}
								if ($shuntTimeData = "" || empty($shuntTimeData))
								{
								?>
									<td>
										Shunt Volt/Current
									</td>
								<?php
								}
								//if ($shuntWattHoursTime = "" || empty($shuntWattHoursTime))
								//{
								?>
									<td>
										<?php echo $shuntWattHoursTime; ?>
									</td>
								<?php
								//}
								if ($cellVoltTimeData = "" || empty($cellVoltTimeData))
								{
								?>
									<td>
										Cell Volts
									</td>
								<?php
								}
								if ($flagTimeData = "" || empty($flagTimeData))
								{
								?>
									<td>
										Motor Status
									</td>
								<?php
								}
						}
						*/?>
				</table>
			</p>
		</div>
	</body>

</html> 