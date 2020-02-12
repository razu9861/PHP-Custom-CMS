<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/rlogo.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
<div id="bg_menu" align="center">Login Here
</div>

<div id="content_menu">
 <?php
  include('storescripts/connect_to_mysql.php');
  require_once('process/login.php');
  require_once('process/user.class.php');
  $user = new User();
  header("loacation:account.php");

?>
<?php
                if(!empty($errors)){
					
                  foreach($errors as $error){
                    echo $error.'<br />';
					
                  }
                }
              ?>
<table width="100%" border="0" align="center">
   <tr><td> </td></tr>
  <tr>
    <td><table width="80%" border="0" align="center">
          <tr>
            <td height="72"><h2 align="center">User Login </h2>
              
              <form id="register_form" method="POST" action="?process">
                <div align="left">
                  <fieldset>
                    <legend>Customer Login</legend>
                  </fieldset>
                <fieldset>
                  <label for="email">
                    <div align="left">Email Address: 
                    </div>
                  </label>
                  <div align="left">
                    <input type="email" name="email" placeholder="Ex: example@example.com"  size="40"/>
                    <br />
                  </div>
                  
                  <label for="password">
                    <div align="left">Password: 
                    </div>
                  </label>
                  <div align="left">
                    <input type="password" name="password" id="password" placeholder="Password" size="40"/>
                    <br />
                  </div>
                  <br />
                  <label for="submit">
                    
                  </label>
                  <div align="center">
                    <input type="submit" name="submit" value="Log In"/>
                  </div>
                </fieldset>
                </form>
                
                <div align="Right"> New User:
                
                <a href="register.php">Register </a>Here
                </div></td>
          </tr>
        </table></td>
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
