<?php
	$logbook_model = new Logbook_Model();

	//retrieve all data in table tblLogBook
	$logs = $logbook_model->retrieveLogs(); 

	//delete specific log via URL
	if(isset($_GET['delete']) && $_GET['delete'] != "") {
		$result = $logbook_model->deleteLog($_GET['delete']);
		header("location: index.php"); 
	}

?>

<h2>Users' Logbook</h2>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Account</th>
			<th>Name</th>
			<th>Username</th>
			<th>Login Time</th>
			<th>Logout Time</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
			foreach ($logs as $value):
				$name = $value->FirstName . " " . $value->LastName;
		?>
				<tr>
					<td><?php echo $value->AccountType; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $value->UserName; ?></td>
					<td><?php echo $value->LogIn; ?></td>
					<td><?php echo $value->LogOut; ?></td>
					<td><a href="?delete=<?php echo $value->ID; ?>" class="btn btn-small btn-danger">Delete</a></td>
				<tr>
		<?php endforeach; ?>
	</tbody>
</table>