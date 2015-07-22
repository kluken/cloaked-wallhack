<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>UWS Solar Car Project - Home</title>
		<link rel="stylesheet" href="master.css" type="text/css" /> 
		<script src="amcharts.js" type="text/javascript"></script>
        <script src="serial.js" type="text/javascript"></script>
        <script src="dark.js" type="text/javascript"></script>
		
		<?php
			session_start();
			
			if (isset($_SESSION["hostname"]))
			{
				
			}
		?>
        <script>
           var chart;
           var chartData = [];

           AmCharts.ready(function () {
               // generate some random data first
               generateChartData();

               // SERIAL CHART
               chart = new AmCharts.AmSerialChart();

               chart.dataProvider = chartData;
               chart.categoryField = "date";

               // listen for "dataUpdated" event (fired when chart is inited) and call zoomChart method when it happens
               chart.addListener("dataUpdated", zoomChart);

               // AXES
               // category
               var categoryAxis = chart.categoryAxis;
               categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
               categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
               categoryAxis.minorGridEnabled = true;
               categoryAxis.axisColor = "#DADADA";
               categoryAxis.twoLineMode = true;
               categoryAxis.dateFormats = [{
                    period: 'fff',
                    format: 'JJ:NN:SS'
                }, {
                    period: 'ss',
                    format: 'JJ:NN:SS'
                }, {
                    period: 'mm',
                    format: 'JJ:NN'
                }, {
                    period: 'hh',
                    format: 'JJ:NN'
                }, {
                    period: 'DD',
                    format: 'DD'
                }, {
                    period: 'WW',
                    format: 'DD'
                }, {
                    period: 'MM',
                    format: 'MMM'
                }, {
                    period: 'YYYY',
                    format: 'YYYY'
                }];

               // first value axis (on the left)
               var valueAxis1 = new AmCharts.ValueAxis();
               valueAxis1.axisColor = "#FF6600";
               valueAxis1.axisThickness = 2;
               valueAxis1.gridAlpha = 0;
               chart.addValueAxis(valueAxis1);

               // second value axis (on the right)
               var valueAxis2 = new AmCharts.ValueAxis();
               valueAxis2.position = "right"; // this line makes the axis to appear on the right
               valueAxis2.axisColor = "#FCD202";
               valueAxis2.gridAlpha = 0;
               valueAxis2.axisThickness = 2;
               chart.addValueAxis(valueAxis2);

               // third value axis (on the left, detached)
               valueAxis3 = new AmCharts.ValueAxis();
               valueAxis3.offset = 50; // this line makes the axis to appear detached from plot area
               valueAxis3.gridAlpha = 0;
               valueAxis3.axisColor = "#B0DE09";
               valueAxis3.axisThickness = 2;
               chart.addValueAxis(valueAxis3);

               // GRAPHS
               // first graph
               var graph1 = new AmCharts.AmGraph();
               graph1.valueAxis = valueAxis1; // we have to indicate which value axis should be used
               graph1.title = "red line";
               graph1.valueField = "visits";
               graph1.bullet = "round";
               graph1.hideBulletsCount = 30;
               graph1.bulletBorderThickness = 1;
               chart.addGraph(graph1);

               // second graph
               var graph2 = new AmCharts.AmGraph();
               graph2.valueAxis = valueAxis2; // we have to indicate which value axis should be used
               graph2.title = "yellow line";
               graph2.valueField = "hits";
               graph2.bullet = "square";
               graph2.hideBulletsCount = 30;
               graph2.bulletBorderThickness = 1;
               chart.addGraph(graph2);

               // third graph
               var graph3 = new AmCharts.AmGraph();
               graph3.valueAxis = valueAxis3; // we have to indicate which value axis should be used
               graph3.valueField = "views";
               graph3.title = "green line";
               graph3.bullet = "triangleUp";
               graph3.hideBulletsCount = 30;
               graph3.bulletBorderThickness = 1;
               chart.addGraph(graph3);

               // CURSOR
               var chartCursor = new AmCharts.ChartCursor();
               chartCursor.cursorAlpha = 0.1;
               chartCursor.fullWidth = true;
               chart.addChartCursor(chartCursor);

               // SCROLLBAR
               var chartScrollbar = new AmCharts.ChartScrollbar();
               chart.addChartScrollbar(chartScrollbar);

               // LEGEND
               var legend = new AmCharts.AmLegend();
               legend.marginLeft = 110;
               legend.useGraphSettings = true;
               chart.addLegend(legend);

               // WRITE
               chart.write("chartdiv");
           });

           // generate some random data, quite different range
           function generateChartData() {
               var firstDate = new Date();
               firstDate.setDate(firstDate.getDate() - 50);

               for (var i = 0; i < 50; i++) {
                   // we create date objects here. In your data, you can have date strings
                   // and then set format of your dates using chart.dataDateFormat property,
                   // however when possible, use date objects, as this will speed up chart rendering.
                   var newDate = new Date(firstDate);
                   newDate.setDate(newDate.getDate() + i);

                   var visits = Math.round(Math.random() * 40) + 100;
                   var hits = Math.round(Math.random() * 80) + 500;
                   var views = Math.round(Math.random() * 6000);

                   chartData.push({
                       date: newDate,
                       visits: visits,
                       hits: hits,
                       views: views
                   });
               }
           }

           // this method is called when chart is first inited as we listen for "dataUpdated" event
           function zoomChart() {
               // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
               chart.zoomToIndexes(10, 20);
           }
        </script>
		
	</head>
	<body>
	<div id="headerbar">
				<h1>UWS Solar Car Project - Home</h1>
				<p>
					Menu Options: <a href="home.php">Home</a> <a href="electrical.php">Electrical</a> <a href="battery.php">Battery</a> <a href="motors.php">Motors</a> <a href="it.php">IT Admin</a>
				</p>
			</div>
			<?php 
			if (isset($_POST["resetServerDetails"]))
			{
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
				}?>
			<div id="chartdiv" style="width: 100%; height: 400px;"></div> 
				
				<form method = "post" action = "home.php" id = "pageReset" >
					<input type="hidden" id="resetServerDetails" name="resetServerDetails" value="resetServerDetails"/>
					<input type = "submit" value="Reset Server Details" />
				</form>
			</div>
			<?php } ?>
			
		
	</div>
	</body>
</html> 