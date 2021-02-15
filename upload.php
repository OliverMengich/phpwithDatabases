<?php
	//require_once 'conn.php';
	$conn = new PDO('sqlite:file.db');
	if(ISSET($_POST['upload'])){
		
		$location = "uploads/";
		$targetFile = $location . basename($_FILES["fileToUpload"]["name"]);
		
		$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
		if($fileType != "pdf" && $fileType != "docx" && $fileType != "doc" && $fileType != "ppt" && $fileType != "txt" ) {
			echo "Sorry, only documents files are allowed.";
			$uploadOk = 0;
		}
		
		$file=basename( $_FILES["fileToUpload"]["name"]);
		$location1 = "uploads/".$file;
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFile)){
			$query="INSERT INTO `file` (filename, location) VALUES('$file', '$location1')";
 
			$conn->exec($query);
 
			echo "<script>alert('File uploaded!')</script>";
			echo "<script>window.location='index.php'</script>";
			}

	}
?>