<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Home</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script src="amcharts.js" type="text/javascript"></script>
        <script src="serial.js" type="text/javascript"></script>
        <script src="dark.js" type="text/javascript"></script>
		<script src="dataloader.min.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			function refreshTable() 
			{
				//if ($('#refreshGraphPage').val() == 1)
				if (document.getElementById("refreshGraphPage").value == 1)
					$('#content').load( "graphs.php #content");
			}
			setInterval(refreshTable, 1000);
			
			/*function refreshGraph() 
			{
				//if ($('#refreshGraphPage').val() == 1)
								if (document.getElementById("refreshGraphPage").value == 1)

				{
					chart.dataLoader.url = "graphDataPowerVVelocity.php";
					chart.dataLoader.loadData();
				}
			}
			setInterval(refreshGraph, 1000);*/
			
			function playPause()
			{
				if (document.getElementById("refreshGraphPage").value == 1)
				{
					document.getElementById("playPauseGraph").value = "Play";
					document.getElementById("refreshGraphPage").value = 0;
				}
				else
				{
					document.getElementById("playPauseGraph").value = "Pause";
					document.getElementById("refreshGraphPage").value = 1;
				}
			};
			
			function test()
				{
					var dateTimeFromString = document.getElementById("yeardropdownfrom").value + "-" + document.getElementById("monthdropdownfrom").value + "-" + document.getElementById("daydropdownfrom").value + " " + document.getElementById("hourdropdownfrom").value + ":" + document.getElementById("minutedropdownfrom").value + ":" + document.getElementById("seconddropdownfrom").value;
					var dateTimeToString = document.getElementById("yeardropdownto").value + "-" + document.getElementById("monthdropdownto").value + "-" + document.getElementById("daydropdownto").value + " " + document.getElementById("hourdropdownto").value + ":" + document.getElementById("minutedropdownto").value + ":" + document.getElementById("seconddropdownto").value;
					document.getElementById("dateTimeFrom").value = dateTimeFromString;
					document.getElementById("dateTimeTo").value = dateTimeToString;
					alert(document.getElementById("dateTimeTo").value);
					document.getElementById("graphPage").submit();
				};
			
		</script>
		
		<?php
			session_start();
			
			if (isset($_POST["resetServerDetails"]))
			{
				unset($_SESSION["hostname"]);
				unset($_SESSION["dbname"]);
				unset($_SESSION["port"]);
				unset($_SESSION["username"]);
				unset($_SESSION["password"]);
				header("location: home.php");
			}
			
			if (isset($_POST["dateTimeTo"]))
			{
				$_SESSION["dateTo"] = $_POST["dateTimeTo"];
				$_SESSION["dateFrom"] = $_POST["dateTimeFrom"];
			}
		?>

        <script type="text/javascript">
			
			var chartData;
			

		
			var chart = AmCharts.makeChart( "PowerVVelocity", {
			"type": "serial",
			"mouseWheelScrollEnabled": true,
			"startEffect": "easeOutSine",
			"dataLoader": {
			  "url": "graphDataPowerVVelocity.php"
			},
			"categoryField": "category",
			"dataDateFormat": "YYYY-MM-DD HH:NN:SS",
			"startDuration": 0,
			"categoryAxis": {
			  "parseDates": true,
			  "minorGridEnabled": true,
			  "twoLineMode": true,
			   "minPeriod": "ss"
			},
			"graphs": [ {
			  "valueField": "Power Draw",
			  "bullet": "round",
			  "bulletBorderColor": "#000000",
			  "bulletBorderThickness": 2,
			  "lineThickness ": 2,
			  "lineAlpha": 1,
			  "title": "Power Draw"

			}, {
			  "valueField": "Vehicle Velocity",
			  "bullet": "square",
			  "bulletBorderColor": "#000000",
			  "bulletBorderThickness": 2,
			  "lineThickness ": 2,
			  "lineAlpha": 1,
			  "title": "Vehicle Velocity"
			} ]
		  }

			  );
			  
			   // CURSOR
               var chartCursor = new AmCharts.ChartCursor();
               chartCursor.cursorAlpha = 0.1;
               chartCursor.fullWidth = true;
               chart.addChartCursor(chartCursor);

               // SCROLLBAR
               var chartScrollbar = new AmCharts.ChartScrollbar();
               chart.addChartScrollbar(chartScrollbar);
			  
			  var legend = new AmCharts.AmLegend();
               legend.marginLeft = 110;
               legend.useGraphSettings = true;
               chart.addLegend(legend);		 

			var monthtext=['01','02','03','04','05','06','07','08','09','10','11','12'];
			var secondtext = ['01','02','03','04','05','06','07','08','09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60',];
			var hourtext = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'];

			function populatedropdown(versionId, secondfields, minutefields, hourfields, dayfields, monthfields, yearfields)
			{
				if (versionId == 1)
				{
					var today=new Date()
					var dayfield=document.getElementById(dayfields)
					var monthfield=document.getElementById(monthfields)
					var yearfield=document.getElementById(yearfields)
					var secondfield=document.getElementById(secondfields)
					var minutefield=document.getElementById(minutefields)
					var hourfield=document.getElementById(hourfields)
					
					for (var i=0; i<60; i++)
						minutefield.options[i]=new Option(secondtext[i], secondtext[i])
					
					for (var i=0; i<60; i++)
						secondfield.options[i]=new Option(secondtext[i], secondtext[i])
					
					for (var i=0; i<24; i++)
						hourfield.options[i]=new Option(hourtext[i], hourtext[i])

					for (var i=0; i<31; i++)
						dayfield.options[i]=new Option(i, i+1)
					dayfield.options[today.getDate()] =new Option(today.getDate(), today.getDate(), true, true) //select today's day
					
					for (var m=0; m<12; m++)
						monthfield.options[m]=new Option(monthtext[m], monthtext[m])
					monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month
					
					var thisyear=today.getFullYear()
					for (var y=0; y<20; y++)
					{
						yearfield.options[y]=new Option(thisyear, thisyear)
						thisyear+=1
					}
					yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
				}
				else
				{
					var today=new Date()
					var dayfield=document.getElementById(dayfields)
					var monthfield=document.getElementById(monthfields)
					var yearfield=document.getElementById(yearfields)
					var secondfield=document.getElementById(secondfields)
					var minutefield=document.getElementById(minutefields)
					var hourfield=document.getElementById(hourfields)
					
					for (var i=0; i<60; i++)
						secondfield.options[i]=new Option(secondtext[i], secondtext[i])
					secondfield.options[today.getSeconds()] =new Option(today.getSeconds(), today.getSeconds(), true, true) //select the second
					
					for (var i=0; i<60; i++)
						minutefield.options[i]=new Option(secondtext[i], secondtext[i])
					minutefield.options[today.getMinutes()] =new Option(today.getMinutes(), today.getMinutes(), true, true) //select the minute
					
					for (var i=0; i<24; i++)
						hourfield.options[i]=new Option(hourtext[i], hourtext[i])
					hourfield.options[today.getHours()] =new Option(today.getHours(), today.getHours(), true, true) //select select the hour

					for (var i=0; i<31; i++)
						dayfield.options[i]=new Option(i, i+1)
					dayfield.options[today.getDate()] =new Option(today.getDate(), today.getDate(), true, true) //select today's day
					
					for (var m=0; m<12; m++)
						monthfield.options[m]=new Option(monthtext[m], monthtext[m])
					monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month
					
					var thisyear=today.getFullYear()
					for (var y=0; y<20; y++)
					{
						yearfield.options[y]=new Option(thisyear, thisyear)
						thisyear+=1
					}
					yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
				};
				
				
				
			}
   

        </script> 
		
	</head>
	<body>
		<div id="container">
			<?php require_once("headerBar.php"); ?>
			<div id = "content">
				<form method = "post" action = "graphs.php" id="graphPage" name = "graphPage">
					<input type = "hidden" id = "refreshGraphPage" name = "refreshGraphPage" value = "1"/>
					<input type = "hidden" id = "dateTimeFrom" name = "dateTimeFrom"/>
					<input type = "hidden" id = "dateTimeTo" name = "dateTimeTo"/>
					<!--<input type="button" value="Pause" onclick="playPause()" id = "playPauseGraph" name = "playPauseGraph"/>-->
					From:
					<select id="daydropdownfrom"></select> 
					<select id="monthdropdownfrom"></select> 
					<select id="yeardropdownfrom"></select> 
					<select id="hourdropdownfrom"></select> 
					<select id="minutedropdownfrom"></select> 
					<select id="seconddropdownfrom"></select> <br/>
					To:
					<select id="daydropdownto"></select> 
					<select id="monthdropdownto"></select> 
					<select id="yeardropdownto"></select> 
					<select id="hourdropdownto"></select> 
					<select id="minutedropdownto"></select> 
					<select id="seconddropdownto"></select> <br/> <br/>
					
					<script type="text/javascript">
						window.onload=function()
						{
							populatedropdown("1", "seconddropdownfrom", "minutedropdownfrom", "hourdropdownfrom", "daydropdownfrom", "monthdropdownfrom", "yeardropdownfrom")
							populatedropdown("2", "seconddropdownto", "minutedropdownto", "hourdropdownto", "daydropdownto", "monthdropdownto", "yeardropdownto")
						}
					</script>
					<input type="button" value="Submit" onclick="test()" name="go" id="go" />
				</form>
				<div> <h4> Power and Velocity Over Time </h4></div>
				<div id="PowerVVelocity" style="width: 100%; height: 400px;"></div>
				<?php //require_once("graphDataPowerVVelocity.php"); ?>
			</div>
			
		</div>
	</body></html> 