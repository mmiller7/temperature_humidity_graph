#!/bin/bash

_term() {
  echo "Caught SIGTERM signal, terminating rtl_433 SDR process..."
  kill -TERM "$child" 2>/dev/null
}

trap _term SIGTERM

delay=10
echo "`date` - Waiting $delay seconds before starting rtl_433..."
sleep $delay
echo "`date` - Attempting to start rtl_433 and pipe to php..."
# the -M 40 specifies the sensor model
/usr/local/bin/rtl_433  -M newmodel -R 40 -F json -C customary > >(/usr/bin/php /opt/power_meter_graph/rtl_433-to-sqlite.php) &
child=$!

echo "rtl_433 SDR process PID=$child"

wait $child

