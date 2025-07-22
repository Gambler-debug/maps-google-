<?php
include("db.php");

$data = json_decode(file_get_contents("php://input"), true);
$ip = $_SERVER['REMOTE_ADDR'];
$lat = $data['latitude'] ?? '';
$lon = $data['longitude'] ?? '';
$acc = $data['accuracy'] ?? '';
$agent = $_SERVER['HTTP_USER_AGENT'];

$stmt = $pdo->prepare("INSERT INTO location_logs (ip_address, latitude, longitude, accuracy, user_agent) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$ip, $lat, $lon, $acc, $agent]);

echo json_encode(["status" => "success"]);
?>
