<!-- Meg Fryling -->
<!-- October 2019 -->
<?php include('includes/database.php'); ?>

<?php
//Get to do list values so they can be available for dropdown menu.
$query = "SELECT * FROM todolist";

//This is the old method but works with oraserv version of PHP.
$result = mysql_query($query, $dbh); 
?>

<?php
	//This code executes one the form has been submitted.
	if($_POST){
		
		//Get variables from post array
		$listid = mysql_real_escape_string($_POST['listid']); 
		$description = mysql_real_escape_string($_POST['description']); 
		$duedate = mysql_real_escape_string($_POST['duedate']);
		$priority = mysql_real_escape_string($_POST['priority']);
		
		//Create insert query
		//************************************************************** 
		$query ="PUT QUERY HERE";
		//************************************************************** 
		//Run query
		$result = mysql_query($query, $dbh); //This is the old method but works with oraserv version of PHP.
		
		$msg='Task Added';
		//Return to index.php
		header('Location: index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager | Add Task</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li ><a href="index.php">Home</a></li>
          <li class="active"><a href="add_tasks.php">Add Task</a></li>
        </ul>
        <h3 class="text-muted">Task Manager</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Task</h2>
		 <form role="form" method="post" action="add_tasks.php">
			<!-- Drop down of to do lists-->
			<div class="form-group">
				<label>List</label>
				<select name="listid" type="text" class="form-control" placeholder="Select List">
				<!--************************************************************** -->
				<!-- ADD PHP CODE HERE -->
      			<!--************************************************************** -->
				</select>
			</div>
			<div class="form-group">
				<label>Description</label>
				<input name="description" type="text" class="form-control" placeholder="Enter Description">
			</div>
			<div class="form-group">
				<label>Due Date</label>
				<input name="duedate" type="date" class="form-control" placeholder="Enter Due Date">
			</div>
			<div class="form-group">
				<label>Priority</label>
				<select name="priority" type="text" class="form-control" placeholder="Enter Priority">				
  					<option value="Low">Low</option>
  					<option value="Medium">Medum</option>
  					<!--************************************************************** -->
				    <!-- ADD TWO LINES OF CODE HERE -->
      			   <!--************************************************************** -->
				</select>
			</div>
			<input type="submit" class="btn btn-default" value="Add Task" />
		</form>
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