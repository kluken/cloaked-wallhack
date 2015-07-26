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
		
		// SQL For the rasberry pies
		// SQL DB: MAIN : SQL TABLE: 'RPi'
		// FORMAT: PI NAME, PI IP ADDRESS, PI PING , PI LAST SEEN, SERVICES (SSH/PHP/DBM)
		
		//...Check if we have host name
		if (!isset($_SESSION["hostname"]))
				header("location: home.php");
			else 
			{
				//Set SQL Database Settings
				$servername = "192.168.1.3";//$_SESSION["hostname"];
				$username = $_SESSION["username"];
				$password = $_SESSION["password"];
				$dbname = "main";
				$port = $_SESSION["port"];
			}
			
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		//...POST FROM a form
		if (  isset($_POST["RPiControlPannel"]) ) {
			//...Control Pannel was executed : 
			
		}else if (  isset($_POST["PiSelectPannel"]) ) {
			//...Rasberry Pi selected : 
			if ( isset ( $_POST['Submit'] ) && isset ( $_POST['PiSelectedIP'] )) {
					//...We have a rasberry selected;
					$_SESSION['PiControl']="ACTIVE";
					
			}else if ( isset ( $_POST['Reset'] ) ) {
					unset ( $_SESSION['PiControl'] );
			}
			
		}		
			
			?> 
	</head>
	<body>
		<div id="container">
			<?php require_once("headerBar.php"); ?>
			<div id="content">
				<p> 
					<form id="PiSelectPannel" method="POST">
						<div id="PiSelect">						
						<table style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>IP</th>
                                    <th>MAC</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                
							<?php 

								$sql = "SELECT * FROM pi";
								$result = mysqli_query ( $conn , $sql );
								//$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row									
									while($row = $result->fetch_assoc()) {
										echo "<tr><td> ". $row["id"]. " </td><td>" . $row["name"]. " </td><td>" . $row["ip"]. "</td><td>" . $row["mac"]. "</td><tr>";
									}									
								} else {
									echo "0 results";
								}
								//$conn->close();
								mysqli_close ( $conn );
							?>
                            </tbody>
						</table>	
						<input type="submit" value="Submit">
						<input type="submit" value="Reset">
						</div>						
					</form>
					<div id="PiControl">
						<form id="RPiControlPannel" method="POST">
						<?php 
							//....DISPLAY RASBERRY PI :
							if ( isset ( $_POST['PiControl'] ) || isset( $_SESSION['PiControl'] ) ) {
								//...Execute sessions:
								// Check Services
								$RPiDir = "/home/pi/RPi";
								$_SESSION['PiSSH'] = shell_exec ( "$RPiDir/./pisc.sh ssh" );
								$_SESSION['PiSQL'] = shell_exec ( "$RPiDir/./pisc.sh mysql" );
								$_SESSION['PiWWW'] = shell_exec ( "$RPiDir/./pisc.sh apache2" );
								$_SESSION['PiRPi'] = shell_exec ( "$RPiDir/./pisc.sh RPi-SERVICE" );
								
								//...Pi Control is set
								?>
										<h2> Raspberry Pi control panel:</h2>										
								<?php
								echo "<input type='text' name='RASBERRY_NAME' value='".$_SESSION['PiName']."'/>";
								echo "<input type='text' name='RASBERRY_IP' value='".$_SESSION['PiIP']."'/>";
								echo "<input type='text' name='RASBERRY_ID' value='".$_SESSION['PiID']."'/>";
								
								// RASBERRY PI SERVICES 
								echo "<h2> RASBERRY PI SERVICES </h2>";
								echo "<h3> SSH SERVER: ".$_SESSION['PiSSH']."</h3><br>";
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
					
				</p>
			</div>
		</div>
	</body>
	<?php 	
		//Close the connection
		mysqli_close ( $conn ); 
	?>
</html> 