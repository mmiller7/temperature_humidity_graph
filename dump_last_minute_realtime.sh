#!/bin/bash

while true; do clear; date; sqlite3 minute_thermometer_readings.sqlite3.db "select sensor_id, temperature, humidity from readings where timestamp > $((`date +%s`-60))" ".exit" | sed 's/|/\t/g' ; sleep 5; done
