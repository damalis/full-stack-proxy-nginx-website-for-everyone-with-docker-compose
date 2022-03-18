<?php

//phpinfo();

$contents = file_get_contents( "../.env" );
$lines = explode( "\n", $contents );
foreach($lines as $line){
	$vars = explode( "=", $line );
	if ( $vars[0] == "DB_USER") $db_username = $vars[1];
	if ( $vars[0] == "DB_PASSWORD") $db_password = $vars[1];
	if ( $vars[0] == "DB_NAME") $db_name = $vars[1];
}

$link = mysqli_connect( 'database:3306', $db_username, $db_password, $db_name );

//if connection is not successful you will see text error
if ( !$link ) {
       die( 'Could not connect: ' . mysql_error() );
}

//if connection is successfully you will see message below
echo 'Connected successfully';
echo "Host information: " . mysqli_get_host_info( $link ) . PHP_EOL;
 
mysqli_close( $link );
	
?>