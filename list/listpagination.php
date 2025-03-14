<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>

<body>
    <?php
	// ini_set('display_errors', 1);
	// error_reporting(~0);

    // $serverName = "RK-168N\SQLEXPRESS";
	// $userName = "";
	// $userPassword = '';
	// $dbName = "my_nockdown";

	// $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);

	// $conn = sqlsrv_connect( $serverName, $connectionInfo);

	// if( $conn === false ) {
	// 	die( print_r( sqlsrv_errors(), true));
	// }

	$sql = "SELECT * FROM member2";
	// $sql = "SELECT * FROM member2 WHERE Status = '".$objResult['Status']."'";
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$query = sqlsrv_query( $conn, $sql , $params, $options );
	$num_rows = sqlsrv_num_rows($query);
	$per_page = 10;   // Per Page
	$page  = 1;
	if(isset($_GET["Page"]))
	{ $page = $_GET["Page"]; }
	$prev_page = $page-1;
	$next_page = $page+1;
	$row_start = (($per_page*$page)-$per_page);
	if($num_rows<=$per_page)
	{ $num_pages =1; }
	else if(($num_rows % $per_page)==0)
	{ $num_pages =($num_rows/$per_page) ; 
	} else {
		$num_pages =($num_rows/$per_page)+1;
		$num_pages = (int)$num_pages;
	}
	$row_end = $per_page * $page;
	if($row_end > $num_rows)
	{ $row_end = $num_rows;	}


	$sql = " SELECT c.* FROM (	SELECT ROW_NUMBER() OVER(ORDER BY UserID) AS RowID,*  FROM member2	) AS c 
	WHERE c.RowID > $row_start AND c.RowID <= $row_end  and Status = '".$objResult['Status']."'
	";
	$query = sqlsrv_query( $conn, $sql );

?>
    <table width="600" border="1">
        <tr>
            <th width="91">
                <div align="center">UserID </div>
            </th>
            <th width="98">
                <div align="center">username </div>
            </th>
            <th width="198">
                <div align="center">password </div>
            </th>
            <th width="97">
                <div align="center">m_fname </div>
            </th>
            <th width="59">
                <div align="center">m_lname </div>
            </th>
            <th width="71">
                <div align="center">Status </div>
            </th>
        </tr>
        <?php while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
        <tr>
            <td>
                <div align="center"><?php echo $result["UserID"];?></div>
            </td>
            <td>
                <div align="center"><?php echo $result["username"];?></div>
            </td>
            <td>
                <div align="center"><?php echo $result["password"];?></div>
            </td>
            <td>
                <div align="center"><?php echo $result["m_fname"];?></div>
            </td>
            <td>
                <div align="center"><?php echo $result["m_lname"];?></div>
            </td>
            <td>
                <div align="center"><?php echo $result["Status"];?></div>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    Total <?php echo $num_rows;?> Record : <?php echo $num_pages;?> Page :
    <?php if($prev_page) { echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$prev_page'><< Back</a> "; }
	for($i=1; $i<=$num_pages; $i++){
		if($i != $page)
		{ echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]"; }
		else
		{ echo "<b> $i </b>"; }
	}
	if($page!=$num_pages)
	{ echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$next_page'>Next>></a> ";	}
	// sqlsrv_close($conn);
	?>
</body>

</html>