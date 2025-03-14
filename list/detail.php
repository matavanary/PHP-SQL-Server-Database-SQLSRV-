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

	$strUserID = null;

	if(isset($_GET["UserID"]))
	{
		$strUserID = $_GET["UserID"];
	}

	$connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');

	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$stmt = "SELECT * FROM member2 WHERE UserID = ? ";
	$params = array($strUserID);

	$query = sqlsrv_query( $conn, $stmt, $params);

	$result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

?>
<table width="284" border="1">
  <tr>
    <th width="120">UserID</th>
    <td width="238"><?php echo $result["UserID"];?></td>
    </tr>
  <tr>
    <th width="120">username</th>
    <td><?php echo $result["username"];?></td>
    </tr>
  <tr>
    <th width="120">password</th>
    <td><?php echo $result["password"];?></td>
    </tr>
  <tr>
    <th width="120">m_fname</th>
    <td><?php echo $result["m_fname"];?></td>
    </tr>
  <tr>
    <th width="120">m_lname</th>
    <td><?php echo $result["m_lname"];?></td>
    </tr>
  <tr>
    <th width="120">Status</th>
    <td><?php echo $result["Status"];?></td>
    </tr>
  </table>
  <br>
  <a href=javascript:history.back(1)>ย้อนกลับ</a>
<?php
sqlsrv_close($conn);
?>
</body>
</html>