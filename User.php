<?php
	class User{
		public $id;
		public $result;
		public $conn;

		function login($email,$password,$conn){
			$sql ="SELECT * FROM `tbl_user` WHERE `email`= '".$email."' AND `password`= '".$password."'";
			echo $sql;
			// $this -> result = query($sql);
			// if($this -> result -> num_rows > 0){
			// 	while($row = $this -> result -> fetch_assoc()){
			// 		echo "successfull";
			// 	}ssss
			// }

		}

		function  signup($email,$name,$mobile,$password,$sques, $sans,$conn){
			$sql = "SELECT * FROM tbl_user WHERE `email`='$email' AND `mobile`='$mobile' LIMIT 1";
			$this -> result = $conn->query($sql);
			if ($this-> result->num_rows > 0) {		
				while($row = $this -> result->fetch_assoc()) {			
					if($row["email"] == $email){
						echo "<script>alert('Email already exists');</script>";
						return;
					}
					if($row["mobile"] == $mobile){
						echo "<script>alert('Mobile no. already exists');</script>";
						return;
					}
				}
			}
			$sql ="INSERT INTO `tbl_user`(`email`,`name`, `mobile`, `email_approved`,`phone_approved`,
	             `active`,`is_admin`, `sign_up_date`,`password`,`security_question`,`security_answer`) VALUES ('".$email."','".$name."','".$mobile."',0,0,0,0, NOW(), '".$password."','".$sques."','".$sans."')";
			  if ($conn -> query($sql) == TRUE) {
			  	return;
			 }
			 else {
	            echo "<script>alert('Sign Up fail');</script>";	          
	        }        		
		}
	}
?>
