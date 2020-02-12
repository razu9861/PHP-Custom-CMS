
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/rlogo.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..:: MY Web Page::..</title>
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
<div id="bg_menu" align="center">View Profile</div>

<div id="content_menu">
  <table width="100%" border="0" align="center">
   <h2 align="center">You are logged in as</h2>
   <table width="100%" border="0">
  <tr><td>
  <div align="right" style="margin-right:32px;"><a href="account.php">Go Back</a></div>
  <div align="right" style="margin-right:32px;"><a href="index.php">Logo Out</a></div><?php
	require_once('storescripts/connect_to_mysql.php');
	require_once('process/user.class.php');
	$user = new User();
	if(!$user->signed_in){
		header("location:login.php");
		
	}
	if(isset($_GET['process'])){
			if(isset($_GET['confirm'])){
				$user->email = mysql_real_escape_string($_GET['email']);
				$user->password = mysql_real_escape_string($_GET['password']);
				$user->address = mysql_real_escape_string($_GET['address']);
	
				$user->update_data();
				header('Location:index.php');
			}
			if(isset($_GET['deny'])){
				header('Location: myaccount.php');
			}
			$message = "Are you sure you want to update this user?";
	}

?></td>
    <td> <?php
        		if(isset($message)){
				if(isset($_GET['process'])){
					echo '<strong>'.$message.'</strong>';
					echo "&nbsp;&nbsp;<a href='?process&confirm&email=".$_POST['email']."
					&password=".$_POST['password']."&address=".$_POST['address']."
					'>
					Yes</a>";
					echo '&nbsp;&bull;&nbsp;';
					echo "<a href='?process&deny'>No</a>";
					echo '<br /><br />';
				}
			}
			?></td>
  </tr>
</table>
<form id="register_form" method="POST" action="?process">
   <tr><td><table width="70%" border="0" align="center" cellpadding="3" cellspacing="0">
   <?php
						$query = mysql_query("SELECT * FROM `member` WHERE `member_no` = {$_SESSION['uid']}");
						$result = mysql_fetch_assoc($query);
					?>
                    <tr>
  
  
    <td width="23%"><strong>Title:</strong></td>
    <td width="77%"><?=$result['title'];?></td>
  </tr>
  <tr>
  
  
    <td width="23%"><strong>Name:</strong></td>
    <td width="77%"><?=$result['first_name'].' '.$result['last_name'];?></td>
  </tr>
  
  <tr>
    <td><strong>Address:</strong></td>
    <td><?=$result['address_line_one'];?></td>
  </tr>
  <tr>
    <td><strong>Suscribed:</strong></td>
    <td><?=($result['subscribed'] == 1)?'&#10004;':'&times;';?></td>
  </tr>
</table>
 
        		    
      		   
    </form>
   
   </td>
  </tr>
  <br/>
 <br/>
</table>
</div>
</div>

<!-- Menu kanan --><!--- Merapikan Tabel Div Sesuai dengan keadaan content -->
<div class="clear">
</div>

<!-- Menu Footer -->
<div id="footer">
&copy; Raju Chaudhary <br/>
2015
</div>
</div>
</body>
</html>
