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
<title>Manage User</title>
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
<div id="bg_menu" align="center">Manage User</div>

<div id="content_menu">
   <table width="100%" border="0" align="center">
  <tr>
    <td><div align="left" style="margin-left:24px;">
      <h1 align="center">&darr;Manage User&darr;</h1>
      <div align="right"><a href="index.php">Go Back</a></div>
      <br/>
      <br/>
		<div align="left">
		  <?php 
			if(isset($message)){
				if(isset($_GET['delete_id'])){
					echo '<strong>'.$message.'</strong>';
					echo "&nbsp;&nbsp;<a href='?delete_id=".$_GET['delete_id']."&confirm'>Yes</a>";
					echo '&nbsp;&bull;&nbsp;';
					echo "<a href='?delete_id=".$_GET['delete_id']."&deny'>No</a>";
					echo '<br /><br />';
				}
				if(isset($_GET['process'])){
				
					echo '<strong>'.$message.'</strong>';
					echo "&nbsp;&nbsp;<a href='?process&user_id=".$_POST['user_id']."&confirm&to=".$_POST['to'].
					"&address=".$_POST['address']."'>Yes</a>";
					echo '&nbsp;&bull;&nbsp;';
					echo "<a href='?process&deny'>No</a>";
					echo '<br /><br />';
				}
			}
		?>
    </div>
    <div align="left">
		  <table width="100%" border="0" cellpadding="1" cellspacing="1">
		    <tr bgcolor="#666666">
            <th width="62"><div align="center">Title:</div></th>
		      <th width="172"><div align="center">Full Name:</div></th>
              <th width="191"><div align="center">Address:</div></th>
		      <th width="168"><div align="center">Email Address:</div></th>
		      
		      <th width="87"><div align="center">Subscriber:</div></th>
		      <th width="144" align="center">Action:</th>
	        </tr>
		    
		    <?php
						$query = mysql_query("SELECT * FROM `member`");
						while($result = mysql_fetch_assoc($query)){
					?>
                    <p align="justify">
		    <form method="post" action="?process" id="<?=$result['member_no'];?>">
		      <tr bgcolor="#999999">
		        <input type="hidden" name="user_id" value="<?=$result['member_no'];?>" />
                <td><?=$result['title'];?></td></p>
		        <td><?=$result['first_name'].' '.$result['last_name'];?></td>
		        <td><?=$result['address_line_one'];?></td>
               	 <td><?=$result['email_address'];?></td>
		        
		        <td><input type="text" name="to" value="<?=$result['subscribed'];?>"/></td> <!--<a href="?process" onclick="document.getElementById('<?=$result['member_no'];?>');">Change</a>-->
		        <td width="45" align="center"><?=($result['subscribed'] == 0)?'
				<a href="?delete_id='.$result["member_no"].'">Delete User</a>':'';?><br />
                </td>
		        </tr></p>
	        </form>
		    <?php } ?>
		    
	      </table>
    </div>
    <br/>
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
