<?php
function sqlLookup($dataName)
{
	/*
		Electrical Data
	*/
	
	if (strcmp($dataName, "Minimum Cell Voltage") == 0)
	{
		return "select round((avg(`minimum_cell_voltage`))) AS minimum_cell_voltage from (select `minimum_cell_voltage` from `minimum_/_maximum_cell_voltage` order by time_stamp desc limit 10) `minimum_cell_voltage`";
	}
	else if (strcmp($dataName, "CMU With Minimum Cell Voltage") == 0)
	{
		return "select `cmu_with_minimum_voltage` from `minimum_/_maximum_cell_voltage` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Cell With Minimum Voltage") == 0)
	{
		return "select `cell_with_minimum_voltage` from `minimum_/_maximum_cell_voltage` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Maximum Cell Voltage") == 0)
	{
		return "select round((avg(`maximum_cell_voltage`))) AS maximum_cell_voltage from (select `maximum_cell_voltage` from `minimum_/_maximum_cell_voltage` order by time_stamp desc limit 10) `maximum_cell_voltage`";
	}
	else if (strcmp($dataName, "CMU With Maximum Cell Voltage") == 0)
	{
		return "select `cmu_with_maximum_voltage` from `minimum_/_maximum_cell_voltage` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Cell With Maximum Voltage") == 0)
	{
		return "select `cell_with_maximum_voltage` from `minimum_/_maximum_cell_voltage` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Minimum Cell Temp") == 0)
	{
		return "select round((avg(`minimum_cell_temperature`))) * 0.1 AS minimum_cell_temperature from (select `minimum_cell_temperature` from `minimum_/_maximum_cell_temperature` order by time_stamp desc limit 10) `minimum_cell_temperature`";
	}
	else if (strcmp($dataName, "CMU With Minimum Temperature") == 0)
	{
		return "select `cmu_with_minimum_cell_temperature` from `minimum_/_maximum_cell_temperature` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Maximum Cell Temp") == 0)
	{
		return "select round((avg(`maximum_cell_temperature`))) * 0.1 AS maximum_cell_temperature from (select `maximum_cell_temperature` from `minimum_/_maximum_cell_temperature` order by time_stamp desc limit 10) `minimum_cell_temperature`";
	}
	else if (strcmp($dataName, "CMU With Maximum Temperature") == 0)
	{
		return "select `cmu_with_maximum_cell_temperature` from `minimum_/_maximum_cell_temperature` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "BMU Firmware Build") == 0)
	{
		return "select `bmu_hardware_version` from `extended_battery_pack_status` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Fan 0 Speed") == 0)
	{
		return "select (avg(`fan_speed_0`)) AS fan_speed_0 from (select `fan_speed_0` from `battery_pack_fan_status` order by time_stamp desc limit 10) `fan_speed_0`";
	}
	else if (strcmp($dataName, "Fan 1 Speed") == 0)
	{
		return "select (avg(`fan_speed_1`)) AS fan_speed_1 from (select `fan_speed_1` from `battery_pack_fan_status` order by time_stamp desc limit 10) `fan_speed_1`";
	}
	else if (strcmp($dataName, "Fan and Contactor 12V Consumption (mA)") == 0)
	{
		return "select (avg(`12v_current_consumption_of_fans_and_contactors`)) AS 12v_current_consumption_of_fans_and_contactors from (select `12v_current_consumption_of_fans_and_contactors` from `battery_pack_fan_status` order by time_stamp desc limit 10) `12v_current_consumption_of_fans_and_contactors`";
	}
	else if (strcmp($dataName, "12V CMU Consumption") == 0)
	{
		return "select (avg(`12v_current_consumption_of_cmus`)) AS 12v_current_consumption_of_cmus from (select `12v_current_consumption_of_cmus` from `battery_pack_fan_status` order by time_stamp desc limit 10) `12v_current_consumption_of_cmus`";
	}
	else if (strcmp($dataName, "Extended Pack BMU Hardware Version") == 0)
	{
		return "select `bmu_hardware_version` from `extended_battery_pack_status` order by time_stamp desc limit 1";
	}
	else if (strcmp($dataName, "Extended Pack BMU Model ID") == 0)
	{
		return "select `bmu_model_id` from `extended_battery_pack_status` order by time_stamp desc limit 1";
	}
	
	/*
		Electrical Flags
	*/
	
	else if (strcmp($dataName, "Cells Under Voltage") == 0)
	{
		return "select (sum(`cell_under_voltage`)) AS cell_under_voltage from (select `cell_under_voltage` from `extended_battery_pack_status` order by time_stamp desc limit 10) `cell_under_voltage`";
	}
	else if (strcmp($dataName, "Cells Over Voltage") == 0)
	{
		return "select (sum(`cell_over_voltage`)) AS cell_over_voltage from (select `cell_over_voltage` from `extended_battery_pack_status` order by time_stamp desc limit 10) `cell_over_voltage`";
	}
	else if (strcmp($dataName, "Cells Over Temperature") == 0)
	{
		return "select (sum(`cell_over_temperature`)) AS cell_over_temperature from (select `cell_over_temperature` from `extended_battery_pack_status` order by time_stamp desc limit 10) `cell_over_temperature`";
	}
	else if (strcmp($dataName, "Measurements Untrusted") == 0)
	{
		return "select (sum(`measurement_untrusted`)) AS measurement_untrusted from (select `measurement_untrusted` from `extended_battery_pack_status` order by time_stamp desc limit 10) `measurement_untrusted`";
	}
	else if (strcmp($dataName, "CMU Comms Timeout") == 0)
	{
		return "select (sum(`cmu_communications_timeout`)) AS cmu_communications_timeout from (select `cmu_communications_timeout` from `extended_battery_pack_status` order by time_stamp desc limit 10) `cmu_communications_timeout`";
	}
	else if (strcmp($dataName, "BMU Is in Setup Mode") == 0)
	{
		return "select (sum(`bmu_is_in_setup_mode`)) AS bmu_is_in_setup_mode from (select `bmu_is_in_setup_mode` from `extended_battery_pack_status` order by time_stamp desc limit 10) `bmu_is_in_setup_mode`";
	}
	else if (strcmp($dataName, "CMU CAN Bus Power Status") == 0)
	{
		return "select (sum(`cmu_can_bus_power_status`)) AS cmu_can_bus_power_status from (select `cmu_can_bus_power_status` from `extended_battery_pack_status` order by time_stamp desc limit 10) `cmu_can_bus_power_status`";
	}
	else if (strcmp($dataName, "Pack Isolation Test Fail") == 0)
	{
		return "select (sum(`pack_isolation_test_failure`)) AS pack_isolation_test_failure from (select `pack_isolation_test_failure` from `extended_battery_pack_status` order by time_stamp desc limit 10) `pack_isolation_test_failure`";
	}
	else if (strcmp($dataName, "SOC Measurement Not Valid") == 0)
	{
		return "select (sum(`soc_measurement_is_not_valid`)) AS soc_measurement_is_not_valid from (select `soc_measurement_is_not_valid` from `extended_battery_pack_status` order by time_stamp desc limit 10) `soc_measurement_is_not_valid`";
	}
	else if (strcmp($dataName, "12V CAN Supply Too Low") == 0)
	{
		return "select (sum(`can_12v_too_low`)) AS can_12v_too_low from (select `can_12v_too_low` from `extended_battery_pack_status` order by time_stamp desc limit 10) `can_12v_too_low`";
	}
	else if (strcmp($dataName, "Contactor Stuck / Not Engaged") == 0)
	{
		return "select (sum(`contactor_is_stuck_/_not_engaged`)) AS contactor_is_stuck_/_not_engaged from (select `contactor_is_stuck_/_not_engaged` from `extended_battery_pack_status` order by time_stamp desc limit 10) `contactor_is_stuck_/_not_engaged`";
	}
	else if (strcmp($dataName, "CMU Detected Extra Cell") == 0)
	{
		return "select (sum(`cmu_has_detected_an_extra_cell`)) AS cmu_has_detected_an_extra_cell from (select `cmu_has_detected_an_extra_cell` from `extended_battery_pack_status` order by time_stamp desc limit 10) `cmu_has_detected_an_extra_cell`";
	}
	
	
	/*
		MPPT Data
	*/
	
	
	else if (strcmp($dataName, "MPPT 1 Temperature") == 0)
	{
		return "select round((avg(`temperature`)), 2) AS temperature from (select `temperature` from `mppt1` order by time_stamp desc limit 10) `temperature`";
	}
	else if (strcmp($dataName, "MPPT 1 Vout") == 0)
	{
		return "select round((avg(`uout`) * 2.1 * 0.1), 2) AS mppt1_uout from (select `uout` from `mppt1` order by time_stamp desc limit 10) `mppt1_uout`";
	}
	else if (strcmp($dataName, "MPPT 1 Iin") == 0)
	{
		return "select round((avg(`iin`) * 0.87 * 0.01), 2) AS iin from (select `iin` from `mppt1` order by time_stamp desc limit 10) `iin`";
	}
	else if (strcmp($dataName, "MPPT 1 Vin") == 0)
	{
		return "select round((avg(`uin`) * 1.5 * 0.1), 2) AS uin from (select `uin` from `mppt1` order by time_stamp desc limit 10) `uin`";
	}
	else if (strcmp($dataName, "MPPT 1 PowerIn") == 0)
	{
		return "select round((avg(`uin`) * 1.5 * 0.1) * (avg(`iin`)  * 0.87 * 0.01 ), 2) AS pin from (select `iin`, `uin` from `mppt1` order by time_stamp desc limit 10) `pin`";
	}
	else if (strcmp($dataName, "MPPT 2 Temperature") == 0)
	{
		return "select round((avg(`temperature`)), 2) AS temperature from (select `temperature` from `mppt2` order by time_stamp desc limit 10) `temperature`";
	}
	else if (strcmp($dataName, "MPPT 2 Vout") == 0)
	{
		return "select round((avg(`uout`) * 2.1 * 0.1), 2) AS uout from (select `uout` from `mppt2` order by time_stamp desc limit 10) `uout`";
	}
	else if (strcmp($dataName, "MPPT 2 Iin") == 0)
	{
		return "select round((avg(`iin`) * 0.87 * 0.01), 2) AS iin from (select `iin` from `mppt2` order by time_stamp desc limit 10) `iin`";
	}
	else if (strcmp($dataName, "MPPT 2 Vin") == 0)
	{
		return "select round((avg(`uin`) * 1.5 * 0.1), 2) AS uin from (select `uin` from `mppt2` order by time_stamp desc limit 10) `uin`";
	}
	else if (strcmp($dataName, "MPPT 2 PowerIn") == 0)
	{
		return "select round((avg(`uin`) * 1.5 * 0.1) * (avg(`iin`)  * 0.87 * 0.01 ), 2) AS pin from (select `iin`, `uin` from `mppt2` order by time_stamp desc limit 10) `pin`";
	}
	
	
	/*
		MPPT Flags
	*/
	
	else if (strcmp($dataName, "Battery Over Voltage from MPPT1") == 0)
	{
		return "select (sum(`battery over voltage`)) AS `battery_over_voltage` from (select `battery over voltage` from `mppt1` order by time_stamp desc limit 10) `battery over voltage`";
	}
	else if (strcmp($dataName, "MPPT1 Over Temperature") == 0)
	{
		return "select (sum(`over temperature`)) AS over_temperature from (select `over temperature` from `mppt1` order by time_stamp desc limit 10) `over temperature`";
	}
	else if (strcmp($dataName, "No Connection to MPPT1") == 0)
	{
		return "select (sum(`no connection`)) AS no_connection from (select `no connection` from `mppt1` order by time_stamp desc limit 10) `no connection`";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT1 Input") == 0)
	{
		return "select (sum(`under voltage`)) AS under_voltage from (select `under voltage` from `mppt1` order by time_stamp desc limit 10) `under voltage`";
	}
	else if (strcmp($dataName, "Battery Over Voltage from MPPT2") == 0)
	{
		return "select (sum(`battery over voltage`)) AS battery_over_voltage from (select `battery over voltage` from `mppt2` order by time_stamp desc limit 10) `battery over voltage`";
	}
	else if (strcmp($dataName, "MPPT2 Over Temperature") == 0)
	{
		return "select (sum(`over temperature`)) AS over_temperature from (select `over temperature` from `mppt2` order by time_stamp desc limit 10) `over temperature`";
	}
	else if (strcmp($dataName, "No Connection to MPPT2") == 0)
	{
		return "select (sum(`no connection`)) AS no_connection from (select `no connection` from `mppt2` order by time_stamp desc limit 10) `no connection`";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT2 Input") == 0)
	{
		return "select (sum(`under voltage`)) AS under_voltage from (select `under voltage` from `mppt2` order by time_stamp desc limit 10) `under voltage`";
	}
	else
	{
		return "";
	}
}


function dataNameLookup($dataName)
{
	/*
		Electrical Data
	*/
	
	if (strcmp($dataName, "Minimum Cell Voltage") == 0)
	{
		return "minimum_cell_voltage";
	}
	else if (strcmp($dataName, "CMU With Minimum Cell Voltage") == 0)
	{
		return "cmu_with_minimum_voltage";
	}
	else if (strcmp($dataName, "Cell With Minimum Voltage") == 0)
	{
		return "cell_with_minimum_voltage";
	}
	else if (strcmp($dataName, "Maximum Cell Voltage") == 0)
	{
		return "maximum_cell_voltage";
	}
	else if (strcmp($dataName, "CMU With Maximum Cell Voltage") == 0)
	{
		return "cmu_with_maximum_voltage";
	}
	else if (strcmp($dataName, "Cell With Maximum Voltage") == 0)
	{
		return "cell_with_maximum_voltage";
	}
	else if (strcmp($dataName, "Minimum Cell Temp") == 0)
	{
		return "minimum_cell_temperature";
	}
	else if (strcmp($dataName, "CMU With Minimum Temperature") == 0)
	{
		return "cmu_with_minimum_cell_temperature";
	}
	else if (strcmp($dataName, "Maximum Cell Temp") == 0)
	{
		return "maximum_cell_temperature";
	}
	else if (strcmp($dataName, "CMU With Maximum Temperature") == 0)
	{
		return "cmu_with_maximum_cell_temperature";
	}
	else if (strcmp($dataName, "CMU Count") == 0)
	{
		return "bms_cmu_count";
	}
	else if (strcmp($dataName, "BMU Firmware Build") == 0)
	{
		return "bmu_hardware_version";
	}
	else if (strcmp($dataName, "Fan 0 Speed") == 0)
	{
		return "fan_speed_0";
	}
	else if (strcmp($dataName, "Fan 1 Speed") == 0)
	{
		return "fan_speed_1";
	}
	else if (strcmp($dataName, "Fan and Contactor 12V Consumption (mA)") == 0)
	{
		return "12v_current_consumption_of_fans_and_contactors";
	}
	else if (strcmp($dataName, "12V CMU Consumption") == 0)
	{
		return "12v_current_consumption_of_cmus";
	}
	else if (strcmp($dataName, "Extended Pack BMU Hardware Version") == 0)
	{
		return "bmu_hardware_version";
	}
	else if (strcmp($dataName, "Extended Pack BMU Model ID") == 0)
	{
		return "bmu_model_id";
	}
	
	/*
		Electrical Flags 
	*/
	
	else if (strcmp($dataName, "Cells Under Voltage") == 0)
	{
		return "cell_under_voltage";
	}
	else if (strcmp($dataName, "Cells Over Voltage") == 0)
	{
		return "cell_over_voltage";
	}
	else if (strcmp($dataName, "Cells Over Temperature") == 0)
	{
		return "cell_over_temperature";
	}
	else if (strcmp($dataName, "Measurements Untrusted") == 0)
	{
		return "measurement_untrusted";
	}
	else if (strcmp($dataName, "CMU Comms Timeout") == 0)
	{
		return "cmu_communications_timeout";
	}
	else if (strcmp($dataName, "BMU Is in Setup Mode") == 0)
	{
		return "bmu_is_in_setup_mode";
	}
	else if (strcmp($dataName, "CMU CAN Bus Power Status") == 0)
	{
		return "cmu_can_bus_power_status";
	}
	else if (strcmp($dataName, "Pack Isolation Test Fail") == 0)
	{
		return "pack_isolation_test_failure";
	}
	else if (strcmp($dataName, "SOC Measurement Not Valid") == 0)
	{
		return "soc_measurement_is_not_valid";
	}
	else if (strcmp($dataName, "12V CAN Supply Too Low") == 0)
	{
		return "can_12v_too_low";
	}
	else if (strcmp($dataName, "Contactor Stuck / Not Engaged") == 0)
	{
		return "contactor_is_stuck_/_not_engaged";
	}
	else if (strcmp($dataName, "CMU Detected Extra Cell") == 0)
	{
		return "cmu_has_detected_an_extra_cell";
	}
	
	/*
		MPPT Data
	*/
	
	else if (strcmp($dataName, "MPPT 1 Temperature") == 0)
	{
		return "temperature";
	}
	else if (strcmp($dataName, "MPPT 1 Vout") == 0)
	{
		return "mppt1_uout";
	}
	else if (strcmp($dataName, "MPPT 1 Iin") == 0)
	{
		return "iin";
	}
	else if (strcmp($dataName, "MPPT 1 Vin") == 0)
	{
		return "uin";
	}
	else if (strcmp($dataName, "MPPT 1 PowerIn") == 0)
	{
		return "pin";
	}
	else if (strcmp($dataName, "MPPT 2 Vout") == 0)
	{
		return "uout";
	}
	else if (strcmp($dataName, "MPPT 2 Iin") == 0)
	{
		return "iin";
	}
	else if (strcmp($dataName, "MPPT 2 Vin") == 0)
	{
		return "uin";
	}	
	else if (strcmp($dataName, "MPPT 2 PowerIn") == 0)
	{
		return "pin";
	}
	
	/*
		MPPT Flags
	*/
	
	else if (strcmp($dataName, "Battery Over Voltage from MPPT1") == 0)
	{
		return "battery_over_voltage";
	}
	else if (strcmp($dataName, "MPPT1 Over Temperature") == 0)
	{
		return "over_temperature";
	}
	else if (strcmp($dataName, "No Connection to MPPT1") == 0)
	{
		return "no_connection";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT1 Input") == 0)
	{
		return "under_voltage";
	}
	else if (strcmp($dataName, "MPPT 2 Temperature") == 0)
	{
		return "temperature";
	}
	else if (strcmp($dataName, "Battery Over Voltage from MPPT2") == 0)
	{
		return "battery_over_voltage";
	}
	else if (strcmp($dataName, "MPPT2 Over Temperature") == 0)
	{
		return "over_temperature";
	}
	else if (strcmp($dataName, "No Connection to MPPT2") == 0)
	{
		return "no_connection";
	}
	else if (strcmp($dataName, "Under Voltage on MPPT2 Input") == 0)
	{
		return "under_voltage";
	}
	else
	{
		return "";
	}
}
?>