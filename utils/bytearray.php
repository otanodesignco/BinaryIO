<?php
// coverts string into a byte array for the first 128 utf8 / ansci characters

class ByteArray
{
	public $bytes = array();
	
	public function __construct( string $text )
	{
		$bytes = str_split( bin2hex( $text ), 2 );
	}
	
}
?>