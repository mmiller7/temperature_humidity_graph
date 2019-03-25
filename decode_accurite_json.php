<?php
// Matthew Miller
// 24 Mar 2019
// This parses JSON format to extract temperature readings

/*
Inputs:
				$line

Outputs:
				$rxTimeStr
				$sensorId
				$sensorCh
				$temperature
				$humidity
				$batteryLow
*/

	// Decode the line as JSON data
  $record = json_decode($line);

  if($record !== NULL)
  {
		// Example
		/*
		{
			"time" : "2019-03-24 22:06:13", 
			"model" : "Acurite-Tower", 
			"id" : 13982, 
			"sensor_id" : 13982, 
			"channel" : "A", 
			"temperature_F" : 56.300, 
			"humidity" : 67, 
			"battery_low" : 0
		}
		*/

    // Pull out significant data
    //$rxTimeStr=$record->{'Time'};
    //$meterId=$obj->{'Message'}->{'ID'};
    //$meterKwh=$obj->{'Message'}->{'Consumption'}/100.00;
		$rxTimeStr=$record->{'time'};
		$sensorId=$record->{'id'};
		$sensorCh=$record->{'channel'};
		$temperature==$record->{'temperature_F'};
		//TODO: Maybe make it accept C or F temperature instead of just F
		$humidity=$record->{'hummidity'};
		$batteryLow=$record->{'battery_low'};
  }
?>
