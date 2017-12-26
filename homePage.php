<?php
	session_start();

	//echo "Welcome ya " .print_r($_SESSION['userData']);
	if(!isset($_SESSION['userData'])){
		echo "
			<script type=\"text/javascript\">
				alert('please Login First');
			</script>
			";
		sleep(1);
		header("Location:index.php");
		exit();
	}else{
		//echo "Welcome ya " .print_r($_SESSION['userData']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>AOJ HomePage</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body></body>
	<div id="side-bar">
		<p>Handle: <?php echo $_SESSION['userData']['Handle'];?></p>	
		<p>your	 rating:<?php echo $_SESSION['userData']['Rate'];?></p>
		<a href="#" > my submissions</a>
	</div>
	<table>
		<tr>
			<td>problem name</td>
			<td>Level</td>
			<td>Score</td>
		</tr>
		<?php
			include 'database.php';
			$db = new DataBase();
			$res=$db->getAllProblems();
			while($cur=mysqli_fetch_assoc($res)){
				echo "<tr>";
				echo "<td> <a href='problem.php?pID=".$cur['ID']."'>".$cur['PName']."</a> </td>";
				echo "<td>".$cur['level']."</td>";
				echo "<td>".$cur['score']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>