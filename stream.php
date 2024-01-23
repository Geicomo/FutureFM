<html>
<head>
	<title>FutureRadio | 97.3FM</title>	
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="http://futureradio.net/templates/main.css">
	<?php include( 'templates/header.php' ); ?>
</head>
<body>
	<a style="font-size:18px">Future Radio 97.3FM</a><br><br>
<div id="info">
	<a>Below is the livestream of Future Radio 97.3.</a><br>
	<a style="font-size:13px"><i>Radio is delayed by about 5 seconds.</i></a><br><br>
</div><br>
	<a style="font-weight:bold;">Live Stream Output:</a><br>
<div style="margin-left:0px;"id="audioPlayer" class="custom-audio-player">
    <audio id="audioElement" autoplay>
        <source src="http://160.2.162.241/stream" type="audio/mpeg">
        <a id="error">Your browser does not support the audio element.</a>
    </audio>
    <button id="playPauseBtn">Play</button>
<button id="muteBtn">Mute</button>
    <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.3">
    <div id="currentSong">Loading current song...</div>
    <div id="elapsedTime"></div>
    <div id="songProgressContainer" style="width: 100%; background-color: #ddd;">
        <div id="songProgressBar" style="height: 5px; width: 0%; background-color: #4CAF50;"></div>
</div>

<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required';
    exit;
} else {
include( '/var/www/html/stream/stream.php' ); 
}
?>

<div style="position:fixed;bottom:0">
    <a>All content is owned by <a href="https://geicomo.com/geicomoterms.pdf">Geicomo.com</a>. All rights reserved. </a>
</div>
</body>
</html>
