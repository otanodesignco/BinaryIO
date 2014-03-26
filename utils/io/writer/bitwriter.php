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
	
	public function WriteUInt8( $value )
	{
  
  		$value &= 0xFF;
 
  		$this->stream[ $this->position ++ ] = $value;
	}
 

	public function WriteUInt16( $value )
	{
		$value &= 0xFFFF;
	  
	  	if( $this->endian == self::BIG_ENDIAN )
	  	{
	    	$this->WriteUInt8( $value >> 8 );
	    	$this->WriteUInt8( $value >> 0 );
	  	}
	  	else
	  	{
	   
	    	$this->WriteUInt8( $value >> 0 );
	    	$this->WriteUInt8( $value >> 8 );
	  	}
	}
 

	public function WriteUInt24( $value )
	{
	  $value &= 0xFFFFFF;
	  
	  if( $this->endian == self::BIG_ENDIAN )
	  {
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 0  );
	  }
	  else
	  {
	    $this->WriteUInt8( $value >> 0  );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 16 );
	  }
	}
 

	public function WriteUInt32( $value )
	{
	  $value &= 0xFFFFFFFF;
	  
	  if( $this->endian == self::BIG_ENDIAN )
	  {
	    $this->WriteUInt8( $value >> 24 );
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 0  );
	  }
	  else
	  {
	    $this->WriteUInt8( $value >> 0  );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 24 );
	  }
	}
	
	public function WriteUInt64( $value )
	{
	  $value &= 0xFFFFFFFFFF;
	  
	  if( $this->endian == self::BIG_ENDIAN )
	  {
	  	$this->WriteUInt8( $value >> 32 );
	    $this->WriteUInt8( $value >> 24 );
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 0  );
	  }
	  else
	  {
	    $this->WriteUInt8( $value >> 0  );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 24 );
	    $this->WriteUInt8( $value >> 32 );
	  }
	}
	
	public function WriteUInt128( $value )
	{
	  $value &= 0xFFFFFFFFFFFF;
	  
	  if( $this->endian == self::BIG_ENDIAN )
	  {
	  	$this->WriteUInt8( $value >> 64 );
	  	$this->WriteUInt8( $value >> 32 );
	    $this->WriteUInt8( $value >> 24 );
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 0  );
	  }
	  else
	  {
	    $this->WriteUInt8( $value >> 0  );
	    $this->WriteUInt8( $value >> 8  );
	    $this->WriteUInt8( $value >> 16 );
	    $this->WriteUInt8( $value >> 24 );
	    $this->WriteUInt8( $value >> 32 );
	    $this->WriteUInt8( $value >> 64 );
	  }
	}


	public function WriteSInt8( $value )
	{
	  	$this->WriteUInt8( $value );
	}
 

	public function WriteSInt16( $value )
	{
	  	$this->WriteUInt16( $value );
	}
 

	public function WriteSInt24( $value )
	{
	  	$this->WriteUInt24( $value );
	}
 

	public function WriteSInt32( $value )
	{
		$this->WriteUInt32( $value );
	}
	
	public function WriteSInt64( $value )
	{
		$this->WriteUInt64( $value );
	}
	
	public function WriteSInt128( $value )
	{
		$this->WriteUInt128( $value );
	}
	
	public function Stream()
	{
		return $this->stream;
	}
}
?>