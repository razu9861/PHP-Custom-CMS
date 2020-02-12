<?php
	if(isset($_GET['process'])){
		require_once('register.class.php');
		
		$register = new Register();
		$register->title = mysql_real_escape_string($_POST['title']);
		$register->firstname = mysql_real_escape_string($_POST['first_name']);
		$register->lastname = mysql_real_escape_string($_POST['last_name']);
		$register->address = mysql_real_escape_string($_POST['address']);
		$register->email = mysql_real_escape_string($_POST['email']);
		$register->password = mysql_real_escape_string($_POST['password']);
		$register->password_confirm = mysql_real_escape_string($_POST['password_confirmation']);
		
		
		$errors = array();

		if($register->user_exists()){
			$errors[] = "That user already exists";	
		} else {
			if($register->password_validate() === false){
				$errors[] = "Your passwords does not match";
			}
			if(empty($register->firstname)){
				$errors[] = "Please Enter Your First Name";
			}
			if(empty($register->lastname)){
				$errors[] = "Please Enter your Nast Name";
			
			}
			if(empty($register->address)){
				$errors[] = "Please Enter your address";
			}
			if(!$register->email_validate()){
				$errors[] = "Your E-mail Address In not Corect";
			}
			if(empty($errors)){
				print_r($register->register_query());
				mysql_query($register->register_query());
				echo mysql_error();
				$errors[] = "<strong>You have been successfully registered!</strong>"; 
				unset($_POST);
				header("location:index.php");
			}
		}
	}