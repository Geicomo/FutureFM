<html>
<head>
        <title>FutureRadio | 97.3FM</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.7">
        <link rel="stylesheet" type="text/css" href="https://futureradio.net/templates/main.css">
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('blogForm');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/blog/posttoblog.php', true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert('Blog post added successfully!');
                    form.reset(); // Reset the form to clear the fields
                } else {
                    alert('Error: ' + xhr.responseText);
                }
            };

            xhr.send(formData);
        });
    });
    </script>

    <h1>Welcome to the Admin Panel</h1>
    <form id="blogForm">
        <label for="blog_title">Title:</label><br>
        <input type="text" id="blog_title" name="blog_title" required><br><br>

        <label for="blog_content">Content:</label><br>
        <textarea id="blog_content" name="blog_content" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Submit Blog Post</button>
    </form>

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
</body>
</html>
