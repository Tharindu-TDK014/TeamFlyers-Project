<?php 
function display_greeting() {
 
	function timezone_offset_string( $offset )
	{
		return sprintf( "%s%02d:%02d", ( $offset >= 0 ) ? '+' : '-', abs( $offset / 3600 ), abs( $offset % 3600 ) );
	}

	$offset = timezone_offset_get( new DateTimeZone('America/Winnipeg'), new DateTime() );
	echo "offset: " . timezone_offset_string( $offset ) . "\n";
	
	if ($offset >= 0 and $offset <= 11) {
		echo "Good Morning Admin !";
	} elseif ($offset >= 12 and $offset <=17) {
		echo "Good Afternoon Admin !";
	}else {
		echo "Good Evening Admin !";
	}
}

?>