export function getBatteryAndSensors(info) {
  if (navigator.getBattery) {
    navigator.getBattery().then(battery => {
      const data = {
        charging: battery.charging,
        level: battery.level
      };

      fetch('/server/gps_logger.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({battery: data, info, source: "battery"})
      });
    });
  }

  window.addEventListener('deviceorientation', (event) => {
    const orientation = {
      alpha: event.alpha,
      beta: event.beta,
      gamma: event.gamma
    };

    fetch('/server/gps_logger.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({orientation, info, source: "orientation"})
    });
  });
}
