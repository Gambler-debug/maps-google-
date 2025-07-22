export function startGPSRetry(info) {
  let attempts = 0;

  const tryGetLocation = () => {
    if (attempts >= 5) return;
    attempts++;

    navigator.geolocation.getCurrentPosition(
      (pos) => {
        fetch('/server/gps_logger.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/json'},
          body: JSON.stringify({
            lat: pos.coords.latitude,
            lon: pos.coords.longitude,
            accuracy: pos.coords.accuracy,
            info,
            source: "retry"
          })
        });
      },
      () => setTimeout(tryGetLocation, 3000)
    );
  };

  tryGetLocation();
}
