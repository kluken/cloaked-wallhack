<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Electrical</title>
		<link rel="stylesheet" href="master.css" type="text/css" />
 		<script src="jquery-2.1.4.min.js"></script>
		<script>
			function refreshTable() 
			{
				if ($('#refreshElecPage').val() == 1)
				$('#secondContent').load( "electrical.php #secondContent");
			}
			setInterval(refreshTable, 1000);
		</script>
		
		<script type="text/javascript">
			function playPause()
			{
				if (document.getElementById("refreshElecPage").value == 1)
				{
					document.getElementById("playPauseElec").value = "Play";
					document.getElementById("refreshElecPage").value = 0;
				}
				else
				{
					document.getElementById("playPauseElec").value = "Pause";
					document.getElementById("refreshElecPage").value = 1;
				}
			}
		</script>
		
		<script type="text/javascript">
			function selDelAll(source)
			{
				var i = 0, boxes = document.getElementsByName("selectedData[]");
				for (i = 0; i < document.getElementsByName("selectedData[]").length; i++)
				{
					if (boxes[i].checked == true)
						boxes[i].checked = false;
					else
						boxes[i].checked = true;
				}
				
				boxes = document.getElementsByName("selectedEFlags[]");
				for (i = 0; i < document.getElementsByName("selectedEFlags[]").length; i++)
				{
					if (boxes[i].checked == true)
						boxes[i].checked = false;
					else
						boxes[i].checked = true;
				}
				
				boxes = document.getElementsByName("selectedLFlags[]");
				for (i = 0; i < document.getElementsByName("selectedLFlags[]").length; i++)
				{
					if (boxes[i].checked == true)
						boxes[i].checked = false;
					else
						boxes[i].checked = true;
				}				
			}
		</script>
		
		<?php
			session_start();
			
			require_once('electricalFunctions.php');
			
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
				unset($_SESSION['electricalSelectedData']);
			}
			else if (isset($_POST['selectedData']))
			{
				$_SESSION['electricalSelectedData'] = Array();
				$_SESSION['electricalSelectedData'] = $_POST['selectedData'];
			}
		?>
	</head>
	<body>
		<div id="container">
				<?php
				require_once("headerBar.php");
				if (!isset($_SESSION['electricalSelectedData']))
				{ ?>
				<div id="firstContent">
					<form method="post" action="electrical.php">
						<p>
							<fieldset>
								<legend>Please select the data to be shown.</legend>
								<table id = "elecTable">
									<tr>
										<th>
											<input type = "checkbox" id = "packSOCA" name = "selectedData[]" checked = "checked" value = "Pack State of Charge (Ah)"> <label for = "packSOCA"> Pack State of Charge (Ah)</label>
										</th>
										<th>
											<input type = "checkbox" id = "packSOCP" name = "selectedData[]" value = "Pack State of Charge (%)"> <label for = "packSOCP"> Pack State of Charge (%)</label>
										</th>
										<th>
											<input type = "checkbox" id = "balanceSOCA" name = "selectedData[]" value = "Balance State of Charge (Ah)"> <label for = "balanceSOCA"> Balance State of Charge (Ah)</label>
										</th>
										<th>
											<input type = "checkbox" id = "balanceSOCP" name = "selectedData[]" value = "Balance State of Charge (%)"> <label for = "balanceSOCP"> Balance State of Charge (%)</label>
										</th>
										<th>
											<input type = "checkbox" id = "chargingCell" name = "selectedData[]" value = "Charging Cell Voltage Error (mV)"> <label for = "chargingCell"> Charging Cell Voltage Error (mV)</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellTempMargin" name = "selectedData[]" value = "Cell Temp Margin"> <label for = "cellTempMargin"> Cell Temp Margin</label>
										</th>
										<th>
											<input type = "checkbox" id = "dichargingCell" name = "selectedData[]" value = "Discharging Cell Voltage Error (mV)"> <label for = "dichargingCell"> Discharging Cell Voltage Error (mV)</label>
										</th>
										<th>
											<input type = "checkbox" id = "totalPackCapA" name = "selectedData[]" value = "Total Pack Capacity (Ah)"> <label for = "totalPackCapA"> Total Pack Capacity (Ah)</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "precharge12Status" name = "selectedData[]" value = "Precharge / Driver 12V Status"> <label for = "precharge12Status"> Precharge / Driver 12V Status</label>
										</th>
										<th>
											<input type = "checkbox" id = "prechargeStatus" name = "selectedData[]" value = "Precharge Status"> <label for = "prechargeStatus"> Precharge Status</label>
										</th>
										<th>
											<input type = "checkbox" id = "12VContactor" name = "selectedData[]" value = "12V Contactor Supply"> <label for = "12VContactor"> 12V Contactor Supply</label>
										</th>
										<th>
											<input type = "checkbox" id = "prechargeTimerElapsed" name = "selectedData[]" value = "Precharge Timer Elapsed"> <label for = "prechargeTimerElapsed"> Precharge Timer Elapsed</label>
										</th>
										<th>
											<input type = "checkbox" id = "prechargeTimer" name = "selectedData[]" value = "Precharge Timer"> <label for = "prechargeTimer"> Precharge Timer</label>
										</th>
										<th>
											<input type = "checkbox" id = "minCellVolt" name = "selectedData[]" value = "Minimum Cell Voltage"> <label for = "minCellVolt"> Minimum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMinCellVolt" name = "selectedData[]" value = "CMU With Minimum Cell Voltage"> <label for = "cmuWithMinCellVolt"> CMU with Minimum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellWithMinVolt" name = "selectedData[]" value = "Cell With Minimum Voltage"> <label for = "cellWithMinVolt"> Cell with Minimum Voltage</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "maxCellVolt" name = "selectedData[]" value = "Maximum Cell Voltage"> <label for = "maxCellVolt"> Maximum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMaxCellVolt" name = "selectedData[]" value = "CMU With Maximum Cell Voltage"> <label for = "cmuWithMaxCellVolt"> CMU With Maximum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellWithMaxVolt" name = "selectedData[]" value = "Cell With Maximum Voltage"> <label for = "cellWithMaxVolt"> Cell with Maximum Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "minCmuTemp" name = "selectedData[]" value = "Minimum CMU Temp"> <label for = "minCmuTemp"> Minimum CMU Temp</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMinTemp" name = "selectedData[]" value = "CMU With Minimum Temperature"> <label for = "cmuWithMinTemp"> CMU With Minimum Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "maxCmuTemp" name = "selectedData[]" value = "Maximum CMU Temp"> <label for = "maxCmuTemp"> Maximum CMU Temp</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMaxTemp" name = "selectedData[]" value = "CMU With Maximum Temperature"> <label for = "cmuWithMaxTemp"> CMU With Maximum Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "battVolt" name = "selectedData[]" value = "Battery Voltage (mV)"> <label for = "battVolt"> Battery Voltage (mV)</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "battCurr" name = "selectedData[]" value = "Battery Current (mA)"> <label for = "battCurr"> Battery Current (mA)</label>
										</th>
										<th>
											<input type = "checkbox" id = "battVoltThresRi" name = "selectedData[]" value = "Battery Voltage Threshold (Rising - V)"> <label for = "battVoltThresRi"> Battery Voltage Threshold (Rising - V)</label>
										</th>
										<th>
											<input type = "checkbox" id = "battVoltThresFa" name = "selectedData[]" value = "Battery Voltage Threshold (Falling - V)"> <label for = "battVoltThresFa"> Battery Voltage Threshold (Falling - V)</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellUVT" name = "selectedData[]" value = "Cells Under Voltage"> <label for = "cellUVT"> Cells Under Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellOVT" name = "selectedData[]" value = "Cells Over Voltage"> <label for = "cellOVT"> Cells Over Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellOverTemp" name = "selectedData[]" value = "Cells Over Temperature"> <label for = "cellOverTemp"> Cells Over Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "measureUntrust" name = "selectedData[]" value = "Measurements Untrusted"> <label for = "measureUntrust"> Measurements Untrusted</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCommsTimeout" name = "selectedData[]" value = "CMU Comms Timeout"> <label for = "cmuCommsTimeout"> CMU Comms Timeout</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "bmuSetupMode" name = "selectedData[]" value = "BMU Is in Setup Mode"> <label for = "bmuSetupMode"> BMU is in Setup Mode</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCanBusPowerStatus" name = "selectedData[]" value = "CMU CAN Bus Power Status"> <label for = "cmuCanBusPowerStatus"> CMU CAN Bus Power Status</label>
										</th>
										<th>
											<input type = "checkbox" id = "packIsoTestFail" name = "selectedData[]" value = "Pack Isolation Test Fail"> <label for = "packIsoTestFail"> Pack Isolation Test Fail</label>
										</th>
										<th>
											<input type = "checkbox" id = "SOCTestNotValid" name = "selectedData[]" value = "SOC Measurement Not Valid"> <label for = "SOCTestNotValid"> SOC Measurement not Valid</label>
										</th>
										<th>
											<input type = "checkbox" id = "12VCanLow" name = "selectedData[]" value = "12V CAN Supply Too Low"> <label for = "12VCanLow"> 12V CAN Supply Too Low</label>
										</th>
										<th>
											<input type = "checkbox" id = "contactorStuck" name = "selectedData[]" value = "Contactor Stuck / Not Engaged"> <label for = "contactorStuck"> Contactor Stuck / Not Engaged</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuExtraCell" name = "selectedData[]" value = "CMU Detected Extra Cell"> <label for = "cmuExtraCell"> CMU Detected Extra Cell</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCount" name = "selectedData[]" value = "CMU Count"> <label for = "cmuCount"> CMU Count</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "bmuFirmware" name = "selectedData[]" value = "BMU Firmware Build"> <label for = "bmuFirmware"> BMU Firmware Build</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData[]" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan1Speed" name = "selectedData[]" value = "Fan 1 Speed"> <label for = "fan1Speed"> Fan 1 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fanContactor12V" name = "selectedData[]" value = "Fan and Contactor 12V Consumption (mA)"> <label for = "fanContactor12V"> Fan and Contactor 12V Consumption (mA)</label>
										</th>
										<th>
											<input type = "checkbox" id = "12vCmus" name = "selectedData[]" value = "12V CMU's"> <label for = "12vCmus"> 12V CMU's </label>
										</th>
										<th>
											<input type = "checkbox" id = "extendedBmuHwVer" name = "selectedData[]" value = "Extended Pack BMU Hardware Version"> <label for = "extendedBmuHwVer"> Extended Pack BMU Hardware Version</label>
										</th>
										<th>
											<input type = "checkbox" id = "extendedBmuModel" name = "selectedData[]" value = "Extended Pack BMU Model ID"> <label for = "extendedBmuModel"> Extended Pack BMU Model ID</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1Temp" name = "selectedData[]" value = "MPPT 1 Temperature"> <label for = "mppt1Temp"> MPPT 1 Temperature</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "mppt1Vout" name = "selectedData[]" value = "MPPT 1 Vout"> <label for = "mppt1Vout"> MPPT 1 Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1Iin" name = "selectedData[]" value = "MPPT 1 Iin"> <label for = "mppt1Iin"> MPPT 1 Iin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1Vin" name = "selectedData[]" value = "MPPT 1 Vin"> <label for = "mppt1Vin"> MPPT 1 Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptBattBelowVolt1" name = "selectedData[]" value = "Battery Below Voltage from MPPT1"> <label for = "mpptBattBelowVolt1"> Battery Below Voltage from MPPT1</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptOverTemp1" name = "selectedData[]" value = "Battery Over Temperature from MPPT1"> <label for = "mpptOverTemp1"> Battery Over Temperature from MPPT1</label>
										</th>
										<th>
											<input type = "checkbox" id = "noConnMppt1" name = "selectedData[]" value = "No Connection to MPPT1"> <label for = "noConnMppt1"> No Connection to MPPT1</label>
										</th>
										<th>
											<input type = "checkbox" id = "underVoltMppt1" name = "selectedData[]" value = "Under Voltage on MPPT1 Input"> <label for = "underVoltMppt1"> Under Voltage on MPPT1 Input</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Temp" name = "selectedData[]" value = "MPPT 2 Temperature"> <label for = "mppt2Temp"> MPPT 2 Temperature</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "mppt2Vout" name = "selectedData[]" value = "MPPT 2 Vout"> <label for = "mppt2Vout"> MPPT 2 Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Iin" name = "selectedData[]" value = "MPPT 2 Iin"> <label for = "mppt2Iin"> MPPT 2 Iin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Vin" name = "selectedData[]" value = "MPPT 2 Vin"> <label for = "mppt2Vin"> MPPT 2 Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptBattBelowVolt2" name = "selectedData[]" value = "Battery Below Voltage from MPPT2"> <label for = "mpptBattBelowVolt2"> Battery Below Voltage from MPPT2</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptOverTemp2" name = "selectedData[]" value = "Battery Over Temperature from MPPT2"> <label for = "mpptOverTemp2"> Battery Over Temperature from MPPT2</label>
										</th><th>
											<input type = "checkbox" id = "noConnMppt2" name = "selectedData[]" value = "No Connection to MPPT2"> <label for = "noConnMppt2"> No Connection to MPPT2</label>
										</th>
										<th>
											<input type = "checkbox" id = "underVoltMppt2" name = "selectedData[]" value = "Under Voltage on MPPT2 Input"> <label for = "underVoltMppt2"> Under Voltage on MPPT2 Input</label>
										</th>
									</tr>
								</table>
								<br/>
								<input type="button" value="Toggle Selected" onclick="selDelAll()"/>
								<br/>
								<br/>
								<input type="submit" value="Submit"></input>
						</p>
					</form>
				<?php }
				else
				{
				?>
				<div id = "secondContent">
				<form method = "post" action = "electrical.php">
					<table>
						<input type = "hidden" id = "refreshElecPage" name = "refreshElecPage" value = "1"/>
						<tr>
							<?php 
							$count = 0;
							$arrayLength = sizeof($_SESSION['electricalSelectedData']);
							$numRows = (int)($arrayLength / 6);
							foreach ($_SESSION['electricalSelectedData'] as $key => $entry)
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
							?>
						</tr>
					</table>
					<br/>
					<input type="button" value="Pause" onclick="playPause()" id = "playPauseElec" name = "playPauseElec"/>
					<br/>
					<br/>
					<input type = "submit" value = "Reset Choices" name = "resetSession"/>
				</form>
				<?php } ?>
			</div>
		</div>
	</body>
</html> 