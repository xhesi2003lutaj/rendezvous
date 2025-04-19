document.addEventListener('DOMContentLoaded', function () {
    // Initialize the map
    var map = L.map('map').setView([0, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    // Fetch the client's IP address from api.ipify.org
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            // Extract the IP address
            var ipAddress = data.ip;

            // Fetch location information from ipinfo.io using the obtained IP address
            return fetch(`https://ipinfo.io/${ipAddress}?token=388e1ec2315d08`);
        })
        .then(response => response.json())
        .then(data => {
            // Extract coordinates from ipinfo.io response
            var [lat, lon] = data.loc.split(',').map(Number);

            // Display the map centered on the client's location
            map.setView([lat, lon], 13);

            // Add a marker with a callout displaying the IP address
            var marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(`<b>IP Address:</b> ${data.ip}`).openPopup();

            // Display IP information
            document.getElementById('ip-info').innerHTML = `<b>IP Address:</b> ${data.ip}<br><b>Location:</b> ${data.city}, ${data.region}, ${data.country}`;
        })
        .catch(error => console.error('Error fetching IP information:', error));
});