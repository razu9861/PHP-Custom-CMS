
<?php
	require_once('storescripts/connect_to_mysql.php');
	require_once('process/user.class.php');
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
<title>Home Page</title>
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
<div id="bg_menu" align="center">Welcome To My Website
</div>

<div id="content_menu">
<div align="right" style="margin-right:32px;"><a href="account.php">Go Back</a></div>
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
               	 <td><?=$result['taskcom_incomp'];?><a href="edittask.php">&nbsp; Edit</a></td>
                 <td><?=$result['details'];?></td>
	        </form>
		    <?php } ?>
	      </table>
<div align="right" style="margin-right:32px;"><a href="index.php">Logo Out</a></div>
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
