<?php

class Input
{
	private $data;
	private $dataLength;
	private $endian;
	
	public function __construct(Array $stream, Endian $endian )
	{
		$this->data = $stream;
		$this->dataLength = count( $this->data );
		$this->endian = $endian->Value();
	}
	// gets data
	public function Stream()
	{
		return $this->data;
	}
	// gets length of data
	public function Length()
	{
		return $this->dataLength;
	}
	// shows Endian
	public function Endianness()
	{
		return $this->endian;
	}
}
?>