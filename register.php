<?php
	include "database.php";
	if(isset($_POST['create'])){
			echo "
			<script type=\"text/javascript\">
				var message;
			</script>
			";
		$db = new DataBase();
		if($db->handleExist($_POST['Handle'])){
			echo "
			<script type=\"text/javascript\">
				message='This Handle is already exist';
			</script>
			";
		}else{
			if($db->insertUser($_POST['Handle'],$_POST['password'],$_POST['Email'])){
				echo "
			<script type=\"text/javascript\">
				message='you are succuffly registered';
			</script>
			";
			}else{
				echo "
			<script type=\"text/javascript\">
				message='There is a problem while registration';
			</script>
			";
			}
		}
		echo "
			<script type=\"text/javascript\">
				alert(message);
			</script>
			";
	}

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>AOJ Signup</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body style="background-color: #29b35b; ">

  	

<form action="#" method="post">
  <h2>AOJ Sign Up</h2>
  		<p>
  			<label for="Handle" class="floatLabel">Handle</label>
			<input id="Handle" name="Handle" type="text">
			<span>Invalid Handle</span>
  		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="Email" type="text">
			<span>Not Valid Email</span>
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password">
			<span>Your passwords do not match</span>
		</p>
		<p>
			<input type="submit" value="Create My Account" id="submit" name="create">
		</p>
	</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>




</body>

</html>
