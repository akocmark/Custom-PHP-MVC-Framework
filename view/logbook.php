<?php
	$logbook_model = new Logbook_Model();

	//retrieve all user's log in table tblLogBook
	$logs = $logbook_model->retrieveUserLogs($_SESSION['USERID']); 
?>

<h2>Users' Logbook</h2>

<table class="table table-bordered table-hover">
	<thead>
		<tr> 
			<th>Login Time</th>
			<th>Logout Time</th> 
		</tr>
	</thead>

	<tbody>
		<?php
			foreach ($logs as $value):
				$name = $value->FirstName . " " . $value->LastName;
		?>
				<tr> 
					<td><?php echo $value->LogIn; ?></td>
					<td><?php echo $value->LogOut; ?></td> 
				<tr>
		<?php endforeach; ?>
	</tbody>
</table>