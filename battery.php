<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Battery</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script src="jquery-2.1.4.min.js"></script>
		<script>
			function refreshTable() 
			{
				$('#content').load( "battery.php #content");
			}
			setInterval(refreshTable, 3000);
		</script>
		<?php
			session_start();
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
				
				//Set SQL Database Settings
				$servername = "127.0.0.1";
				$username = "solar";
				$password = "solar";
				$dbname = "solar";
				$port = "3306";
				
				//Create SQL Commands
				$sqlCommand = Array();
				$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
				for ($count = 0; $count < $_SESSION['numBatteryCells']; $count++)
				{
					$CMUNum = $count+1;
					$sqlCommand[$count] = "SELECT * FROM CMU".$CMUNum;
				}
				
				// Create connection
				if (!$conn) 
				{
					die("Connection failed: " . mysqli_connect_error());
				}
				else
				{
					echo '<script language="javascript"> alert("Connection Successful") </script>';
				}
				
				
				//Run Commands
				$rs = Array();
				$SQLResult = Array();
				for ($count = 0; $count < sizeof($sqlCommand); $count++)
				{
					$rs[$count] = mysqli_query($conn, $sqlCommand[$count]);
					//$SQLResult[$count] = mysqli_fetch_array($conn, $rs[$count]);
				}
					
				if (sizeof($rs[0] < 1))
				{
					$SQLResult = Array(
					"CMU0SerialNumber" => "N/A", "CMU1SerialNumber" => "N/A", "CMU2SerialNumber" => "N/A", "CMU3SerialNumber" => "N/A", "CMU4SerialNumber" => "N/A", "CMU5SerialNumber" => "N/A", "CMU6SerialNumber" => "N/A", 
					"CMU7SerialNumber" => "N/A", "CMU8SerialNumber" => "N/A", "CMU9SerialNumber" => "N/A", "CMU10SerialNumber" => "N/A", "CMU11SerialNumber" => "N/A", "CMU12SerialNumber" => "N/A", "CMU13SerialNumber" => "N/A", 
					"CMU14SerialNumber" => "N/A", "CMU15SerialNumber" => "N/A", "CMU16SerialNumber" => "N/A", "CMU17SerialNumber" => "N/A", "CMU18SerialNumber" => "N/A", "CMU19SerialNumber" => "N/A", "CMU20SerialNumber" => "N/A",
					"CMU21SerialNumber" => "N/A", "CMU22SerialNumber" => "N/A", "CMU23SerialNumber" => "N/A", "CMU24SerialNumber" => "N/A", "CMU25SerialNumber" => "N/A", "CMU26SerialNumber" => "N/A", "CMU27SerialNumber" => "N/A",
					"CMU28SerialNumber" => "N/A", "CMU29SerialNumber" => "N/A", "CMU30SerialNumber" => "N/A", "CMU31SerialNumber" => "N/A", "CMU32SerialNumber" => "N/A", "CMU33SerialNumber" => "N/A", "CMU34SerialNumber" => "N/A",
					"CMU35SerialNumber" => "N/A", "CMU36SerialNumber" => "N/A", "CMU37SerialNumber" => "N/A", "CMU38SerialNumber" => "N/A", "CMU39SerialNumber" => "N/A", "CMU40SerialNumber" => "N/A", "CMU41SerialNumber" => "N/A",
					"CMU42SerialNumber" => "N/A", "CMU43SerialNumber" => "N/A", "CMU44SerialNumber" => "N/A", "CMU45SerialNumber" => "N/A", "CMU46SerialNumber" => "N/A", "CMU47SerialNumber" => "N/A", "CMU48SerialNumber" => "N/A",
					"CMU49SerialNumber" => "N/A", "CMU50SerialNumber" => "N/A", "CMU51SerialNumber" => "N/A", "CMU52SerialNumber" => "N/A", "CMU53SerialNumber" => "N/A", "CMU54SerialNumber" => "N/A", "CMU55SerialNumber" => "N/A",
					"CMU56SerialNumber" => "N/A", "CMU57SerialNumber" => "N/A", "CMU58SerialNumber" => "N/A", "CMU59SerialNumber" => "N/A", "CMU60SerialNumber" => "N/A", "CMU61SerialNumber" => "N/A", "CMU62SerialNumber" => "N/A",
					"CMU63SerialNumber" => "N/A", "CMU64SerialNumber" => "N/A", "CMU65SerialNumber" => "N/A", "CMU66SerialNumber" => "N/A", "CMU67SerialNumber" => "N/A", "CMU68SerialNumber" => "N/A", "CMU69SerialNumber" => "N/A", 
					"CMU70SerialNumber" => "N/A", "CMU71SerialNumber" => "N/A", "CMU72SerialNumber" => "N/A", "CMU73SerialNumber" => "N/A", "CMU74SerialNumber" => "N/A", "CMU75SerialNumber" => "N/A", "CMU76SerialNumber" => "N/A", 
					"CMU77SerialNumber" => "N/A", "CMU78SerialNumber" => "N/A", "CMU79SerialNumber" => "N/A", 
					"CMU0PCBTemp" => "N/A", "CMU1PCBTemp" => "N/A", "CMU2PCBTemp" => "N/A", "CMU3PCBTemp" => "N/A", "CMU4PCBTemp" => "N/A", "CMU5PCBTemp" => "N/A", "CMU6PCBTemp" => "N/A", 
					"CMU7PCBTemp" => "N/A", "CMU8PCBTemp" => "N/A", "CMU9PCBTemp" => "N/A", "CMU10PCBTemp" => "N/A", "CMU11PCBTemp" => "N/A", "CMU12PCBTemp" => "N/A", "CMU13PCBTemp" => "N/A", 
					"CMU14PCBTemp" => "N/A", "CMU15PCBTemp" => "N/A", "CMU16PCBTemp" => "N/A", "CMU17PCBTemp" => "N/A", "CMU18PCBTemp" => "N/A", "CMU19PCBTemp" => "N/A", "CMU20PCBTemp" => "N/A",
					"CMU21PCBTemp" => "N/A", "CMU22PCBTemp" => "N/A", "CMU23PCBTemp" => "N/A", "CMU24PCBTemp" => "N/A", "CMU25PCBTemp" => "N/A", "CMU26PCBTemp" => "N/A", "CMU27PCBTemp" => "N/A",
					"CMU28PCBTemp" => "N/A", "CMU29PCBTemp" => "N/A", "CMU30PCBTemp" => "N/A", "CMU31PCBTemp" => "N/A", "CMU32PCBTemp" => "N/A", "CMU33PCBTemp" => "N/A", "CMU34PCBTemp" => "N/A",
					"CMU35PCBTemp" => "N/A", "CMU36PCBTemp" => "N/A", "CMU37PCBTemp" => "N/A", "CMU38PCBTemp" => "N/A", "CMU39PCBTemp" => "N/A", "CMU40PCBTemp" => "N/A", "CMU41PCBTemp" => "N/A",
					"CMU42PCBTemp" => "N/A", "CMU43PCBTemp" => "N/A", "CMU44PCBTemp" => "N/A", "CMU45PCBTemp" => "N/A", "CMU46PCBTemp" => "N/A", "CMU47PCBTemp" => "N/A", "CMU48PCBTemp" => "N/A",
					"CMU49PCBTemp" => "N/A", "CMU50PCBTemp" => "N/A", "CMU51PCBTemp" => "N/A", "CMU52PCBTemp" => "N/A", "CMU53PCBTemp" => "N/A", "CMU54PCBTemp" => "N/A", "CMU55PCBTemp" => "N/A",
					"CMU56PCBTemp" => "N/A", "CMU57PCBTemp" => "N/A", "CMU58PCBTemp" => "N/A", "CMU59PCBTemp" => "N/A", "CMU60PCBTemp" => "N/A", "CMU61PCBTemp" => "N/A", "CMU62PCBTemp" => "N/A",
					"CMU63PCBTemp" => "N/A", "CMU64PCBTemp" => "N/A", "CMU65PCBTemp" => "N/A", "CMU66PCBTemp" => "N/A", "CMU67PCBTemp" => "N/A", "CMU68PCBTemp" => "N/A", "CMU69PCBTemp" => "N/A", 
					"CMU70PCBTemp" => "N/A", "CMU71PCBTemp" => "N/A", "CMU72PCBTemp" => "N/A", "CMU73PCBTemp" => "N/A", "CMU74PCBTemp" => "N/A", "CMU75PCBTemp" => "N/A", "CMU76PCBTemp" => "N/A", 
					"CMU77PCBTemp" => "N/A", "CMU78PCBTemp" => "N/A", "CMU79PCBTemp" => "N/A", 
					"CMU0CellTemp" => "N/A", "CMU1CellTemp" => "N/A", "CMU2CellTemp" => "N/A", "CMU3CellTemp" => "N/A", "CMU4CellTemp" => "N/A", "CMU5CellTemp" => "N/A", "CMU6CellTemp" => "N/A", 
					"CMU7CellTemp" => "N/A", "CMU8CellTemp" => "N/A", "CMU9CellTemp" => "N/A", "CMU10CellTemp" => "N/A", "CMU11CellTemp" => "N/A", "CMU12CellTemp" => "N/A", "CMU13CellTemp" => "N/A", 
					"CMU14CellTemp" => "N/A", "CMU15CellTemp" => "N/A", "CMU16CellTemp" => "N/A", "CMU17CellTemp" => "N/A", "CMU18CellTemp" => "N/A", "CMU19CellTemp" => "N/A", "CMU20CellTemp" => "N/A",
					"CMU21CellTemp" => "N/A", "CMU22CellTemp" => "N/A", "CMU23CellTemp" => "N/A", "CMU24CellTemp" => "N/A", "CMU25CellTemp" => "N/A", "CMU26CellTemp" => "N/A", "CMU27CellTemp" => "N/A",
					"CMU28CellTemp" => "N/A", "CMU29CellTemp" => "N/A", "CMU30CellTemp" => "N/A", "CMU31CellTemp" => "N/A", "CMU32CellTemp" => "N/A", "CMU33CellTemp" => "N/A", "CMU34CellTemp" => "N/A",
					"CMU35CellTemp" => "N/A", "CMU36CellTemp" => "N/A", "CMU37CellTemp" => "N/A", "CMU38CellTemp" => "N/A", "CMU39CellTemp" => "N/A", "CMU40CellTemp" => "N/A", "CMU41CellTemp" => "N/A",
					"CMU42CellTemp" => "N/A", "CMU43CellTemp" => "N/A", "CMU44CellTemp" => "N/A", "CMU45CellTemp" => "N/A", "CMU46CellTemp" => "N/A", "CMU47CellTemp" => "N/A", "CMU48CellTemp" => "N/A",
					"CMU49CellTemp" => "N/A", "CMU50CellTemp" => "N/A", "CMU51CellTemp" => "N/A", "CMU52CellTemp" => "N/A", "CMU53CellTemp" => "N/A", "CMU54CellTemp" => "N/A", "CMU55CellTemp" => "N/A",
					"CMU56CellTemp" => "N/A", "CMU57CellTemp" => "N/A", "CMU58CellTemp" => "N/A", "CMU59CellTemp" => "N/A", "CMU60CellTemp" => "N/A", "CMU61CellTemp" => "N/A", "CMU62CellTemp" => "N/A",
					"CMU63CellTemp" => "N/A", "CMU64CellTemp" => "N/A", "CMU65CellTemp" => "N/A", "CMU66CellTemp" => "N/A", "CMU67CellTemp" => "N/A", "CMU68CellTemp" => "N/A", "CMU69CellTemp" => "N/A", 
					"CMU70CellTemp" => "N/A", "CMU71CellTemp" => "N/A", "CMU72CellTemp" => "N/A", "CMU73CellTemp" => "N/A", "CMU74CellTemp" => "N/A", "CMU75CellTemp" => "N/A", "CMU76CellTemp" => "N/A", 
					"CMU77CellTemp" => "N/A", "CMU78CellTemp" => "N/A", "CMU79CellTemp" => "N/A", 
					"CMU0SerialNumber" => "N/A", "CMU1SerialNumber" => "N/A", "CMU2SerialNumber" => "N/A", "CMU3SerialNumber" => "N/A", "CMU4SerialNumber" => "N/A", "CMU5SerialNumber" => "N/A", "CMU6SerialNumber" => "N/A", 
					"CMU7SerialNumber" => "N/A", "CMU8SerialNumber" => "N/A", "CMU9SerialNumber" => "N/A", "CMU10SerialNumber" => "N/A", "CMU11SerialNumber" => "N/A", "CMU12SerialNumber" => "N/A", "CMU13SerialNumber" => "N/A", 
					"CMU14SerialNumber" => "N/A", "CMU15SerialNumber" => "N/A", "CMU16SerialNumber" => "N/A", "CMU17SerialNumber" => "N/A", "CMU18SerialNumber" => "N/A", "CMU19SerialNumber" => "N/A", "CMU20SerialNumber" => "N/A",
					"CMU21SerialNumber" => "N/A", "CMU22SerialNumber" => "N/A", "CMU23SerialNumber" => "N/A", "CMU24SerialNumber" => "N/A", "CMU25SerialNumber" => "N/A", "CMU26SerialNumber" => "N/A", "CMU27SerialNumber" => "N/A",
					"CMU28SerialNumber" => "N/A", "CMU29SerialNumber" => "N/A", "CMU30SerialNumber" => "N/A", "CMU31SerialNumber" => "N/A", "CMU32SerialNumber" => "N/A", "CMU33SerialNumber" => "N/A", "CMU34SerialNumber" => "N/A",
					"CMU35SerialNumber" => "N/A", "CMU36SerialNumber" => "N/A", "CMU37SerialNumber" => "N/A", "CMU38SerialNumber" => "N/A", "CMU39SerialNumber" => "N/A", "CMU40SerialNumber" => "N/A", "CMU41SerialNumber" => "N/A",
					"CMU42SerialNumber" => "N/A", "CMU43SerialNumber" => "N/A", "CMU44SerialNumber" => "N/A", "CMU45SerialNumber" => "N/A", "CMU46SerialNumber" => "N/A", "CMU47SerialNumber" => "N/A", "CMU48SerialNumber" => "N/A",
					"CMU49SerialNumber" => "N/A", "CMU50SerialNumber" => "N/A", "CMU51SerialNumber" => "N/A", "CMU52SerialNumber" => "N/A", "CMU53SerialNumber" => "N/A", "CMU54SerialNumber" => "N/A", "CMU55SerialNumber" => "N/A",
					"CMU56SerialNumber" => "N/A", "CMU57SerialNumber" => "N/A", "CMU58SerialNumber" => "N/A", "CMU59SerialNumber" => "N/A", "CMU60SerialNumber" => "N/A", "CMU61SerialNumber" => "N/A", "CMU62SerialNumber" => "N/A",
					"CMU63SerialNumber" => "N/A", "CMU64SerialNumber" => "N/A", "CMU65SerialNumber" => "N/A", "CMU66SerialNumber" => "N/A", "CMU67SerialNumber" => "N/A", "CMU68SerialNumber" => "N/A", "CMU69SerialNumber" => "N/A", 
					"CMU70SerialNumber" => "N/A", "CMU71SerialNumber" => "N/A", "CMU72SerialNumber" => "N/A", "CMU73SerialNumber" => "N/A", "CMU74SerialNumber" => "N/A", "CMU75SerialNumber" => "N/A", "CMU76SerialNumber" => "N/A", 
					"CMU77SerialNumber" => "N/A", "CMU78SerialNumber" => "N/A", "CMU79SerialNumber" => "N/A", 
					"CMU0Cell0Voltage" => "N/A", "CMU1Cell0Voltage" => "N/A", "CMU2Cell0Voltage" => "N/A", "CMU3Cell0Voltage" => "N/A", "CMU4Cell0Voltage" => "N/A", "CMU5Cell0Voltage" => "N/A", "CMU6Cell0Voltage" => "N/A", 
					"CMU7Cell0Voltage" => "N/A", "CMU8Cell0Voltage" => "N/A", "CMU9Cell0Voltage" => "N/A", "CMU10Cell0Voltage" => "N/A", "CMU11Cell0Voltage" => "N/A", "CMU12Cell0Voltage" => "N/A", "CMU13Cell0Voltage" => "N/A", 
					"CMU14Cell0Voltage" => "N/A", "CMU15Cell0Voltage" => "N/A", "CMU16Cell0Voltage" => "N/A", "CMU17Cell0Voltage" => "N/A", "CMU18Cell0Voltage" => "N/A", "CMU19Cell0Voltage" => "N/A", "CMU20Cell0Voltage" => "N/A",
					"CMU21Cell0Voltage" => "N/A", "CMU22Cell0Voltage" => "N/A", "CMU23Cell0Voltage" => "N/A", "CMU24Cell0Voltage" => "N/A", "CMU25Cell0Voltage" => "N/A", "CMU26Cell0Voltage" => "N/A", "CMU27Cell0Voltage" => "N/A",
					"CMU28Cell0Voltage" => "N/A", "CMU29Cell0Voltage" => "N/A", "CMU30Cell0Voltage" => "N/A", "CMU31Cell0Voltage" => "N/A", "CMU32Cell0Voltage" => "N/A", "CMU33Cell0Voltage" => "N/A", "CMU34Cell0Voltage" => "N/A",
					"CMU35Cell0Voltage" => "N/A", "CMU36Cell0Voltage" => "N/A", "CMU37Cell0Voltage" => "N/A", "CMU38Cell0Voltage" => "N/A", "CMU39Cell0Voltage" => "N/A", "CMU40Cell0Voltage" => "N/A", "CMU41Cell0Voltage" => "N/A",
					"CMU42Cell0Voltage" => "N/A", "CMU43Cell0Voltage" => "N/A", "CMU44Cell0Voltage" => "N/A", "CMU45Cell0Voltage" => "N/A", "CMU46Cell0Voltage" => "N/A", "CMU47Cell0Voltage" => "N/A", "CMU48Cell0Voltage" => "N/A",
					"CMU49Cell0Voltage" => "N/A", "CMU50Cell0Voltage" => "N/A", "CMU51Cell0Voltage" => "N/A", "CMU52Cell0Voltage" => "N/A", "CMU53Cell0Voltage" => "N/A", "CMU54Cell0Voltage" => "N/A", "CMU55Cell0Voltage" => "N/A",
					"CMU56Cell0Voltage" => "N/A", "CMU57Cell0Voltage" => "N/A", "CMU58Cell0Voltage" => "N/A", "CMU59Cell0Voltage" => "N/A", "CMU60Cell0Voltage" => "N/A", "CMU61Cell0Voltage" => "N/A", "CMU62Cell0Voltage" => "N/A",
					"CMU63Cell0Voltage" => "N/A", "CMU64Cell0Voltage" => "N/A", "CMU65Cell0Voltage" => "N/A", "CMU66Cell0Voltage" => "N/A", "CMU67Cell0Voltage" => "N/A", "CMU68Cell0Voltage" => "N/A", "CMU69Cell0Voltage" => "N/A", 
					"CMU70Cell0Voltage" => "N/A", "CMU71Cell0Voltage" => "N/A", "CMU72Cell0Voltage" => "N/A", "CMU73Cell0Voltage" => "N/A", "CMU74Cell0Voltage" => "N/A", "CMU75Cell0Voltage" => "N/A", "CMU76Cell0Voltage" => "N/A", 
					"CMU77Cell0Voltage" => "N/A", "CMU78Cell0Voltage" => "N/A", "CMU79Cell0Voltage" => "N/A", 
					"CMU0Cell1Voltage" => "N/A", "CMU1Cell1Voltage" => "N/A", "CMU2Cell1Voltage" => "N/A", "CMU3Cell1Voltage" => "N/A", "CMU4Cell1Voltage" => "N/A", "CMU5Cell1Voltage" => "N/A", "CMU6Cell1Voltage" => "N/A", 
					"CMU7Cell1Voltage" => "N/A", "CMU8Cell1Voltage" => "N/A", "CMU9Cell1Voltage" => "N/A", "CMU10Cell1Voltage" => "N/A", "CMU11Cell1Voltage" => "N/A", "CMU12Cell1Voltage" => "N/A", "CMU13Cell1Voltage" => "N/A", 
					"CMU14Cell1Voltage" => "N/A", "CMU15Cell1Voltage" => "N/A", "CMU16Cell1Voltage" => "N/A", "CMU17Cell1Voltage" => "N/A", "CMU18Cell1Voltage" => "N/A", "CMU19Cell1Voltage" => "N/A", "CMU20Cell1Voltage" => "N/A",
					"CMU21Cell1Voltage" => "N/A", "CMU22Cell1Voltage" => "N/A", "CMU23Cell1Voltage" => "N/A", "CMU24Cell1Voltage" => "N/A", "CMU25Cell1Voltage" => "N/A", "CMU26Cell1Voltage" => "N/A", "CMU27Cell1Voltage" => "N/A",
					"CMU28Cell1Voltage" => "N/A", "CMU29Cell1Voltage" => "N/A", "CMU30Cell1Voltage" => "N/A", "CMU31Cell1Voltage" => "N/A", "CMU32Cell1Voltage" => "N/A", "CMU33Cell1Voltage" => "N/A", "CMU34Cell1Voltage" => "N/A",
					"CMU35Cell1Voltage" => "N/A", "CMU36Cell1Voltage" => "N/A", "CMU37Cell1Voltage" => "N/A", "CMU38Cell1Voltage" => "N/A", "CMU39Cell1Voltage" => "N/A", "CMU40Cell1Voltage" => "N/A", "CMU41Cell1Voltage" => "N/A",
					"CMU42Cell1Voltage" => "N/A", "CMU43Cell1Voltage" => "N/A", "CMU44Cell1Voltage" => "N/A", "CMU45Cell1Voltage" => "N/A", "CMU46Cell1Voltage" => "N/A", "CMU47Cell1Voltage" => "N/A", "CMU48Cell1Voltage" => "N/A",
					"CMU49Cell1Voltage" => "N/A", "CMU50Cell1Voltage" => "N/A", "CMU51Cell1Voltage" => "N/A", "CMU52Cell1Voltage" => "N/A", "CMU53Cell1Voltage" => "N/A", "CMU54Cell1Voltage" => "N/A", "CMU55Cell1Voltage" => "N/A",
					"CMU56Cell1Voltage" => "N/A", "CMU57Cell1Voltage" => "N/A", "CMU58Cell1Voltage" => "N/A", "CMU59Cell1Voltage" => "N/A", "CMU60Cell1Voltage" => "N/A", "CMU61Cell1Voltage" => "N/A", "CMU62Cell1Voltage" => "N/A",
					"CMU63Cell1Voltage" => "N/A", "CMU64Cell1Voltage" => "N/A", "CMU65Cell1Voltage" => "N/A", "CMU66Cell1Voltage" => "N/A", "CMU67Cell1Voltage" => "N/A", "CMU68Cell1Voltage" => "N/A", "CMU69Cell1Voltage" => "N/A", 
					"CMU70Cell1Voltage" => "N/A", "CMU71Cell1Voltage" => "N/A", "CMU72Cell1Voltage" => "N/A", "CMU73Cell1Voltage" => "N/A", "CMU74Cell1Voltage" => "N/A", "CMU75Cell1Voltage" => "N/A", "CMU76Cell1Voltage" => "N/A", 
					"CMU77Cell1Voltage" => "N/A", "CMU78Cell1Voltage" => "N/A", "CMU79Cell1Voltage" => "N/A", 
					"CMU0Cell2Voltage" => "N/A", "CMU1Cell2Voltage" => "N/A", "CMU2Cell2Voltage" => "N/A", "CMU3Cell2Voltage" => "N/A", "CMU4Cell2Voltage" => "N/A", "CMU5Cell2Voltage" => "N/A", "CMU6Cell2Voltage" => "N/A", 
					"CMU7Cell2Voltage" => "N/A", "CMU8Cell2Voltage" => "N/A", "CMU9Cell2Voltage" => "N/A", "CMU10Cell2Voltage" => "N/A", "CMU11Cell2Voltage" => "N/A", "CMU12Cell2Voltage" => "N/A", "CMU13Cell2Voltage" => "N/A", 
					"CMU14Cell2Voltage" => "N/A", "CMU15Cell2Voltage" => "N/A", "CMU16Cell2Voltage" => "N/A", "CMU17Cell2Voltage" => "N/A", "CMU18Cell2Voltage" => "N/A", "CMU19Cell2Voltage" => "N/A", "CMU20Cell2Voltage" => "N/A",
					"CMU21Cell2Voltage" => "N/A", "CMU22Cell2Voltage" => "N/A", "CMU23Cell2Voltage" => "N/A", "CMU24Cell2Voltage" => "N/A", "CMU25Cell2Voltage" => "N/A", "CMU26Cell2Voltage" => "N/A", "CMU27Cell2Voltage" => "N/A",
					"CMU28Cell2Voltage" => "N/A", "CMU29Cell2Voltage" => "N/A", "CMU30Cell2Voltage" => "N/A", "CMU31Cell2Voltage" => "N/A", "CMU32Cell2Voltage" => "N/A", "CMU33Cell2Voltage" => "N/A", "CMU34Cell2Voltage" => "N/A",
					"CMU35Cell2Voltage" => "N/A", "CMU36Cell2Voltage" => "N/A", "CMU37Cell2Voltage" => "N/A", "CMU38Cell2Voltage" => "N/A", "CMU39Cell2Voltage" => "N/A", "CMU40Cell2Voltage" => "N/A", "CMU41Cell2Voltage" => "N/A",
					"CMU42Cell2Voltage" => "N/A", "CMU43Cell2Voltage" => "N/A", "CMU44Cell2Voltage" => "N/A", "CMU45Cell2Voltage" => "N/A", "CMU46Cell2Voltage" => "N/A", "CMU47Cell2Voltage" => "N/A", "CMU48Cell2Voltage" => "N/A",
					"CMU49Cell2Voltage" => "N/A", "CMU50Cell2Voltage" => "N/A", "CMU51Cell2Voltage" => "N/A", "CMU52Cell2Voltage" => "N/A", "CMU53Cell2Voltage" => "N/A", "CMU54Cell2Voltage" => "N/A", "CMU55Cell2Voltage" => "N/A",
					"CMU56Cell2Voltage" => "N/A", "CMU57Cell2Voltage" => "N/A", "CMU58Cell2Voltage" => "N/A", "CMU59Cell2Voltage" => "N/A", "CMU60Cell2Voltage" => "N/A", "CMU61Cell2Voltage" => "N/A", "CMU62Cell2Voltage" => "N/A",
					"CMU63Cell2Voltage" => "N/A", "CMU64Cell2Voltage" => "N/A", "CMU65Cell2Voltage" => "N/A", "CMU66Cell2Voltage" => "N/A", "CMU67Cell2Voltage" => "N/A", "CMU68Cell2Voltage" => "N/A", "CMU69Cell2Voltage" => "N/A", 
					"CMU70Cell2Voltage" => "N/A", "CMU71Cell2Voltage" => "N/A", "CMU72Cell2Voltage" => "N/A", "CMU73Cell2Voltage" => "N/A", "CMU74Cell2Voltage" => "N/A", "CMU75Cell2Voltage" => "N/A", "CMU76Cell2Voltage" => "N/A", 
					"CMU77Cell2Voltage" => "N/A", "CMU78Cell2Voltage" => "N/A", "CMU79Cell2Voltage" => "N/A", 
					"CMU0Cell3Voltage" => "N/A", "CMU1Cell3Voltage" => "N/A", "CMU2Cell3Voltage" => "N/A", "CMU3Cell3Voltage" => "N/A", "CMU4Cell3Voltage" => "N/A", "CMU5Cell3Voltage" => "N/A", "CMU6Cell3Voltage" => "N/A", 
					"CMU7Cell3Voltage" => "N/A", "CMU8Cell3Voltage" => "N/A", "CMU9Cell3Voltage" => "N/A", "CMU10Cell3Voltage" => "N/A", "CMU11Cell3Voltage" => "N/A", "CMU12Cell3Voltage" => "N/A", "CMU13Cell3Voltage" => "N/A", 
					"CMU14Cell3Voltage" => "N/A", "CMU15Cell3Voltage" => "N/A", "CMU16Cell3Voltage" => "N/A", "CMU17Cell3Voltage" => "N/A", "CMU18Cell3Voltage" => "N/A", "CMU19Cell3Voltage" => "N/A", "CMU20Cell3Voltage" => "N/A",
					"CMU21Cell3Voltage" => "N/A", "CMU22Cell3Voltage" => "N/A", "CMU23Cell3Voltage" => "N/A", "CMU24Cell3Voltage" => "N/A", "CMU25Cell3Voltage" => "N/A", "CMU26Cell3Voltage" => "N/A", "CMU27Cell3Voltage" => "N/A",
					"CMU28Cell3Voltage" => "N/A", "CMU29Cell3Voltage" => "N/A", "CMU30Cell3Voltage" => "N/A", "CMU31Cell3Voltage" => "N/A", "CMU32Cell3Voltage" => "N/A", "CMU33Cell3Voltage" => "N/A", "CMU34Cell3Voltage" => "N/A",
					"CMU35Cell3Voltage" => "N/A", "CMU36Cell3Voltage" => "N/A", "CMU37Cell3Voltage" => "N/A", "CMU38Cell3Voltage" => "N/A", "CMU39Cell3Voltage" => "N/A", "CMU40Cell3Voltage" => "N/A", "CMU41Cell3Voltage" => "N/A",
					"CMU42Cell3Voltage" => "N/A", "CMU43Cell3Voltage" => "N/A", "CMU44Cell3Voltage" => "N/A", "CMU45Cell3Voltage" => "N/A", "CMU46Cell3Voltage" => "N/A", "CMU47Cell3Voltage" => "N/A", "CMU48Cell3Voltage" => "N/A",
					"CMU49Cell3Voltage" => "N/A", "CMU50Cell3Voltage" => "N/A", "CMU51Cell3Voltage" => "N/A", "CMU52Cell3Voltage" => "N/A", "CMU53Cell3Voltage" => "N/A", "CMU54Cell3Voltage" => "N/A", "CMU55Cell3Voltage" => "N/A",
					"CMU56Cell3Voltage" => "N/A", "CMU57Cell3Voltage" => "N/A", "CMU58Cell3Voltage" => "N/A", "CMU59Cell3Voltage" => "N/A", "CMU60Cell3Voltage" => "N/A", "CMU61Cell3Voltage" => "N/A", "CMU62Cell3Voltage" => "N/A",
					"CMU63Cell3Voltage" => "N/A", "CMU64Cell3Voltage" => "N/A", "CMU65Cell3Voltage" => "N/A", "CMU66Cell3Voltage" => "N/A", "CMU67Cell3Voltage" => "N/A", "CMU68Cell3Voltage" => "N/A", "CMU69Cell3Voltage" => "N/A", 
					"CMU70Cell3Voltage" => "N/A", "CMU71Cell3Voltage" => "N/A", "CMU72Cell3Voltage" => "N/A", "CMU73Cell3Voltage" => "N/A", "CMU74Cell3Voltage" => "N/A", "CMU75Cell3Voltage" => "N/A", "CMU76Cell3Voltage" => "N/A", 
					"CMU77Cell3Voltage" => "N/A", "CMU78Cell3Voltage" => "N/A", "CMU79Cell3Voltage" => "N/A", 
					"CMU0Cell4Voltage" => "N/A", "CMU1Cell4Voltage" => "N/A", "CMU2Cell4Voltage" => "N/A", "CMU3Cell4Voltage" => "N/A", "CMU4Cell4Voltage" => "N/A", "CMU5Cell4Voltage" => "N/A", "CMU6Cell4Voltage" => "N/A", 
					"CMU7Cell4Voltage" => "N/A", "CMU8Cell4Voltage" => "N/A", "CMU9Cell4Voltage" => "N/A", "CMU10Cell4Voltage" => "N/A", "CMU11Cell4Voltage" => "N/A", "CMU12Cell4Voltage" => "N/A", "CMU13Cell4Voltage" => "N/A", 
					"CMU14Cell4Voltage" => "N/A", "CMU15Cell4Voltage" => "N/A", "CMU16Cell4Voltage" => "N/A", "CMU17Cell4Voltage" => "N/A", "CMU18Cell4Voltage" => "N/A", "CMU19Cell4Voltage" => "N/A", "CMU20Cell4Voltage" => "N/A",
					"CMU21Cell4Voltage" => "N/A", "CMU22Cell4Voltage" => "N/A", "CMU23Cell4Voltage" => "N/A", "CMU24Cell4Voltage" => "N/A", "CMU25Cell4Voltage" => "N/A", "CMU26Cell4Voltage" => "N/A", "CMU27Cell4Voltage" => "N/A",
					"CMU28Cell4Voltage" => "N/A", "CMU29Cell4Voltage" => "N/A", "CMU30Cell4Voltage" => "N/A", "CMU31Cell4Voltage" => "N/A", "CMU32Cell4Voltage" => "N/A", "CMU33Cell4Voltage" => "N/A", "CMU34Cell4Voltage" => "N/A",
					"CMU35Cell4Voltage" => "N/A", "CMU36Cell4Voltage" => "N/A", "CMU37Cell4Voltage" => "N/A", "CMU38Cell4Voltage" => "N/A", "CMU39Cell4Voltage" => "N/A", "CMU40Cell4Voltage" => "N/A", "CMU41Cell4Voltage" => "N/A",
					"CMU42Cell4Voltage" => "N/A", "CMU43Cell4Voltage" => "N/A", "CMU44Cell4Voltage" => "N/A", "CMU45Cell4Voltage" => "N/A", "CMU46Cell4Voltage" => "N/A", "CMU47Cell4Voltage" => "N/A", "CMU48Cell4Voltage" => "N/A",
					"CMU49Cell4Voltage" => "N/A", "CMU50Cell4Voltage" => "N/A", "CMU51Cell4Voltage" => "N/A", "CMU52Cell4Voltage" => "N/A", "CMU53Cell4Voltage" => "N/A", "CMU54Cell4Voltage" => "N/A", "CMU55Cell4Voltage" => "N/A",
					"CMU56Cell4Voltage" => "N/A", "CMU57Cell4Voltage" => "N/A", "CMU58Cell4Voltage" => "N/A", "CMU59Cell4Voltage" => "N/A", "CMU60Cell4Voltage" => "N/A", "CMU61Cell4Voltage" => "N/A", "CMU62Cell4Voltage" => "N/A",
					"CMU63Cell4Voltage" => "N/A", "CMU64Cell4Voltage" => "N/A", "CMU65Cell4Voltage" => "N/A", "CMU66Cell4Voltage" => "N/A", "CMU67Cell4Voltage" => "N/A", "CMU68Cell4Voltage" => "N/A", "CMU69Cell4Voltage" => "N/A", 
					"CMU70Cell4Voltage" => "N/A", "CMU71Cell4Voltage" => "N/A", "CMU72Cell4Voltage" => "N/A", "CMU73Cell4Voltage" => "N/A", "CMU74Cell4Voltage" => "N/A", "CMU75Cell4Voltage" => "N/A", "CMU76Cell4Voltage" => "N/A", 
					"CMU77Cell4Voltage" => "N/A", "CMU78Cell4Voltage" => "N/A", "CMU79Cell4Voltage" => "N/A", 
					"CMU0Cell5Voltage" => "N/A", "CMU1Cell5Voltage" => "N/A", "CMU2Cell5Voltage" => "N/A", "CMU3Cell5Voltage" => "N/A", "CMU4Cell5Voltage" => "N/A", "CMU5Cell5Voltage" => "N/A", "CMU6Cell5Voltage" => "N/A", 
					"CMU7Cell5Voltage" => "N/A", "CMU8Cell5Voltage" => "N/A", "CMU9Cell5Voltage" => "N/A", "CMU10Cell5Voltage" => "N/A", "CMU11Cell5Voltage" => "N/A", "CMU12Cell5Voltage" => "N/A", "CMU13Cell5Voltage" => "N/A", 
					"CMU14Cell5Voltage" => "N/A", "CMU15Cell5Voltage" => "N/A", "CMU16Cell5Voltage" => "N/A", "CMU17Cell5Voltage" => "N/A", "CMU18Cell5Voltage" => "N/A", "CMU19Cell5Voltage" => "N/A", "CMU20Cell5Voltage" => "N/A",
					"CMU21Cell5Voltage" => "N/A", "CMU22Cell5Voltage" => "N/A", "CMU23Cell5Voltage" => "N/A", "CMU24Cell5Voltage" => "N/A", "CMU25Cell5Voltage" => "N/A", "CMU26Cell5Voltage" => "N/A", "CMU27Cell5Voltage" => "N/A",
					"CMU28Cell5Voltage" => "N/A", "CMU29Cell5Voltage" => "N/A", "CMU30Cell5Voltage" => "N/A", "CMU31Cell5Voltage" => "N/A", "CMU32Cell5Voltage" => "N/A", "CMU33Cell5Voltage" => "N/A", "CMU34Cell5Voltage" => "N/A",
					"CMU35Cell5Voltage" => "N/A", "CMU36Cell5Voltage" => "N/A", "CMU37Cell5Voltage" => "N/A", "CMU38Cell5Voltage" => "N/A", "CMU39Cell5Voltage" => "N/A", "CMU40Cell5Voltage" => "N/A", "CMU41Cell5Voltage" => "N/A",
					"CMU42Cell5Voltage" => "N/A", "CMU43Cell5Voltage" => "N/A", "CMU44Cell5Voltage" => "N/A", "CMU45Cell5Voltage" => "N/A", "CMU46Cell5Voltage" => "N/A", "CMU47Cell5Voltage" => "N/A", "CMU48Cell5Voltage" => "N/A",
					"CMU49Cell5Voltage" => "N/A", "CMU50Cell5Voltage" => "N/A", "CMU51Cell5Voltage" => "N/A", "CMU52Cell5Voltage" => "N/A", "CMU53Cell5Voltage" => "N/A", "CMU54Cell5Voltage" => "N/A", "CMU55Cell5Voltage" => "N/A",
					"CMU56Cell5Voltage" => "N/A", "CMU57Cell5Voltage" => "N/A", "CMU58Cell5Voltage" => "N/A", "CMU59Cell5Voltage" => "N/A", "CMU60Cell5Voltage" => "N/A", "CMU61Cell5Voltage" => "N/A", "CMU62Cell5Voltage" => "N/A",
					"CMU63Cell5Voltage" => "N/A", "CMU64Cell5Voltage" => "N/A", "CMU65Cell5Voltage" => "N/A", "CMU66Cell5Voltage" => "N/A", "CMU67Cell5Voltage" => "N/A", "CMU68Cell5Voltage" => "N/A", "CMU69Cell5Voltage" => "N/A", 
					"CMU70Cell5Voltage" => "N/A", "CMU71Cell5Voltage" => "N/A", "CMU72Cell5Voltage" => "N/A", "CMU73Cell5Voltage" => "N/A", "CMU74Cell5Voltage" => "N/A", "CMU75Cell5Voltage" => "N/A", "CMU76Cell5Voltage" => "N/A", 
					"CMU77Cell5Voltage" => "N/A", "CMU78Cell5Voltage" => "N/A", "CMU79Cell5Voltage" => "N/A", 
					"CMU0Cell6Voltage" => "N/A", "CMU1Cell6Voltage" => "N/A", "CMU2Cell6Voltage" => "N/A", "CMU3Cell6Voltage" => "N/A", "CMU4Cell6Voltage" => "N/A", "CMU5Cell6Voltage" => "N/A", "CMU6Cell6Voltage" => "N/A", 
					"CMU7Cell6Voltage" => "N/A", "CMU8Cell6Voltage" => "N/A", "CMU9Cell6Voltage" => "N/A", "CMU10Cell6Voltage" => "N/A", "CMU11Cell6Voltage" => "N/A", "CMU12Cell6Voltage" => "N/A", "CMU13Cell6Voltage" => "N/A", 
					"CMU14Cell6Voltage" => "N/A", "CMU15Cell6Voltage" => "N/A", "CMU16Cell6Voltage" => "N/A", "CMU17Cell6Voltage" => "N/A", "CMU18Cell6Voltage" => "N/A", "CMU19Cell6Voltage" => "N/A", "CMU20Cell6Voltage" => "N/A",
					"CMU21Cell6Voltage" => "N/A", "CMU22Cell6Voltage" => "N/A", "CMU23Cell6Voltage" => "N/A", "CMU24Cell6Voltage" => "N/A", "CMU25Cell6Voltage" => "N/A", "CMU26Cell6Voltage" => "N/A", "CMU27Cell6Voltage" => "N/A",
					"CMU28Cell6Voltage" => "N/A", "CMU29Cell6Voltage" => "N/A", "CMU30Cell6Voltage" => "N/A", "CMU31Cell6Voltage" => "N/A", "CMU32Cell6Voltage" => "N/A", "CMU33Cell6Voltage" => "N/A", "CMU34Cell6Voltage" => "N/A",
					"CMU35Cell6Voltage" => "N/A", "CMU36Cell6Voltage" => "N/A", "CMU37Cell6Voltage" => "N/A", "CMU38Cell6Voltage" => "N/A", "CMU39Cell6Voltage" => "N/A", "CMU40Cell6Voltage" => "N/A", "CMU41Cell6Voltage" => "N/A",
					"CMU42Cell6Voltage" => "N/A", "CMU43Cell6Voltage" => "N/A", "CMU44Cell6Voltage" => "N/A", "CMU45Cell6Voltage" => "N/A", "CMU46Cell6Voltage" => "N/A", "CMU47Cell6Voltage" => "N/A", "CMU48Cell6Voltage" => "N/A",
					"CMU49Cell6Voltage" => "N/A", "CMU50Cell6Voltage" => "N/A", "CMU51Cell6Voltage" => "N/A", "CMU52Cell6Voltage" => "N/A", "CMU53Cell6Voltage" => "N/A", "CMU54Cell6Voltage" => "N/A", "CMU55Cell6Voltage" => "N/A",
					"CMU56Cell6Voltage" => "N/A", "CMU57Cell6Voltage" => "N/A", "CMU58Cell6Voltage" => "N/A", "CMU59Cell6Voltage" => "N/A", "CMU60Cell6Voltage" => "N/A", "CMU61Cell6Voltage" => "N/A", "CMU62Cell6Voltage" => "N/A",
					"CMU63Cell6Voltage" => "N/A", "CMU64Cell6Voltage" => "N/A", "CMU65Cell6Voltage" => "N/A", "CMU66Cell6Voltage" => "N/A", "CMU67Cell6Voltage" => "N/A", "CMU68Cell6Voltage" => "N/A", "CMU69Cell6Voltage" => "N/A", 
					"CMU70Cell6Voltage" => "N/A", "CMU71Cell6Voltage" => "N/A", "CMU72Cell6Voltage" => "N/A", "CMU73Cell6Voltage" => "N/A", "CMU74Cell6Voltage" => "N/A", "CMU75Cell6Voltage" => "N/A", "CMU76Cell6Voltage" => "N/A", 
					"CMU77Cell6Voltage" => "N/A", "CMU78Cell6Voltage" => "N/A", "CMU79Cell6Voltage" => "N/A", 
					"CMU0Cell7Voltage" => "N/A", "CMU1Cell7Voltage" => "N/A", "CMU2Cell7Voltage" => "N/A", "CMU3Cell7Voltage" => "N/A", "CMU4Cell7Voltage" => "N/A", "CMU5Cell7Voltage" => "N/A", "CMU6Cell7Voltage" => "N/A", 
					"CMU7Cell7Voltage" => "N/A", "CMU8Cell7Voltage" => "N/A", "CMU9Cell7Voltage" => "N/A", "CMU10Cell7Voltage" => "N/A", "CMU11Cell7Voltage" => "N/A", "CMU12Cell7Voltage" => "N/A", "CMU13Cell7Voltage" => "N/A", 
					"CMU14Cell7Voltage" => "N/A", "CMU15Cell7Voltage" => "N/A", "CMU16Cell7Voltage" => "N/A", "CMU17Cell7Voltage" => "N/A", "CMU18Cell7Voltage" => "N/A", "CMU19Cell7Voltage" => "N/A", "CMU20Cell7Voltage" => "N/A",
					"CMU21Cell7Voltage" => "N/A", "CMU22Cell7Voltage" => "N/A", "CMU23Cell7Voltage" => "N/A", "CMU24Cell7Voltage" => "N/A", "CMU25Cell7Voltage" => "N/A", "CMU26Cell7Voltage" => "N/A", "CMU27Cell7Voltage" => "N/A",
					"CMU28Cell7Voltage" => "N/A", "CMU29Cell7Voltage" => "N/A", "CMU30Cell7Voltage" => "N/A", "CMU31Cell7Voltage" => "N/A", "CMU32Cell7Voltage" => "N/A", "CMU33Cell7Voltage" => "N/A", "CMU34Cell7Voltage" => "N/A",
					"CMU35Cell7Voltage" => "N/A", "CMU36Cell7Voltage" => "N/A", "CMU37Cell7Voltage" => "N/A", "CMU38Cell7Voltage" => "N/A", "CMU39Cell7Voltage" => "N/A", "CMU40Cell7Voltage" => "N/A", "CMU41Cell7Voltage" => "N/A",
					"CMU42Cell7Voltage" => "N/A", "CMU43Cell7Voltage" => "N/A", "CMU44Cell7Voltage" => "N/A", "CMU45Cell7Voltage" => "N/A", "CMU46Cell7Voltage" => "N/A", "CMU47Cell7Voltage" => "N/A", "CMU48Cell7Voltage" => "N/A",
					"CMU49Cell7Voltage" => "N/A", "CMU50Cell7Voltage" => "N/A", "CMU51Cell7Voltage" => "N/A", "CMU52Cell7Voltage" => "N/A", "CMU53Cell7Voltage" => "N/A", "CMU54Cell7Voltage" => "N/A", "CMU55Cell7Voltage" => "N/A",
					"CMU56Cell7Voltage" => "N/A", "CMU57Cell7Voltage" => "N/A", "CMU58Cell7Voltage" => "N/A", "CMU59Cell7Voltage" => "N/A", "CMU60Cell7Voltage" => "N/A", "CMU61Cell7Voltage" => "N/A", "CMU62Cell7Voltage" => "N/A",
					"CMU63Cell7Voltage" => "N/A", "CMU64Cell7Voltage" => "N/A", "CMU65Cell7Voltage" => "N/A", "CMU66Cell7Voltage" => "N/A", "CMU67Cell7Voltage" => "N/A", "CMU68Cell7Voltage" => "N/A", "CMU69Cell7Voltage" => "N/A", 
					"CMU70Cell7Voltage" => "N/A", "CMU71Cell7Voltage" => "N/A", "CMU72Cell7Voltage" => "N/A", "CMU73Cell7Voltage" => "N/A", "CMU74Cell7Voltage" => "N/A", "CMU75Cell7Voltage" => "N/A", "CMU76Cell7Voltage" => "N/A", 
					"CMU77Cell7Voltage" => "N/A", "CMU78Cell7Voltage" => "N/A", "CMU79Cell7Voltage" => "N/A", 
					);
				}
			}
		?>
	</head>
	<body>
		<div id="container">
			<div id="headerbar">
				<h1>UWS Solar Car Project - Battery</h1>
				<p>
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
			<div id="content">
			<?php  
				if (!isset($_SESSION['numBatteryCells']))
				{ ?>
					<br/>
					<form method="post" action="battery.php">
						<p>
							<label id = "numBatteryCellsLabel"> Please enter the amount of cells you want to show </label><input id="numBatteryCells" name="numBatteryCells"  value = "5" ></input>
							<input type="submit" value="Submit"></input>
						</p>
					</form>
					<?php
				}
				else
				{ ?>
					<br/>  <br/>
					<form action = "battery.php" method = "post">
						<table id = "battTable">
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
							for ($count = 1; $count < $_SESSION['numBatteryCells'] + 1; $count++) 
							{
								echo "<tr>";
								echo "<td>";
								echo $count;
								echo "</td>";
								$CMU = "CMU".$count."SerialNumber";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."PCBTemp";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."CellTemp";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell0Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell1Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell2Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell3Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell4Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell5Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell6Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								$CMU = "CMU".$count."Cell7Voltage";
								if (!is_numeric($SQLResult[$CMU]) || $SQLResult[$CMU] < 5)
								echo "<td id='tableError'>";
								else
								echo "<td>";
								echo $SQLResult[$CMU];
								echo "</td>";
								echo "</tr>";
							}
							?> 
						</table>
					<input type = "submit" name = "resetSession" value = "Reset Choices"/>
					</form>
			<?php } ?>
			</div>
		</div>
	</body>
</html> 
