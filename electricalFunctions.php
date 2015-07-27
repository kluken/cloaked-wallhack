<?php
function sqlLookup($dataName)
{
	if (strcmp($dataName, "Pack State of Charge (Ah)") == 0)
	{
		return "SELECT `SOCA` FROM `Pack_State_of_Charge` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Pack State of Charge (%)") == 0)
	{
		return "SELECT `SOCP` FROM `Pack_State_of_Charge` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Balance State of Charge (Ah)") == 0)
	{
		return "SELECT `Balance_SOCA` FROM `Pack_Balance_State_of_Charge` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Balance State of Charge (%)") == 0)
	{
		return "SELECT `Balance_SOCP` FROM `Pack_Balance_State_of_Charge` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Charging Cell Voltage Error (mV)") == 0)
	{
		return "SELECT `Charging_Cell_Voltage_Error` FROM `Charger_Control_Information` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cell Temp Margin") == 0)
	{
		return "SELECT `Cell_Temperature_Margin` FROM `Charger_Control_Information` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Discharging Cell Voltage Error (mV)") == 0)
	{
		return "SELECT `Discharging_Cell_Voltage_Error` FROM `Charger_Control_Information` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Total Pack Capacity (Ah)") == 0)
	{
		return "SELECT `Total_Pack_Capacity` FROM `Charger_Control_Information` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge / Driver 12V Status") == 0)
	{
		return "SELECT `12V_Contactor_Supply_Voltage` FROM `Precharge_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge Status") == 0)
	{
		return "SELECT `Precharge_State` FROM `Precharge_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "12V Contactor Supply") == 0)
	{
		return "SELECT `12V_Contactor_Supply_Voltage` FROM `Precharge_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge Timer Elapsed") == 0)
	{
		return "SELECT `Precharge_Timer_Elapsed` FROM `Precharge_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge Timer") == 0)
	{
		return "SELECT `Precharge_Timer_Counter` FROM `Precharge_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Minimum Cell Voltage") == 0)
	{
		return "SELECT `Minimum_Cell_Voltage` FROM `Minimum_/_Maximum_Cell_Voltage` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Minimum Cell Voltage") == 0)
	{
		return "SELECT `CMU_with_Minimum_Voltage` FROM `Minimum_/_Maximum_Cell_Voltage` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cell With Minimum Voltage") == 0)
	{
		return "SELECT `Cell_with_Minimum_Voltage` FROM `Minimum_/_Maximum_Cell_Voltage` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Maximum Cell Voltage") == 0)
	{
		return "SELECT `Maximum_Cell_Voltage` FROM `Minimum_/_Maximum_Cell_Voltage` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Maximum Cell Voltage") == 0)
	{
		return "SELECT `CMU_with_Maximum_Voltage` FROM `Minimum_/_Maximum_Cell_Voltage` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cell With Maximum Voltage") == 0)
	{
		return "SELECT `Cell_with_Maximum_Voltage` FROM `Minimum_/_Maximum_Cell_Voltage` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Minimum CMU Temp") == 0)
	{
		return "SELECT `Minimum_Cell_Temperature` FROM `Minimum_/_Maximum_Cell_Temperature` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Minimum Temperature") == 0)
	{
		return "SELECT `CMU_with_Minimum_Cell_Temperature` FROM `Minimum_/_Maximum_Cell_Temperature` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Maximum CMU Temp") == 0)
	{
		return "SELECT `Maximum_Cell_Temperature` FROM `Minimum_/_Maximum_Cell_Temperature` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Maximum Temperature") == 0)
	{
		return "SELECT `CMU_with_Maximum_Cell_Temperature` FROM `Minimum_/_Maximum_Cell_Temperature` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Voltage (mV)") == 0)
	{
		return "SELECT `Battery_Voltage` FROM `Battery_Pack_Voltage_/_Current` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Current (mA)") == 0)
	{
		return "SELECT `Battery_Current` FROM `Battery_Pack_Voltage_/_Current` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Rising - V)") == 0)
	{
		return "SELECT `Balance_Voltage_Threshold_-_Rising` FROM `Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Falling - V)") == 0)
	{
		return "SELECT `Balance_Voltage_Threshold_-_Falling` FROM `Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cells Under Voltage") == 0)
	{
		return "SELECT `Cell_Under_Voltage` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cells Over Voltage") == 0)
	{
		return "SELECT `Cell_Over_Voltage` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cells Over Temperature") == 0)
	{
		return "SELECT `Cell_Over_Temperature` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Measurements Untrusted") == 0)
	{
		return "SELECT `Measurement_Untrusted` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU Comms Timeout") == 0)
	{
		return "SELECT `CMU_Communications_Timeout` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "BMU Is in Setup Mode") == 0)
	{
		return "SELECT `BMU_is_in_Setup_Mode` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU CAN Bus Power Status") == 0)
	{
		return "SELECT `CMU_CAN_Bus_Power_Status` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Pack Isolation Test Fail") == 0)
	{
		return "SELECT `Pack_Isolation_Test_Failure` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "SOC Measurement Not Valid") == 0)
	{
		return "SELECT `SOC_Measurement_is_not_Valid` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "12V CAN Supply Too Low") == 0)
	{
		return "SELECT `CAN_12V_Too_Low` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Contactor Stuck / Not Engaged") == 0)
	{
		return "SELECT `Contactor_is_Stuck_/_Not_Engaged` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU Detected Extra Cell") == 0)
	{
		return "SELECT `CMU_has_detected_an_extra_Cell` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU Count") == 0)
	{
		return "SELECT `BMS_CMU_Count` FROM `Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "BMU Firmware Build") == 0)
	{
		return "SELECT `BMU_Hardware_Version` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Fan 0 Speed") == 0)
	{
		return "SELECT `Fan_Speed_0` FROM `Battery_Pack_Fan_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Fan 1 Speed") == 0)
	{
		return "SELECT `Fan_Speed_1` FROM `Battery_Pack_Fan_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Fan and Contactor 12V Consumption (mA)") == 0)
	{
		return "SELECT `12V_Current_Consumption_of_Fans_and_Contactors` FROM `Battery_Pack_Fan_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "12V CMU's") == 0)
	{
		return "SELECT `12V_Current_Consumption_of_CMUs` FROM `Battery_Pack_Fan_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Extended Pack BMU Hardware Version") == 0)
	{
		return "SELECT `BMU_Hardware_Version` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Extended Pack BMU Model ID") == 0)
	{
		return "SELECT `BMU_Model_ID` FROM `Extended_Battery_Pack_Status` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Temperature") == 0)
	{
		return "SELECT `Temperature` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Vout") == 0)
	{
		return "SELECT `Uout` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Iin") == 0)
	{
		return "SELECT `Iin` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Vin") == 0)
	{
		return "SELECT `Uin` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Over Voltage from MPPT1") == 0)
	{
		return "SELECT `Battery_Over_Voltage` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT1") == 0)
	{
		return "SELECT `Over_Temperature` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "No Connection to MPPT1") == 0)
	{
		return "SELECT `No_Connection` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT1 Input") == 0)
	{
		return "SELECT `Under_Voltage` FROM `MPPT1` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Temperature") == 0)
	{
		return "SELECT `Temperature` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Vout") == 0)
	{
		return "SELECT `Uout` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Iin") == 0)
	{
		return "SELECT `Iin` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Vin") == 0)
	{
		return "SELECT `Uin` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Over Voltage from MPPT2") == 0)
	{
		return "SELECT `Battery_Over_Voltage` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT2") == 0)
	{
		return "SELECT `Over_Temperature` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "No Connection to MPPT2") == 0)
	{
		return "SELECT `No_Connection` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT2 Input") == 0)
	{
		return "SELECT `Under_Voltage` FROM `MPPT2` ORDER BY packet_number DESC LIMIT 1";
	}
	else
	{
		return "";
	}
}


