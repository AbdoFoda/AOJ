<?php
	session_start();
?>
<?php
	include 'database.php';
	if(isset($_POST['register'])){
		header("Location:register.php");
		exit();
	}else if(isset($_POST['login'])){
		$db= new Database();
		$id=$db->userExist($_POST['handle'],$_POST['password']);
		if($id==null||!mysqli_num_rows($id)){
			echo "
			<script type=\"text/javascript\">
				alert('please enter a valid user name and password');
			</script>
			";
		}else{
			$id =$id->fetch_assoc();
			$_SESSION["userData"]=$id;
			header("Location:homePage.php");
			exit();
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>AOJ Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #29b35b; ">
	
		<form name="login_form" method="POST" action="#">
			<h2>AOJ Login</h2>
				<p>
				<label for="handle" class="floatLabel">Handle</label>
				<input type="text" name="handle" value="">
				</p>
				<p>
				<label for="password" class="floatLabel">Password</label>
				<input type="password" name="password" value="">
				</p>
				<p>
				<input type="submit" name="login"    value="login"    >
				<input type="submit" name="register"    value="register" >
				</p>
		</form>

</body>
</html>

