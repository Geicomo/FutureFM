<html>
<head>
	<title>FutureRadio | 97.3FM</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="https://futureradio.net/templates/main.css">
<?php include( '/var/www/html/templates/header.php' ); ?>
</head>
<body>

                <a style="font-weight:bold;font-size:17px;">Reset Password</a>
                        <form action="send_email.php" method="post">
                                <label for="email">Enter your email:</label>
                                <input type="email" id="email" name="email" required>
                                <input type="submit" value="Submit">
                        </form>

<?php include( '/var/www/html/templates/bottominfo.php' ); ?>
</body>
</html>
