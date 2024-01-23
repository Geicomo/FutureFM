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

    <div style="text-align:left;" id="currentSong">Loading...</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var audio = document.getElementById('audioElement');
    var playPauseBtn = document.getElementById('playPauseBtn');
    var progressBar = document.getElementById('progressBar');
    var currentTimeElem = document.getElementById('currentTime');
    var durationTimeElem = document.getElementById('durationTime');

    var muteBtn = document.getElementById('muteBtn');
    var volumeSlider = document.getElementById('volumeSlider');

    // Mute and unmute audio
    muteBtn.addEventListener('click', function() {
        if (audio.muted) {
            audio.muted = false;
            muteBtn.textContent = 'Mute';
            volumeSlider.value = audio.volume;
        } else {
            audio.muted = true;
            muteBtn.textContent = 'Unmute';
            volumeSlider.value = 0;
        }
    });

    // Update the audio volume
    volumeSlider.addEventListener('input', function() {
        audio.volume = this.value;
        muteBtn.textContent = audio.volume > 0 ? 'Mute' : 'Unmute';
    });

    // Play or pause the audio
    playPauseBtn.addEventListener('click', function() {
        if (audio.paused) {
            audio.play();
            playPauseBtn.textContent = 'Pause';
        } else {
            audio.pause();
            playPauseBtn.textContent = 'Play';
        }
    });
});

        // Function to fetch and display the current song
        function fetchCurrentSong() {
            fetch('http://futureradio.net/data/current_song.php')
                .then(response => response.json())
                .then(data => {
                    if (data.current_song) {
                        document.getElementById('currentSong').textContent = data.current_song;
                    } else {
                        document.getElementById('currentSong').textContent = 'No song is currently playing.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('currentSong').textContent = 'Error fetching song.';
                });
        }

        // Fetch the current song every 5 seconds
        setInterval(fetchCurrentSong, 5000);

        // Fetch the current song when the page loads
        document.addEventListener('DOMContentLoaded', fetchCurrentSong);

</script>
<div style="position:fixed;bottom:0">
    <a>All content is owned by <a href="https://geicomo.com/geicomoterms.pdf">Geicomo.com</a>. All rights reserved. </a>
</div>
</body>
</html>
