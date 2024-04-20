<div id="sidebar">
	<?php
                //20 possible strings
                $val = rand(1,20);

                switch ($val)
        {
        case 1:
                echo '<img width="135" height="60" src="https://futureradio.net/images/futureratheon.png"></img>';
		break;
	case 2:
                echo '<img width="65" height="85" src="https://futureradio.net/images/futuredebian.png"></img>';
		break;
        default:		
		echo '<img id="logo" src="https://futureradio.net/images/futureradio.png"></img>';
		break;
        }
?>
	<p><a href="https://futureradio.net/index.php">Home</a></p>
	<p><a href="https://futureradio.net/schedule.php">Schedule</a></p>
	<p><a href="https://futureradio.net/stream.php">Livestream</a></p>
	<p><a href="https://futureradio.net/contact.php">Contact</a></p>
	<img style="margin-top:65vh;" src="https://futureradio.net/images/vim.jpg"></img>
</div>

<div id="header">
	<a style="font-weight:bold;font-size:32px;">Welcome to FutureRadio.net</a>
	<a style="float:right;margin-top:8px;margin-right:-15vh;">News: Capturing music from 2077...</a>
</div>
<div style="position:absolute;bottom:0;margin-left:18vh;">
<a>All content is licensed under </a><a href="https://creativecommons.org/licenses/by-nc/4.0/?ref=chooser-v1%20unless%20otherwise%20posted.">CC BY-NC 4.0 DEED</a><a> unless otherwise posted.</a>
</div>
<div id="content">
