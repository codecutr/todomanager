<!-- Meg Fryling -->
<!-- October 2019 -->
<?php include('includes/database.php'); ?>
<?php
	//Assign get variable
	$id = $_GET['id'];
	
	//Create to do task select query
	$query = "SELECT l.name, t.listid, t.description, t.duedate, t.priority FROM todolist l inner join todotasks t on l.id = t.listid WHERE t.id = $id";
    
    $result = mysql_query($query, $dbh);

	//Fetch object array
	while($row = mysql_fetch_assoc($result)){
		$name = $row['name'];
		$listid = $row['listid'];
		$description = $row['description'];
		$duedate = $row['duedate'];
		$priority = $row['priority'];
	}

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
		
		//Create customer query
		//************************************************************** 
		$query ="PUT QUERY HERE";
		//**************************************************************
								
		//Run query
		$result = mysql_query($query, $dbh); //This is the old method but works with oraserv version of PHP.
		
		$msg='Task Updated';
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
    <title>To Do Tasks | Edit Tasks</title>
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
          <li class="active"><a href="add_tasks.php">Add Tasks</a></li>
        </ul>
        <h3 class="text-muted">To Do Tasks Manager</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Edit Tasks</h2>
		 <form role="form" method="post" action="edit_tasks.php?id=<?php echo $id; ?>">
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
				<input name="description" type="text" class="form-control" 
				value="<?php echo $description; ?>" placeholder="Enter Task Description">
			</div>
			<div class="form-group">
				<label>Due Date</label>
				<input name="duedate" type="date" class="form-control" 
				value="<?php echo $duedate; ?>" placeholder="Enter Due Date">
			</div>
			<div class="form-group">
				<label>Priority</label>
				<select name="priority" type="text" class="form-control" placeholder="Enter Priority">	
					<!-- Preselect the option that currently selected for that record.	-->		
  					<option <?php if($priority == 'Low') echo"selected "; ?> value="Low">Low</option>
  					<option <?php if($priority == 'Medium') echo"selected "; ?>value="Medium">Medum</option>
  					<!--************************************************************** -->
				    <!-- ADD TWO LINES OF CODE HERE -->
      			   <!--************************************************************** -->
				</select>
			</div>
			<input type="submit" class="btn btn-default" value="Update Task" />
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