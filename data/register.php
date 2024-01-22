<html>
<head>
	<title>FutureRadio | 97.3FM</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="http://futureradio.net/templates/main.css">
<?php include( '/var/www/html/templates/header.php' ); ?>
</head>
<body>
<a style="font-size:18px">Register for FutureFM</a><br><br>
    <form action="write.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Register">

    </form>
<a style="font-weight:18px;"><i>Your account must be approved by a admin <br>before having access to FutureFM livestream.</i></a>
<?php include( '/var/www/html/templates/bottominfo.php' ); ?>
</body>
</html>
