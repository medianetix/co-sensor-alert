<?php
// write sensor data into sqlite3 database
// request [GET] = http://192.168.80.77/sensor_write.php/sensor/10.0 
// -> _SERVER[PATH_INFO]=/sensor/10.0
// we expect a sensor_name and a sensor_value in PATH_INFO
// pattern: /{sensor_name}/{sensor_value} -> /sensor/10.0

require_once "config.inc.php";
require_once "db.inc.php";
require_once "funcs.inc.php";

// try to keep the bad guys out
checkAllowedRemoteAddr(getRemoteAddr());

$regex_pattern = '~^/([a-zA-Z][a-zA-Z0-9_.]*)/([\d]+\.?[\d]*)$~';
$matches = [];

// check if request (url) is not malformed
if (array_key_exists('PATH_INFO', $_SERVER) && preg_match($regex_pattern, $_SERVER['PATH_INFO'], $matches)) {
    
    // results are in $matches if successful
    list(, $sensor_name, $sensor_value) = $matches;
    try {

        $db = sensorDbOpen();
        $sql = sprintf("INSERT INTO sensor_data (sensor_name, sensor_value) VALUES ('%s', %s);", $sensor_name, $sensor_value);
        $db->exec($sql);

    } catch(Exception $e) {

        // ...something went wrong, status code 500: Internal Server Error
        terminate(500);
    }

    // successful operation, status code 200: OK
    terminate(200);

} else {
    
    // malformed url, send status code 400: Bad Request
    terminate(400);

}
