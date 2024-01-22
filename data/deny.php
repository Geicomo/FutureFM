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

}
?>

