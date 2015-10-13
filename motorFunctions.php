<?php
function sqlLookup($dataName)
{
	if (strcmp($dataName, "DC Bus Amp Hours") == 0)
	{
		return "select round(avg(`dc_bus_amphours`), 2) as `dc_bus_amphours` from (select `dc_bus_amphours` from `odometer_and_bus_amphours_measurement` order by packet_number desc limit 10) `dc_bus_amphours`";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "select round(avg(`slip_speed`), 2) as `slip_speed` from (select `slip_speed` from `slip_speed_measurement` order by packet_number desc limit 10) `slip_speed`";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "select round((avg(`vehicle_velocity` * 3.6)), 2) as `vehicle_velocity` from `velocity_measurement` order by packet_number desc limit 5";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "select round(avg(`motor_velocity`), 2) as `motor_velocity` from (select `motor_velocity` from `velocity_measurement` order by packet_number desc limit 10) `motor_velocity`";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "select round((avg(`bus_current`)), 2) AS `bus_current` from (select `bus_current` from `bus_measurement` order by time_stamp desc limit 10) `bus_current`";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "select round((avg(`bus_voltage`)), 2) AS `bus_voltage` from (select `bus_voltage` from `bus_measurement` order by time_stamp desc limit 10) `bus_voltage`";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "select round(avg(`phase_b_current`), 2) as `phase_b_current` from (select `phase_b_current` from `phase_current_measurement` order by packet_number desc limit 10) `phase_b_current`";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "select round(avg(`phase_c_current`), 2) as `phase_c_current` from (select `phase_c_current` from `phase_current_measurement` order by packet_number desc limit 10) `phase_c_current`";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "select round(avg(`i_d`), 2) as `i_d` from (select `i_d` from `motor_current_vector_measurement` order by packet_number desc limit 10) `i_d`";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "select round(avg(`i_q`), 2) as `i_q` from (select `i_q` from `motor_current_vector_measurement` order by packet_number desc limit 10) `i_q`";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "select round(avg(`v_d`), 2) as `v_d` from (select `v_d` from `motor_voltage_vector_measurement` order by packet_number desc limit 10) `v_d`";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "select round(avg(`v_q`), 2) as `v_q` from (select `v_q` from `motor_voltage_vector_measurement` order by packet_number desc limit 10) `v_q`";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "select round(avg(`bemf_d`), 2) as `bemf_d` from (select `bemf_d` from `motor_backemf_measurement_/_prediction` order by packet_number desc limit 10) `bemf_d`";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "select round(avg(`bemf_q`), 2) as `bemf_q` from (select `bemf_q` from `motor_backemf_measurement_/_prediction` order by packet_number desc limit 10) `bemf_q`";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "select round(avg(`ipm_heatsink_temp`), 2) as `ipm_heatsink_temp` from (select `ipm_heatsink_temp` from `ipm_heatsink_and_motor_temperature_measurement` order by packet_number desc limit 10) `ipm_heatsink_temp`";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "select round(avg(`motor_temp`), 2) as `motor_temp` from (select `motor_temp` from `ipm_heatsink_and_motor_temperature_measurement` order by packet_number desc limit 10) `motor_temp`";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "select round(avg(`dsp_board_temp`), 2) as `dsp_board_temp` from (select `dsp_board_temp` from `ipm_dsp_board_temperature_measurement` order by packet_number desc limit 10) `dsp_board_temp`";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "select round(avg(`15v_supply`), 2) as `15v_supply` from (select `15v_supply` from `15v_voltage_rail_measurement` order by packet_number desc limit 10) `15v_supply`";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "select round(avg(`3.3v_supply`), 2) as `3.3v_supply` from (select `3.3v_supply` from `3.3v_and_1.9v_voltage_rail_measurement` order by packet_number desc limit 10) `3.3v_supply`";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "select round(avg(`1.9v_supply`), 2) as `1.9v_supply` from (select `1.9v_supply` from `3.3v_and_1.9v_voltage_rail_measurement` order by packet_number desc limit 10) `1.9v_supply`";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "select round(avg(`receive_error`), 2) as `receive_error` from (select `receive_error` from `status_information` order by packet_number desc limit 10) `receive_error`";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "select round(avg(`transmit_error`), 2) as `transmit_error` from (select `transmit_error` from `status_information` order by packet_number desc limit 10) `transmit_error`";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "select round(`odometer` / 1000, 2) as `odometer` from (select `odometer` from `odometer_and_bus_amphours_measurement` order by packet_number desc limit 1) `odometer`";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "select `tritium_id` from `identification_information` order by packet_number desc limit 5";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "select `serial_number` from `identification_information` order by packet_number desc limit 5";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "select sum(`desaturation_fault`) as `desaturation_fault` from (select `desaturation_fault` from `status_information` order by packet_number desc limit 10) `desaturation_fault`";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "select sum(`15v_rail_under_voltage`) as `15v_rail_under_voltage` from (select `15v_rail_under_voltage` from `status_information` order by packet_number desc limit 10) `15v_rail_under_voltage`";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "select sum(`config_read_error`) as `config_read_error` from (select `config_read_error` from `status_information` order by packet_number desc limit 10) `config_read_error`";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "select sum(`watchdog_caused_last_reset`) as `watchdog_caused_last_reset` from (select `watchdog_caused_last_reset` from `status_information` order by packet_number desc limit 10) `watchdog_caused_last_reset`";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "select sum(`bad_motor_position_hall_sequence`) as `bad_motor_position_hall_sequence` from (select `bad_motor_position_hall_sequence` from `status_information` order by packet_number desc limit 10) `bad_motor_position_hall_sequence`";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "select sum(`dc_bus_over_voltage`) as `dc_bus_over_voltage` from (select `dc_bus_over_voltage` from `status_information` order by packet_number desc limit 10) `dc_bus_over_voltage`";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "select sum(`software_over_current`) as `software_over_current` from (select `software_over_current` from `status_information` order by packet_number desc limit 10) `software_over_current`";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "select sum(`hardware_over_current`) as `hardware_over_current` from (select `hardware_over_current` from `status_information` order by packet_number desc limit 10) `hardware_over_current`";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "select sum(`output_voltage_pwm`) as `output_voltage_pwm` from (select `output_voltage_pwm` from `status_information` order by packet_number desc limit 10) `output_voltage_pwm`";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "select sum(`motor_current`) as `motor_current` from (select `motor_current` from `status_information` order by packet_number desc limit 10) `motor_current`";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "select sum(`velocity`) as `velocity` from (select `velocity` from `status_information` order by packet_number desc limit 10) `velocity`";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "select sum(`bus_current`) as `bus_current` from (select `bus_current` from `status_information` order by packet_number desc limit 10) `bus_current`";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "select sum(`bus_voltage_upper_limit`) as `bus_voltage_upper_limit` from (select `bus_voltage_upper_limit` from `status_information` order by packet_number desc limit 10) `bus_voltage_upper_limit`";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "select sum(`bus_voltage_lower_limit`) as `bus_voltage_lower_limit` from (select `bus_voltage_lower_limit` from `status_information` order by packet_number desc limit 10) `bus_voltage_lower_limit`";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "select sum(`ipm_temp_or_motor_temp`) as `ipm_temp_or_motor_temp` from (select `ipm_temp_or_motor_temp` from `status_information` order by packet_number desc limit 10) `ipm_temp_or_motor_temp`";
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
		return "dc_bus_amphours";
	}
	else if (strcmp($dataName, "Motor Slip Speed") == 0)
	{
		return "slip_speed";
	}
	else if (strcmp($dataName, "Vehicle Velocity") == 0)
	{
		return "vehicle_velocity";
	}
	else if (strcmp($dataName, "Motor Velocity") == 0)
	{
		return "motor_velocity";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "bus_current";
	}
	else if (strcmp($dataName, "Bus Voltage") == 0)
	{
		return "bus_voltage";
	}
	else if (strcmp($dataName, "Phase B Current") == 0)
	{
		return "phase_b_current";
	}
	else if (strcmp($dataName, "Phase C Current") == 0)
	{
		return "phase_c_current";
	}
	else if (strcmp($dataName, "Motor Current D") == 0)
	{
		return "i_d";
	}
	else if (strcmp($dataName, "Motor Current Q") == 0)
	{
		return "i_q";
	}
	else if (strcmp($dataName, "Motor Voltage D") == 0)
	{
		return "v_d";
	}
	else if (strcmp($dataName, "Motor Voltage Q") == 0)
	{
		return "v_q";
	}
	else if (strcmp($dataName, "Back EMF D") == 0)
	{
		return "bemf_d";
	}
	else if (strcmp($dataName, "Back EMF Q") == 0)
	{
		return "bemf_q";
	}
	else if (strcmp($dataName, "IPM Heatsink Temperature") == 0)
	{
		return "ipm_heatsink_temp";
	}
	else if (strcmp($dataName, "Motor Temperature") == 0)
	{
		return "motor_temp";
	}
	else if (strcmp($dataName, "IPM DSP Board Temp") == 0)
	{
		return "dsp_board_temp";
	}
	else if (strcmp($dataName, "15V Rail") == 0)
	{
		return "15v_supply";
	}
	else if (strcmp($dataName, "3.3V Rail") == 0)
	{
		return "3.3v_supply";
	}
	else if (strcmp($dataName, "1.9V Rail") == 0)
	{
		return "1.9v_supply";
	}
	else if (strcmp($dataName, "Receive Errors") == 0)
	{
		return "receive_error";
	}
	else if (strcmp($dataName, "Transmit Errors") == 0)
	{
		return "transmit_error";
	}
	else if (strcmp($dataName, "Odometer") == 0)
	{
		return "odometer";
	}
	else if (strcmp($dataName, "Tritium Motor ID") == 0)
	{
		return "tritium_id";
	}
	else if (strcmp($dataName, "Tritium Motor Serial Number") == 0)
	{
		return "serial_number";
	}
	else if (strcmp($dataName, "Desaturation Fault") == 0)
	{
		return "desaturation_fault";
	}
	else if (strcmp($dataName, "15V Rail Under Voltage") == 0)
	{
		return "15v_rail_under_voltage";
	}
	else if (strcmp($dataName, "Config Read Error") == 0)
	{
		return "config_read_error";
	}
	else if (strcmp($dataName, "Watchdog Caused Last Reset") == 0)
	{
		return "watchdog_caused_last_reset";
	}
	else if (strcmp($dataName, "Bad Motor Position Hall Sequence") == 0)
	{
		return "bad_motor_position_hall_sequence";
	}
	else if (strcmp($dataName, "DC Bus Over Volt") == 0)
	{
		return "dc_bus_over_voltage";
	}
	else if (strcmp($dataName, "Software Over Current") == 0)
	{
		return "software_over_current";
	}
	else if (strcmp($dataName, "Hardware Over Current") == 0)
	{
		return "hardware_over_current";
	}
	else if (strcmp($dataName, "Output Voltage PWM") == 0)
	{
		return "output_voltage_pwm";
	}
	else if (strcmp($dataName, "Motor Current") == 0)
	{
		return "motor_current";
	}
	else if (strcmp($dataName, "Velocity") == 0)
	{
		return "velocity";
	}
	else if (strcmp($dataName, "Bus Current") == 0)
	{
		return "bus_current";
	}
	else if (strcmp($dataName, "Bus Voltage Upper Limit") == 0)
	{
		return "bus_voltage_upper_limit";
	}
	else if (strcmp($dataName, "Bus Voltage Lower Limit") == 0)
	{
		return "bus_voltage_lower_limit";
	}
	else if (strcmp($dataName, "IPM Temp or Motor Temp") == 0)
	{
		return "ipm_temp_or_motor_temp";
	}
	else
	{
		return "";
	}
}
?>