<?php
	/*

		Variables
	
	*/
	
	// Aero Components
	$frontalArea = 0.79; // m^2
	$coefficientOfDrag = 0.23; // Dimensionless
	
	// Physical Components
	$vehicleMass = 255; // kg --> Inc 80KG for driver
	$tyreDiameter = 0.577; // m
	$tyrePressure = 6; // bar
	
	// Environmental Components
	$airTemperature = 35; // degrees celsius
	$airDensity = 1.17; // kg/m^35
	$raceDistance = 2998; // km
	$gravity = 9.81; // m/s^2
	$inclinePercentGrade = 0; // %
	
	// Solar Array Components
	$solarArrayArea = 5.997; // m^23
	$solarCellEfficiency = 23.9; // %
	$solarPeakPower = 1433.3 // W
	$totalHoursAfterChargeTime = 16.5; // hr
	
	// Battery Components
	$batteryVoltage = 3.6; // V
	$batteryCapacity = 3.35; // Ah
	$batteryWeight = 0.0485; // kg
	$seriesCells = 40; // cells
	$parallelCells = 10; // cells
	$packCaseMass = 4; // kg
	$batteryEfficiency = 99.5; // %
	$targetBatteryCharge = 0; // %
	
	// DC-DC Components
	$brakeLightCount = 8; // lights
	$brakeLightPower = 0.8; // W
	$brakeLightDutyCycle = 10; // %
	$hornCount = 1; // horns
	$hornPower = 3; // W
	$hornDutyCycle = 0.01; // %
	$bmuCount = 1; // bmu
	$bmuPower = 0.72; // W
	$bmuDutyCycle = 10; // %
	$cmuCount = 5; // cmu
	$cmuPower = 0.48; // W
	$cmuDutyCycle = 10; // %
	$oledCount = 1; // oled
	$oledPower = 5 * 0.043; // W
	$oledDutyCycle = 100; // %
	$motorControllerCount = 1; // motorController
	$motorControllerPower = 4.5; // W
	$motorControllerDutyCycle = 100; // %
	$rearVisionCameraCount = 1; // rearVisionCamera
	$rearVisionCameraPower = 0.72; // W
	$rearVisionCameraDutyCycle = 1; // %
	$rearVisionScreenCount = 1; // rearVisionScreen
	$rearVisionScreenPower = 1.44; // W
	$rearVisionScreenDutyCycle = 100; // %
	$indicatorsCount = 6; // indicators
	$indicatorsPower = 0.8; // W
	$indicatorsDutyCycle = 5; // %
	$ethernetRadioCount = 1; // ethernetRadio
	$ethernetRadioPower = 1.7; // W
	$ethernetRadioDutyCycle = 100; // %
	$mpptCount = 4; // mppt
	$mpptPower = 1.2; // W
	$mpptDutyCycle = 100; // %
	$diuCount = 1; // diu
	$diuPower = 2; // W
	$diuDutyCycle = 100; // %
	$dcdcConverterEfficiency = 87.5; // %
	
	// Motor Controller Components
	$motorControllerContinuousEfficiency = 98.2; // %
	$motorContinuousPowerEfficiency = 98.7; // %
	$motorAccelerationEfficiency = 97; // %
	$motorControllerAccelerationEfficiency = 97.5; // %
	$motorTorqueConstantPerPhase = 0.44; // ?
	
	/*
	
		Calculated Variables
		
	*/
	
	// Physical Components
	$tyreRadius = $tyreDiameter / 2; // m
	
	// Solar Components
	$solarAveragePower = $solarPeakPower * 0.707; // W
	
	// Battery Components
	$batteryEnergy = $batteryVoltage * $batteryCapacity; // Wh
	$energyDensity = $batteryEnergy / $batteryWeight; // Wh/kg
	$maximumContinuousDischarge = $batteryCapacity / 2; // A
	$maximumContinuousCharge = $batteryCapacity * 0.3; // A
	$timeToCharge = $batteryCapacity / $maximumContinuousCharge; // hr
	$totalCells = $seriesCells * $parallelCells; // cells
	$packMass = ($totalCells * $batteryWeight) + $packCaseMass; // kg
	$packVoltage = $seriesCells * $batteryVoltage; // V
	$packEnergy = $totalCells * $batteryVoltage * $batteryCapacity; // Wh
	$targetBatteryEnergy = $packEnergy * $targetBatteryCharge / 100; // Wh
	
	// DC-DC Components
	$brakeLightAveragePower = $brakeLightCount * $brakeLightPower * ($brakeLightDutyCycle / 100); // W
	$brakeLightPeakPower = $brakeLightCount * $brakeLightPower; // W
	$hornAveragePower = $hornCount * $hornPower * ($hornDutyCycle / 100); // W
	$hornPeakPower = $hornCount * $hornPower; // W
	$bmuAveragePower = $bmuCount * $bmuPower * ($bmuDutyCycle / 100); // W
	$bmuPeakPower = $bmuCount * $bmuPower; // W
	$cmuAveragePower = $cmuCount * $cmuPower * ($cmuDutyCycle / 100); // W
	$cmuPeakPower = $cmuCount * $cmuPower; // W
	$oledAveragePower = $oledCount * $oledPower * ($oledDutyCycle / 100); // W
	$oledPeakPower = $oledCount * $oledPower; // W
	$motorControllerAveragePower = $motorControllerCount * $motorControllerPower * ($motorControllerDutyCycle / 100); // W
	$motorControllerPeakPower = $motorControllerCount * $motorControllerPower; // W
	$rearVisionCameraAveragePower = $rearVisionCameraCount * $rearVisionCameraPower * ($rearVisionCameraDutyCycle / 100); // W
	$rearVisionCameraPeakPower = $rearVisionCameraCount * $rearVisionCameraPower; // W
	$rearVisionScreenAveragePower = $rearVisionScreenCount * $rearVisionScreenPower * ($rearVisionScreenDutyCycle / 100); // W
	$rearVisionScreenPeakPower = $rearVisionScreenCount * $rearVisionScreenPower; // W
	$indicatorsAveragePower = $indicatorsCount * $indicatorsPower * ($indicatorsDutyCycle / 100); // W
	$indicatorsPeakPower = $indicatorsCount * $indicatorsPower; // W
	$ethernetRadioAveragePower = $ethernetRadioCount * $ethernetRadioPower * ($ethernetRadioDutyCycle / 100); // W
	$ethernetRadioPeakPower = $ethernetRadioCount * $ethernetRadioPower; // W
	$mpptAveragePower = $mpptCount * $mpptPower * ($mpptDutyCycle / 100); // W
	$mpptPeakPower = $mpptCount * $mpptPower; // W
	$diuAveragePower = $diuCount * $diuPower * ($diuDutyCycle / 100); // W
	$diuPeakPower = $diuCount * $diuPower; // W
	
	$dcdcAveragePower = $brakeLightAveragePower + $hornAveragePower + $bmuAveragePower + $cmuAveragePower + $oledAveragePower + $motorControllerAveragePower + $rearVisionCameraAveragePower + $rearVisionScreenAveragePower + $indicatorsAveragePower + $mpptAveragePower + $diuAveragePower; // W
	$dcdcPeakPower = $brakeLightPeakPower + $hornPeakPower + $bmuPeakPower + $cmuPeakPower + $oledPeakPower + $motorControllerPeakPower + $rearVisionCameraPeakPower + $rearVisionScreenPeakPower + $indicatorsPeakPower + $mpptPeakPower + $diuPeakPower; // W
	
	//Motor Components
	$totalAccelerationEfficiency = $batteryEfficiency  * $motorControllerAccelerationEfficiency * $motorAccelerationEfficiency / (100^2); // %
	
	
	
	
	
	
	
	
	
?>