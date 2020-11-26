<?php include('controllers/register.php'); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<title>Phoenix</title>
		<!-- jQuery + Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?php include('layouts/header.php'); ?>
		
		<div class="App">
			<div class="vertical-center">
				<div class="inner-block">
					<form action="" method="post">
						<h3>Register</h3>
						
						<?php echo $success_msg; ?>
						<?php echo $email_exist; ?>
						
						<?php echo $email_verify_err; ?>
						<?php echo $email_verify_success; ?>
						
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" id="username" />
							<?php echo $fNameEmptyErr; ?>
							<?php echo $f_NameErr; ?>
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" id="email" />
							<?php echo $_emailErr; ?>
							<?php echo $emailEmptyErr; ?>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" id="password" />
							<?php echo $_passwordErr; ?>
							<?php echo $passwordEmptyErr; ?>
						</div>
						
						<button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">Sign up
						</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>