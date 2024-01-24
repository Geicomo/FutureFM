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
	case 2:
                echo '<img width="65" height="85" src="http://futureradio.net/images/futuredebian.png"></img>';
		break;
        default:		
		echo '<img id="logo" src="http://futureradio.net/images/radiofuture.png"></img>';
		break;
        }
?>
	<p><a href="http://futureradio.net/index.php">Home</a></p>
	<p><a href="http://futureradio.net/schedule.php">Schedule</a></p>
	<p><a href="http://futureradio.net/stream.php">Livestream</a></p>
</div>

<div id="header">
	<a style="font-weight:bold;font-size:32px;">Welcome to FutureRadio.net</a>
	<a style="float:right;margin-top:8px;">News: Listening to Future...</a>
</div>
<div id="content">
