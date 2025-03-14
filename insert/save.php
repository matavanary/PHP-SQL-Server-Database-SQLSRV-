<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>
<body>
<?php
    // include("../include/connect.php");
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "RK-168N\SQLEXPRESS";
	$userName = "";
	$userPassword = '';
	$dbName = "my_nockdown";

	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');

	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$sql = "INSERT INTO member2 (UserID, username, password, m_fname, m_lname, Status) VALUES (?, ?, ?, ?, ?, ?)";
	$params = array($_POST["txtCustomerID"], $_POST["txtName"], $_POST["txtEmail"], $_POST["txtCountryCode"], $_POST["txtBudget"], $_POST["txtUsed"]);

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	else
	{
		echo "Record add successfully";
	}

	sqlsrv_close($conn);
?>
</body>
</html>