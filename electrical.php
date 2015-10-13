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
				
				boxes = document.getElementsByName("selectedBattFlags[]");
				for (i = 0; i < document.getElementsByName("selectedBattFlags[]").length; i++)
				{
					if (boxes[i].checked == true)
						boxes[i].checked = false;
					else
						boxes[i].checked = true;
				}
				
				boxes = document.getElementsByName("selectedMPPTData[]");
				for (i = 0; i < document.getElementsByName("selectedMPPTData[]").length; i++)
				{
					if (boxes[i].checked == true)
						boxes[i].checked = false;
					else
						boxes[i].checked = true;
				}	

				boxes = document.getElementsByName("selectedMPPTFlags[]");
				for (i = 0; i < document.getElementsByName("selectedMPPTFlags[]").length; i++)
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
				unset($_SESSION['electricalSelectedFlags']);
				unset($_SESSION['electricalSelectedMPPTData']);
				unset($_SESSION['electricalSelectedMPPTFlags']);
			}
			else if (isset($_POST['selectedData']) || isset($_POST['selectedBattFlags']) || isset($_POST['selectedMPPTData']) || isset($_POST['selectedMPPTFlags']))
			{
				$_SESSION['electricalSelectedData'] = Array();
				$_SESSION['electricalSelectedData'] = $_POST['selectedData'];
				
				$_SESSION['electricalSelectedFlags'] = Array();
				$_SESSION['electricalSelectedFlags'] = $_POST['selectedBattFlags'];
				
				$_SESSION['electricalSelectedMPPTData'] = Array();
				$_SESSION['electricalSelectedMPPTData'] = $_POST['selectedMPPTData'];
				
				$_SESSION['electricalSelectedMPPTFlags'] = Array();
				$_SESSION['electricalSelectedMPPTFlags'] = $_POST['selectedMPPTFlags'];
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
										<th colspan=8>
											Electrical Data
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "minCellVolt" name = "selectedData[]" value = "Minimum Cell Voltage"> <label for = "minCellVolt"> Minimum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMinCellVolt" name = "selectedData[]" value = "CMU With Minimum Cell Voltage"> <label for = "cmuWithMinCellVolt"> CMU with Minimum Cell Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellWithMinVolt" name = "selectedData[]" value = "Cell With Minimum Voltage"> <label for = "cellWithMinVolt"> Cell with Minimum Voltage</label>
										</th>
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
											<input type = "checkbox" id = "minCellTemp" name = "selectedData[]" value = "Minimum Cell Temp"> <label for = "minCellTemp"> Minimum Cell Temp</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMinTemp" name = "selectedData[]" value = "CMU With Minimum Temperature"> <label for = "cmuWithMinTemp"> CMU With Minimum Temperature</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "maxCellTemp" name = "selectedData[]" value = "Maximum Cell Temp"> <label for = "maxCellTemp"> Maximum Cell Temp</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuWithMaxTemp" name = "selectedData[]" value = "CMU With Maximum Temperature"> <label for = "cmuWithMaxTemp"> CMU With Maximum Temperature</label>
										</th>
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
											<input type = "checkbox" id = "12vCmus" name = "selectedData[]" value = "12V CMU Consumption"> <label for = "12vCmus"> 12V CMU Consumption </label>
										</th>
										<th>
											<input type = "checkbox" id = "extendedBmuHwVer" name = "selectedData[]" value = "Extended Pack BMU Hardware Version"> <label for = "extendedBmuHwVer"> Extended Pack BMU Hardware Version</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "extendedBmuModel" name = "selectedData[]" value = "Extended Pack BMU Model ID"> <label for = "extendedBmuModel"> Extended Pack BMU Model ID</label>
										</th>
									</tr>
									
									<!-- Finish battery data, start battery flags -->
									
									<tr>
										<th colspan=8>
											Electrical Flags
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "cellUVT" name = "selectedBattFlags[]" value = "Cells Under Voltage"> <label for = "cellUVT"> Cells Under Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellOVT" name = "selectedBattFlags[]" value = "Cells Over Voltage"> <label for = "cellOVT"> Cells Over Voltage</label>
										</th>
										<th>
											<input type = "checkbox" id = "cellOverTemp" name = "selectedBattFlags[]" value = "Cells Over Temperature"> <label for = "cellOverTemp"> Cells Over Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "measureUntrust" name = "selectedBattFlags[]" value = "Measurements Untrusted"> <label for = "measureUntrust"> Measurements Untrusted</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCommsTimeout" name = "selectedBattFlags[]" value = "CMU Comms Timeout"> <label for = "cmuCommsTimeout"> CMU Comms Timeout</label>
										</th>
										<th>
											<input type = "checkbox" id = "bmuSetupMode" name = "selectedBattFlags[]" value = "BMU Is in Setup Mode"> <label for = "bmuSetupMode"> BMU is in Setup Mode</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuCanBusPowerStatus" name = "selectedBattFlags[]" value = "CMU CAN Bus Power Status"> <label for = "cmuCanBusPowerStatus"> CMU CAN Bus Power Status</label>
										</th>
										<th>
											<input type = "checkbox" id = "packIsoTestFail" name = "selectedBattFlags[]" value = "Pack Isolation Test Fail"> <label for = "packIsoTestFail"> Pack Isolation Test Fail</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "SOCTestNotValid" name = "selectedBattFlags[]" value = "SOC Measurement Not Valid"> <label for = "SOCTestNotValid"> SOC Measurement not Valid</label>
										</th>
										<th>
											<input type = "checkbox" id = "12VCanLow" name = "selectedBattFlags[]" value = "12V CAN Supply Too Low"> <label for = "12VCanLow"> 12V CAN Supply Too Low</label>
										</th>
										<th>
											<input type = "checkbox" id = "contactorStuck" name = "selectedBattFlags[]" value = "Contactor Stuck / Not Engaged"> <label for = "contactorStuck"> Contactor Stuck / Not Engaged</label>
										</th>
										<th>
											<input type = "checkbox" id = "cmuExtraCell" name = "selectedBattFlags[]" value = "CMU Detected Extra Cell"> <label for = "cmuExtraCell"> CMU Detected Extra Cell</label>
										</th>
									</tr>
									
									<!-- End BMU Flags. Begin MPPT Data -->
									
									<tr>
										<th colspan=8>
											MPPT 1 and 2 Data
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "mppt1Temp" name = "selectedMPPTData[]" value = "MPPT 1 Temperature"> <label for = "mppt1Temp"> MPPT 1 Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1Vout" name = "selectedMPPTData[]" value = "MPPT 1 Vout"> <label for = "mppt1Vout"> MPPT 1 Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1Iin" name = "selectedMPPTData[]" value = "MPPT 1 Iin"> <label for = "mppt1Iin"> MPPT 1 Iin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1Vin" name = "selectedMPPTData[]" value = "MPPT 1 Vin"> <label for = "mppt1Vin"> MPPT 1 Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt1PowerIn" name = "selectedMPPTData[]" value = "MPPT 1 PowerIn"> <label for = "mppt1PowerIn"> MPPT 1 Power In</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Temp" name = "selectedMPPTData[]" value = "MPPT 2 Temperature"> <label for = "mppt2Temp"> MPPT 2 Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Vout" name = "selectedMPPTData[]" value = "MPPT 2 Vout"> <label for = "mppt2Vout"> MPPT 2 Vout</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2Iin" name = "selectedMPPTData[]" value = "MPPT 2 Iin"> <label for = "mppt2Iin"> MPPT 2 Iin</label>
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "mppt2Vin" name = "selectedMPPTData[]" value = "MPPT 2 Vin"> <label for = "mppt2Vin"> MPPT 2 Vin</label>
										</th>
										<th>
											<input type = "checkbox" id = "mppt2PowerIn" name = "selectedMPPTData[]" value = "MPPT 2 PowerIn"> <label for = "mppt2PowerIn"> MPPT 2 Power In</label>
										</th>
									</tr>
									
									<!-- End MPPT Data. Begin MPPT Flags -->
									
									<tr>
										<th colspan=8>
											MPPT 1 and 2 Flags
										</th>
									</tr>
									<tr>
										<th>
											<input type = "checkbox" id = "mpptBattOverVolt1" name = "selectedMPPTFlags[]" value = "Battery Over Voltage from MPPT1"> <label for = "mpptBattOverVolt1"> Battery Over Voltage from MPPT1</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptOverTemp1" name = "selectedMPPTFlags[]" value = "MPPT1 Over Temperature"> <label for = "mpptOverTemp1"> MPPT1 Over Temperature</label>
										</th>
										<th>
											<input type = "checkbox" id = "noConnMppt1" name = "selectedMPPTFlags[]" value = "No Connection to MPPT1"> <label for = "noConnMppt1"> No Connection to MPPT1</label>
										</th>
										<th>
											<input type = "checkbox" id = "underVoltMppt1" name = "selectedMPPTFlags[]" value = "Under Voltage on MPPT1 Input"> <label for = "underVoltMppt1"> Under Voltage on MPPT1 Input</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptBattOverVolt2" name = "selectedMPPTFlags[]" value = "Battery Over Voltage from MPPT2"> <label for = "mpptBattOverVolt2"> Battery Over Voltage from MPPT2</label>
										</th>
										<th>
											<input type = "checkbox" id = "mpptOverTemp2" name = "selectedMPPTFlags[]" value = "MPPT2 Over Temperature"> <label for = "mpptOverTemp2"> MPPT2 Over Temperature</label>
										</th><th>
											<input type = "checkbox" id = "noConnMppt2" name = "selectedMPPTFlags[]" value = "No Connection to MPPT2"> <label for = "noConnMppt2"> No Connection to MPPT2</label>
										</th>
										<th>
											<input type = "checkbox" id = "underVoltMppt2" name = "selectedMPPTFlags[]" value = "Under Voltage on MPPT2 Input"> <label for = "underVoltMppt2"> Under Voltage on MPPT2 Input</label>
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
							if ($arrayLength > 0)
							{
								echo "<th colspan=12> Electrical Data </th>";
								foreach ($_SESSION['electricalSelectedData'] as $key => $entry)
								{
									if ( $count % 6 != 0)
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$row =  mysqli_fetch_assoc($result);
											$tableName = dataNameLookup($entry);
											if ((is_null($row[$tableName])) || $row[$tableName] == "")
												echo "<td class = 'highWarn'>No Data</td>";
											else 
											{
												echo "<td>$row[$tableName]</td>";
											}
										}
										
										else 
											echo "<td class = 'missingData'>No Data</td>";
									}
									else
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "</tr>";
										echo "<tr>";
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$tableName = dataNameLookup($entry);
											$row =  mysqli_fetch_assoc($result);
											if ($row[$tableName] == "" || (is_null($row[$tableName])))
											{		
												echo "<td class = 'highWarn'>N/A</td>";
											}
											else
											{
												echo "<td>$row[$tableName]</td>";
											}
										}
										else
										{
											echo "<td class = 'missingData'>No Data</td>";
										}
									}
									$count++;
								} 
							}
							
							//End of electrical data. Beginning of Electrical Flags
	
							$count = 0;
							$arrayLength = sizeof($_SESSION['electricalSelectedFlags']);
							if ($arrayLength > 0)
							{
								echo "</tr> <tr>";
								echo "<th colspan=12> Electrical Flags </th>";
								foreach ($_SESSION['electricalSelectedFlags'] as $key => $entry)
								{
									if ( $count % 6 != 0)
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$row =  mysqli_fetch_assoc($result);
											$tableName = dataNameLookup($entry);
											if ((is_null($row[$tableName])) || $row[$tableName] == "")
												echo "<td class = 'highWarn'>No Data</td>";
											else if ($row[$tableName] > 0)
												echo "<td class = 'highWarn'>Error</td>";
											else
												echo "<td class='goodData'>OK</td>";
										}
										
										else 
											echo "<td class = 'missingData'>No Data</td>";
									}
									else
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "</tr>";
										echo "<tr>";
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$tableName = dataNameLookup($entry);
											$row =  mysqli_fetch_assoc($result);
											if ($row[$tableName] == "" || (is_null($row[$tableName])))
												echo "<td class = 'highWarn'>N/A</td>";
											else if ($row[$tableName] > 0)
												echo "<td class = 'highWarn'>Error</td>";
											else
												echo "<td class='goodData'>OK</td>";
										}
										else
										{
											echo "<td class = 'missingData'>No Data</td>";
										}
									}
									$count++;
								} 
							}
							
							//End of electrical flags, beginning of MPPT Data
							
							$count = 0;
							$arrayLength = sizeof($_SESSION['electricalSelectedMPPTData']);
							if ($arrayLength > 0)
							{
								echo "</tr> <tr>";
								echo "<th colspan=12> MPPT Data </th>";
								foreach ($_SESSION['electricalSelectedMPPTData'] as $key => $entry)
								{
									if ( $count % 6 != 0)
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$row =  mysqli_fetch_assoc($result);
											$tableName = dataNameLookup($entry);
											if ((is_null($row[$tableName])) || $row[$tableName] == "")
												echo "<td class = 'highWarn'>No Data</td>";
											else 
											{
												echo "<td>$row[$tableName]</td>";
											}
										}
										
										else 
											echo "<td class = 'missingData'>No Data</td>";
									}
									else
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "</tr>";
										echo "<tr>";
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$tableName = dataNameLookup($entry);
											$row =  mysqli_fetch_assoc($result);
											if ($row[$tableName] == "" || (is_null($row[$tableName])))
											{		
												echo "<td class = 'highWarn'>N/A</td>";
											}
											else
											{
												echo "<td>$row[$tableName]</td>";
											}
										}
										else
										{
											echo "<td class = 'missingData'>No Data</td>";
										}
									}
									$count++;
								} 
							}
							
							//End of MPPT Data, beginning of MPPT Flags
							
							$count = 0;
							$arrayLength = sizeof($_SESSION['electricalSelectedMPPTFlags']);
							if ($arrayLength > 0)
							{
								echo "</tr> <tr>";
								echo "<th colspan=12> MPPT Flags </th>";
								foreach ($_SESSION['electricalSelectedMPPTFlags'] as $key => $entry)
								{
									if ( $count % 6 != 0)
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$row =  mysqli_fetch_assoc($result);
											$tableName = dataNameLookup($entry);
											if ((is_null($row[$tableName])) || $row[$tableName] == "")
												echo "<td class = 'highWarn'>No Data</td>";
											else if ($row[$tableName] > 0)
												echo "<td class = 'highWarn'>Error</td>";
											else
												echo "<td class='goodData'>OK</td>";
										}
										
										else 
											echo "<td class = 'missingData'>No Data</td>";
									}
									else
									{
										$sqlSelect = sqlLookup($entry);
										$result = mysqli_query($conn, $sqlSelect);
										echo "</tr>";
										echo "<tr>";
										echo "<th>$entry</th>";
										if ($result != false && mysqli_num_rows($result) > 0)
										{
											$tableName = dataNameLookup($entry);
											$row =  mysqli_fetch_assoc($result);
											if ($row[$tableName] == "" || (is_null($row[$tableName])))
												echo "<td class = 'highWarn'>N/A</td>";
											else if ($row[$tableName] > 0)
												echo "<td class = 'highWarn'>Error</td>";
											else
												echo "<td class='goodData'>OK</td>";
										}
										else
										{
											echo "<td class = 'missingData'>No Data</td>";
										}
									}
									$count++;
								} 
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