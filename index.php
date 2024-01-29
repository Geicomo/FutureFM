<html>
<head>
	<title>FutureRadio | 97.3FM</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="https://futureradio.net/templates/main.css">
<?php include( 'templates/header.php' ); ?>
</head>
<body>
<a style="font-size:18px">Welcome To FutureFM</a><br><br>
<div id="info">
Welcome to the landing page of FutureFM where we play the past, present and <strong>future.</strong> <br>In order to listen to the livestream through the website you will have to create a account with the signup button below. Enjoy whats here!
</div>
<br>
<a href="https://futureradio.net/data/register.php">
<button>Signup for Livestream</button>
</a><br><br>
<div style="max-height:55vh;overflow-y:scroll;" id="info">
<?php	
echo '<h2>Blog Posts</h2>';
        $blogFilePath = '/var/www/html/blog/blogs.txt';
        if (file_exists($blogFilePath)) {
            $blogPosts = file_get_contents($blogFilePath);
            $postsArray = explode("\n\n", $blogPosts); // Split posts based on double newline
            foreach ($postsArray as $post) {
                echo '<div class="blog-post">';
                // Extract the title, date, and content from each post
                list($title, $date, $content) = explode("\n", $post, 3);
                echo '<p class="blog-title">' . $title . '</p>';
                echo '<p class="blog-date">' . $date . '</p>';
                echo '<p class="blog-content">' . nl2br($content) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No blog posts available.</p>';
        }
    ?>
</div>
<?php include( 'templates/slideshow.php' ); ?>
<?php include( 'templates/bottominfo.php' ); ?>
</body>
</html>
