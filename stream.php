<html>
<head>
	<title>FutureRadio</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="http://futureradio.net/templates/main.css">
	<?php include( 'templates/header.php' ); ?>
</head>
<body>
	<a style="font-size:18px">Future Radio 97.3FM</a><br><br>
	<a>Below is the livestream of Future Radio 97.3.</a><br>
	<a style="font-size:13px"><i>Radio is delayed by about 5 seconds.</i></a><br><br>
	<a style="font-weight:bold;">Live Stream Output:</a><br>
	<audio controls autoplay>
		<source src="http://160.2.162.241/stream" type="audio/mpeg">
		<a style="color:red">Your browser type does not support the live radio function.</a><br>
	</audio><br>
	<?php include( 'templates/bottominfo.php' ); ?>
</body>
</html>
