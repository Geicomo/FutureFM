<html>
<head>
	<title>FutureRadio | 97.3FM</title>    
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
    	<link rel="stylesheet" type="text/css" href="http://futureradio.net/templates/main.css">
   	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    	<?php include('/var/www/html/admin/templates/header.php'); ?>
    	<?php include('/var/www/html/admin/templates/admin.php'); ?>
        <style>
        .blogs-container {
                max-height: 75vh;
                overflow-y: scroll;
        }
        .blog-post {
            max-width: 85vh;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }

        .blog-title {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: -5px;
        }

        .blog-date {
            margin-bottom: -15px;
            font-size: 13px;
            color: #888;
        }

        .blog-content {
            font-size: 16px;
            line-height: 1.4;
        }
        </style>
</head>
<body>
<a style="font-size:18px;">Admin Home</a><br><br>
Welcome to the Admin panel
    <?php
    if ($username === 'Future') {
        echo '<a style="font-size:18px;">Post to the Blog</a><br><br>';
        echo '<label for="blog_title">Title:</label><br>';
        echo '<input type="text" id="blog_title" required><br>';
        echo '<label for="blog_content">Content:</label><br>';
        echo '<textarea id="blog_content" rows="4" cols="50" required></textarea><br>';
        echo '<button id="submit_blog" style="align-items:center;justify-content:center;margin-top:12px;font-size:12px;height:25px;width:60px;float:left;background-color:#34b500;">Submit</button>';
    }
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
<a style="font-size:12px;font-style:italic;">Only the owner can post to the blog</a>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const submitButton = document.getElementById('submit_blog');
            const blogTitle = document.getElementById('blog_title');
            const blogContent = document.getElementById('blog_content');

            submitButton.addEventListener('click', function () {
                const title = blogTitle.value;
                const content = blogContent.value;
                // Send the title and content to the PHP script using AJAX
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Refresh the page after successful submission
                        location.reload();
                    }
                };
                xhr.open('POST', 'http://futureradio.net/blog/posttoblog.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('blog_title=' + encodeURIComponent(title) + '&blog_content=' + encodeURIComponent(content));
            });
        });
</script>
</body>
</html>
