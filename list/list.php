<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>
<body>
<?php
// 	ini_set('display_errors', 1);
// 	error_reporting(~0);

//     $serverName = "RK-168N\SQLEXPRESS";
// 	$userName = "";
// 	$userPassword = '';
// 	$dbName = "my_nockdown";
  
//    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

//    $conn = sqlsrv_connect( $serverName, $connectionInfo);

//    if( $conn === false ) {
//       die( print_r( sqlsrv_errors(), true));
//    }


   $stmt = "SELECT * FROM member2 WHERE Status = '".$objResult['Status']."'";
   $query = sqlsrv_query($conn, $stmt);

?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">UserID </div></th>
    <th width="98"> <div align="center">username </div></th>
    <th width="198"> <div align="center">password </div></th>
    <th width="97"> <div align="center">m_fname </div></th>
    <th width="59"> <div align="center">m_lname </div></th>
    <th width="71"> <div align="center">Status </div></th>
  </tr>
<?php
while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["UserID"];?></div></td>
    <td><div align="center"><?php echo $result["username"];?></div></td>
    <td><div align="center"><?php echo $result["password"];?></div></td>
    <td><div align="center"><?php echo $result["m_fname"];?></div></td>
    <td><div align="center"><?php echo $result["m_lname"];?></div></td>
    <td><div align="center"><?php echo $result["Status"];?></div></td>
  </tr>
<?php } ?>
</table>
<!-- < ?php sqlsrv_close($conn);?> -->
</body>
</html>