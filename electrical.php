<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Electrical</title>
		<link rel="stylesheet" href="assign.css" type="text/css" /> 
		<!--<script type="text/JavaScript" src = "news.js"> </script>-->
	</head>
	<body>
		<div id="container">
			<div id="headerbar">
				<h1>UWS Solar Car Project - Electrical</h1>
				<p>
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
			<div id="content">
				<?php if (!isset($_POST['selectedData']))
				{ ?>
					<form method="post" action="electrical.php">
						<p>
							<fieldset>
								<legend>Please select the data to be shown.</legend>
								<table>
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
											<input type = "checkbox" id = "prechrgeStatus" name = "selectedData[]" value = "Precharge Status"> <label for = "prechrgeStatus"> Precharge Status</label>
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
											<input type = "checkbox" id = "mppt1LsbVout" name = "selectedData[]" value = "MPPT 1 LSB Vout"> <label for = "mppt1LsbVout"> MPPT 1 LSB Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1MsbVout" name = "selectedData[]" value = "MPPT 1 MSB Vout"> <label for = "mppt1MsbVout"> MPPT 1 MSB Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1LsbIin" name = "selectedData[]" value = "MPPT 1 LSB Iin"> <label for = "mppt1LsbIin"> MPPT 1 LSB Iin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1MsbIin" name = "selectedData[]" value = "MPPT 1 MSB Iin"> <label for = "mppt1MsbIin"> MPPT 1 MSB Iin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1LsbVin" name = "selectedData[]" value = "MPPT 1 LSB Vin"> <label for = "mppt1LsbVin"> MPPT 1 LSB Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1MsbVin" name = "selectedData[]" value = "MPPT 1 MSB Vin"> <label for = "mppt1MsbVin"> MPPT 1 MSB Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptBattBelowVolt1" name = "selectedData[]" value = "Battery Below Voltage"> <label for = "mpptBattBelowVolt1"> Battery Below Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptOverTemp1" name = "selectedData[]" value = "Battery Over Temperature"> <label for = "mpptOverTemp1"> Battery Over Temperature</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "noConnMppt1" name = "selectedData[]" value = "No Connection to MPPT1"> <label for = "noConnMppt1"> No Connection to MPPT1</label>
										</th>
										<th>
											<input type = "checkbox" id = "underVoltMppt1" name = "selectedData[]" value = "Under Voltage on MPPT1 Input"> <label for = "underVoltMppt1"> Under Voltage on MPPT1 Input</label>
										</th>
										<th>
											<input type = "checkbox" id = "msbUinMppt1" name = "selectedData[]" value = "MSB Uin (MPPT1)"> <label for = "msbUinMppt1"> MSB Uin (MPPT1)</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Temp" name = "selectedData[]" value = "MPPT 2 Temperature"> <label for = "mppt2Temp"> MPPT 2 Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2LsbVout" name = "selectedData[]" value = "MPPT 2 LSB Vout"> <label for = "mppt2LsbVout"> MPPT 2 LSB Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2MsbVout" name = "selectedData[]" value = "MPPT 2 MSB Vout"> <label for = "mppt2MsbVout"> MPPT 2 MSB Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2LsbIin" name = "selectedData[]" value = "MPPT 2 LSB Iin"> <label for = "mppt2LsbIin"> MPPT 2 LSB Iin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2MsbIin" name = "selectedData[]" value = "MPPT 2 MSB Iin"> <label for = "mppt2MsbIin"> MPPT 2 MSB Iin</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "mppt2LsbVin" name = "selectedData[]" value = "MPPT 2 LSB Vin"> <label for = "mppt2LsbVin"> MPPT 2 LSB Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2MsbVin" name = "selectedData[]" value = "MPPT 2 MSB Vin"> <label for = "mppt2MsbVin"> MPPT 2 MSB Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptBattBelowVolt2" name = "selectedData[]" value = "Battery Below Voltage"> <label for = "mpptBattBelowVolt2"> Battery Below Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptOverTemp2" name = "selectedData[]" value = "Battery Over Temperature"> <label for = "mpptOverTemp2"> Battery Over Temperature</label>
										</th><th>
											<input type = "checkbox" id = "noConnMppt2" name = "selectedData[]" value = "No Connection to MPPT2"> <label for = "noConnMppt2"> No Connection to MPPT2</label>
										</th>
										<th>
											<input type = "checkbox" id = "underVoltMppt2" name = "selectedData[]" value = "Under Voltage on MPPT2 Input"> <label for = "underVoltMppt2"> Under Voltage on MPPT2 Input</label>
										</th>
										<th>
											<input type = "checkbox" id = "msbUinMppt2" name = "selectedData[]" value = "MSB Uin (MPPT2)"> <label for = "msbUinMppt2"> MSB Uin (MPPT2)</label>
										</th>
									</tr>
								</table>
								<input type="submit" value="Submit"></input>
						</p>
					</form>
				<?php }
				else
				{?>
					<table>
					<tr>
						<?php 
						$count = 0;
						$arrayLength = sizeof($_POST['selectedData']);
						$numRows = (int)($arrayLength / 6);
						foreach ($_POST['selectedData'] as $key => $entry)
						{
							if ( $count % 6 != 0)
							{
								echo "<th>$entry</th>";
								echo "<td> Test </td>";
							}
							else
							{
								echo "</tr>";
								echo "<tr>";
								echo "<th>$entry</th>";
								echo "<td> Test </td>";
							}
							$count++;
						} 
						?>
					</tr>
					</table>
				<?php } ?>
			</div>
		</div>
	</body>
</html> 