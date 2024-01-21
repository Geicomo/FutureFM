<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($password)) {
$filePath = "/var/www/temp.json";

$password = filter_var($password, FILTER_SANITIZE_STRING);
$username = filter_var($username, FILTER_SANITIZE_STRING);

$hta_password = crypt($password, base64_encode($password));

if (file_exists($filePath)) {
    $jsonData = file_get_contents($filePath);
    $credentials = json_decode($jsonData, true);
} else {
    // Initialize an empty array if the file doesn't exist
    $credentials = array();
}

        date_default_timezone_set('America/Los_Angeles');
        $registrationTime = date('m-d-Y h:i:s a');

        $salt = bin2hex(random_bytes(3));
        $encrypted_password = hash('sha256', $password . $salt);

// Append the new credentials
$credentials[$username] = array(
        "password" => $encrypted_password,
        "salt" => $salt,
        "email" => $email,
        "htaPassword" => $hta_password,
        "privileges" => "default",
	"registrationTime" => $registrationTime
);
// Convert the updated array back to JSON
$jsonData = json_encode($credentials, JSON_PRETTY_PRINT);

// Write the updated JSON data back to the file
if (file_put_contents($filePath, $jsonData)) {
    echo "Credentials wrote successfully";
} else {
    echo "Error appending credentials";
}
    } else {
        echo "Please fill in all fields.";
    }
}
?>
