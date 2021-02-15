<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
		<label>UPLOAD HERE</label>
     	<input type="file" enctype="multipart/form-data" name="fileToUpload" id="fileToUpload" required="required" class="form-control"/>
        <center><button class="btn btn-primary" name="upload">Upload</button></center>
		
	</form>
    <div class="col-md-8">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>File Name</th>
						<th>Location</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require'conn.php';
 
						$query=$conn->query("SELECT filename,location FROM `file` LIMIT 5") or die("Failed to fetch row!");
						while($fetch=$query->fetch()){
							echo"<tr><td>".$fetch['filename']."</td><td>".$fetch['location']."</td></tr>";
						}
					?>
				</tbody>
			</table>
	</div>
	<div>
	<?php
	   require'conn.php';
	   $sql = $conn->query("SELECT * FROM 'file' ") or die("Failed to Fetch row");
	   while($fetch= $sql->fetch()){
		   echo "<a href=". $fetch['location'].">". htmlspecialchars( basename($fetch['filename']))."</a> <br/>";
	   }
	?>
	</div>
</body>
</html>