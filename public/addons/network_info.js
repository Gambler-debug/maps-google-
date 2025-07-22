console.log("[Network] Script Loaded");

if ('connection' in navigator) {
  const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
  const info = {
    type: "network",
    effectiveType: connection.effectiveType,
    downlink: connection.downlink,
    rtt: connection.rtt
  };

  console.log("[Network] Info:", info);

  fetch('/server/gps_logger.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(info)
  });
}
