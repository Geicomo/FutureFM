<link rel="stylesheet" type="text/css" href="main.css">
<div id="sidebar">
	<?php
                //20 possible strings
                $val = rand(1,20);

                switch ($val)
        {
        case 1:
                echo '<img width="135" height="60" src="http://futureradio.net/images/futureratheon.png"></img>';
                break;
        default:	
                echo '<img id="logo" src="http://futureradio.net/images/radiofuture.png"></img>';
                break;
        }
?>
	<p><a href="http://futureradio.net/index.php">Home</a></p><br>
	<p><a href="http://futureradio.net/admin/home.php">Admin Home</a></p>
	<p><a href="http://futureradio.net/admin/validate.php">User Info</a></p>
</div>

<div id="header">
	<a style="font-weight:bold;font-size:32px;">Admin Panel</a>
</div>
<div id="content">
