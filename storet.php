(การเรียกใช้งาน Store Procedure)
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "sa";
	$userPassword = '';
	$dbName = "mydatabase";

	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$sql = "{call my_stored_procedure(?, ?, ?)}";
    $params = array( 
                  array($parameter1, SQLSRV_PARAM_IN),
                  array($parameter2, SQLSRV_PARAM_IN),
                  array($output_parameter, SQLSRV_PARAM_OUT)
               );

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	

	sqlsrv_close($conn);
?>