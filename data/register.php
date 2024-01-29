<?php require("register.class.php") ?>
<?php
        if(isset($_POST['submit'])){
                $user = new RegisterUser($_POST['username'], $_POST['password'], $_POST['email']);
        }
?>
<html>
<head>
	<title>FutureRadio | 97.3FM</title>
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="https://futureradio.net/templates/main.css">
<?php include( '/var/www/html/templates/header.php' ); ?>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
	<a style="font-family:courier;font-size:37px"><strong>Register</strong></a>
        	<p>All fields are <span>required</span></p>
             	<label>Username</label><br>
                <input type="text" name="username"><br>
                <label>Email</label><br>
                <input type="email" name="email"><br>
            	<label>Password</label><br>
		<input type="password" name="password"><br><br>
		<a style="font-size:14px;"href="https://futureradio.net/data/frgpasswd/frgpasswd.php">Forgot Password...</a><br>
		<a href="https://futureradio.net/index.php"><button type="button">Back</button></a>
		<button type="submit" name="submit">Register</button>
		<p class="success"><?php echo @$user->success ?></p>
        	<p class="error"><?php echo @$user->error ?></p>
		<a style="font-size:12px;">By registering a account you accept the <a style="font-size:12px;" href="https://geicomo.com/geicomoterms.pdf">Terms & Conditions</a><a style="font-size:12px;"> of futureradio.net</a></a><br><br>
		<a style="font-weight:bold;font-size:15px;">A admin must manually approve your account before<br> granted access to the livestream</a><br>
	</div>
</form>
<script>
    // Check for the presence of the success message
    var successMessage = "<?php echo @$user->success; ?>";

    if (successMessage) {
        // If there's a success message, wait for 2 seconds and then redirect
        setTimeout(function() {
            window.location.href = "https://futureradio.net/index.php";
        }, 2000);
    }
</script>

<?php include( '/var/www/html/templates/bottominfo.php' ); ?>
</body>
</html>
