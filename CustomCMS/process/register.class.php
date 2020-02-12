<?php
	require_once('user.class.php');
	class Register extends User {

		public function password_validate(){
				if($this->password != $this->password_confirm){
					return false;
				}
				if(strlen($this->password) < 6){
					return false;
				} 
				if(strlen($this->password) > 30){
					return false;
				}  
					return true;

		}
		public function email_validate(){
			if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
				return false;
			} else {
				return true;
			}
		}
		public function register_query(){
			return $query = "INSERT INTO `project`.`member` (
				`member_no` ,
				`title` ,
				`first_name` ,
				`last_name` ,
				`address_line_one` ,
				`email_address` ,
				`password` ,
				`subscribed`
			) VALUES (
				NULL ,  
				'".$this->title."', 
				'".$this->firstname."',  
				'".$this->lastname."',
				'".$this->address."',  
				'".$this->email."', 
				'".md5($this->password)."',  
				'0'
			);";
			header("location:index.php");
		}
	}
?>