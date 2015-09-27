<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
			$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
		}
	?>
	<head>
		<title>UWS Solar Car Project - Home</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		
		<script type="text/javascript">
		
			function findSpeed()
			{
				
				var speed = document.getElementById("avgSpeed").value;
				var dist = document.getElementById("distToTravel").value;
				var curTime = document.getElementById("curTime").value;
				var arrTime = document.getElementById("arrTime").value;
				if (testTime(arrTime) && !isNaN(dist) && testTime(curTime))
				{
					 				
					/*----Finding the difference in Times----*/
					
					var hourDiff = parseInt(String(arrTime).charAt(0) + String(arrTime).charAt(1)) - parseInt(String(curTime).charAt(0) + String(curTime).charAt(1));
					var minDiff = parseInt(String(arrTime).charAt(3) + String(arrTime).charAt(4)) - parseInt(String(curTime).charAt(3) + String(curTime).charAt(4));
					var hoursDiff = parseFloat(minDiff) / 60 + parseInt(hourDiff);
					 
					/*----Finding KM/Hour Req ----*/
					
					var reqSpeed = parseFloat(dist) / parseFloat(hoursDiff);
					document.getElementById("avgSpeed").value = reqSpeed;
				}
			}
			
			function findDistance()
			{
				
				var speed = document.getElementById("avgSpeed").value;
				var dist = document.getElementById("distToTravel").value;
				var curTime = document.getElementById("curTime").value;
				var arrTime = document.getElementById("arrTime").value;
				if (testTime(arrTime) && !isNaN(speed) && testTime(curTime))
				{
					 				
					/*----Finding the difference in Times----*/
					
					var hourDiff = parseInt(String(arrTime).charAt(0) + String(arrTime).charAt(1)) - parseInt(String(curTime).charAt(0) + String(curTime).charAt(1));
					var minDiff = parseInt(String(arrTime).charAt(3) + String(arrTime).charAt(4)) - parseInt(String(curTime).charAt(3) + String(curTime).charAt(4));
					var hoursDiff = parseFloat(minDiff) / 60 + parseInt(hourDiff);
					 
					/*----Finding KM/Hour Req ----*/
					
					var reqSpeed = parseFloat(dist) / parseFloat(hoursDiff);
					document.getElementById("avgSpeed").value = reqSpeed;
				}
			}
						
			function findArrivalTime()
			{
				var speed = document.getElementById("avgSpeed").value;
				var dist = document.getElementById("distToTravel").value;
				var curTime = document.getElementById("curTime").value;
				var arrTime = document.getElementById("arrTime").value;
				if (!isNaN(speed) && !isNaN(dist) && testTime(curTime))
				{
					/*----Black Magic. Wizardry. Sorcery. Finding the hours left and changing to minutes----*/
					
					var hoursRemain = dist / speed; //Find the amount of hours remaining
					hoursRemain = getTimeRemaining(hoursRemain); //Convert to minutes remaining

					var hoursRemainPlusFive = dist / (speed + 5); //Find the amount of hours remaining
					hoursRemainPlusFive = getTimeRemaining(hoursRemainPlusFive); //Convert to minutes remaining
					
					var hoursRemainPlusTen = dist / (speed + 10); //Find the amount of hours remaining
					hoursRemainPlusTen = getTimeRemaining(hoursRemainPlusTen); //Convert to minutes remaining
					
					/*----Hours maths----*/
					
					var increaseHours = parseInt(hoursRemain) / 60; //Integer division to find the amount of whole hours to go
					var tempHours = String(curTime).charAt(0) + String(curTime).charAt(1); //Get current amount of hours
					tempHours = parseInt(tempHours) + parseInt(increaseHours); //Increase current by the hours to go
					
					var increaseHoursPlusFive = parseInt(hoursRemainPlusFive) / 60; //Integer division to find the amount of whole hours to go
					var tempHoursPlusFive = String(curTime).charAt(0) + String(curTime).charAt(1); //Get current amount of hours
					tempHoursPlusFive = parseInt(tempHoursPlusFive) + parseInt(increaseHoursPlusFive); //Increase current by the hours to go
					
					var increaseHoursPlusTen = parseInt(hoursRemainPlusTen) / 60; //Integer division to find the amount of whole hours to go
					var tempHoursPlusTen = String(curTime).charAt(0) + String(curTime).charAt(1); //Get current amount of hours
					tempHoursPlusTen = parseInt(tempHoursPlusTen) + parseInt(increaseHoursPlusTen); //Increase current by the hours to go
					
					/*----Minutes maths----*/
					
					var increaseMinutes = parseInt(hoursRemain) % 60; //Modulus to find the minutes remaining
					var tempMinutes = String(curTime).charAt(3) + String(curTime).charAt(4); //Get the Current amount of minutes
					tempMinutes = parseInt(tempMinutes) + parseInt(increaseMinutes); //Increase current by the minutes to go
					
					var increaseMinutesPlusFive = parseInt(hoursRemainPlusFive) % 60; //Modulus to find the minutes remaining
					var tempMinutesPlusFive = String(curTime).charAt(3) + String(curTime).charAt(4); //Get the Current amount of minutes
					tempMinutesPlusFive = parseInt(tempMinutesPlusFive) + parseInt(increaseMinutesPlusFive); //Increase current by the minutes to go
					
					var increaseMinutesPlusTen = parseInt(hoursRemainPlusTen) % 60; //Modulus to find the minutes remaining
					var tempMinutesPlusTen = String(curTime).charAt(3) + String(curTime).charAt(4); //Get the Current amount of minutes
					tempMinutesPlusTen = parseInt(tempMinutesPlusTen) + parseInt(increaseMinutesPlusTen); //Increase current by the minutes to go
					
					/*----Putting it together. Create String with new Time and apply----*/
					
					var arriveTime = tempHours + ":" + tempMinutes; //Create new time string
					document.getElementById("arrTime").value = arriveTime; //Apply new time String to the arrival time.
					
					arriveTime = tempHoursPlusFive + ":" + tempMinutesPlusFive; //Create new time string
					document.getElementById("arrTimePlusFive").value = arriveTime; //Apply new time String to the arrival time.
					
					arriveTime = tempHoursPlusTen + ":" + tempMinutesPlusTen; //Create new time string
					document.getElementById("arrTimePlusTen").value = arriveTime; //Apply new time String to the arrival time.
				}
			}
			
			//Uses the system time to generate the 24 hour time. Inputs in the text box provided by HTML
			function getCurTime()
			{
				var date = new Date(); //New Date Object
				var hours = date.getHours(); //Store hours from date object
				var mins = date.getMinutes(); //Store minutes from Date Object
				var time = String(hours) + ":"; //Start creation of string. 
				if (String(mins).length == 1)
					time = time + "0" + String(mins); //Finish Creation of String
				else
					time = time + String(mins)
				document.getElementById("curTime").value = time; //Store time in text box provided by HTML
			}
			
			//Tests the time provided to ensure it is in the expected format
			function testTime(time)
			{
				var result = true;
				if (time.length != 5) //Test for length. 2 char for hours, 1 for colon and 2 for minutes.
					result = false;
				if (isNaN(time.charAt(0)) && isNaN(time.charAt(1)) && isNaN(time.charAt(3)) && isNaN(time.charAt(4))) //Ensure the hours and minutes chars are numbers
					result = false;
				if (time.charAt(2) != ":") //Ensure the colon is a colon
					result = false;
				return result; //Return result
			}
			
			//Change hours to minutes
			function getTimeRemaining(time)
			{
				return time * 60; //Pretty simple. Hours come in, minutes go out.
			}
			
			//Find amount of Power Used
			function findPowerUsed(time)
			{
				
				return power;
			}
			
			//Find amount of Power stored
			function findPowerStored(time)
			{
				var powerInMeasure = document.getElementById("powerInMeasure").value;
				if (!isNaN(powerInMeasure))
				{
					
				}
				return power;
			}
			
			function timeToDecimal(time)
			{
				var decimal;
				var hours;
				var minutes;
				if (time.length == 4)
				{
					hours = String(time.charAt(0)) + String(time.charAt(1));
					minutes = String(time.charAt(4)) + String(time.charAt(5));
				}
				else if (time.length == 3)
				{
					hours = String(time.charAt(0));
					minutes = String(time.charAt(3)) + String(time.charAt(4));
				}
				decimal = parseInt(hours) * 60 + parseInt(minutes);
				return decimal;
			}
			
			function decimalToTime(decimal)
			{
				var hours = ;
				var minutes = ;
				var time = String(hours) + ":" + String(minutes);
			}
		</script>
		
		
		
	</head>
	<body onLoad = "getCurTime();">
		<?php require_once("headerBar.php") ?>
		<div id="content">
			<form method = "post" action = "strategy.php" id = "form" >
				<p>
				<table border = "0px">
					<tr>
						<th>
							<label for = "avgSpeed"> Average Speed: </label>
						</th>
						<th>
							<input type="input" id = "avgSpeed" name = "avgSpeed" />
						</th>
						<th>
							<input type = "button" onClick="findSpeed()" value = "Get Average Speed" />
						</th>
						<th>
							<label for = "plusFiveLabel"> + 5Km/Hr: </label>
						</th>
						<th>
							<label for = "plusTenLabel"> + 10Km/Hr: </label>
						</th>
					</tr>
					<tr>
						<th>
							<label for = "distToTravel"> Distance to Travel: </label>
						</th>
						<th>
							<input type="input" id = "distToTravel" name = "distToTravel" />
						</th>
						<th>
							<input type = "button" onClick="findDistance()" value = "Get Distance" />
						</th>
						<th></th>
						<th></th>
					</tr>
					<tr>
						<th>
							<label for = "curTime"> Current Time: </label>
						</th>
						<th>
							<input type="input" id = "curTime" name = "curTime" />
						</th>
						<th>
							<input type = "button" onClick="getCurTime()" value = "Get Current Time" />
						</th>
						<th></th>
						<th></th>
					</tr>
					<tr>
						<th>
							<label for = "arrTime"> Arrival Time: </label>
						</th>
						<th>
							<input type="input" id = "arrTime" name = "arrTime" />
						</th>
						<th>
							<input type = "button" onClick="findArrivalTime()" value = "Get Arrival Time" />
						</th>
						<th>
							<input type="input" id = "arrTimePlusFive" name = "arrTimePlusFive" disabled/>
						</th>
						<th>
							<input type="input" id = "arrTimePlusTen" name = "arrTimePlusTen" disabled/>
						</th>
					</tr>
					<tr>
						<th>
							<label for = "powerIn"> Power In: </label>
						</th>
						<th>
							<input type="input" id = "powerIn" name = "powerIn" disabled/>
						</th>
						<td>
							<label for = "powerInMeasure"> Approx (WHr/Hour): </label> <input type="input" id = "powerInMeasure" name = "powerInMeasure" value = "1000"/>
						</td>
						<th>
							<input type="input" id = "powerInPlusFive" name = "powerInPlusFive" disabled/>
						</th>
						<th>
							<input type="input" id = "powerInPlusTen" name = "powerInPlusTen" disabled/>
						</th>
					</tr>
					<tr>
						<th>
							<label for = "Power Out"> Power Out: </label>
						</th>
						<th>
							<input type="input" id = "powerUsed" name = "arrTime" disabled/>
						</th>
						<th>
						</th>
						<th>
							<input type="input" id = "powerUsedPlusFive" name = "powerUsedPlusFive" disabled/>
						</th>
						<th>
							<input type="input" id = "powerUsedPlusTen" name = "powerUsedPlusTen" disabled/>
						</th>
					</tr>
					<tr>
						<th>
							<label for = "netPower"> Net Power: </label>
						</th>
						<th>
							<input type="input" id = "netPower" name = "netPower" disabled/>
						</th>
						<th>
						</th>
						<th>
							<input type="input" id = "netPowerPlusFive" name = "netPowerPlusFive" disabled/>
						</th>
						<th>
							<input type="input" id = "netPowerPlusTen" name = "netPowerPlusTen" disabled/>
						</th>
					</tr>
				</table>

				</p>
			</form>
		</div>
	</body>

</html> 