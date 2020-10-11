<?php 
function display_greeting() {
    
    date_default_timezone_set("Asia/Colombo");
    $am = date("a");
    $hour = date("G");
	
	if ($hour >= 0 and $hour <= 11) {
		echo "Good Morning Admin !";
	} elseif ($hour >= 12 and $hour <=17) {
		echo "Good Afternoon Admin !";
	}else {
		echo "Good Evening Admin !";
	}

	echo "\n The time is " . date("h:i:a");
}

?>