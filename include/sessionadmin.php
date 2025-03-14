<?php
	ini_set('display_errors', 0);
	error_reporting(~0);
	
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}	

    $serverName = "RK-168N\SQLEXPRESS";
    $dbName = "my_nockdown";
    
	$connectionInfo = array("Database"=>$dbName, "MultipleActiveResultSets"=>true, "CharacterSet"  => 'UTF-8');

	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
	if( $conn === false ) {
      die( print_r( sqlsrv_errors(), true));
    }
	
	$strSQL = "SELECT * FROM member2 WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = sqlsrv_query($conn, $strSQL);
	$objResult = sqlsrv_fetch_array($objQuery,SQLSRV_FETCH_ASSOC);
?>