<?php
	class User{
		public $id;
		public $result;
		public $conn;

		function login($email,$password,$conn){
			$sql ="SELECT * FROM `tbl_user` WHERE `email`= '".$email."' AND `password`= '".$password."'";
			echo $sql;
			$this -> result = $conn-> query($sql);
			if($this -> result ->num_rows > 0){
				while($row = $this -> result -> fetch_assoc()){
					echo "successfull";
					if($row['is_admin']== "1"){
						$_SESSION['admindata']=array('email' => $row['email'],'password' => $row['password'],'id' => $row['id'], 'name'=>$row['name']);
					echo "<script>alert('admin login successfull')</script>";
					echo ("<script type='text/javascript'> location.href='admin/index.php'</script>");
					}
					else{
						$_SESSION['userdata']=array('email' => $row['email'],'password' => $row['password'],'id' => $row['id']);
						echo ("<script type='text/javascript'> location.href='index.php'</script>");

					}
				}
			}
			else{
				echo "<script>alert('Login Fail');</script>";
			}

		}

		function  signup($email,$name,$mobile,$password,$sques, $sans,$conn){
			$sql = "SELECT * FROM tbl_user WHERE `email`='$email' AND `mobile`='$mobile' LIMIT 1";
			$this -> result = $conn->query($sql);
			if ($this-> result->num_rows > 0) {		
				while($row = $this -> result->fetch_assoc()) {			
					if($row["email"] == $email){
						echo "<script>alert('Email already exists');</script>";
						return false;
					}
					if($row["mobile"] == $mobile){
						echo "<script>alert('Mobile no. already exists');</script>";
						return false;
					}
				}
			}
			else{
				$sql ="INSERT INTO `tbl_user`(`email`,`name`, `mobile`, `email_approved`,`phone_approved`,
	             `active`,`is_admin`, `sign_up_date`,`password`,`security_question`,`security_answer`) VALUES ('".$email."','".$name."','".$mobile."',0,0,0,0, NOW(), '".$password."','".$sques."','".$sans."')";
				  if ($conn -> query($sql) == TRUE) {
				// echo ("<script>window.location.href='verification.php?email=".$email."';</script>");
				  	return true;
				 }
				 else {
		            echo "<script>alert('Sign Up fail');</script>";	          
		        }       
			} 		
		}

		function status_email_approved($conn,$email){
			$sql = "UPDATE `tbl_user` SET `email_approved` = '1' AND `active`= '1' WHERE `email` ='$email'";
			$res= mysqli_query($conn,$sql);
			// if (mysqli_query($conn, $sql)) {
			// 	echo "<script>alert('Email approved !');</script>";
			// } else {
			// 	echo "<script>alert('Request Failed !');</script>";
			// }
			// return $msg;
			}

		function status_phone_approved($conn){
			$sql = "UPDATE `tbl_user` SET `phone_approved` = '1' AND `active`= '1' WHERE `id` ='34'";
			$res= mysqli_query($conn,$sql);
			if (mysqli_query($conn, $sql)) {
            	return true;		
			} else {
			$msg = "<script>alert(Status Not Approved!);</script>";
			}
			return $msg;
			}
	}
?>
