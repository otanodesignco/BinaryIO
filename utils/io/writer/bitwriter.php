<?php

class BitWriter
{
	const BIG_ENDIAN = "Big";
	
	private $stream;
	private $endian;
	private $position;
	
	public function __construct( Output $data )
	{
		$this->stream = $data->Stream();
		$this->endian = $data->Endianness();
		$this->position = 0;
	}
	// Writes an unsigned 8-bit integer
	public function WriteU8( $value )
	{
  // Ensures the $value is unsigned and within an 8-bit range
  		$value &= 0xFF;
  // Add the $value to the stream and increase the __position property.
  		$this->stream[ $this->position ++ ] = $value;
	}
 
// Writes an unsigned 16-bit integer
	public function WriteU16( $value )
	{
		$value &= 0xFFFF;
	  // Endianness needs to be handled for multiple-byte values
	  	if( $this->endian == self::BIG_ENDIAN )
	  	{
	    	$this->WriteU8( $value >> 8 );
	    	$this->WriteU8( $value >> 0 );
	  	}
	  	else
	  	{
	    // LITTLE_ENDIAN
	    	$this->WriteU8( $value >> 0 );
	    	$this->WriteU8( $value >> 8 );
	  	}
	}
 
// Write an unsigned 24-bit integer
	public function WriteU24( $value )
	{
	  $value &= 0xFFFFFF;
	  
	  if( $this->endian == self::BIG_ENDIAN )
	  {
	    $this->WriteU8( $value >> 16 );
	    $this->WriteU8( $value >> 8  );
	    $this->WriteU8( $value >> 0  );
	  }
	  else
	  {
	    $this->WriteU8( $value >> 0  );
	    $this->WriteU8( $value >> 8  );
	    $this->WriteU8( $value >> 16 );
	  }
	}
 
// Writes an unsigned 32-bit integer
	public function WriteU32( $value )
	{
	  $value &= 0xFFFFFFFF;
	  
	  if( $this->endian == self::BIG_ENDIAN )
	  {
	    $this->WriteU8( $value >> 24 );
	    $this->WriteU8( $value >> 16 );
	    $this->WriteU8( $value >> 8  );
	    $this->WriteU8( $value >> 0  );
	  }
	  else
	  {
	    $this->WriteU8( $value >> 0  );
	    $this->WriteU8( $value >> 8  );
	    $this->WriteU8( $value >> 16 );
	    $this->WriteU8( $value >> 24 );
	  }
	}

// Writes a signed 8-bit $value
	public function WriteS8( $value )
	{
	  	$this->WriteU8( $value );
	}
 
// Writes a signed 16-bit $value
	public function WriteS16( $value )
	{
	  	$this->WriteU16( $value );
	}
 
// Writes a signed 24-bit $value
	public function WriteS24( $value )
	{
	  	$this->WriteU24( $value );
	}
 
// Writes a signed 32-bit $value
	public function WriteS32( $value )
	{
		$this->WriteU32( $value );
	}
	
	public function Stream()
	{
		return $this->stream;
	}
}
?>