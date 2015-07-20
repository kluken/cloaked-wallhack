<?php
function sqlLookup($dataName)
{
	if (strcmp($dataName, "DC Bus Amp Hours") == 0)
	{
		return "SELECT `DC Bus AmpHours` FROM `Odometer and Bus AmpHours Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "SELECT `Slip Speed` FROM `Slip Speed Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "SELECT `Vehicle Velocity` FROM `Velocity Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "SELECT `Motor Velocity` FROM `Velocity Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "SELECT `Bus Current` FROM `Bus Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "SELECT `Bus Voltage` FROM `Bus Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "SELECT `Phase B Current` FROM `Phase Current Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "SELECT `Phase C Current` FROM `Phase Current Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "SELECT `I d` FROM `Motor Current Vector Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "SELECT `I q` FROM `Motor Current Vector Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "SELECT `V d` FROM `Motor Voltage Vector Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "SELECT `V q` FROM `Motor Voltage Vector Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "SELECT `BEMF d` FROM `Motor BackEMF Measurement / Prediction` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "SELECT `BEMF q` FROM `Motor BackEMF Measurement / Prediction` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "SELECT `IPM Heatsink Temp` FROM `IPM Heatsink and Motor Temperature Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "SELECT `Motor Temp` FROM `IPM Heatsink and Motor Temperature Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "SELECT `DSP Board Temp` FROM `IPM DSP Board Temperature Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "SELECT `15V Supply` FROM `15V Voltage Rail Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "SELECT `3.3V Supply` FROM `3.3V and 1.9V Voltage Rail Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "SELECT `1.9V Supply` FROM `3.3V and 1.9V Voltage Rail Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "SELECT `Receive Error` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "SELECT `Transmit Error` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "SELECT `Odometer` FROM `Odometer and Bus AmpHours Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "SELECT `Motor Tritium ID` FROM `Identification Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "SELECT `Motor Serial Number` FROM `Identification Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "SELECT `Desaturation Fault` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "SELECT `15V Rail Under Voltage` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "SELECT `Config Read Error` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "SELECT `Watchdog Caused Last Reset` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "SELECT `Bad Motor Position Hall Sequence` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "SELECT `DC Bus Over Voltage` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "SELECT `Software Over Current` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "SELECT `Hardware Over Current` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "SELECT `Output Voltage PWM` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "SELECT `Motor Current` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "SELECT `Velocity` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "SELECT `Bus Current` FROM `Bus Measurement` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "SELECT `Bus Voltage Upper Limit` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "SELECT `Bus Voltage Lower Limit` FROM `Status Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "SELECT `IPM Temp or Motor Temp` FROM `Status Information` ORDER BY id DESC LIMIT 1";
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
		return "DC Bus AmpHours";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "Slip Speed";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "Vehicle Velocity";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "Motor Velocity";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "Bus Current";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "Bus Voltage";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "Phase B Current";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "Phase C Current";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "I d";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "I q";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "V d";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "V q";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "BEMF d";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "BEMF q";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "IPM Heatsink Temp";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "Motor Temp";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "DSP Board Temp";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "15V Supply";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "3.3V Supply";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "1.9V Supply";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "Receive Error";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "Transmit Error";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "Odometer";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "Motor Tritium ID";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "Motor Serial Number";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "Desaturation Fault";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "15V Rail Under Voltage";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "Config Read Error";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "Watchdog Caused Last Reset";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "Bad Motor Position Hall Sequence";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "DC Bus Over Voltage";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "Software Over Current";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "Hardware Over Current";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "Output Voltage PWM";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "Motor Current";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "Velocity";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "Bus Current";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "Bus Voltage Upper Limit";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "Bus Voltage Lower Limit";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "IPM Temp or Motor Temp";
	}
	
	else
	{
		return "";
	}
}
?>