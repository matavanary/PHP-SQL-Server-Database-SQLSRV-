<?php
	ini_set('display_errors', 0);
	error_reporting(~0);
	session_start();
  	include("../include/connect.php");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	if($conn === false ) {
      die( print_r( sqlsrv_errors(), true));
    }	
	$strSQL = "SELECT * FROM member2 WHERE username=? and password=?";
	$parameters = [$_POST["txtUsername"], $_POST["txtPassword"]];
	$objQuery = sqlsrv_query($conn, $strSQL, $parameters);
	$objResult = sqlsrv_fetch_array($objQuery,SQLSRV_FETCH_ASSOC);
	
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
	}
	else
	{
		$_SESSION["UserID"] = $objResult["UserID"];
		$_SESSION["Status"] = $objResult["Status"];

		session_write_close();
		
		if($objResult["Status"] == "ADMIN")
		{
			header("location:../admin/admin_page.php");
		}
		else
		{
			header("location:../user/user_page.php");
		}
	}
	sqlsrv_close($conn);
?>