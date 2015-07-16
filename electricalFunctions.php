<?php
function sqlLookup($dataName)
{
	if (strcmp($dataName, "Pack State of Charge (Ah)") == 0)
	{
		return "SELECT `SOCA` FROM `Pack State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Pack State of Charge (%)") == 0)
	{
		return "SELECT `SOCP` FROM `Pack State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Balance State of Charge (Ah)") == 0)
	{
		return "SELECT `Balance SOCA` FROM `Pack Balance State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Balance State of Charge (%)") == 0)
	{
		return "SELECT `Balance SOCP` FROM `Pack Balance State of Charge` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Charging Cell Voltage Error (mV)") == 0)
	{
		return "SELECT `Charging Cell Voltage Error` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cell Temp Margin") == 0)
	{
		return "SELECT `Cell Temperature Margin` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Discharging Cell Voltage Error (mV)") == 0)
	{
		return "SELECT `Discharging Cell Voltage Error` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Total Pack Capacity (Ah)") == 0)
	{
		return "SELECT `Total Pack Capacity` FROM `Charger Control Information` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge / Driver 12V Status") == 0)
	{
		return "SELECT `12V Contactor Supply Voltage Status` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge Status") == 0)
	{
		return "SELECT `Precharge State` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "12V Contactor Supply") == 0)
	{
		return "SELECT `12V Contactor Supply Voltage` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge Timer Elapsed") == 0)
	{
		return "SELECT `Precharge Timer Elapsed` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Precharge Timer") == 0)
	{
		return "SELECT `Precharge Timer Counter` FROM `Precharge Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Minimum Cell Voltage") == 0)
	{
		return "SELECT `Minimum Cell Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Minimum Cell Voltage") == 0)
	{
		return "SELECT `CMU with Minimum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cell With Minimum Voltage") == 0)
	{
		return "SELECT `Cell with Minimum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Maximum Cell Voltage") == 0)
	{
		return "SELECT `Maximum Cell Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Maximum Cell Voltage") == 0)
	{
		return "SELECT `CMU with Maximum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cell With Maximum Voltage") == 0)
	{
		return "SELECT `Cell with Maximum Voltage` FROM `Minimum / Maximum Cell Voltage` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Minimum CMU Temp") == 0)
	{
		return "SELECT `Minimum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Minimum Temperature") == 0)
	{
		return "SELECT `CMU with Minimum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Maximum CMU Temp") == 0)
	{
		return "SELECT `Maximum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU With Maximum Temperature") == 0)
	{
		return "SELECT `CMU with Maximum Cell Temperature` FROM `Minimum / Maximum Cell Temperature` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Voltage (mV)") == 0)
	{
		return "SELECT `Battery Voltage` FROM `Battery Pack Voltage / Current` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Current (mA)") == 0)
	{
		return "SELECT `Battery Current` FROM `Battery Pack Voltage / Current` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Rising - V)") == 0)
	{
		return "SELECT `Balance Voltage Threshold - Rising` FROM `Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Falling - V)") == 0)
	{
		return "SELECT `Balance Voltage Threshold - Falling` FROM `Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cells Under Voltage") == 0)
	{
		return "SELECT `Cell Under Voltage` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cells Over Voltage") == 0)
	{
		return "SELECT `Cell Over Voltage` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Cells Over Temperature") == 0)
	{
		return "SELECT `Cell Over Temperature` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Measurements Untrusted") == 0)
	{
		return "SELECT `Measurement Untrusted` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU Comms Timeout") == 0)
	{
		return "SELECT `CMU Communications Timeout` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "BMU Is in Setup Mode") == 0)
	{
		return "SELECT `BMU is in Setup Mode` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU CAN Bus Power Status") == 0)
	{
		return "SELECT `CMU CAN Bus Power Status` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Pack Isolation Test Fail") == 0)
	{
		return "SELECT `Pack Isolation Test Failure` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "SOC Measurement Not Valid") == 0)
	{
		return "SELECT `SOC Measurement is not Valid` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "12V CAN Supply Too Low") == 0)
	{
		return "SELECT `CAN 12V Too Low` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Contactor Stuck / Not Engaged") == 0)
	{
		return "SELECT `Contactor is Stuck / Not Engaged` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU Detected Extra Cell") == 0)
	{
		return "SELECT `CMU has detected an extra Cell` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "CMU Count") == 0)
	{
		return "SELECT `BMS CMU Count` FROM `Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "BMU Firmware Build") == 0)
	{
		return "SELECT `BMU Hardware Version` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Fan 0 Speed") == 0)
	{
		return "SELECT `Fan Speed 0` FROM `Battery Pack Fan Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Fan 1 Speed") == 0)
	{
		return "SELECT `Fan Speed 1` FROM `Battery Pack Fan Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Fan and Contactor 12V Consumption (mA)") == 0)
	{
		return "SELECT `12V Current Consumption of Fans and Contactors` FROM `Battery Pack Fan Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "12V CMU's") == 0)
	{
		return "SELECT `12V Current Consumption of CMUs` FROM `Battery Pack Fan Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Extended Pack BMU Hardware Version") == 0)
	{
		return "SELECT `BMU Hardware Version` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Extended Pack BMU Model ID") == 0)
	{
		return "SELECT `BMU Model ID` FROM `Extended Battery Pack Status` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Temperature") == 0)
	{
		return "SELECT `Temperature` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Vout") == 0)
	{
		return "SELECT `Uout` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Iin") == 0)
	{
		return "SELECT `Iin` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 1 Vin") == 0)
	{
		return "SELECT `Uin` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Below Voltage from MPPT1") == 0)
	{
		return "SELECT `Battery Over Voltage` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT1") == 0)
	{
		return "SELECT `Over Temperature` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "No Connection to MPPT1") == 0)
	{
		return "SELECT `No Connection` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT1 Input") == 0)
	{
		return "SELECT `Under Voltage` FROM `MPPT1` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Temperature") == 0)
	{
		return "SELECT `Temperature` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Vout") == 0)
	{
		return "SELECT `Uout` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Iin") == 0)
	{
		return "SELECT `Iin` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "MPPT 2 Vin") == 0)
	{
		return "SELECT `Uin` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Below Voltage from MPPT2") == 0)
	{
		return "SELECT `Battery Over Voltage` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT2") == 0)
	{
		return "SELECT `Over Temperature` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "No Connection to MPPT2") == 0)
	{
		return "SELECT `No Connection` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT2 Input") == 0)
	{
		return "SELECT `Under Voltage` FROM `MPPT2` ORDER BY id DESC LIMIT 1";
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
		return "Balance SOCA";
	}
	else if (strcmp($dataName, "Balance State of Charge (%)") == 0)
	{
		return "Balance SOCP";
	}
	else if (strcmp($dataName, "Charging Cell Voltage Error (mV)") == 0)
	{
		return "Charging Cell Voltage Error";
	}
	else if (strcmp($dataName, "Cell Temp Margin") == 0)
	{
		return "Cell Temperature Margin";
	}
	else if (strcmp($dataName, "Discharging Cell Voltage Error (mV)") == 0)
	{
		return "Discharging Cell Voltage Error";
	}
	else if (strcmp($dataName, "Total Pack Capacity (Ah)") == 0)
	{
		return "Total Pack Capacity";
	}
	else if (strcmp($dataName, "Precharge / Driver 12V Status") == 0)
	{
		return "12V Contactor Supply Voltage Status";
	}
	else if (strcmp($dataName, "Precharge Status") == 0)
	{
		return "Precharge State";
	}
	else if (strcmp($dataName, "12V Contactor Supply") == 0)
	{
		return "12V Contactor Supply Voltage";
	}
	else if (strcmp($dataName, "Precharge Timer Elapsed") == 0)
	{
		return "Precharge Timer Elapsed";
	}
	else if (strcmp($dataName, "Precharge Timer") == 0)
	{
		return "Precharge Timer Counter";
	}
	else if (strcmp($dataName, "Minimum Cell Voltage") == 0)
	{
		return "Minimum Cell Voltage";
	}
	else if (strcmp($dataName, "CMU With Minimum Cell Voltage") == 0)
	{
		return "CMU with Minimum Voltage";
	}
	else if (strcmp($dataName, "Cell With Minimum Voltage") == 0)
	{
		return "Cell with Minimum Voltage";
	}
	else if (strcmp($dataName, "Maximum Cell Voltage") == 0)
	{
		return "Maximum Cell Voltage";
	}
	else if (strcmp($dataName, "CMU With Maximum Cell Voltage") == 0)
	{
		return "CMU with Maximum Voltage";
	}
	else if (strcmp($dataName, "Cell With Maximum Voltage") == 0)
	{
		return "Cell with Maximum Voltage";
	}
	else if (strcmp($dataName, "Minimum CMU Temp") == 0)
	{
		return "Minimum Cell Temperature";
	}
	else if (strcmp($dataName, "CMU With Minimum Temperature") == 0)
	{
		return "CMU with Minimum Cell Temperature";
	}
	else if (strcmp($dataName, "Maximum CMU Temp") == 0)
	{
		return "Maximum Cell Temperature";
	}
	else if (strcmp($dataName, "CMU With Maximum Temperature") == 0)
	{
		return "CMU with Maximum Cell Temperature";
	}
	else if (strcmp($dataName, "Battery Voltage (mV)") == 0)
	{
		return "Battery Voltage";
	}
	else if (strcmp($dataName, "Battery Current (mA)") == 0)
	{
		return "Battery Current";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Rising - V)") == 0)
	{
		return "Balance Voltage Threshold - Rising";
	}
	else if (strcmp($dataName, "Battery Voltage Threshold (Falling - V)") == 0)
	{
		return "Balance Voltage Threshold - Falling";
	}
	else if (strcmp($dataName, "Cells Under Voltage") == 0)
	{
		return "Cell Under Voltage";
	}
	else if (strcmp($dataName, "Cells Over Voltage") == 0)
	{
		return "Cell Over Voltage";
	}
	else if (strcmp($dataName, "Cells Over Temperature") == 0)
	{
		return "Cell Over Temperature";
	}
	else if (strcmp($dataName, "Measurements Untrusted") == 0)
	{
		return "Measurement Untrusted";
	}
	else if (strcmp($dataName, "CMU Comms Timeout") == 0)
	{
		return "CMU Communications Timeout";
	}
	else if (strcmp($dataName, "BMU Is in Setup Mode") == 0)
	{
		return "BMU is in Setup Mode";
	}
	else if (strcmp($dataName, "CMU CAN Bus Power Status") == 0)
	{
		return "CMU CAN Bus Power Status";
	}
	else if (strcmp($dataName, "Pack Isolation Test Fail") == 0)
	{
		return "Pack Isolation Test Failure";
	}
	else if (strcmp($dataName, "SOC Measurement Not Valid") == 0)
	{
		return "SOC Measurement is not Valid";
	}
	else if (strcmp($dataName, "12V CAN Supply Too Low") == 0)
	{
		return "CAN 12V Too Low";
	}
	else if (strcmp($dataName, "Contactor Stuck / Not Engaged") == 0)
	{
		return "Contactor is Stuck / Not Engaged";
	}
	else if (strcmp($dataName, "CMU Detected Extra Cell") == 0)
	{
		return "CMU has detected an extra Cell";
	}
	else if (strcmp($dataName, "CMU Count") == 0)
	{
		return "BMS CMU Count";
	}
	else if (strcmp($dataName, "BMU Firmware Build") == 0)
	{
		return "BMU Hardware Version";
	}
	else if (strcmp($dataName, "Fan 0 Speed") == 0)
	{
		return "Fan Speed 0";
	}
	else if (strcmp($dataName, "Fan 1 Speed") == 0)
	{
		return "Fan Speed 1";
	}
	else if (strcmp($dataName, "Fan and Contactor 12V Consumption (mA)") == 0)
	{
		return "12V Current Consumption of Fans and Contactors";
	}
	else if (strcmp($dataName, "12V CMU's") == 0)
	{
		return "12V Current Consumption of CMUs";
	}
	else if (strcmp($dataName, "Extended Pack BMU Hardware Version") == 0)
	{
		return "BMU Hardware Version";
	}
	else if (strcmp($dataName, "Extended Pack BMU Model ID") == 0)
	{
		return "BMU Model ID";
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
	else if (strcmp($dataName, "Battery Below Voltage from MPPT1") == 0)
	{
		return "Battery Over Voltage";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT1") == 0)
	{
		return "Over Temperature";
	}
	else if (strcmp($dataName, "No Connection to MPPT1") == 0)
	{
		return "No Connection";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT1 Input") == 0)
	{
		return "Under Voltage";
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
	else if (strcmp($dataName, "Battery Below Voltage from MPPT2") == 0)
	{
		return "Battery Over Voltage";
	}
	else if (strcmp($dataName, "Battery Over Temperature from MPPT2") == 0)
	{
		return "Over Temperature";
	}
	else if (strcmp($dataName, "No Connection to MPPT2") == 0)
	{
		return "No Connection";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT2 Input") == 0)
	{
		return "Under Voltage";
	}
	else
	{
		return "";
	}
}
?>