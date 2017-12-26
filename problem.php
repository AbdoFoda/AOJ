<?php
	session_start();
	include 'database.php';
	$db = new DataBase();
	if(!isset($_GET['pID'])){
		header("Location:homePage.php");
		exit();
	}
	if(!isset($_SESSION['userData'])){ 
		header("Location:index.php");
	}
?>

<?php
	if(isset($_POST['submit'])){
		$uploads_dir ="uploads/";
		$file=$_FILES["uploadedFile"]["tmp_name"];
		$destination =$uploads_dir.basename($file);
		if(move_uploaded_file($file, $destination) ){
			echo "
			<script type=\"text/javascript\">
				alert('File Has Been Uloaded');
			</script>
			";
		}else{
			echo "
			<script type=\"text/javascript\">
				alert('an error has occured while uploading');
			</script>
			";
		}
		function equalFiles($f1,$f2){
			return filesize($f1)==filesize($f2) && sha1_file($f1)==sha1_file($f2);
		}	

		$prob=$db->getProblemByID($_GET['pID'])->fetch_assoc();
		$origin ="problems/".$prob['PName']."/out.txt";
		$submission=$destination;
		if(equalFiles($origin,$submission)){
			echo "
			<script type=\"text/javascript\">
				alert('Accepted');
			</script>
			";
			$db->increaseScore($_SESSION['userData']['ID'],$_GET['pID']);
		}else{
			echo "
			<script type=\"text/javascript\">
				alert('Wrong Answer');
			</script>
			";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Problem Page</title>
		<link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:#fff">
	<p>
		<?php
			
			$problemData=$db->getProblemByID($_GET['pID'])->fetch_assoc();
			echo "<p id='pName' >".$problemData['PName']."</p>";
			echo "<p id='statement' >".$problemData['PStatement']."</p>";
		?>
	</p>
	<form method="post" enctype="multipart/form-data" action="#">
	<input type="file" name="uploadedFile" id="uploadedFile">
	<input type="submit" value="submit" name="submit">
	<?php 
	$input="problems/".$problemData['PName']."/in.txt";
	echo "<a href='download.php?file=".$input."'> download input file</a>";
	?>
</form>
</body>
</html>


