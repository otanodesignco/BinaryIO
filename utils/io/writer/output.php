<?php

class Output
{
	private $data;
	private $endian;
	
	public function __construct(Endian $endian )
	{
		$this->data = array();
		$this->endian = $endian->Value();
	}
	// gets data
	public function Stream()
	{
		return $this->data;
	}

	// shows Endian
	public function Endianness()
	{
		return $this->endian;
	}
}
?>