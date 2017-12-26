<?php
	/**
	* Data base class
	*/
	class Database
	{
		var $server;
		var $username;
		var $password;
		var $database;
		var $con;
		function __construct()
		{	
			$this->server="localhost";
			$this->username="root";
			$this->password="";
			$this->database="AOJ";
			$this->con = mysqli_connect($this->server,$this->username,$this->password,$this->database);
			if(!$this->con){
				echo "Database ERROR";
				die("Sorry but the database is not working , please communicate with website management");
			}
		}
		function  userExist($username,$password){
			$qur="SELECT * FROM user WHERE Handle='".$username."' and Password='".$password."'";
			$ret=mysqli_query($this->con,$qur);
			if($ret){
				return $ret;
			}else{
				return null;
			}
		}
		function handleExist($username){
			$qur="SELECT ID FROM user WHERE Handle='".$username."';";
			$ret=mysqli_query($this->con,$qur);
			return mysqli_num_rows($ret);
		}
		function insertUser($username,$password,$email){
			$qur="INSERT INTO user (Handle,Password,Email,Rate) VALUES('".$username."','".$password."','".$email."',0);";
			return mysqli_query($this->con,$qur);
		}
		function getAllProblems(){
			$qur = "SELECT * FROM problem";
			return mysqli_query($this->con,$qur);
		}
		function getProblemByID($pId){
			$qur="SELECT * FROM problem WHERE ID=".$pId.";";
			return mysqli_query($this->con,$qur);
		}
		function increaseScore($userID,$pID){
			$qur="SELECT score FROM problem WHERE ID=".$pID.";";
			$score=mysqli_fetch_assoc(mysqli_query($this->con,$qur) )['score'];
			$qur="UPDATE user set Rate=Rate +".$score." WHERE ID=".$userID.";";
			mysqli_query($this->con,$qur);
		}
	}
?>