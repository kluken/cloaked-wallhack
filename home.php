<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Home</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		
		<?php
			session_start();
		?>
		
	</head>
	<body>
		<div id="container">
			<div id="headerbar">
				<h1>UWS Solar Car Project - Home</h1>
				<p>
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
			<?php 
			if (isset($_POST["resetServerDetails"]))
				{
					echo "here";
					unset($_SESSION["hostname"]);
					unset($_SESSION["dbname"]);
					unset($_SESSION["port"]);
					unset($_SESSION["username"]);
					unset($_SESSION["password"]);
					header("location: home.php");
				}
			else if (!isset($_POST["hostname"]) && !isset($_SESSION["hostname"])) 
			{ ?>
				<div id="content">
					<form method = "post" action = "home.php" id = "pageSetup" >
						<fieldset>
							<legend>Please enter the Data Server Details.</legend>
							<label for = "hostname">Please enter the Host Name: </label><input id = "hostname" name = "hostname" value = "127.0.0.1"/> <br/> <br/>
							<label for = "dbname">Please enter the Database Name: </label><input id = "dbname" name = "dbname" value = "solar"/> <br/> <br/>
							<label for = "port">Please enter the Port Number: </label><input id = "port" name = "port" value = "3306"/> <br/> <br/>
							<label for = "username">Please enter the User Name: </label><input id = "username" name = "username" value = "solar"/> <br/> <br/>
							<label for = "password">Please enter the Password: </label><input id = "password" name = "password" value = "solar"/> <br/> <br/>
							<input type = "submit" value="Submit" />
						 </fieldset>
					 </form>
				
				</div>
			<?php } 
			else
			{ ?>
				<div id="secondContent">
				<?php 
				if (isset($_POST["hostname"]))
				{
					$_SESSION["hostname"] = $_POST["hostname"];
					$_SESSION["dbname"] = $_POST["dbname"];
					$_SESSION["port"] = $_POST["port"];
					$_SESSION["username"] = $_POST["username"];
					$_SESSION["password"] = $_POST["password"];
				}
			
				?>
				<form method = "post" action = "home.php" id = "pageReset" >
					<input type="hidden" id="resetServerDetails" name="resetServerDetails" value="resetServerDetails"/>
					<input type = "submit" value="Reset Server Details" />
				</form>
			</div>
			<?php } ?>
		</div>
	</body>
</html> 