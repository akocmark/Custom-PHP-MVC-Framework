<?php
	$accounts_model = new Accounts_Model();

	if(isset($_GET['id']) && $_GET['id']!="") {
		$id = $_GET['id'];
		$userinfo = $accounts_model->getUserInfo($id);
		if(empty($userinfo))
			header("location: index.php?view=404");
	}else {
		header("location: index.php?view=404");
	}
?>

<h2>Profile Information</h2>

<?php if(isset($_SESSION['USERID']) && $_SESSION['USERID'] == $_GET['id']): ?>
	<a href="?view=edit-profile&edit=<?php echo $id; ?>" class="btn btn-primary btn-large">Edit Profile</a>
<?php endif; ?>

<table class="table table-bordered table-hover" style="margin-top: 20px;"> 
	<tr>
		<th>Account Type</th>
		<td><?php echo $userinfo['AccountType']; ?></td>
	</tr>
	<tr>
		<th>First Name</th>
		<td><?php echo $userinfo['Name']; ?></td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td><?php echo $userinfo['LastName']; ?></td>
	</tr>
	<tr>
		<th>Username</th> 
		<td><?php echo $userinfo['UserName']; ?></td>
	</tr>
	<tr>
		<th>Date Registered</th>
		<td><?php echo $userinfo['Date']; ?></td>
	</tr> 
</table>