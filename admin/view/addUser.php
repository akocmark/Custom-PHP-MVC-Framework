<?php
	$accounts_model = new Accounts_Model();

	if(isset($_GET['edit']) && $_GET['edit']!="") {
		$userinfo = $accounts_model->getUserInfo($_GET['edit']);
	}

	if(isset($_POST['add'])){
		$addUser = $accounts_model->insertUser($_POST);
		if($addUser) 
			header("location: index.php?view=user-management");
	}

	if(isset($_POST['edit'])) {
		$editUser = $accounts_model->updateUser($_POST);
		if($editUser)
			header("location: index.php?view=user-management");
	}


?>

<h2><?php echo isset($userinfo) ? "Edit" : "Add" ?> User</h2>

<?php if (isset($userinfo)) : ?>
	<a href="?view=add-user" class="btn btn-primary btn-large" style="margin-bottom: 20px;">Add User</a>
<?php endif; ?>
	
<form class="form form-horizontal" action="" method="Post">

	<input type="hidden" name="userID" value="<?php echo isset($userinfo) ? $userinfo['ID'] : ""; ?>">

	<label for="firstname">Name:</label>
	<input type="text" name="firstname" value="<?php echo isset($userinfo) ? $userinfo['Name'] : "";  ?>" placeholder="First Name">  
	<input type="text" name="lastname" value="<?php echo isset($userinfo) ? $userinfo['LastName'] : "";  ?>" placeholder="Last Name">

	<label for="username">Login Details:</label>
	<input type="text" name="username" value="<?php echo isset($userinfo) ? $userinfo['UserName'] : "";  ?>" placeholder="Username">
	<input type="password" name="password" value="<?php echo isset($userinfo) ? "password" : "";  ?>" placeholder="Password" <?php echo isset($userinfo) ? "disabled" : "";  ?> >
	<?php echo isset($userinfo) ? "<a href=\"\">Edit</a>" : ""; ?>

	<label for="accountType">Account Type:</label>
	<select name="accountType"> 
		<option value="User" <?php echo isset($userinfo) && ($userinfo['AccountType'] == "User") ? "selected" : ""; ?> >User</option>
		<option value="Admin" <?php echo isset($userinfo) && ($userinfo['AccountType'] == "Admin") ? "selected" : ""; ?> >Admin</option>
	</select>

	<br><br>
	<input type="submit" name="<?php echo isset($userinfo) ? "edit" : "add" ?>" value="<?php echo isset($userinfo) ? "Save" : "Add User" ?>" class="btn <?php echo isset($userinfo) ? "btn-warning" : "btn-primary" ?>">

</form>