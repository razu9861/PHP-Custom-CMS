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
<div id="bg_menu" align="center">View Task</div>

<div id="content_menu">
<div align="right" style="margin-right:32px;"><a href="index.php">Go Back</a></div>
 <table width="100%" border="0" cellpadding="1" cellspacing="1">
		    <tr bgcolor="#666666">
            <th width="62"><div align="center">Task ID:</div></th>
		      <th width="172"><div align="center">Task Name:</div></th>
              <th width="191"><div align="center">Category:</div></th>
              <th width="191"><div align="center">Task Status:</div></th>
		      <th width="168"><div align="center">Details:</div></th>
	        </tr>
		    
		    <?php
						$query = mysql_query("SELECT * FROM `tasks`");
						while($result = mysql_fetch_assoc($query)){
					?>
                    <p align="justify">
		    <form method="post" action="?process" id="<?=$result['id'];?>">
		      <tr bgcolor="#99CCFF" align="center">
		        <input type="hidden" name="user_id" value="<?=$result['id'];?>" />
                <td><?=$result['id'];?></td></p>
		        <td><?=$result['task_name'];?></td>
		        <td><?=$result['category'];?></td>
               	 <td><?=$result['taskcom_incomp'];?></td>
                 <td><?=$result['details'];?></td>
	        </form>
		    <?php } ?>
		    
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
