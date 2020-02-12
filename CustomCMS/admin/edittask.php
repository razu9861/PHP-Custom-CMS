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
<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 

if (isset($_POST['task_name'])) {
	$pid = mysql_real_escape_string($_POST['thisID']);
	$task_name = mysql_real_escape_string($_POST['task_name']);
	$category = mysql_real_escape_string($_POST['category']);
	$taskcom_incomp = mysql_real_escape_string($_POST['taskcom_incomp']);
	$details = mysql_real_escape_string($_POST['details']);
	$sql = mysql_query("UPDATE tasks SET task_name='$task_name', category='$category', taskcom_incomp='$taskcom_incomp', details='$details' WHERE id='$pid'");
	header("location: addtask.php"); 
    exit();
}
?>
<?php 
$task_list="";

if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM tasks WHERE id='$targetID' LIMIT 1");
    $Count = mysql_num_rows($sql); 
    if ($Count > 0) {
	    while($row = mysql_fetch_array($sql)){ 
             
			 $task_name = $row["task_name"];
			 $category = $row["category"];
			 $taskcom_incomp = $row['taskcom_incomp'];
			 $details = $row["details"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
        }
    } else {
	    echo "Sorry!.";
		exit();
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/rlogo1.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Task</title>
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
<div id="bg_menu" align="center">Edit Task</div>

<div id="content_menu">
<div align="right" style="margin-right:32px;"><a href="index.php">Go Back</a></div>
<table width="100%" border="0" align="center">
  <tr>
    <td><div align="right" style="margin-right:32px;"><a href="addtask.php#taskForm">+ Add New Task</a></div>
    <div align="left" style="margin-left:24px;">
      
    </div><hr />
    <a name="taskForm" id="taskForm"></a>
    <h3 align="center">
    &darr; Edit Task&darr; </h3>
    <Form action="edittask.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
  <table width="90%" border="0" cellpadding="0" cellspacing="6">
  <tr>
    <td width="20%">Task Name:</td>
    <td width="80%"><label>
    <input name="task_name" type="text" id="task_name" size="64" value="<?php echo $task_name;?>"  />
    </label>
    </td>
  </tr>
    <td>Category</td>
    <td><label>
    <input name="category" type="text" id="category" size="64" value="<?php echo $category;?>" />
    </label></td>
  </tr>
  <tr>
    <td>Task Complete/Incomplete:</td>
    <td><label>
    <input name="taskcom_incomp" type="text" id="taskcom_incomp" size="64" value="<?php echo $taskcom_incomp;?>" />
    </label></td>
  </tr>
  <tr>
    <td>Task Details:</td>
    <td><label>
    <textarea name="details" id="details" cols="64" rows="5"><?php echo $details;?></textarea>
    </label></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <input name="thisID" type="hidden" value="<?php echo $targetID;?>" />
    <input type="Submit" name="button"  id="button"  value="Make Changes"/>  </label></td>
  </tr>
</table>

</Form></td>
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
