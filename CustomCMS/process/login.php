<?php
	if(isset($_GET['process'])){
		require_once('login.class.php');
		

		$login = new Login();

		$login->email = mysql_real_escape_string($_POST['email']);
		$login->password = mysql_real_escape_string($_POST['password']);
		$errors = array();
		if(!$login->signed_in){
			if($login->user_exists()){
				$result = mysql_query($login->login_query());
				if(mysql_num_rows($result)  == 1){
					$_SESSION['uid'] = mysql_result($result,0);
					$login->signed_in = true;
					header("location:account.php");
					$errors[] = "<strong>You've been logged in successfully</strong>";
					
					unset($_POST);
				} else {
					$errors[] = "Incorrect Password";
				}
			} else {
				$errors[] = "Incorrect User Email or That user doesn't exist";
			}
		} else {
			header("Location:account.php");
		}
	}
	?>