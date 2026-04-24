<!DOCTYPE html>
<html>
<head>
    <title>Live Server Time</title>
</head>
<body>

<h1>Current Server Time:</h1>
<h2 id="time">Loading...</h2>

<script>
function fetchTime() {
    fetch('timee.php')   // call PHP file
        .then(response => response.text())
        .then(data => {
            document.getElementById('time').innerHTML = data;
        });
}

// Call every 2 seconds
setInterval(fetchTime, 2000);

// Call once immediately
fetchTime();
</script>

</body>
</html>