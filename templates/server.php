<?php
$file = 'count.json';

// Use file locking to avoid race conditions
$fp = fopen($file, 'c+');
if (flock($fp, LOCK_EX)) { // acquire an exclusive lock
    $countData = json_decode(fread($fp, filesize($file)), true);
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action === 'increase') {
        $countData['count']++;
    } elseif ($action === 'decrease') {
        $countData['count'] = max(0, $countData['count'] - 1);
    }

    // Truncate file and update count
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($countData));
    fflush($fp); // flush output before releasing the lock
    flock($fp, LOCK_UN); // release the lock
} else {
    echo 'Could not get the lock';
}

fclose($fp);

echo json_encode($countData);
?>

