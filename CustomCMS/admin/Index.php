<?php 
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin_login.php"); 
    exit();
}

$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]);

include "../storescripts/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); 

$existCount = mysql_num_rows($sql);
if ($existCount == 0) { 
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/RAJU_LOGO.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen"/>
</head>

<body>
<div id="main">

<div id="header">

</div>

<div id="menu">
<li><a href="Index.php">Home</a></li>
<li><a href="viewtask.php">Tasks</a></li>
<li><a href="logout.php">logOut</a></li>
<li><a href="admin_login.php">AdminLogin</a></li>

</div>

<div id="menu-tengah">
<div id="bg_menu" align="center">Admin 
</div>

<div id="content_menu">
<table width="100%" border="0" align="center">
  <tr>
    <td><div align="left" style="margin-left:24px;">
      <h2>Hello <?php echo"$manager"; ?> Your are Logged In as Admin</h2>
      <p><a href="addtask.php">Add Task</a></p>
      <p><a href="viewtask.php">View Task</a></p>
<p>
  <a href="manageuser.php">Manage Users</a></p>
    </div>
    <div align="right" style="margin-right:24px;"><a href="logout.php">Log Out</a></div></td>
  </tr>
</table>
</div>
</div>
<div class="clear">
</div>

<div id="footer">&copy; Raju Chaudhary <br/>
2016
</div>
</div>
</body>
</html>
