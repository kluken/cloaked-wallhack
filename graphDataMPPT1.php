<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
// Connect to MySQL
session_start();
$servername = $_SESSION["hostname"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = $_SESSION["dbname"];
$port = $_SESSION["port"];
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Fetch the data

$result = mysqli_query($conn, "SELECT timestamp, Uin, Uout, Iin FROM solar.`MPPT1`");



// Print out rows
$count = 0;
$numRows = mysqli_num_rows($result) - 1;
echo (' [');
while ( $row = mysqli_fetch_assoc( $result ) ) 
{
	echo ('{"category": "'. $row['timestamp'] .'", "Uin": '. $row['Uin'] .', "Uout": ' .$row['Uout'].', "Iin": ' .$row['Iin']. '}');
	if ($count < $numRows)
	echo ",";
	$count++;
}
echo ("]");

// Close the connection
mysqli_close( $conn );
?>