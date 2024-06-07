<?php
session_start();

header('Content-Type: text/plain');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["blog_title"]) && isset($_POST["blog_content"])) {
    // Sanitize and prepare the title and content
    $blogTitle = htmlspecialchars($_POST["blog_title"], ENT_QUOTES, 'UTF-8');
    $blogContent = htmlspecialchars($_POST["blog_content"], ENT_QUOTES, 'UTF-8');

    date_default_timezone_set('America/Boise');
    $blogFilePath = 'blogs.txt';
    $formattedBlogPost = $blogTitle . "\n" . date('jS \of F, Y, g:ia') . "\n" . $blogContent . "\n" . "\n";

    // Using file locking to avoid concurrency issues
    $file = fopen($blogFilePath, 'c+');
    if (flock($file, LOCK_EX)) {  // acquire an exclusive lock
        $existingContent = fread($file, filesize($blogFilePath));  // read existing content
        fseek($file, 0);  // move to the start of the file
        fwrite($file, $formattedBlogPost . $existingContent);  // prepend the new blog post
        ftruncate($file, ftell($file));  // truncate the file to the current length
        flock($file, LOCK_UN);  // release the lock
    } else {
        echo "Could not lock the file for writing.";
        exit;
    }
    fclose($file);

    echo "Blog post added successfully!";
} else {
    echo "Blog post not added. Please ensure all fields are filled correctly.";
}
?>

