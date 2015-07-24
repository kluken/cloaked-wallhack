<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - IT Admin</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script src="jquery-2.1.4.min.js"></script>
		<script>
			function refreshTable() 
			{
				$('#content').load( "rpi.php #content");
			}
			setInterval(refreshTable, 10000);
		</script>
		<style>
			body:after 			{	
				background-image: url("car.jpg");
				background-size: 1920px 1080px;		
			}
		</style>
		
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
			
		//...POST FROM a form
		if (  isset($_POST["RPiControlPannel"]) ) {
			//...Control Pannel was executed : 
		}else if (  isset($_POST["PiSelectPannel"]) ) {
			//...Rasberry Pi selected : 
			
		}		
			
			?> 
	</head>
	<body>
		<div id="container">
			<div id="headerbar">
				<h1>UWS Solar Car Project - IT Admin</h1>
				<p> 
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
			<div id="content">
				<p> 
					<form id="PiSelectPannel" method="POST">
						<div id="PiSelect">						
						<table style="width:100%">
						  
							<?php 
								// SQL For the rasberry pies
								// SQL DB: MAIN : SQL TABLE: 'RPi'
								// FORMAT: PI NAME, PI IP ADDRESS, PI PING , PI LAST SEEN, SERVICES (SSH/PHP/DBM)
								$servername = "localhost";
								$username = "solar"; //...READ ONLY PERMISSIONS
								$password = "solar";
								$dbname = "main";
								
								// Create connection
								$conn = new mysqli($servername, $username, $password, $dbname);
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								} 

								$sql = "SELECT * FROM pi";
								$result = mysqli_query ( $conn , $sql );
								//$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									echo "<tr><th>ID</th><th>NAME</th><th>IP ADDRESS</th><th>MAC(KEY)</th></tr>";
									while($row = $result->fetch_assoc()) {
										echo "<tr><td> ". $row["id"]. " </td><td>" . $row["name"]. " </td><td>" . $row["ip"]. "</td><td>" . $row["mac"]. "</td><tr>";
									}									
								} else {
									echo "0 results";
								}
								//$conn->close();
								mysqli_close ( $conn );
							?>
						</table>
						</div>
						
						<div id="PiControl">
							<form id="RPiControlPannel" method="POST">
							<?php 
								//....DISPLAY RASBERRY PI :
								if ( isset ( $_POST['PiControl'] ) || isset( $_SESSION['PiControl'] ) ) {
									//...Pi Control is set
									?>
											<h2> Raspberry Pi control panel:</h2>										
									<?php
									echo "<input type='text' name='RASBERRY_NAME' value='".$_SESSION['PiName']."'/>";
									echo "<input type='text' name='RASBERRY_IP' value='".$_SESSION['PiIP']."'/>";
									echo "<input type='text' name='RASBERRY_ID' value='".$_SESSION['PiID']."'/>";
									
									// RASBERRY PI SERVICES 
									echo "<h2> RASBERRY PI SERVICES </h2>";
									echo "<h3> SSH SERVER: ".$_SESSION['PiSSH']."</h3>";
									echo "<h3> MYSQL SERVER: ".$_SESSION['PiSQL']."</h3>";
									echo "<h3> APACHE SERVER: ".$_SESSION['PiWWW']."</h3>";
									echo "<h3> RPi SERVICE: ".$_SESSION['PiRPi']."</h3>";
									
									echo "<h3> Version: </h3>";
									
									// RASBERRY CONTROL
								}else {
										?>
											<h2> PLEASE SELECT A RASBERRY FROM THE LIST </h2>
											<p> Raspberry Pi control panel: </p>											
										<?php											
								}
							?>
							</form>
						</div>						
					</form>
				</p>
			</div>
		</div>
	</body>
</html> 