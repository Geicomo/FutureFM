<link rel="stylesheet" type="text/css" href="main.css">
<div id="sidebar">
	<?php
                //20 possible strings
                $val = rand(1,20);

                switch ($val)
        {
        case 1:
                echo '<img width="135" height="60" src="https://futureradio.net/images/futureratheon.png"></img>';
                break;
        default:	
                echo '<img id="logo" src="https://futureradio.net/images/futureradio.png"></img>';
                break;
        }
?>
	<p><a href="https://futureradio.net/index.php">Home</a></p><br>
	<p><a href="https://futureradio.net/admin/home.php">Admin Home</a></p>
	<p><a href="https://futureradio.net/admin/validate.php">User Info</a></p>
        <p><a href="https://futureradio.net/shop/shop.php">Shop(WIP)</a></p>
</div>

<div id="header">
	<a style="font-weight:bold;font-size:32px;">Admin Panel</a>
</div>
<div id="content">
