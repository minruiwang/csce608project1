
<Html>
	<Head>
		<Title>
			Your Update Field
		</Title>
		<style>
				body {background-color: powderblue;}
			</style>
	</head>
	
	<a href="index.php">Go Back</a>

	
	<?php
		$servername = "127.0.0.1";
    	$username = "wmrsara";
    	$password = "";
    	$database = "c9";
    	$dbport = 3306;

    	// Create connection
    	$db = new mysqli($servername, $username, $password, $database, $dbport);

    	// Check connection
    	if ($db->connect_error) {
        	die("Connection failed: " . $db->connect_error);
    	} 
    	echo "Connected successfully (".$db->host_info.")";

		//close the connection
		#mysqli_close($conn);
	?>
	
	<Body>
		<Center>
			<H1>
				Your Update Information:
			</H1>
			
			
			<?php	
				$id = $_POST["StudentId"];
				$name = $_POST["Name"];
				$byear = $_POST["Gradyear"];
				$gender = $_POST["Gender"];
				//$age = $_POST["Age"];
				
				##$sql = "SELECT * FROM chen0209app.contact WHERE ID = $name";
				$sql = "UPDATE Student SET Name='{$name}', Gradyear=$byear, Gender='{$gender}' WHERE StudentID=$id";
				

				if ($db->query($sql) === TRUE) {
					echo "Record updated successfully";
				} else {
					echo "Error updating record: " . $db->error;
				}
				?>
			
			Your updated information:	
			<?php 
			$sql = "SELECT * FROM Student WHERE StudentID = $id";
			$result = $db->query($sql);
			
			while($row = $result->fetch_assoc()) {
			?>
			<head>
			<style>
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			</style>
			</head>
			<table>
				<thead>
						<td>ID</td>
						<td>Name</td>
						<td>GradYear</td>
						<td>Gender</td>
						
						<tr>
							<td><?php echo $row["StudentID"]?></td>
							<td><?php echo $row["Name"]?></td>
							<td><?php echo $row["GradYear"]?></td>
							<td><?php echo $row["Gender"]?></td>
						</tr>
			<?php 
				} 						
			?>
			<br>
			</tbody>
			</table>	
				
				

		</Center>
	</Body>
</Html>