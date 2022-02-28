<?php
// config for sensor data
// this file holds the config for the sensor_data project
// copy it from config.inc.php.sample

// path and database name for "sensor_data"
const SENSOR_DB_FILEPATH = 'db/sensor_data.db'; // change to absolute path if necessary

// ip addresses from devices which are allowed to access the sensor_data functionality
// if 0.0.0.0 is in list all ips are valid !
const ALLOWED_REMOTE_HOSTS = array(
    '0.0.0.0'
);
