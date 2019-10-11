<?php
	header( "Content-type: image/png" );

	$uname = imagecreatetruecolor( 300, 60 );
	$background = imagecolorallocate( $uname, 255, 255, 255 );
	$text_colour = imagecolorallocate( $uname, 0, 0, 0 );
	imagefilledrectangle($uname, 0, 0, 400, 100, $background);
	$font = './Helvetica.ttf';
	$text=$_SERVER['PHP_AUTH_USER'];
	imagettftext( $uname,40,0,10,45,$text_colour, $font,$text );

	imagepng( $uname );
	imagedestroy( $uname );
?>
