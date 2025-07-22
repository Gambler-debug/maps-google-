console.log("[Battery] Script Loaded");

navigator.getBattery().then(function(battery) {
  const level = battery.level * 100;
  console.log("[Battery] Level:", level + "%");

  fetch('/server/gps_logger.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ type: "battery", level: level })
  });
});
