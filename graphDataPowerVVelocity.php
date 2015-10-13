<?php
// we need this so that PHP does not complain about deprecated functions
error_reporting( 0 );

// Connect to MySQL
session_start();
$servername = $_SESSION["hostname"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = $_SESSION["dbname"];
$port = $_SESSION["port"];
$dateFrom = $_SESSION["dateFrom"];
$dateTo = $_SESSION["dateTo"];
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);


// Fetch the data

$voltageResult = mysqli_query($conn, "SELECT `time_stamp`, `bus_current_(a)`, `bus_voltage_(v)` from `bmu_bus_measurement` GROUP BY `time_stamp` ORDER BY `time_stamp` DESC LIMIT 20;");

//$test = "SELECT DISTINCT `time_stamp`, `vehicle_velocity` from `Velocity_Measurement` ORDER BY `time_stamp` WHERE `time_stamp` BETWEEN '".$dateFrom."' AND '".$dateTo."' DESC;";
//echo ($test);

$velocityResult = mysqli_query($conn, "SELECT `vehicle_velocity` from `velocity_measurement` WHERE `time_stamp` GROUP BY `time_stamp` ORDER BY `time_stamp` DESC LIMIT 20;");

// Print out rows
$count = 0;
$numRows = mysqli_num_rows($voltageResult) - 1;

if (mysqli_num_rows($velocityResult) - 1 < mysqli_num_rows($voltageResult) - 1)
	$numRows = mysqli_num_rows($velocityResult) - 1;

echo (' [');

$velocityArray = Array();
$count = 0;
while ($velocityRow = mysqli_fetch_assoc($velocityResult))
{
	$velocityArray[$count] = $velocityRow['vehicle_velocity'] * 3.6;
	$count++;
}

$powerArray = Array();
$timeArray = Array();
$count = $numRows;
while ($voltageRow = mysqli_fetch_assoc($voltageResult))
{
	$powerArray[$count] = $voltageRow['Bus_Current'] * $voltageRow['Bus_Voltage'];
	$timeArray[$count] = $voltageRow['time_stamp'];
	$count--;
}

for ($count = 0; $count < $numRows+1; $count++) 
{
	echo ('{"time": "'. $timeArray[$count] .'", "Power Draw": "'. $powerArray[$count] .'", "Vehicle Velocity": "' .$velocityArray[$count].'"}');
	if ($count < $numRows)
	echo ",";
}
echo ("]");

// Close the connection
mysqli_close( $conn );
?>