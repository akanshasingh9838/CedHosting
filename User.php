<?php
	class User{
		public $id;
		public $result;

		function login($email,$password,$conn){
			$sql ="SELECT * FROM `tbl_user` WHERE `email`= 'rt' AND `password`= 'rt'";
			$this -> result = query($sql);
			if($this -> result -> num_rows > 0){
				while($row = $this -> result -> fetch_assoc()){
					echo "successfull";
				}
			}

		}

		function signup(){
			
		}

	}
?>