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

    $username = $userId; // Directly use $userId as the username based on your HTML snippet
    $htpassword = $userData['HTpassword']; // Assuming this structure from your script

    // Append new user credentials
    $htpasswdData .= "$userId:$htpassword\n";
    file_put_contents($htpasswdPath, $htpasswdData);

    $subject = "FutureFM Registration";
    $userEmail = $userData['email']; // Assuming this structure from your script

    $message = "Hello $username. \nYour request to become a user of the FutureFM radio services has been approved. \n\nYou should now be able to go to our stream page at: https://futureradio.net/stream.php and enter your info to listen. Thank you and enjoy listening!";

    // Use escapeshellarg to ensure that arguments are safely passed to the shell
    $safeSubject = escapeshellarg($subject);
    $safeMessage = escapeshellarg($message);
    $safeEmail = escapeshellarg($userEmail);

    $command = "echo $safeMessage | mail -s $safeSubject $safeEmail";

    exec($command, $output, $returnVar);
}
?>

