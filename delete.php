<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  
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
      //echo "Connected successfully (".$db->host_info.")";
    //close the connection
    #mysqli_close($conn);
  ?>
	
	<Body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Job Application System</a>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<form class="navbar-form navbar-right">
            <div class="btn btn-success">>
            	<a href="index.php">Go Back</a>
            </div>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
		<Center>
			<H1>
			Deleting Data From Database:
			</H1>
			
			
			<?php
			
				$name = $_POST["Name"];
				if("" == trim($name )){
					#if input nothing, then leave blank
				}
				else {
				
				$sql1 = "DELETE FROM Student WHERE StudentID = $name";
				
				
				$sql2 = "DELETE FROM Applications WHERE StudentID = $name";
				
				
				if (($db->query($sql1) and $db->query($sql2)) === TRUE) {
					echo "Contact deleted successfully";
				} else {
					echo "Error deleting record: " . mysql_error();
				}
				}			
				echo "<br>";
			?>
			
			<?php			
				$no = $_POST["appli"];
				
				if("" == trim($no )){
					#if input nothing, then leave blank
				}
				else {
				
				$sql = "DELETE FROM Applications WHERE StudentID = $no";
				$result = $db->query($sql);
				
				if ($db->query($sql)) {
					echo "Applications record deleted successfully";
				} else {
					echo "Error deleting record: " . mysql_error();
				}
				}			
				echo "<br>";
			?>

		</Center>
	</Body>
</html>