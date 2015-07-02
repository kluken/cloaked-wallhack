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
				<?php if (!isset($selectedData))
				{ ?>
					<form method="post" action="electrical.php">
						<p>
							<fieldset>
								<legend>Please select the data to be shown.</legend>
								<table class = "dataSelect">
									<tr>
										<th>
											<input type = "checkbox" id = "packSOCA" name = "selectedData" checked = "checked" value = "Pack State of Charge (Ah)"> <label for = "packSOCA"> Pack State of Charge (Ah)</label>
										</th>
										<th>
											<input type = "checkbox" id = "packSOCP" name = "selectedData" value = "Pack State of Charge (%)"> <label for = "packSOCP"> Pack State of Charge (%)</label>
										</th>
										<th>
											<input type = "checkbox" id = "balanceSOCA" name = "selectedData" value = "Balance State of Charge (Ah)"> <label for = "balanceSOCA"> Balance State of Charge (Ah)</label>
										</th>
										<th>
											<input type = "checkbox" id = "balanceSOCP" name = "selectedData" value = "Balance State of Charge (%)"> <label for = "balanceSOCP"> Balance State of Charge (%)</label>
										</th>
										<th>
											<input type = "checkbox" id = "chargingCell" name = "selectedData" value = "Charging Cell Voltage Error (mV)"> <label for = "chargingCell"> Charging Cell Voltage Error (mV)</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellTempMargin" name = "selectedData" value = "Cell Temp Margin"> <label for = "cellTempMargin"> Cell Temp Margin</label>
										</th>
										<th>
											<input type = "checkbox" id = "dichargingCell" name = "selectedData" value = "Discharging Cell Voltage Error (mV)"> <label for = "dichargingCell"> Discharging Cell Voltage Error (mV)</label>
										</th>
										<th>
											<input type = "checkbox" id = "totalPackCapA" name = "selectedData" value = "Total Pack Capacity (Ah)"> <label for = "totalPackCapA"> Total Pack Capacity (Ah)</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "precharge12Status" name = "selectedData" value = "Precharge / Driver 12V Status"> <label for = "precharge12Status"> Precharge / Driver 12V Status</label>
										</th>
										<th>
											<input type = "checkbox" id = "prechrgeStatus" name = "selectedData" value = "Precharge Status"> <label for = "prechrgeStatus"> Precharge Status</label>
										</th>
										<th>
											<input type = "checkbox" id = "12VContactor" name = "selectedData" value = "12V Contactor Supply"> <label for = "12VContactor"> 12V Contactor Supply</label>
										</th>
										<th>
											<input type = "checkbox" id = "prechargeTimerElapsed" name = "selectedData" value = "Precharge Timer Elapsed"> <label for = "prechargeTimerElapsed"> Precharge Timer Elapsed</label>
										</th>
										<th>
											<input type = "checkbox" id = "prechargeTimer" name = "selectedData" value = "Precharge Timer"> <label for = "prechargeTimer"> Precharge Timer</label>
										</th>
										<th>
											<input type = "checkbox" id = "minCellVolt" name = "selectedData" value = "Minimum Cell Voltage"> <label for = "minCellVolt"> Minimum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMinCellVolt" name = "selectedData" value = "CMU With Minimum Cell Voltage"> <label for = "cmuWithMinCellVolt"> CMU with Minimum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "maxCellVolt" name = "selectedData" value = "Max Cell Voltage"> <label for = "maxCellVolt"> Maximum Cell Vltage</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "cmuWithMaxCellVolt" name = "selectedData" value = "CMU With Maximum Cell Voltage"> <label for = "cmuWithMaxCellVolt"> CMU With Maximum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "minCmuTemp" name = "selectedData" value = "Minimum CMU Temp"> <label for = "minCmuTemp"> Minimum CMU Temp</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMinTemp" name = "selectedData" value = "CMU With Minimum Temperature"> <label for = "cmuWithMinTemp"> CMU With Minimum Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "maxCmuTemp" name = "selectedData" value = "Maximum CMU Temp"> <label for = "maxCmuTemp"> Maximum CMU Temp</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMaxTemp" name = "selectedData" value = "CMU With Maximum Temperature"> <label for = "cmuWithMaxTemp"> CMU With Maximum Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "battVolt" name = "selectedData" value = "Battery Voltage (mV)"> <label for = "battVolt"> Battery Voltage (mV)</label>
										</th>
										<th>
											<input type = "checkbox" id = "battCurr" name = "selectedData" value = "Battery Current (mA)"> <label for = "battCurr"> Battery Current (mA)</label>
										</th>
										<th>
											<input type = "checkbox" id = "battVoltThresRi" name = "selectedData" value = "Battery Voltage Threshold (Rising - V)"> <label for = "battVoltThresRi"> Battery Voltage Threshold (Rising - V)</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "battVoltThresFa" name = "selectedData" value = "Battery Voltage Threshold (Falling - V)"> <label for = "battVoltThresFa"> Battery Voltage Threshold (Falling - V)</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellUVT" name = "selectedData" value = "Cells Under Voltage"> <label for = "cellUVT"> Cells Under Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellOVT" name = "selectedData" value = "Cells Over Voltage"> <label for = "cellOVT"> Cells Over Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellOverTemp" name = "selectedData" value = "Cells Over Temperature"> <label for = "cellOverTemp"> Cells Over Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "measureUntrust" name = "selectedData" value = "Measurements Untrusted"> <label for = "measureUntrust"> Measurements Untrusted</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCommsTimeout" name = "selectedData" value = "CMU Comms Timeout"> <label for = "cmuCommsTimeout"> CMU Comms Timeout</label>
										</th>
										<th>
											<input type = "checkbox" id = "bmuSetupMode" name = "selectedData" value = "BMU Is in Setup Mode"> <label for = "bmuSetupMode"> BMU is in Setup Mode</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCanBusPowerStatus" name = "selectedData" value = "CMU CAN Bus Power Status"> <label for = "cmuCanBusPowerStatus"> CMU CAN Bus Power Status</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "packIsoTestFail" name = "selectedData" value = "Pack Isolation Test Fail"> <label for = "packIsoTestFail"> Pack Isolation Test Fail</label>
										</th>
										<th>
											<input type = "checkbox" id = "SOCTestNotValid" name = "selectedData" value = "SOC Measurement Not Valid"> <label for = "SOCTestNotValid"> SOC Measurement not Valid</label>
										</th>
										<th>
											<input type = "checkbox" id = "12VCanLow" name = "selectedData" value = "12V CAN Supply Too Low"> <label for = "12VCanLow"> 12V CAN Supply Too Low</label>
										</th>
										<th>
											<input type = "checkbox" id = "contactorStuck" name = "selectedData" value = "Contactor Stuck / Not Engaged"> <label for = "contactorStuck"> Contactor Stuck / Not Engaged</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuExtraCell" name = "selectedData" value = "CMU Detected Extra Cell"> <label for = "cmuExtraCell"> CMU Detected Extra Cell</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCount" name = "selectedData" value = "CMU Count"> <label for = "cmuCount"> CMU Count</label>
										</th>
										<th>
											<input type = "checkbox" id = "bmuFirmware" name = "selectedData" value = "BMU Firmware Build"> <label for = "bmuFirmware"> BMU Firmware Build</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "fan1Speed" name = "selectedData" value = "Fan 1 Speed"> <label for = "fan1Speed"> Fan 1 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fanContactor12V" name = "selectedData" value = "Fan and Contactor 12V Consumption (mA)"> <label for = "fanContactor12V"> Fan and Contactor 12V Consumption (mA)</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
										<th>
											<input type = "checkbox" id = "fan0Speed" name = "selectedData" value = "Fan 0 Speed"> <label for = "fan0Speed"> Fan 0 Speed</label>
										</th>
								</table>
								<input type="submit" value="Submit"></input>
						</p>
					</form>
				<?php }
				else
				{?>
					<table>
						<tr>
							<th>
								Pack State of Charge (Ah)
							</th>
							<td <?php if (!ISSET($SQLResult) || !isNumeric($SQLResult) || $SQLResult < 4 || $SQLResult > 90) echo("class = badData") ?>>
								<?php if (!ISSET($SQLResult)) echo "Test"; else echo $SQLResult?>
							</td>
							<th>
								Pack State of Charge (%)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Balance State of Charge (Ah)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Balance State of Charge (%)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Charging Cell Voltage Error (mV)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Cell Temp Margin
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Discharging Cell Voltage Error
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Total Pack Capacity (Ah)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Precharge/12V Driver Status
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Precharge Status
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								12V Contactor Supply
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Precharge Timer Elapsed
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Precharge Timer
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Minimum Cell Voltage (mW)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Maximum Cell Voltage (mW)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU with Min Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Cell with Min Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU with Max Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Cell with Max Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Min Cell Temp
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Max Cell Temp
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU with Min Temp
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU with Max Temp
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Battery Voltage (mV)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Battery Current (mA)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Balance Voltage Threshold (Rising - V)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Balance Voltage Threshold (Falling - V)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Cells Over Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Cells Under Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Cells Over Temperature
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Measurement Untrusted
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU Comms Timeout
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								BMU is in Setup Mode
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU CAN Bus Power Status
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Pack Isolation Test Fail
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								SOC Measurement not Valid
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								12V CAN supply too low
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Contactor Stuck / Not Engaged
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU Detected Extra Cell
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								CMU Count
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								BMU Firmware Build
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Fan 0 Speed
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Fan 1 Speed
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Fan and Contactor 12V Consumption (mA)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								12V CMU's
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Extended Pack BMU Hardware Version
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Extended Pack BMU Model ID
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT 1 Temp
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								MPPT1 LSB VOut
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT1 MSB VOut
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT1 LSB IIn
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT1 MSB IIn
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT1 LSB Vin
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT1 MSB VIn
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Battery Below Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Over Temperature
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								No Connection to MPPT1
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Undervoltage on MPPT1 Input
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MSB UIn (MPPT1)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT2 Temp
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								MPPT2 LSB VOut
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT2 MSB VOut
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT2 LSB IIn
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT2 MSB IIn
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT2 LSB Vin
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MPPT2 MSB VIn
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>
						<tr>
							<th>
								Battery Below Voltage
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Over Temperature
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								No Connection to MPPT2
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								Undervoltage on MPPT2 Input
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
							<th>
								MSB UIn (MPPT2)
							</th>
							<td>
								<?php echo "Test" ?>
							</td>
						</tr>								
					</table>
				<?php } ?>
			</div>
		</div>
	</body>
</html> 