<?php
class Dbcon{
	public $siteurl="";
	public $dbhost="localhost";
	public $dbuser="root";
	public $dbpass="varnika";
	public $dbname="Cedhosting";
	public $conn;

	function __construct(){
		$this -> conn = new mysqli($this -> dbhost,$this -> dbuser,$this -> dbpass,$this -> dbname);
		if($this -> conn -> connect_error){
			die("connection failed: ".$conn -> connect_error);
		}
	// echo "connected successfully";
	}
}

$rt = new Dbcon();
?>

