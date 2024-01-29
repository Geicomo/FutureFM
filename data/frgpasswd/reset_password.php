<html>
<head>
        <title>FutureRadio | 97.3FM</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="https://futureradio.net/templates/main.css">
<?php include( '/var/www/html/templates/header.php' ); ?>
</head>
<body>
<?php
// Path to your JSON file
$jsonFilePath = '/var/www/data.json';
$htpasswdPath = '/var/www/html/stream/.htpasswd'; // Path to the .htpasswd file

function isTokenValid($username, $token, $jsonFilePath) {
    $jsonData = json_decode(file_get_contents($jsonFilePath), true);

    if (isset($jsonData[$username])) {
        $user = $jsonData[$username];
        if ($user['resetToken'] === $token && new DateTime() < new DateTime($user['tokenExpiration'])) {
            return true;
        }
    }
    return false;
}

function updatePasswordInHtpasswd($username, $newHTPassword, $htpasswdPath) {
    $htpasswdContent = file($htpasswdPath);
    $updatedContent = [];
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    foreach ($htpasswdContent as $line) {
        if (strpos($line, $username . ':') === 0) {
            $updatedContent[] = $username . ':' . $hashedPassword . "\n";
        } else {
            $updatedContent[] = $line;
        }
    }

    file_put_contents($htpasswdPath, implode('', $updatedContent));
}

function updatePassword($username, $newPassword, $jsonFilePath) {
    $jsonData = json_decode(file_get_contents($jsonFilePath), true);
    $salt = bin2hex(random_bytes(3));
    $hashedPassword = hash('sha256', $newPassword . $salt);

    $jsonData[$username]['password'] = $hashedPassword;
    $jsonData[$username]['salt'] = $salt;
    unset($jsonData[$username]['resetToken']); // Remove the token
    unset($jsonData[$username]['tokenExpiration']); // Remove the expiration

    file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));
}

$token = $_GET['token'] ?? '';
$username = $_GET['user'] ?? '';

if (isTokenValid($username, $token, $jsonFilePath)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $newPassword = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($newPassword === $confirmPassword) {
		updatePassword($username, $newPassword, $jsonFilePath);
		updatePasswordInHtpasswd($username, $newHTPassword, $htpasswdPath);
            echo "<strong>Password updated successfully.</strong>";
		?>
<script>
setTimeout(function() {
            window.location.href = "https://futureradio.net/index.php";
        }, 4000);
</script>
<?php
	} else {
            echo "Passwords do not match.";
        }
    } else {
?>
<form action="" method="post">
	<a style="font-weight:bold;">Passwords must match</a><br>
	<a>New Password:<input type="password" name="password" required></a><br>
	<a>Confirm Password: <input type="password" name="confirm_password" required></a><br>
	<input type="submit" value="Reset Password">
</form>
<?php
    }
} else {
    echo "Invalid or expired token.";
}

?>
<?php include( '/var/www/html/templates/bottominfo.php' ); ?>
</body>
</html>


