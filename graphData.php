<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
$conn = mysqli_connect("localhost", "solar", "solar", "solar", "3306");


// Fetch the data

$result = mysqli_query($conn, "SELECT * FROM solar.`cmu 1 cell0-3voltage`");



// Print out rows
$count = 0;
echo (' [');
while ( $row = mysqli_fetch_assoc( $result ) ) 
{
	echo ('{"category": "'. $row['timestamp'] .'", "cell 0 voltage": '. $row['Cell 0 Voltage'] .', "cell 1 voltage": ' .$row['Cell 1 Voltage']. '}');
	if ($count < 41)
	echo ",";
	$count++;
}
echo ("]");

// Close the connection
mysqli_close( $conn );
?>