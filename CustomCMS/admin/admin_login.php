<?php 

session_start();
if (isset($_SESSION["manager"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 

if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); 
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); 
     
    include "../storescripts/connect_to_mysql.php"; 
    $sql = mysql_query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1"); 
    
    $existCount = mysql_num_rows($sql); 
    if ($existCount == 1) {
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: index.php");
         exit();
    } else {
		echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/RAJU_LOGO.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
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
<div id="bg_menu" align="center">Admin Login
</div>

<div id="content_menu">
<table width="100%" border="0" align="center">
  <tr>
    <td><div align="left" style="margin-left:24px;">
      <h2>Administrator Login </h2>
      <form id="form1" name="form1" method="post" action="admin_login.php">
        User Name:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password" type="password" id="password" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div></td>
  </tr>
</table>
</div>
</div>

<div class="clear">
</div>

<!-- Menu Footer -->
<div id="footer">&copy; Raju Chaudhary <br/>
2016
</div>
</div>
</body>
</html>
