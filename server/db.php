<?php
$host = "dpg-d1v4q46r433s73fbo710-a.singapore-postgres.render.com";
$db = "gpslogger_db_le25";
$user = "gpslogger_db_le25_user";
$pass = "gKTLm9wXgT31n1xFgMdqfpvz5R4QCRDP";
$port = "5432";

try {
  $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully!";
} catch (PDOException $e) {
  echo "Database connection failed: " . $e->getMessage();
  exit;
}
?>
