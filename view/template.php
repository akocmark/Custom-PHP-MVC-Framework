<?php
	date_default_timezone_set('Asia/Manila'); 

	$accounts_model = new Accounts_Model();

	if (isset($_SESSION['USERID']) && $_SESSION['USERID']!="") {
		$userinfo = $accounts_model->getUserInfo($_SESSION['USERID']);
		if ($userinfo['AccountType'] == "Admin")
			header('location: admin/index.php');
	}

	if(isset($_POST['login'])) {
		$login = $accounts_model->logIn($_POST['username'],$_POST['password']);
		if($login) {
			$id = $_SESSION['USERID'];
			header("location: index.php?view=profile&id=$id");
		}
	}

	if(isset($_POST['logout'])) {
		$accounts_model->logOut($_SESSION['USERID']);
	}

?>
<!DOCTYPE HTML>		
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="includes/css/style.css">
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-responsive.min.css"> 
		<title>Custom MVC Framework</title>
	</head>

	<body>
		<div class="container-fluid">
			
			<div class="row-fluid">
				<header class="span12">
					<div class="form-signin pull-right">

						<?php if (isset($_SESSION['USERID']) && $_SESSION['USERID']!=""): ?>
								<form action="" method="POST">
									<a href="#" class="profile">Welcome, <?php echo $userinfo['Name']; ?>!&nbsp;&nbsp;</a>
									<input type="submit" name="logout" value="Logout" class="btn">
								</form>						
						<?php else: ?>
								<form action="" method="POST" class="form-inline">
									<label>Username</label>
									<input type="text" name="username" value="">
									<label>Password</label>
									<input type="password" name="password" value="">
									<input type="submit" name="login" value="Login" class="btn">
								</form>
						<?php endif; ?>

					</div>
					<nav>
						<a href="index.php" class="logo">MarkCMS - CMS Built with MVC Architecture</a>
					</nav>
				</header>
			</div>

			<div class="row-fluid">
				<?php if(isset($_SESSION['USERID'])): $id = $_SESSION['USERID']; ?>
					<aside class="span3 dashboard">
						<h4 class="header">Dashboard</h4>

						<div class="span12">
							<ul>
								<li><a href="index.php?view=profile&id=<?php echo $id; ?>">View Profile</a></li>
								<li><a href="index.php?view=user-logbook">View Logbook</a></li>
							</ul>
						</div>
					</aside>
				<?php endif; ?>

				<section class="<?php echo isset($_SESSION['USERID']) ? "span9" : "span12"; ?> main-content">
					<?php echo $RENDER_VIEW; ?>
				</section>
			</div>


		</div>



	<script src="includes/js/jquery-latest.js"></script> 
	<script src="includes/js/bootstrap.min.js"></script>
	</body>
</html>