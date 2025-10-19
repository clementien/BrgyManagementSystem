<?php
$host = "127.0.0.1";       // or "localhost"
$user = "root";            // your MariaDB username
$pass = "gandaniriam";   // replace with your actual password
$db   = "brgytest";        // your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the latest row (assuming you only store one summary row)
$sql = "SELECT Total, Male, Female, Seniors, Voters FROM residents WHERE id = 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode([
        "Total" => 0,
        "Male" => 0,
        "Female" => 0,
        "Seniors" => 0,
        "Voters" => 0
    ]);
}



$conn->close();
?>
