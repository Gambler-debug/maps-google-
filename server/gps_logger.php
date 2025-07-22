<?php
// gps_logger.php

$input = json_decode(file_get_contents('php://input'), true);

$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = date("Y-m-d H:i:s");

$log = "=== $timestamp ===\n";
$log .= "IP: $ip\n";
$log .= "Latitude: {$input['lat']}\n";
$log .= "Longitude: {$input['lon']}\n";
$log .= "Accuracy: {$input['accuracy']} meters\n";
$log .= "User Agent: {$input['info']['userAgent']}\n";
$log .= "Screen: {$input['info']['screenWidth']}x{$input['info']['screenHeight']}\n";
$log .= "Timezone: {$input['info']['timezone']}\n";
$log .= "Language: {$input['info']['language']}\n";
$log .= "=============================\n\n";

file_put_contents("logs.txt", $log, FILE_APPEND);
?>

