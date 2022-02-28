<?php
// functions for sensor_data

require_once "config.inc.php";


function terminate($status_code) {
    http_response_code($status_code);
    exit();
}


function getRemoteAddr() {
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        terminate(400); // Bad Request (or call from cli)
    }
    return $ip;
}


function checkAllowedRemoteAddr($remote_ip) {
    if (in_array('0.0.0.0')) {
        return; // all ips are valid
    }
    if (!in_array($remote_ip, ALLOWED_REMOTE_HOSTS)) {
        terminate(403); // forbidden
    }
}