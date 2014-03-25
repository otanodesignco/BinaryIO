<?php
include( '/utils/endian.php' );
include( '/utils/io/reader/input.php' );
include( '/utils/io/writer/output.php' );
include( '/utils/io/reader/bitreader.php' );
include( '/utils/io/writer/bitwriter.php' );

$endian = new Endian();
$input = new Input( array( 0x8e,0x8f, 0x8b, 0x8a ), $endian );
$output = new Output( $endian );
$bitreader = new BitReader( $input );
$bitwriter = new BitWriter( $output );
echo $bitreader->ReadUInt8();
$bitwriter->WriteU8(0x8e);
$bitwriter->WriteU8(0x8f);

var_dump($bitwriter->Stream());








/*
if( $endian->Big() )
{
	echo "Endian is big";
}
else
{
	echo "Endian is little";
}

$endian->Big( true );

if( $endian->Little() )
{
	echo "Endian is little";
}
else
{
	echo "Endian is big";
}
*/
?>