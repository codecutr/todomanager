<!-- Meg Fryling -->
<!-- October 2019 -->
<?php include('includes/database.php'); ?>
<?php
	//Assign get variable
	$id = $_GET['id'];
	
	//Create task select query
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
?>

<?php
	//This code executes one the form has been submitted.
	if($_POST){

    //Get variables from post array
    $id = mysql_real_escape_string($_POST['id']); 
		
		//Create delete to do tasks query
		//************************************************************** 
    $query ="PUT QUERY HERE";
    //************************************************************** 
								
		//Run query
		$result = mysql_query($query, $dbh); //This is the old method but works with oraserv version of PHP.
		
		$msg='Task Deleted';
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
    <title>To Do Tasks | Delete Tasks</title>
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
         <h2>Delete Tasks</h2>

		 <table class="table table-striped">
      <form role="form" method="post" action="delete_tasks.php">
      <!-- Hidden input to just hold todotask primary key id field -->
      <input name="id" type="hidden" value="<?php echo $id; ?>">
			<tr>
        		<!-- Display Table Headings-->
				<th>List Name</th>
				<th>Task Description</th>
				<th>Due Date</th>
        		<th>Priority</th>
            <th></th> <!-- Cancel Delete Button -->
        		<th></th> <!-- Confirm Delete Button -->
			</tr>
      <!-- ************************************************************** -->
		  <?php 
          //Display task info to be deleted
          $output ='<tr>';
          $output .='<td>'.$name.'</td>';
          $output .='<td>'.$description.'</td>';
          $output .='<td>'.$duedate.'</td>';
          $output .='<td>'.$priority.'</td>';
          //Link to delete task form
          $output .='<td><a href="index.php" class="btn btn-default btn-sm">Cancel</a></td>';
          $output .= '<td><input type="submit" class="btn btn-danger" value="Confirm Delete" />';      
          $output .='</tr>';
          
          //Echo output
          echo $output;
          
      ?>
        <!-- ************************************************************** -->
		  </form>
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