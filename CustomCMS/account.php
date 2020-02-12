
   <?php
	require_once('storescripts/connect_to_mysql.php');
	require_once('process/user.class.php');
	require_once('process/login.class.php');
	require_once('process/login.php');
	
	$user = new User();
	if(!$user->signed_in){
		header("location:login.php");
		
	}

		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/rlogo.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div id="main">

<div id="header">

</div>


<div id="menu">
<li><a href="Index.php">Home</a></li>
<li><a href="#">Services</a>
<ul>
            <li><a href="#">CSS</a></li>
            <li><a href="#">Graphic design</a></li>
            <li><a href="#">Development tools</a></li>
            <li><a href="#">Web design</a></li>
        </ul>
</li>
<li><a href="#">Download</a>
<ul>
            <li><a href="#">Downlod-1</a></li>
            <li><a href="#">Download-2</a></li>
            <li><a href="#">Download-4</a></li>
            <li><a href="#">Download-5</a></li>
        </ul>

</li>
<li><a href="#">Web Desain</a></li>
<li><a href="#">Partner Link</a></li>
<li><a href="account.php">DashBoard</a></li>
</div>

<div id="menu-tengah">
<div id="bg_menu" align="center">My Dashbord </div>

<div id="content_menu">
 <div align="lefy" style="margin-right:32px;">You Are Logged in as 
 <?php
 
						$query = mysql_query("SELECT * FROM `member` WHERE `member_no` = {$_SESSION['uid']}");
						while($result = mysql_fetch_assoc($query)){
					?>
 <?=$result['first_name'];?>
 <?=$result['last_name'];?>
 <?php } ?>
 <br/>
 
 </div>
<table width="100%" border="0" align="center">
   <tr><td>
   <p align="center"><a href="task.php">View Task</a><br/></p>
    <p align="center"><a href="profile.php">View Profile</a><br/></p>
   <p align="center"> <a href="editprofile.php">Manage Account</a><br/>
 
</p> </td>
  </tr>
</table>
<div align="right" style="margin-right:32px;"><a href="index.php">Logo Out</a></div></div>
</div>

<div class="clear">
</div>

<div id="footer">
&copy; Raju Chaudhary <br/>
2016
</div>
</div>
</body>
</html>
