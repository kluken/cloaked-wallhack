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
			
			function refreshGraph() 
			{
				//if ($('#refreshGraphPage').val() == 1)
								if (document.getElementById("refreshGraphPage").value == 1)

				{
					chart.dataLoader.url = "graphDataPowerVVelocity.php";
					chart.dataLoader.loadData();
				}
			}
			setInterval(refreshGraph, 1000);
			
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
			}
			
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
			   
			   
				   

        </script> 
		
	</head>
	<body>
		<div id="container">
			<?php require_once("headerBar.php"); ?>
			<div id = "content">
				<form method = "post" action = "graphs.php" id="graphResetPage" name = "graphResetPage">
					<input type = "hidden" id = "refreshGraphPage" name = "refreshGraphPage" value = "1"/>
					<input type="button" value="Pause" onclick="playPause()" id = "playPauseGraph" name = "playPauseGraph"/>
				</form>
				<div> <h4> Power and Velocity Over Time </h4></div>
				<div id="PowerVVelocity" style="width: 100%; height: 400px;"></div>
			</div>
			
		</div>
	</body></html> 