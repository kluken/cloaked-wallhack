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
				$('#content').load( "it.php #content");
			}
			setInterval(refreshTable, 3000);
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
					SHOW ME THE CONTENT <br/>
					<?php echo exec("test.exe"); ?>
				</p>
			</div>
		</div>
	</body>
</html> 