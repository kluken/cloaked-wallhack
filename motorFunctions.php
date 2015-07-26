<?php
function sqlLookup($dataName)
{
	if (strcmp($dataName, "DC Bus Amp Hours") == 0)
	{
		return "SELECT `DC_Bus_AmpHours` FROM `Odometer_and_Bus_AmpHours_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "SELECT `Slip_Speed` FROM `Slip_Speed_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "SELECT `Vehicle_Velocity` FROM `Velocity_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "SELECT `Motor_Velocity` FROM `Velocity_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "SELECT `Bus_Current` FROM `Bus_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "SELECT `Bus_Voltage` FROM `Bus_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "SELECT `Phase_B_Current` FROM `Phase_Current_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "SELECT `Phase_C_Current` FROM `Phase_Current_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "SELECT `I_d` FROM `Motor_Current_Vector_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "SELECT `I_q` FROM `Motor_Current_Vector_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "SELECT `V_d` FROM `Motor_Voltage_Vector_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "SELECT `V_q` FROM `Motor_Voltage_Vector_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "SELECT `BEMF_d` FROM `Motor_BackEMF_Measurement_/_Prediction` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "SELECT `BEMF_q` FROM `Motor_BackEMF_Measurement_/_Prediction` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "SELECT `IPM_Heatsink_Temp` FROM `IPM_Heatsink_and_Motor_Temperature_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "SELECT `Motor_Temp` FROM `IPM_Heatsink_and_Motor_Temperature_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "SELECT `DSP_Board_Temp` FROM `IPM_DSP_Board_Temperature_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "SELECT `15V_Supply` FROM `15V_Voltage_Rail_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "SELECT `3.3V_Supply` FROM `3.3V_and_1.9V_Voltage_Rail_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "SELECT `1.9V_Supply` FROM `3.3V_and_1.9V_Voltage_Rail_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "SELECT `Receive_Error` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "SELECT `Transmit_Error` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "SELECT `Odometer` FROM `Odometer_and_Bus_AmpHours_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "SELECT `Motor_Tritium_ID` FROM `Identification_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "SELECT `Motor_Serial_Number` FROM `Identification_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "SELECT `Desaturation_Fault` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "SELECT `15V_Rail_Under_Voltage` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "SELECT `Config_Read_Error` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "SELECT `Watchdog_Caused_Last_Reset` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "SELECT `Bad_Motor_Position_Hall_Sequence` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "SELECT `DC_Bus_Over_Voltage` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "SELECT `Software_Over_Current` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "SELECT `Hardware_Over_Current` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "SELECT `Output_Voltage_PWM` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "SELECT `Motor_Current` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "SELECT `Velocity` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "SELECT `Bus_Current` FROM `Bus_Measurement` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "SELECT `Bus_Voltage_Upper_Limit` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "SELECT `Bus_Voltage_Lower_Limit` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "SELECT `IPM_Temp_or_Motor_Temp` FROM `Status_Information` ORDER BY id DESC LIMIT 5";
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
		return "DC_Bus_AmpHours";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "Slip_Speed";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "Vehicle_Velocity";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "Motor_Velocity";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "Bus_Current";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "Bus_Voltage";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "Phase_B_Current";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "Phase_C_Current";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "I_d";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "I_q";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "V_d";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "V_q";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "BEMF_d";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "BEMF_q";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "IPM_Heatsink_Temp";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "Motor_Temp";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "DSP_Board_Temp";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "15V_Supply";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "3.3V_Supply";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "1.9V_Supply";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "Receive_Error";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "Transmit_Error";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "Odometer";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "Motor_Tritium_ID";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "Motor_Serial_Number";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "Desaturation_Fault";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "15V_Rail_Under_Voltage";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "Config_Read_Error";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "Watchdog_Caused_Last_Reset";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "Bad_Motor_Position_Hall_Sequence";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "DC_Bus_Over_Voltage";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "Software_Over_Current";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "Hardware_Over_Current";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "Output_Voltage_PWM";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "Motor_Current";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "Velocity";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "Bus_Current";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "Bus_Voltage_Upper_Limit";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "Bus_Voltage_Lower_Limit";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "IPM_Temp_or_Motor_Temp";
	}
	
	else
	{
		return "";
	}
}
?>