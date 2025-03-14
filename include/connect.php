<?php

	ini_set('display_errors', 1);
	error_reporting(~0);
	date_default_timezone_set('Asia/Bangkok');

	$serverName = "RK-168N\SQLEXPRESS";
	$userName = "";
	$userPassword = '';
	$dbName = "my_nockdown";
   	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');

   	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	if($conn)
	{
		// echo "Database Connected.";
	}
	else
	{
		// die( print_r( sqlsrv_errors(), true));
	}

	sqlsrv_close($conn);
?>