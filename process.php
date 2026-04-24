<?php


$username = $_POST["username"];
$password = $_POST["password"];


echo "<h2>Data Received</h2>";
echo "Username: " . $username . "<br>";

if ($password == "1234") {
    echo "Password is correct!";
} else {
    echo "Wrong password!";
}



?>