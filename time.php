<?php
// Set the timezone
date_default_timezone_set("Asia/Kolkata");

// Get current hour (0–23)
$currentHour = date("H");

// Determine greeting
if ($currentHour >= 5 && $currentHour < 12) {
    $greeting = "Good Morning";
} elseif ($currentHour >= 12 && $currentHour < 17) {
    $greeting = "Good Afternoon";
} elseif ($currentHour >= 17 && $currentHour < 21) {
    $greeting = "Good Evening";
} else {
    $greeting = "Good Night";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Greeting</title>
</head>
<body>

<h1><?php echo $greeting; ?>, Welcome to Our Website!</h1>
<p>The current time is: <?php echo date("h:i A"); ?></p>

</body>
</html>