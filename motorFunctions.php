<?php
function sqlLookup($dataName)
{
	if (strcmp($dataName, "DC Bus Amp Hours") == 0)
	{
		return "SELECT `SOCA` FROM `Pack State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "SELECT `SOCP` FROM `Pack State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "SELECT `Balance SOCA` FROM `Pack Balance State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "SELECT `Balance SOCP` FROM `Pack Balance State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "SELECT `Charging Cell Voltage Error` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "SELECT `Cell Temperature Margin` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "SELECT `Discharging Cell Voltage Error` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "SELECT `Total Pack Capacity` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "SELECT `12V Contactor Supply Voltage Status` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "SELECT `Precharge State` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "SELECT `12V Contactor Supply Voltage` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "SELECT `Precharge Timer Elapsed` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "SELECT `Precharge Timer Counter` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "SELECT `Minimum Cell Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "SELECT `CMU with Minimum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "SELECT `Cell with Minimum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "SELECT `Maximum Cell Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "SELECT `CMU with Maximum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "SELECT `Cell with Maximum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "SELECT `Minimum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "SELECT `CMU with Minimum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "SELECT `Maximum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "SELECT `CMU with Maximum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "SELECT `Battery Voltage` FROM `Battery Pack Voltage / Current` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "SELECT `Battery Current` FROM `Battery Pack Voltage / Current` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "SELECT `Balance Voltage Threshold - Rising` FROM `Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "SELECT `Balance Voltage Threshold - Falling` FROM `Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "SELECT `Cell Under Voltage` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "SELECT `Cell Over Voltage` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "SELECT `Cell Over Temperature` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "SELECT `Measurement Untrusted` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "SELECT `CMU Communications Timeout` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "SELECT `BMU is in Setup Mode` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "SELECT `CMU CAN Bus Power Status` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "SELECT `Pack Isolation Test Failure` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "SELECT `SOC Measurement is not Valid` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "SELECT `CAN 12V Too Low` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "SELECT `Contactor is Stuck / Not Engaged` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "SELECT `CMU has detected an extra Cell` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "SELECT `BMS CMU Count` FROM `Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	
	else
	{
		return "";
	}
}


function dataNameLookup($dataName)
{
	if (strcmp($dataName, "DC Bus Amp Hours") == 0)
	{
		return "SOCA";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "SOCP";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "Balance SOCA";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "Balance SOCP";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "Charging Cell Voltage Error";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "Cell Temperature Margin";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "Discharging Cell Voltage Error";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "Total Pack Capacity";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "12V Contactor Supply Voltage Status";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "Precharge State";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "12V Contactor Supply Voltage";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "Precharge Timer Elapsed";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "Precharge Timer Counter";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "Minimum Cell Voltage";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "CMU with Minimum Voltage";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "Cell with Minimum Voltage";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "Maximum Cell Voltage";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "CMU with Maximum Voltage";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "Cell with Maximum Voltage";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "Minimum Cell Temperature";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "CMU with Minimum Cell Temperature";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "Maximum Cell Temperature";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "CMU with Maximum Cell Temperature";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "Battery Voltage";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "Battery Current";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "Balance Voltage Threshold - Rising";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "Balance Voltage Threshold - Falling";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "Cell Under Voltage";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "Cell Over Voltage";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "Cell Over Temperature";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "Measurement Untrusted";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "CMU Communications Timeout";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "BMU is in Setup Mode";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "CMU CAN Bus Power Status";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "Pack Isolation Test Failure";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "SOC Measurement is not Valid";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "CAN 12V Too Low";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "Contactor is Stuck / Not Engaged";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "CMU has detected an extra Cell";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "BMS CMU Count";
	}
	
	else
	{
		return "";
	}
}
?>