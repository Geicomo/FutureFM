<?php
include("login.class.php");
session_start();

if(isset($_POST['submit'])){
    $user = new LoginUser($_POST['username'], $_POST['password']);
}
?>
<html>
<head>
	<title>FutureRadio | 97.3FM</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="http://futureradio.net/templates/main.css">
<?php include( '/var/www/html/templates/header.php' ); ?>
</head>
<body>
<a style="font-size:18px">Admin Login Panel</a><br><br>

<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="container">
                <label>Username</label>
        </div>
        <div class="container">
                <input type="text" name="username">
        </div>
        <div class="container">
                <label>Password</label>
        </div>
        <div class="container">
                <input type="password" name="password"><br>
        </div>
<br>
		<button type="submit" name="submit">Sign In</button>
<br>
        <div class="container"><p class="error"><?php echo @$user->error ?></p></div>
        <div class="container"><p class="success"><?php echo @$user->success ?></p></div>
</form>

<?php include( '/var/www/html/templates/bottominfo.php' ); ?>
</body>
</html>
