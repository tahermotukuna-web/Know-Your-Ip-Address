document.addEventListener("DOMContentLoaded", function() {
    fetch('index.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('ip-address').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching IP address:', error);
            document.getElementById('ip-address').innerHTML = 'Unable to retrieve IP address.';
        });
});