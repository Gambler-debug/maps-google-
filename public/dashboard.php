<?php
echo "Your IP: " . $_SERVER['REMOTE_ADDR'];
exit;


include("../server/db.php");

// Fetch all location logs
$stmt = $pdo->query("SELECT * FROM location_logs ORDER BY timestamp DESC");
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>GPS Dashboard</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
    h1 { color: #333; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    th { background-color: #eee; }
  </style>
</head>
<body>
  <h1>📍 GPS Tracking Logs</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>IP</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Accuracy</th>
      <th>User Agent</th>
      <th>Time</th>
    </tr>
    <?php foreach ($logs as $log): ?>
    <tr>
      <td><?= htmlspecialchars($log['id']) ?></td>
      <td><?= htmlspecialchars($log['ip_address']) ?></td>
      <td><?= htmlspecialchars($log['latitude']) ?></td>
      <td><?= htmlspecialchars($log['longitude']) ?></td>
      <td><?= htmlspecialchars($log['accuracy']) ?></td>
      <td><?= htmlspecialchars($log['user_agent']) ?></td>
      <td><?= htmlspecialchars($log['timestamp']) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
