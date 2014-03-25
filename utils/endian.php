<?php
class Endian
{
	private $big;
	private $little;
	
	public function __construct()
	{
		$this->big = false; // assumes your working on intel x86 or intel x64
		$this->little = true; // assumes your chip is intel not arm, sparc, or powerPC
	}
	
	
	// return bool if big endian
	public function Big( $endian = null )
	{
		// used as a getter
		if( empty( $endian ) )
		{
			return $this->big;
		}
		else
		{
			// $endian is not empty i.e. is not null, '', 0, or ""
			
			// check if value is bool or not
			if( is_bool( $endian ) === true )
			{
				// value is bool becomes a setter
				$this->big = $endian;
				if( $endian === true )
				{
					$this->little = false;
				}
				else
				{
					$this->little = true;
				}
			}
		}
		
	}
	
	// returns bool if little endian
	public function Little( $endian = null )
	{
		if( empty( $endian ) )
		{
			// $endian is null, 0, "", or '' and becomes a getter
			return $this->little;
		}
		else
		{
			// becomes a setter
			if( is_bool( $endian ) === true )
			{
				$this->little = $endian;
				
				// set big to opposite value
				if( $endian === true )
				{
					$this->big = false;
				}
				else
				{
					$this->big = true;
				}
			}
		}
		
	}
	// shows endian value in text
	public function Value()
	{
		if( $this->Big() )
		{
			return "Big";
		}
		else
		{
			return "Little";
		}
	}
}
?>