<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
session_start();
$servername = $_SESSION["hostname"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = $_SESSION["dbname"];
$port = $_SESSION["port"];
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);


// Fetch the data

$result = mysqli_query($conn, "SELECT `bus_measurement`.`time_stamp`, `bus_measurement`.`Bus_Current`, `bus_measurement`.`Bus_Voltage`, `velocity_measurement`.`vehicle_velocity` from `bus_measurement`, `velocity_measurement` where `bus_measurement`.`time_stamp` = `velocity_measurement`.`time_stamp` ORDER BY `bus_measurement`.`time_stamp` DESC LIMIT 10;");



// Print out rows
$count = 0;
$numRows = mysqli_num_rows($result) - 1;
echo (' [');
while ( $row = mysqli_fetch_assoc( $result ) ) 
{
	echo ('{"category": "'. $row['time_stamp'] .'", "Power Draw": '. $row['Bus_Current'] *$row['Bus_Voltage']  .', "Vehicle Velocity": ' .$row['vehicle_velocity'].'}');
	if ($count < $numRows)
	echo ",";
	$count++;
}
echo ("]");

// Close the connection
mysqli_close( $conn );
?>