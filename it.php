<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - IT Admin</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script src="jquery-2.1.4.min.js"></script>
		<script>
			/*function refreshTable() 
			{
				$('#content').load( "it.php #content");
			}
			setInterval(refreshTable, 3000);*/
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
			
			
			if (isset($_POST["submit"]))
			{
				if ($_POST["function"] == "killCar")
					exec("./bin/killcar");
				else
					exec ("./bin/buzzcar");
			}
			
			?>
	</head>
	<body>
		<div id="container">
			<?php require_once("headerBar.php"); ?>
			<div id="content">
				<p> 
					<form action = "it.php" method = "post" id = "admin" name = "admin" >
						<input type="radio" id="function[]" name = "function[]" value="killCar"> Kill Car </input> <br/>
						<input type="radio" id="function[]" name = "function[]" value = "buzzDriver"> Buzz Driver </input> <br/>
						<input type = "submit" value = "GO!"/>
					</form>
					
				</p>
			</div>
		</div>
	</body>
</html> 