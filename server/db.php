<?php
$dotenv = parse_ini_file(__DIR__ . '/.env');

$dsn = "pgsql:host={$dotenv['DB_HOST']};port={$dotenv['DB_PORT']};dbname={$dotenv['DB_NAME']}";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $dotenv['DB_USER'], $dotenv['DB_PASS'], $options);
} catch (PDOException $e) {
    error_log("DB Connection Error: " . $e->getMessage());
    die("Database error.");
}
?>
