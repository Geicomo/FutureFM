<?php
header('Content-Type: application/json');

// Execute the 'mpc current' command
$command = shell_exec('mpc current');

$output = "Current Song: " . $command;
// Check if output is empty (no song playing)
if (empty($output)) {
    echo json_encode(['error' => 'No song is currently playing.']);
} else {
    echo json_encode(['current_song' => $output]);
}
?>

