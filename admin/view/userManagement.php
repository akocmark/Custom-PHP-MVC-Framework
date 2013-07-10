<?php
	$accounts_model = new Accounts_Model(); 

	//get all users
	$users = $accounts_model->retrieveUsers();

	//delete specific user via URL
	if(isset($_GET['delete']) && $_GET['delete'] != "") {
		$result = $accounts_model->deleteUser($_GET['delete']);
		header("location: index.php?view=user-management"); 
	}

?>

<h2>User Management Console</h2> 

<a href="?view=add-user" class="btn btn-primary btn-large">Add User</a>

<table class="table table-bordered table-hover" style="margin-top: 20px;">
	<thead>
		<tr>
			<th>User ID</th>
			<th>Account Type</th>
			<th>Name</th>
			<th>Username</th> 
			<th>Date Registered</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody> 
		<?php
			foreach ($users as $value):
				$name = $value->FirstName . " " . $value->LastName; 
		?>
				<tr>
					<td><?php echo $value->ID; ?></td>
					<td><?php echo $value->AccountType; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $value->UserName; ?></td>
					<td><?php echo $value->Date; ?></td>
					<td><a href="?view=add-user&edit=<?php echo $value->ID;?>" class="btn btn-small">Edit</a>&nbsp;<a href="?view=user-management&delete=<?php echo $value->ID; ?>" class="btn btn-small btn-danger">Delete</a></td>
				<tr> 
		<?php endforeach; ?>
	</tbody>
</table>