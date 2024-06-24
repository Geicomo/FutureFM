    <button id="toggle-sidebar">☰</button>
    <div id="sidebar">
        <?php
            $val = rand(1, 10);
            switch ($val) {
                case 1:
                    echo '<img width="135" height="60" src="https://futureradio.net/images/futureratheon.png" alt="Image 1">';
                    break;
                case 2:
                    echo '<img width="65" height="85" src="https://futureradio.net/images/futuredebian.png" alt="Image 2">';
                    break;
                default:
                    echo '<img id="logo" src="https://futureradio.net/images/futureradio.png" alt="Logo">';
                    break;
            }
        ?>
        <p><a href="https://futureradio.net/index.php">Home</a></p><br>
        <p><a href="https://futureradio.net/shop/shop.php">Shop Home</a></p>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    toggleButton.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        content.classList.toggle('sidebar-active');
    });
});
</script>

    <div id="header">
        <a id="welcometext">FutureRadio.net Shop</a>
        <div id="news">
            <?php
                $val = rand(1, 5);
                switch ($val) {
                    case 1:
                        echo '<a>News: BAOFENG-UV5R on sale now!</a>';
                        break;
                    case 2:
                        echo '<a>News: Sponsored by Benadyrl</a>';
                        break;
                    default:
                        echo '<a>News: Streaming music from 2077...</a>';
                        break;
                }
            ?>
        </div>
    </div>
    <div id="content">
