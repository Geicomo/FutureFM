<?php
header('Content-Type: application/json');

// Get the current song details
$currentSongDetails = shell_exec('mpc current');
// Get the status to extract elapsed time
$mpcStatus = shell_exec('mpc status');

// Parsing the current song details
$currentSong = $currentSongDetails ? trim($currentSongDetails) : 'No song is currently playing';

// Parsing the elapsed time from the status
$matches = [];
preg_match('/\[\w+\] #\d+\/\d+   (\d+:\d+)\/(\d+:\d+) \(\d+%\)/', $mpcStatus, $matches);
$elapsedTime = $matches[1] ?? 'unknown';
$duration = $matches[2] ?? 'unknown';

echo json_encode(['current_song' => $currentSong, 'elapsed_time' => $elapsedTime, 'duration' => $duration]);
?>

