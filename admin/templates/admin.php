<?php
session_start();

$username = $_SESSION['username'];

$jsonString = file_get_contents('/var/www/data.json');

if ($jsonString === false) {
    echo "Error reading data.json";
    exit;
}

// Decode the JSON string into a PHP array
$userData = json_decode($jsonString, true);

// Check if the decoding was successful
if (is_null($userData)) {
    echo "Error decoding JSON data";
    exit;
}

// Check if the user exists in the data
if (!isset($userData[$username])) {
        header('Location: error.php');
        exit;
}

// Extract the user's privileges
$userPrivileges = $userData[$username]['privileges'];

if($userPrivileges != "admin") {
        header('Location: error.php');
        exit;
} else {

}
?>
