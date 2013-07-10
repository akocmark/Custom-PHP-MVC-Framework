<?php
	$accounts_model = new Accounts_Model();

	if (isset($_SESSION['USERID']) && $_SESSION['USERID']!="") {
		$userinfo = $accounts_model->getUserInfo($_SESSION['USERID']);
		if ($userinfo['AccountType'] != "Admin")
			header('location: ../index.php');
	} else {
		header('location: ../index.php');
	}

	if(isset($_POST['logout'])) {
		$accounts_model->logOut($_SESSION['USERID']);
	}

?>
<!DOCTYPE HTML>		
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../includes/css/style.css">
		<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap-responsive.css"> 
		<title>Custom MVC Framework</title>
	</head>

	<body>
		<div class="container-fluid">
			
			<div class="row-fluid">
				<header class="span12">
					<div class="form-signin pull-right"> 
						<form action="" method="POST">
							<a href="#" class="profile hidden-phone">Welcome, <?php echo $userinfo['Name']; ?>!&nbsp;&nbsp;</a>
							<input type="submit" name="logout" value="Logout" class="btn">
						</form>		
					</div>
					<nav>
						<a href="index.php" class="logo">MarkCMS <span class="hidden-phone">- CMS Built with MVC Architecture</span></a>
					</nav>
				</header>
			</div>

			<div class="row-fluid">
				<aside class="span3 dashboard">
					<h4 class="header">Dashboard</h4>

					<div class="span12">
						<ul>
							<li><a href="index.php">View Logbook</a></li>
							<li><a href="index.php?view=user-management">User Management</a></li>
						</ul>
					</div>
				</aside>

				<section class="span9 main-content">
					<?php echo $RENDER_VIEW; ?>
				</section>
			</div>


		</div>
	</body>
</html>