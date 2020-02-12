
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/rlogo.png" />
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
<div id="bg_menu" align="center">Welcome To My Website
</div>

<div id="content_menu">
  <table width="100%" border="0" align="center">
    <tr><td>
 <?php
    
	require_once('storescripts/connect_to_mysql.php');
	require_once('process/user.class.php');
	$user = new User();
	require_once('process/register.php');
		if($user->signed_in){
	}
	
?>


<body>
<div id="wrapper">


							  <?php
								if(!empty($errors)){
									foreach($errors as $error){
										echo $error.'<br />';
									}
								}
							?>
                                           
                        
     
  

  <form id="register_form" method="POST" action="?process">
						        <div align="left">
								          <fieldset>
								            <legend><h2>New Customer Registration Form</h2></legend>
					              </fieldset>
					          </div>
						        <fieldset>
							            <label for="name_group">
								            <div align="left">User Name:</div>
							            </label>
									    <div align="left">
										    <fieldset id="name_group">
										      <legend>Please Enter Your Name</legend>
                                              Titile:<select name="title" required="required">
          <option value="">....</option>
          <option value="Mr.">Mr.</option>
          <option value="Miss.">Miss.</option>
          </select>
										      First Name:<input type="text" name="first_name" placeholder="First" required="required" value="<?=(isset($_POST['first_name']))?$_POST['first_name']:'';?>" tabindex="1"/> &bull;
										      Last Name:<input type="text" name="last_name" placeholder="Last" required="required" value="<?=(isset($_POST['last_name']))?$_POST['last_name']:'';?>"tabindex="2"/>
                                             
									      </fieldset>
					        </div><br/>		
                            <label for="email">
							      <div align="left">Address: </div>
                                            
									    </label>
										  <div align="left"><fieldset id="name_group">
										      <legend>Please Enter Your Address</legend>
                                          
										    &bull;Address:<input type="text" name="address"id="address" placeholder="First line only" required="required"  value="<?=(isset($_POST['address']))?$_POST['address']:'';?>" tabindex="6"/><br />
										    
										  </fieldset>
								  </div>
                            			              
                                        <label for="email">
							      <div align="left">Email Address: </div>
                                            
									    </label>
										  <div align="left"><fieldset id="name_group">
										      <legend>Please Enter Your Email Address</legend>
                                          
										    Email Address:<input type="email" name="email" placeholder="Ex: first.last@gmail.com" required="required"  value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" tabindex="3"/><br/>
									    <label for="password_group">
										    </fieldset>
								  </div>
							      <div align="left">Password:</div>
								    <div align="left">
									    <fieldset id="password_group">
                                            <legend>Please Enter Your Password</legend>
										      Password:<input type="password" name="password" id="password" placeholder="Password"  required="required" tabindex="4"/> &bull;
										      Confirm Password:<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required="required" tabindex="5"/><br />
										      
								      </fieldset>
										    <br />
							      </div>
									  
									    
									    <label for="submit">
										    
									    </label>
										  <div align="center">
										    <input type="submit" name="submit" value="Register" tabindex="8" />
							      </div>
						        </fieldset>
			  </form>
			</div></td>
  </tr>
</table>
</div>
</div>

<div class="clear">
</div>
<div id="footer">&copy; Raju Chaudhary <br/>
2015
</div>
</div>
</body>
</html>
