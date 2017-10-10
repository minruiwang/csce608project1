<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Job Application System</title>

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

  <body>

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
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Howdy!</h1>
        <h2>Welcome to Job Application System</h2>
        <p>This is system for student to manage their job application status. Please press "Learn more" to get the information of companies.</p>
        
        <Form Method = "Post" ACTION = "selectcom.php"> 
      		<Input class="btn btn-primary btn-lg" Type = "Submit" Value = "Learn More">
      </Form>
      </div>
    </div>
    <!-- The SELECT function -->
      
      
      <div class="container">
      <Form Method = "Post" ACTION = "selectstu.php"> 
      
        To review your personal information, input your ID here:            
        <Input Name = "id1" Type = "Text">
        <Input Type = "Submit" Value = "Submit">
      
        
        <br>

        
        
        
      </Form>
      
      
      <!-- UPDATE -->  <hr/>  
      <span style="color:rgb(70,130,180);font-weight:bold">Information Update:</span>
      <br>
      
      <br>
    <?php 
      $temp = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $temp = $_POST["name"];
              if (!preg_match('/^[0-9]*$/', $temp)){
                echo "Only number from 1 to 1000";
              }
          }
        }
    ?>
      
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

    Your old information:
    <br>
    <br>
      
      ID: <input type="text" name="name" value="<?php echo $temp;?>">
      <input type="submit" name="submit" value="Submit">  
    </form>
      
      
      <?php 
      if ($temp == ""){} 
      
      else {
      $sql = "SELECT * FROM Student WHERE StudentID = $temp";
      $result = $db->query($sql);
      
      while($row = $result->fetch_assoc()) {    
      ?>
      <head>
      <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        background-color: white;
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
      }
      ?>
      
      
      </tbody>
      
      </table>  
      <br>
      <Form Method = "Post" ACTION = "update.php">
        Please input the new information 
        you want to update. <br>
        
        ID: <input Name="StudentId" Type="text"  value="<?php echo $temp;?>">  
        Name: <Input Name = "Name" Type = "Text">  
        GradYear: <Input Name = "Gradyear" Type = "Text">  
        Gender: <Input Name = "Gender" Type = "Text">  <br>
        
        <BR>
    
        <Input Type = "Submit" Value = "Update">
      </Form>
      
      <!-- INSERT -->   <hr/> 
      
      <Form Method = "Post" ACTION = "insert.php">
      <span style="color:rgb(70,130,180);font-weight:bold">Information Insert:</span>
      <br>
      <br>
        Please Insert your Application information.

        <br>
        StudentID: <Input Name = "ID" Type = "Text">        
        CompanyName<Input Name = "Name" Type = "Text">  
        <select Name= "Status">
          <option value="">Please Select</option>
          <option value="Not Apply">Not Apply</option>
          <option value="Refered">Refered</option>
          <option value="Online">Online</option>
          <option value="On-campus">On-campus </option>
          <option value="OA">OA</option>
          <option value="Phone Interview">Phone Interview</option>
          <option value="Onsite">Onsite</option>
        </select>
        <br>
        <BR>
        <Input Type = "Submit" Value = "Insert">
      </Form>
      <!-- insert the Student information --> 
        
      <Form Method = "Post" ACTION = "insertcom.php">
        Please Insert the company information.

        <br>
              
        Name: <Input Name = "CompanyName" Type = "Text">  
        Location: <Input Name = "Location" Type = "Text">  
        Industry: <Input Name = "Industry" Type = "Text">  <br>
                
        <BR>
        <Input Type = "Submit" Value = "Insert">
      </Form>
      
      <!-- DELETE -->  <hr/>  
      
      <Form Method = "Post" ACTION = "delete.php">
      <span style="color:rgb(70,130,180);font-weight:bold">Information Delete:</span>
      <br>
      <br>
      	Delete student personal information:
        <BR>  
        
        StudentID: <Input Name = "Name" Type = "Text">
          
        <Input Type = "Submit" Value = "Delete">
        <BR>  
        
        Just Delete Application record:
        <BR>  
        StudentID <Input Name = "appli" Type = "Text">
          
        <Input Type = "Submit" Value = "Delete">
      </Form>
      </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