function dataNameLookup($dataName)
{
	if (strcmp($dataName, "Pack State of Charge (Ah)") == 0)
	{
		return "SOCA";
	}
	else if (strcmp($dataName, "Pack State of Charge (%)") == 0)
	{
		return "SOCP";
	}
	else if (strcmp($dataName, "Balance State of Charge (Ah)") == 0)
	{
		return "Balance_SOCA";
	}
	else if (strcmp($dataName, "Balance State of Charge (%)") == 0)
	{
		return "Balance_SOCP";
	}
	else if (strcmp($dataName, "Charging Cell Voltage Error (mV)") == 0)
	{
		return "Charging_Cell_Voltage_Error";
	}
	else if (strcmp($dataName, "Cell Temp Margin") == 0)
	{
		return "Cell_Temperature_Margin";
	}
	else if (strcmp($dataName, "Discharging Cell Voltage Error (mV)") == 0)
	{
		return "Discharging_Cell_Voltage_Error";
	}
	else if (strcmp($dataName, "Total Pack Capacity (Ah)") == 0)
	{
		return "Total_Pack_Capacity";
	}
	else if (strcmp($dataName, "Precharge / Driver 12V Status") == 0)
	{
		return "12V_Contactor_Supply Voltage_Status";
	}
	else if (strcmp($dataName, "Precharge Status") == 0)
	{
		return "Precharge_State";
	}
	else if (strcmp($dataName, "12V Contactor Supply") == 0)
	{
		return "12V_Contactor_Supply_Voltage";
	}
	else if (strcmp($dataName, "Precharge Timer Elapsed") == 0)
	{
		return "Precharge_Timer_Elapsed";
	}
	else if (strcmp($dataName, "Precharge Timer") == 0)
	{
		return "Precharge_Timer_Counter";
	}
	else if (strcmp($dataName, "Minimum Cell Voltage") == 0)
	{
		return "Minimum_Cell_Voltage";
	}
	else if (strcmp($dataName, "CMU With Minimum Cell Voltage") == 0)
	{
		return "CMU_with_Minimum_Voltage";
	}
	else if (strcmp($dataName, "Cell With Minimum Voltage") == 0)
	{
		return "Cell_with_Minimum_Voltage";
	}
	else if (strcmp($dataName, "Maximum Cell Voltage") == 0)
	{
		return "Maximum_Cell_Voltage";
	}
	else if (strcmp($dataName, "CMU With Maximum Cell Voltage") == 0)
	{
		return "CMU_with_Maximum_Voltage";
	}
	else if (strcmp($dataName, "Cell With Maximum Voltage") == 0)
	{
		return "Cell_with_Maximum_Voltage";
	}
	else if (strcmp($dataName, "Minimum CMU Temp") == 0)
	{
		return "Minimum_Cell_Temperature";
	}
	else if (strcmp($dataName, "CMU With Minimum Temperature") == 0)
	{
		return "CMU_with_Minimum_Cell_Temperature";
	}
	else if (strcmp($dataName, "Maximum CMU Temp") == 0)
	{
		return "Maximum_Cell_Temperature";
	}
	else if (strcmp($dataName, "CMU With Maximum Temperature") == 0)
	{
		return "CMU_with_Maximum_Cell_Temperature";
	}
	else if (strcmp($dataName, "Battery Voltage (mV)") == 0)
	{
		return "Battery_Voltage";
	}
	else if (strcmp($dataName, "Battery Current (mA)") == 0)
	{
		return "Battery_Current";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Rising - V)") == 0)
	{
		return "Balance_Voltage_Threshold_-_Rising";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Falling - V)") == 0)
	{
		return "Balance_Voltage_Threshold_-_Falling";
	}
	else if (strcmp($dataName, "Cells Under Voltage") == 0)
	{
		return "Cell_Under_Voltage";
	}
	else if (strcmp($dataName, "Cells Over Voltage") == 0)
	{
		return "Cell_Over_Voltage";
	}
	else if (strcmp($dataName, "Cells Over Temperature") == 0)
	{
		return "Cell_Over_Temperature";
	}
	else if (strcmp($dataName, "Measurements Untrusted") == 0)
	{
		return "Measurement_Untrusted";
	}
	else if (strcmp($dataName, "CMU Comms Timeout") == 0)
	{
		return "CMU_Communications_Timeout";
	}
	else if (strcmp($dataName, "BMU Is in Setup Mode") == 0)
	{
		return "BMU_is_in_Setup_Mode";
	}
	else if (strcmp($dataName, "CMU CAN Bus Power Status") == 0)
	{
		return "CMU_CAN_Bus_Power_Status";
	}
	else if (strcmp($dataName, "Pack Isolation Test Fail") == 0)
	{
		return "Pack_Isolation_Test_Failure";
	}
	else if (strcmp($dataName, "SOC Measurement Not Valid") == 0)
	{
		return "SOC_Measurement_is_not_Valid";
	}
	else if (strcmp($dataName, "12V CAN Supply Too Low") == 0)
	{
		return "CAN_12V_Too_Low";
	}
	else if (strcmp($dataName, "Contactor Stuck / Not Engaged") == 0)
	{
		return "Contactor_is_Stuck_/_Not_Engaged";
	}
	else if (strcmp($dataName, "CMU Detected Extra Cell") == 0)
	{
		return "CMU_has_detected_an_extra_Cell";
	}
	else if (strcmp($dataName, "CMU Count") == 0)
	{
		return "BMS_CMU_Count";
	}
	else if (strcmp($dataName, "BMU Firmware Build") == 0)
	{
		return "BMU_Hardware_Version";
	}
	else if (strcmp($dataName, "Fan 0 Speed") == 0)
	{
		return "Fan_Speed_0";
	}
	else if (strcmp($dataName, "Fan 1 Speed") == 0)
	{
		return "Fan_Speed_1";
	}
	else if (strcmp($dataName, "Fan and Contactor 12V Consumption (mA)") == 0)
	{
		return "12V_Current_Consumption_of_Fans_and_Contactors";
	}
	else if (strcmp($dataName, "12V CMU's") == 0)
	{
		return "12V_Current_Consumption_of_CMUs";
	}
	else if (strcmp($dataName, "Extended Pack BMU Hardware Version") == 0)
	{
		return "BMU_Hardware_Version";
	}
	else if (strcmp($dataName, "Extended Pack BMU Model ID") == 0)
	{
		return "BMU_Model_ID";
	}
	else if (strcmp($dataName, "MPPT 1 Temperature") == 0)
	{
		return "Temperature";
	}
	else if (strcmp($dataName, "MPPT 1 Vout") == 0)
	{
		return "Uout";
	}
	else if (strcmp($dataName, "MPPT 1 Iin") == 0)
	{
		return "Iin";
	}
	else if (strcmp($dataName, "MPPT 1 Vin") == 0)
	{
		return "Uin";
	}
	else if (strcmp($dataName, "Battery Over Voltage from MPPT1") == 0)
	{
		return "Battery_Over_Voltage";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT1") == 0)
	{
		return "Over_Temperature";
	}
	else if (strcmp($dataName, "No Connection to MPPT1") == 0)
	{
		return "No_Connection";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT1 Input") == 0)
	{
		return "Under_Voltage";
	}
	else if (strcmp($dataName, "MPPT 2 Temperature") == 0)
	{
		return "Temperature";
	}
	else if (strcmp($dataName, "MPPT 2 Vout") == 0)
	{
		return "Uout";
	}
	else if (strcmp($dataName, "MPPT 2 Iin") == 0)
	{
		return "Iin";
	}
	else if (strcmp($dataName, "MPPT 2 Vin") == 0)
	{
		return "Uin";
	}
	else if (strcmp($dataName, "Battery Over Voltage from MPPT2") == 0)
	{
		return "Battery_Over_Voltage";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT2") == 0)
	{
		return "Over_Temperature";
	}
	else if (strcmp($dataName, "No Connection to MPPT2") == 0)
	{
		return "No_Connection";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT2 Input") == 0)
	{
		return "Under_Voltage";
	}
	else
	{
		return "";
	}
}
?>