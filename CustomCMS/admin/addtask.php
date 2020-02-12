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
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person

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

if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete this Task ID of ' . $_GET['deleteid'] . '? <a href="addtask.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="addtask.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM tasks WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	header("location: addtask.php"); 
    exit();
}
?>
<?php 

if (isset($_POST['task_name'])) {
	
    $task_name = mysql_real_escape_string($_POST['task_name']);
	$category = mysql_real_escape_string($_POST['category']);
	$taskcom_incomp = mysql_real_escape_string($_POST['taskcom_incomp']);
	$details = mysql_real_escape_string($_POST['details']);
	
	$sql = mysql_query("SELECT id FROM tasks WHERE task_name='$task_name' LIMIT 1");
	$Match = mysql_num_rows($sql); 
    if ($Match > 0) {
		echo 'Sorry you tried to place a duplicate "Task Name" into the system, <a href="managetask.php">click here</a>';
		exit();
	}
	
	$sql = mysql_query("INSERT INTO tasks (task_name, category, taskcom_incomp, details, date_added) 
        VALUES('$task_name','$category','$taskcom_incomp','$details', now())") or die (mysql_error());
     $pid = mysql_insert_id();
	header("location: addtask.php"); 
    exit();
}
?>
<?php 

$task_list = "";
$sql = mysql_query("SELECT * FROM tasks ORDER BY date_added DESC");
$Count = mysql_num_rows($sql); 
if ($Count > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $task_name = $row["task_name"];
			 $category= $row["category"];
			 $taskcomp_incom= $row["taskcom_incomp"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $task_list .= "Task ID: $id - <strong>$task_name</strong> - $category - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; <a href='edittask.php?pid=$id'>edit</a> &bull; <a href='addtask.php?deleteid=$id'>delete</a><br />";
    }
} else {
	$task_list = "You have not added any task";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/RAJU_LOGO.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Task</title>
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
<div id="bg_menu" align="center">Add Task</div>

<div id="content_menu">
    <div align="right" style="margin-right:32px;"><a href="index.php">Go Back</a></div>
    <div align="left" style="margin-left:24px;">
      <h2>Tasks List</h2>
      <?php echo $task_list; ?>
    </div><hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3 align="center">
    &darr; Add New Task &darr;
    </h3>
    <Form action="addtask.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
<table width="90%" border="0" cellpadding="0" cellspacing="6">
  <tr>
    <td width="20%">Task Name:</td>
    <td width="80%"><label>
    <input name="task_name" type="text" id="task_name" required="required" size="64" />
    </label>
    </td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><label>
    <input name="category" type="text" id="category" required="required" size="64" />
    </label></td>
  </tr>
  <tr>
    <td>Complete/Incomplete:</td>
    <td><label>
    <input name="taskcom_incomp" type="text" id="taskcom_incomp" required="required"  size="64" />
    </label></td>
  </tr>
  <tr>
    <td>Task Details:</td>
    <td><label>
    <textarea name="details" id="details" required="required" cols="64" rows="5"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <input type="Submit" name="button"  id="button"  value="Add This Task"/>  </label></td>
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
