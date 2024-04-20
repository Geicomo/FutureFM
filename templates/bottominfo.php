<div style="margin-left:68px;position:fixed;bottom:5;">
<div id="audioPlayer" class="custom-audio-player">
<a style="float:left;font-weight:bold;font-size:14px;">Livestream Output:</a><br>
    <audio id="audioElement" preload="none">
        <source src="https://futureradio.net/stream" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <button id="playPauseBtn">Play</button>
<button id="muteBtn">Mute</button>
    <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.3">
<div style="text-align:left;">
	<a style="text-decoration:none;color:black;" href="https://futureradio.net/stream.php">Login to see the song...</a>
</div>
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

</script>

