<!-- Meg Fryling -->
<!-- October 2019 -->

<?php include('includes/database.php'); ?>

<?php
  //Create the select query to get all the to do tasks.
  //Join with todolist table so list name can be displayed too.
  //************************************************************** 
  $query = "PUT QUERY HERE";
  //************************************************************** 
       
  //Get results
  $result = mysql_query($query, $dbh);

  //echo "PHP Version: ".PHP_VERSION;  5.4.16
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do Tasks | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="add_tasks.php">Add Task</a></li>
        </ul>
        <h3 class="text-muted">My To Do Items</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Tasks</h2>
		 <table class="table table-striped">
			<tr>
        <!-- Display Table Headings-->
				<th>List Name</th>
				<th>Task Description</th>
				<th>Due Date</th>
        <th>Priority</th>
				<th></th> <!-- for edit button -->
        <th></th> <!-- for delete button -->
			</tr>
      
			<?php 
         
        //Loop through results         
        while($row = mysql_fetch_assoc($result)){
          //Display task info
          $output ='<tr>';
          $output .='<td>'.$row['name'].'</td>';
          $output .='<td>'.$row['description'].'</td>';
          //************************************************************** 
          //ADD TWO LINES OF CODE HERE
          //************************************************************** 
          //Link to edit task form
          $output .='<td><a href="edit_tasks.php?id='.$row['id'].'" class="btn btn-primary btn-sm">Edit</a></td>'; 
          //Link to delete task form
          //************************************************************** 
          //ADD ONE LINE OF CODE HERE
          //************************************************************** 
          $output .='</tr>';
          
          //Echo output
          echo $output;
        }
      
      ?>
		</table>
        </div>

       
      </div>

      <div class="footer">
        <p>&copy; Company 2019</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
