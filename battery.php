<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Battery</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		
		<script type="text/javascript">
			function submitForm()
			{
				if(document.getElementById("numBatteryCells").value > 5 && document.getElementById("userConfirm").value == "0")
				{
					alert ("Sorry, the maximum amount of Cells at this point is 5. Resubmit only if you are sure. It will result in errors");
					document.getElementById("userConfirm").value = "1";
				}
				else
				{
					document.getElementById("userConfirm").value = "0";
					document.getElementById("setupForm").submit();
				}
			}
		</script>
		
		<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			function refreshTable() 
			{
				if ($('#refreshBattPage').val() == 1)
					$('#secondContent').load( "battery.php #secondContent");
			}
			setInterval(refreshTable, 1000);
		</script>
		
		<script type="text/javascript">
			function playPause()
			{
				if (document.getElementById("refreshBattPage").value == 1)
				{
					document.getElementById("playPauseBatt").value = "Play";
					document.getElementById("refreshBattPage").value = 0;
				}
				else
				{
					document.getElementById("playPauseBatt").value = "Pause";
					document.getElementById("refreshBattPage").value = 1;
				}
			}
		</script>

		

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
			}
			
			if (isset($_POST['resetSession']))
			{
				unset($_SESSION['numBatteryCells']);
			}		
			else if (isset($_POST['numBatteryCells']) || isset($_SESSION['numBatteryCells']))
			{
				if (!isset($_SESSION['numBatteryCells']))
				{
					$_SESSION['numBatteryCells'] = Array();
					$_SESSION['numBatteryCells'] = $_POST['numBatteryCells'];
				}
				
				
				
				//Create SQL Commands
				$sqlStatus = Array();
				$sqlCell0 = Array();
				$sqlCell4 = Array();
				
				
				$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
				for ($count = 0; $count < $_SESSION['numBatteryCells']; $count++)
				{
					$CMUNum = $count+1;
					$sqlStatus[$count] = "SELECT `Serial Number`, `PCB Temperature`, `Cell Temperature` FROM `CMU ".$CMUNum." Status`";
					$sqlCell0[$count] = "SELECT `Cell 0 Voltage`, `Cell 1 Voltage`, `Cell 2 Voltage`, `Cell 3 Voltage` FROM `CMU ".$CMUNum." Cell0-3Voltage`";
					$sqlCell4[$count] = "SELECT `Cell 4 Voltage`, `Cell 5 Voltage`, `Cell 6 Voltage`, `Cell 7 Voltage` FROM `CMU ".$CMUNum." Cell4-7Voltage`";
				}

				// Create connection
				if (!$conn) 
				{
					die("Connection failed: " . mysqli_connect_error());
					echo '<script language="javascript"> alert("Connection Error") </script>';
				}
				
				
				//Run Commands
				$sqlStatusReturn = Array();
				$sqlCell0Return = Array();
				$sqlCell4Return = Array();
				for ($count = 0; $count < $_SESSION['numBatteryCells']; $count++)
				{
					$result = mysqli_query($conn, $sqlStatus[$count]);
					while($row =  mysqli_fetch_assoc($result))
					{
						$sqlStatusReturn[$count]["Serial Number"] = $row["Serial Number"];
						$sqlStatusReturn[$count]["PCB Temperature"] = $row["PCB Temperature"];
						$sqlStatusReturn[$count]["Cell Temperature"] = $row["Cell Temperature"];
					}
					$result = mysqli_query($conn, $sqlCell0[$count]);
					while ($row =  mysqli_fetch_assoc($result))
					{
						$sqlCell0Return[$count]["Cell 0 Voltage"] = $row["Cell 0 Voltage"];
						$sqlCell0Return[$count]["Cell 1 Voltage"] = $row["Cell 1 Voltage"];
						$sqlCell0Return[$count]["Cell 2 Voltage"] = $row["Cell 2 Voltage"];
						$sqlCell0Return[$count]["Cell 3 Voltage"] = $row["Cell 3 Voltage"];
					}
					$result = mysqli_query($conn, $sqlCell4[$count]);
					while($row = mysqli_fetch_assoc($result))
					{
						$sqlCell4Return[$count]["Cell 4 Voltage"] = $row["Cell 4 Voltage"];
						$sqlCell4Return[$count]["Cell 5 Voltage"] = $row["Cell 5 Voltage"];
						$sqlCell4Return[$count]["Cell 6 Voltage"] = $row["Cell 6 Voltage"];
						$sqlCell4Return[$count]["Cell 7 Voltage"] = $row["Cell 7 Voltage"];
					}
				}
			}
		?>
	</head>
	<body>
		<div id="container">
			<?php  
				require_once("headerBar.php");
				if (!isset($_SESSION['numBatteryCells']))
				{ ?>
				<div id="firstContent">
					<br/>
					<form method="post" action="battery.php" id="setupForm" >
						<p>
							<label id = "numBatteryCellsLabel"> Please enter the amount of cells you want to show </label><input id="numBatteryCells" name="numBatteryCells"  value = "5" />
							<input type="hidden" value="0" id="userConfirm" name="userConfirm"/>
							<input type="button" value="Submit" onclick="submitForm();"/>
						</p>
					</form>
				</div>
					<?php
				}
				else
				{ ?>
				<div id="secondContent">
					<form action = "battery.php" method = "post">
						<table>
							<input type = "hidden" id = "refreshBattPage" name = "refreshBattPage" value = "1"/>
							<caption>Battery Statistics</caption>
							<tr>
							<th>
							CMU Number
							</th>
							<th>
							Serial Number
							</th>
							<th>
							PCB Temp
							</th>
							<th>
							Cell Temp
							</th>
							<th>
							Cell 0 Volt
							</th>
							<th>
							Cell 1 Volt
							</th>
							<th>
							Cell 2 Volt
							</th>
							<th>
							Cell 3 Volt
							</th>
							<th>
							Cell 4 Volt
							</th>
							<th>
							Cell 5 Volt
							</th>
							<th>
							Cell 6 Volt
							</th>
							<th>
							Cell 7 Volt
							</th>
							</tr>
							<?php
							for ($count = 0; $count < $_SESSION['numBatteryCells']; $count++) 
							{
								echo "<tr>";
								echo "<td>";
								echo $count + 1;
								echo "</td>";
								$CMU = "CMU".$count+1 ."SerialNumber";
								if (empty($sqlStatusReturn[$count]) || !is_numeric($sqlStatusReturn[$count]["Serial Number"]))
								echo "<td class = 'highWarn'>";
								else
								echo "<td>";
								if (empty($sqlStatusReturn[$count]))
								echo "N/A";
								else
								echo $sqlStatusReturn[$count]["Serial Number"];
								echo "</td>";
								$CMU = "CMU".$count."PCBTemp";
								if (empty($sqlStatusReturn[$count]) || !is_numeric($sqlStatusReturn[$count]["PCB Temperature"]) || $sqlStatusReturn[$count]["PCB Temperature"] > 60)
								echo "<td class = 'highWarn'>";
								else
								echo "<td>";
								if (empty($sqlStatusReturn[$count]))
								echo "N/A";
								else
								echo $sqlStatusReturn[$count]["PCB Temperature"];
								echo "</td>";
								$CMU = "CMU".$count."CellTemp";
								if (empty($sqlStatusReturn[$count]) || !is_numeric($sqlStatusReturn[$count]["Cell Temperature"]) || $sqlStatusReturn[$count]["Cell Temperature"] > 60)
								echo "<td class = 'highWarn'>";
								else
								echo "<td>";
								if (empty($sqlStatusReturn[$count]))
								echo "N/A";
								else
								echo $sqlStatusReturn[$count]["Cell Temperature"];
								echo "</td>";
								$CMU = "CMU".$count."Cell0Voltage";
								if (empty($sqlCell0Return[$count]) || !is_numeric($sqlCell0Return[$count]["Cell 0 Voltage"]) || $sqlCell0Return[$count]["Cell 0 Voltage"] < 2700 || $sqlCell0Return[$count]["Cell 0 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell0Return[$count]["Cell 0 Voltage"] < 3100 || $sqlCell0Return[$count]["Cell 0 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell0Return[$count]))
								echo "N/A";
								else
								echo $sqlCell0Return[$count]["Cell 0 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell1Voltage";
								if (empty($sqlCell0Return[$count]) || !is_numeric($sqlCell0Return[$count]["Cell 1 Voltage"]) || $sqlCell0Return[$count]["Cell 1 Voltage"] < 2700|| $sqlCell0Return[$count]["Cell 1 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell0Return[$count]["Cell 1 Voltage"] < 3100|| $sqlCell0Return[$count]["Cell 1 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell0Return[$count]))
								echo "N/A";
								else
								echo $sqlCell0Return[$count]["Cell 1 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell2Voltage";
								if (empty($sqlCell0Return[$count]) || !is_numeric($sqlCell0Return[$count]["Cell 2 Voltage"]) || $sqlCell0Return[$count]["Cell 2 Voltage"] < 2700 || $sqlCell0Return[$count]["Cell 2 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell0Return[$count]["Cell 2 Voltage"] < 3100 || $sqlCell0Return[$count]["Cell 2 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell0Return[$count]))
								echo "N/A";
								else
								echo $sqlCell0Return[$count]["Cell 2 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell3Voltage";
								if (empty($sqlCell0Return[$count]) || !is_numeric($sqlCell0Return[$count]["Cell 3 Voltage"]) || $sqlCell0Return[$count]["Cell 3 Voltage"] < 2700 || $sqlCell0Return[$count]["Cell 3 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell0Return[$count]["Cell 3 Voltage"] < 3100 || $sqlCell0Return[$count]["Cell 3 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell0Return[$count]))
								echo "N/A";
								else
								echo $sqlCell0Return[$count]["Cell 3 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell4Voltage";
								if (empty($sqlCell4Return[$count]) || !is_numeric($sqlCell4Return[$count]["Cell 4 Voltage"]) || $sqlCell4Return[$count]["Cell 4 Voltage"] < 2700 || $sqlCell4Return[$count]["Cell 4 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell4Return[$count]["Cell 4 Voltage"] < 3100 || $sqlCell4Return[$count]["Cell 4 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell4Return[$count]))
								echo "N/A";
								else
								echo $sqlCell4Return[$count]["Cell 4 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell5Voltage";
								if (empty($sqlCell4Return[$count]) || !is_numeric($sqlCell4Return[$count]["Cell 5 Voltage"]) || $sqlCell4Return[$count]["Cell 5 Voltage"] < 2700 || $sqlCell4Return[$count]["Cell 5 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell4Return[$count]["Cell 5 Voltage"] < 3100 || $sqlCell4Return[$count]["Cell 5 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell4Return[$count]))
								echo "N/A";
								else
								echo $sqlCell4Return[$count]["Cell 5 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell6Voltage";
								if (empty($sqlCell4Return[$count]) || !is_numeric($sqlCell4Return[$count]["Cell 6 Voltage"]) || $sqlCell4Return[$count]["Cell 6 Voltage"] < 2700 || $sqlCell4Return[$count]["Cell 6 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell4Return[$count]["Cell 6 Voltage"] < 3100 || $sqlCell4Return[$count]["Cell 6 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell4Return[$count]))
								echo "N/A";
								else
								echo $sqlCell4Return[$count]["Cell 6 Voltage"];
								echo "</td>";
								$CMU = "CMU".$count."Cell7Voltage";
								if (empty($sqlCell4Return[$count]) || !is_numeric($sqlCell4Return[$count]["Cell 7 Voltage"]) || $sqlCell4Return[$count]["Cell 7 Voltage"] < 2700 || $sqlCell4Return[$count]["Cell 7 Voltage"] > 4200)
								echo "<td class = 'highWarn'>";
								else if ($sqlCell4Return[$count]["Cell 7 Voltage"] < 3100 || $sqlCell4Return[$count]["Cell 7 Voltage"] > 4100)
								echo "<td class = 'medWarn'>";
								else
								echo "<td>";
								if (empty($sqlCell4Return[$count]))
								echo "N/A";
								else
								echo $sqlCell4Return[$count]["Cell 7 Voltage"];
								echo "</td>";
								echo "</tr>";
							}
							?> 
						</table>
					<br/>
					<input type="button" value="Pause" onclick="playPause()" id = "playPauseBatt" name = "playPauseBatt"/>
					<br/>
					<br/>
					<input type = "submit" name = "resetSession" value = "Reset Choices"/>
				</form>
			<?php } ?>
			</div>
		</div>
	</body>
</html> 
