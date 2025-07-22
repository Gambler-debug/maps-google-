export async function detectNetworkInfo(info) {
  try {
    const res = await fetch("https://ipinfo.io/json?token=<YOUR_TOKEN>");
    const net = await res.json();

    fetch('/server/gps_logger.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({network: net, info, source: "network"})
    });
  } catch (e) {
    console.error("Network detection failed", e);
  }
}
