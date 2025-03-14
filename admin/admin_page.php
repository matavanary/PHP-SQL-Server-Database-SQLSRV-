<?php include("../include/sessionadmin.php") ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
  <h1>Admin Page</h1>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["username"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["m_fname"];?>&nbsp;&nbsp;<?php echo $objResult["m_lname"];?></td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td><?php echo $objResult["Status"];?></td>
      </tr>
    </tbody>
  </table>
  <h1>List</h1>
  <?php include("../list/list.php") ?>
  <h1>List Detail</h1>
  <?php include("../list/listdetail.php") ?>
  <h1>List Pagination</h1>
  <?php include("../list/listpagination.php") ?>
  <br><br>
  <a href="../insert/add.php">ADD</a>
  <a href="../edit/list.php">EDIT</a>
  <a href="../delete/list.php">Delete</a>

  <a href="../include/logout.php">LOGOUT</a>
</body>
</html>
<?php	sqlsrv_close($conn);?>