<?php
	$accounts_model = new Accounts_Model();

	if(isset($_GET['edit']) && $_GET['edit']!="") {

		if(!isset($_SESSION['USERID'])) {
			header("location: index.php?view=404");
		}elseif ($_SESSION['USERID'] != $_GET['edit']) {
			header("location: index.php?view=404");
		}

		$userinfo = $accounts_model->getUserInfo($_GET['edit']);
		if(empty($userinfo)) {
			header("location: index.php?view=404");
		}
		
	}else {
		header("location: index.php?view=404");
	}

	if(isset($_POST['edit'])) {
		$id = $_POST[userID];

		$editUser = $accounts_model->updateUser($_POST);
		if($editUser)
			header("location: index.php?view=profile&id=$id");
	}


?>

<h2>Edit Profile</h2>

<form class="form form-horizontal" action="" method="Post">

	<input type="hidden" name="userID" value="<?php echo $userinfo['ID']; ?>">

	<label for="firstname">Name:</label>
	<input type="text" name="firstname" value="<?php echo $userinfo['Name'];  ?>" placeholder="First Name">  
	<input type="text" name="lastname" value="<?php echo $userinfo['LastName'];  ?>" placeholder="Last Name">

	<label for="username">Login Details:</label>
	<input type="text" name="username" value="<?php echo $userinfo['UserName'];  ?>" placeholder="Username">
	<input type="password" name="password" value="<?php echo "password";  ?>" placeholder="Password" disabled >
	<a href="">Edit</a>

	<label for="accountType">Account Type:</label>
	<select name="accountType"> 
		<option value="User" <?php echo isset($userinfo) && ($userinfo['AccountType'] == "User") ? "selected" : ""; ?> >User</option>
		<option value="Admin" <?php echo isset($userinfo) && ($userinfo['AccountType'] == "Admin") ? "selected" : ""; ?> >Admin</option>
	</select>

	<br><br>
	<input type="submit" name="edit" value="Save" class="btn btn-warning">

</form>