<?php
// SQLITE3 database routines

// constant SENSOR_DATA_FILEPATH
require_once "config.inc.php";

function sensorDbOpen() {
    $dsn = sprintf("sqlite:%s", SENSOR_DB_FILEPATH);
    $db = new PDO($dsn, SQLITE3_OPEN_READWRITE);
    return $db;
}

function sensorDbCreate() {
    $dsn = sprintf("sqlite:%s", SENSOR_DB_FILEPATH);
    $db = new PDO($dsn, SQLITE3_OPEN_CREATE);
    $sql = "CREATE TABLE IF NOT EXISTS sensor_data (
        id INTEGER PRIMARY KEY,
        sensor_name TEXT NOT NULL,
        sensor_value REAL NOT NULL,
        sensor_time DATETIME NOT NULL DEFAULT (DATETIME('now','localtime'))
    )";
    $db->exec($sql);
}
