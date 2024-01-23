<?php
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Read temp.json
    $tempJson = json_decode(file_get_contents('/var/www/temp.json'), true);
    if (!isset($tempJson[$userId])) {
        echo 'User not found';
        exit;
    }

    // Get user data and remove from temp.json
    $userData = $tempJson[$userId];
    unset($tempJson[$userId]);

    // Update temp.json
    file_put_contents('/var/www/temp.json', json_encode($tempJson, JSON_PRETTY_PRINT));

    // Read and update data.json
    $dataJsonPath = '/var/www/data.json';
    $dataJson = file_exists($dataJsonPath) ? json_decode(file_get_contents($dataJsonPath), true) : [];
    $dataJson[$userId] = $userData;
    file_put_contents($dataJsonPath, json_encode($dataJson, JSON_PRETTY_PRINT));

    // Update .htpasswd file
    $htpasswdPath = '/var/www/html/stream/.htpasswd';
    $htpasswdData = file_exists($htpasswdPath) ? file_get_contents($htpasswdPath) : '';
    
    // Assuming 'username' and 'HTpassword' are keys in the user data
    $htpassword = $userData['HTpassword'];

    // Append new user credentials
    $htpasswdData .= "$userId:$htpassword\n";
    file_put_contents($htpasswdPath, $htpasswdData);

    echo 'User processed';
}
?>

