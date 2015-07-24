<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
$conn = mysqli_connect("localhost", "solar", "solar", "solar", "3306");


// Fetch the data

$result = mysqli_query($conn, "SELECT timestamp, Uin, Uout, Iin FROM solar.`MPPT2`");



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