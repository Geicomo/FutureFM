<html>
<head>
	<title>FutureRadio | 97.3FM</title>    
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
    	<link rel="stylesheet" type="text/css" href="http://futureradio.net/templates/main.css">
   	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    	<?php include('/var/www/html/templates/header.php'); ?>
    	<?php include('/var/www/html/admin/templates/admin.php'); ?>
<style>
        .green-box, .red-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .green-box { background-color: green; }
        .red-box { background-color: red; }
</style>
</head>
<body>
<?php
$jsonString = file_get_contents('/var/www/temp.json');

if ($jsonString === false) {
    echo "Error reading json";
    exit;
}

$userData = json_decode($jsonString, true);

if (is_null($userData)) {
    echo "Error decoding JSON data";
    exit;
}
?>

    <a style="font-size:18px">Validate Users for FutureFM</a><br><br>
    <?php foreach ($userData as $userId => $userDetails): ?>
        <div id="user-<?php echo $userId; ?>">
            <strong>Username: </strong><?php echo $userId; ?><br>
            <strong>HTpassword: </strong><?php echo $userDetails['htPassword']; ?><br>
            <strong>Email: </strong><?php echo $userDetails['email']; ?><br>
            <strong>Registration-Time: </strong><?php echo $userDetails['registrationTime']; ?><br>
            <div class="green-box" onclick="processUser('<?php echo $userId; ?>')"></div>
            <div class="red-box"></div>
            <br><br>
        </div>
    <?php endforeach; ?>
    <script>
        function processUser(userId) {
            $.ajax({
	    url: 'http://futureradio.net/data/allow.php',
                type: 'POST',
                data: { 'userId': userId },
                success: function(response) {
                    // Remove user div on success
                    $('#user-' + userId).remove();
                }
            });
        }
    </script>
<br><br>
<a style="font-size:16px;"><i><strong>.htapasswd</strong> accounts must be like "test:dGRkPurkuWmW2" on a new line...</i></a>
<?php include( '/var/www/html/templates/bottominfo.php' ); ?>
</body>
</html>
