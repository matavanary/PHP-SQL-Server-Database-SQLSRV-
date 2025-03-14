<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>
<body>
<?php
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

	$sql = "DELETE FROM member2
				WHERE UserID = ? ";
	$params = array($_GET["UserID"]);

	$stmt = sqlsrv_query( $conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	else
	{
		echo "Record delete successfully";
	}

	sqlsrv_close($conn);
?>
</body>
</html>