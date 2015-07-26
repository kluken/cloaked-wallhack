<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
$conn = mysqli_connect("localhost", "solar", "solar", "solar", "3306");


// Fetch the data

$result = mysqli_query($conn, "SELECT `timestamp`, `Phase_C_Current`, `Phase_B_Current` FROM `phase_current_measurement`;");



// Print out rows
$count = 0;
$numRows = mysqli_num_rows($result) - 1;
echo (' [');
while ( $row = mysqli_fetch_assoc( $result ) ) 
{
	echo ('{"category": "'. $row['timestamp'] .'", "Phase C Current": '. $row['Phase_C_Current'] .', "Phase B Current": ' .$row['Phase_B_Current'].'}');
	if ($count < $numRows)
	echo ",";
	$count++;
}
echo ("]");

// Close the connection
mysqli_close( $conn );
?>