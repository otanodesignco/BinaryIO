<?php

class BitReader
{
	const BIG_ENDIAN = "Big";
	
	private $stream;
	private $length;
	private $endian;
	private $position;
	
	public function __construct( Input $stream )
	{
		$this->stream = $stream->Stream();
		$this->length = $stream->Length();
		$this->endian = $stream->Endianness();
		$this->position = 0;
	}
	
	public function ReadUInt8()
	{
		if( $this->position >= $this->length )
		{
			throw Exception("End of Stream");
		}
		
		return $this->stream[ $this->position ++ ];
	}
	
	public function ReadUInt16()
	{
		$value = 0;
		
		if( $this->endian == self::BIG_ENDIAN )
		{
			$value |= $this->ReadUInt8() << 8 ;
			$value |= $this->ReadUInt8() << 0;
		}
		else
		{
			$value |= $this->ReadUInt8() << 0;
			$value |= $this->ReadUInt8() << 8;
		}
		
		return $value;
	}
	public function ReadUInt24()
	{
		$value = 0;
		
		if( $this->endian == self::BIG_ENDIAN )
		{
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 0;
		}
		else
		{
			$value |= $this->ReadUInt8() << 0;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 16;
		}
		
		return $value;
	}
	
	public function ReadUInt32()
	{
		$value = 0;
		
		if( $this->endian == self::BIG_ENDIAN )
		{
			$value |= $this->ReadUInt8() << 24;
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 0;
		}
		else
		{
			$value |= $this->ReadUInt8() << 0;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 24;
		}
		
		return $value;
	}
	
	public function ReadUInt64()
	{
		$value = 0;
		
		if( $this->endian == self::BIG_ENDIAN )
		{
			$value |= $this->ReadUInt8() << 32;
			$value |= $this->ReadUInt8() << 24;
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 0;
		}
		else
		{
			$value |= $this->ReadUInt8() << 0;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 24;
			$value |= $this->ReadUInt8() << 32;
		}
		
		return $value;
	}
	
	public function ReadUInt128()
	{
		$value = 0;
		
		if( $this->endian == self::BIG_ENDIAN )
		{
			$value |= $this->ReadUInt8() << 64;
			$value |= $this->ReadUInt8() << 32;
			$value |= $this->ReadUInt8() << 24;
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 0;
		}
		else
		{
			$value |= $this->ReadUInt8() << 0;
			$value |= $this->ReadUInt8() << 8;
			$value |= $this->ReadUInt8() << 16;
			$value |= $this->ReadUInt8() << 24;
			$value |= $this->ReadUInt8() << 32;
			$value |= $this->ReadUInt8() << 64;
		}
		
		return $value;
	}
	
	public function ReadS8()
	{
		$value = $this->ReadUInt8();
  		if( $value >> 7 == 1 )
  		{
    
   			$value = ~( $value ^ 0xFF );
  		}
  		
  		return $value;
	}
	
	public function ReadS16()
	{
    	$value = $this->ReadUInt16();
    	
  		if( $value >> 15 == 1 )
  		{
    		$value = ~( $value ^ 0xFFFF );
    	}
    	
  		return $value;
	}
	
	public function ReadSInt24()
	{
  		$value = $this->ReadUInt24();
  		
  		if( $value >> 23 == 1 )
  		{
    		$value = ~( $value ^ 0xFFFFFF );
  		}
  		
  		return $value;
	}
 

	public function ReadSInt32()
	{
  		$value = $this->ReadUInt32();
  		
  		if( $value >> 31 == 1 )
  		{
    		$value = ~( $value ^ 0xFFFFFFFF );
  		}
  		
  		return $value;
	}
	
	public function ReadSInt64()
	{
  		$value = $this->ReadUInt64();
  		
  		if( $value >> 63 == 1 )
  		{
    		$value = ~( $value ^ 0xFFFFFFFFFF );
  		}
  		
  		return $value;
	}
	
	public function ReadSInt128()
	{
  		$value = $this->ReadUInt128();
  		
  		if( $value >> 127 == 1 )
  		{
    		$value = ~( $value ^ 0xFFFFFFFFFFFF );
  		}
  		
  		return $value;
	}
}
?>