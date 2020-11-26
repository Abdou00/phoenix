<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	// Database connection
	include('config/db.php');
	
	// Swiftmailer lib
	require_once 'vendor/autoload.php';
	
	// Error & success messages
	global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
	global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;
	
	// Set empty form vars for validation mapping
	$_user_name = $_email = $_password = "";
	
	if(isset($_POST["submit"])) {
		$username    = $_POST["username"];
		$email         = $_POST["email"];
		$password      = $_POST["password"];
		
		// check if email already exist
		$email_check_query = mysqli_query($con, "SELECT * FROM tp_accounts WHERE email = '{$email}' ");
		$rowCount = mysqli_num_rows($email_check_query);
		
		
		// PHP validation
		// Verify if form values are not empty
		if(!empty($username) && !empty($email) && !empty($password)){
			
			// check if user email already exist
			if($rowCount > 0) {
				$email_exist = '<div class="alert alert-danger" role="alert">User with email already exist!</div>';
			} else {
				// clean the form data before sending to database
				$_user_name = mysqli_real_escape_string($con, $username);
				$_email = mysqli_real_escape_string($con, $email);
				$_password = mysqli_real_escape_string($con, $password);
				
				// perform validation
				if(!preg_match("/^[a-zA-Z ]*$/", $_user_name)) {
					$f_NameErr = '<div class="alert alert-danger">Only letters and white space allowed.</div>';
				}
				if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
					$_emailErr = '<div class="alert alert-danger">Email format is invalid.</div>';
				}
				if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
					$_passwordErr = '<div class="alert alert-danger">Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.</div>';
				}
				
				// Store the data in db, if all the preg_match condition met
				if(
					(preg_match("/^[a-zA-Z ]*$/", $_user_name)) &&
					(filter_var($_email, FILTER_VALIDATE_EMAIL)) &&
					(preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password))
				){
					// Generate random activation token
					$token = md5(rand().time());
					// Password hash
					$password_hash = password_hash($password, PASSWORD_BCRYPT);
					// Query
					$sql = "INSERT INTO tp_accounts (username, email, password, token, is_active, date_time) VALUES ('{$username}', '{$email}', '{$password_hash}', '{$token}', '0', now())";
					// Create mysql query
					$sqlQuery = mysqli_query($con, $sql);
					
					if(!$sqlQuery){
						die("MySQL query failed!" . mysqli_error($con));
					}
					
					// Send verification email
					if($sqlQuery) {
						$msg = 'Click on the activation link to verify your email. <br><br><a href="http://localhost:8888/TP/Phoenix/user_verificaiton.php?token='.$token.'"> Click here to verify email</a>';
						
						// Create the Transport
						$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
							->setUsername('samba4292@gmail.com')
							->setPassword('Samba@92vlg');
						
						// Create the Mailer using your created Transport
						$mailer = new Swift_Mailer($transport);
						
						// Create a message
						$message = (new Swift_Message('Please Verify Email Address!'))
							->setFrom([$email => $username])
							->setTo($email)
							->addPart($msg, "text/html")
							->setBody('Hello! User');
						
						// Send the message
						$result = $mailer->send($message);
						
						if(!$result){
							$email_verify_err = '<div class="alert alert-danger">Verification email coud not be sent!</div>';
						} else {
							$email_verify_success = '<div class="alert alert-success">Verification email has been sent!</div>';
						}
					}
				}
			}
		} else {
			if(empty($firstname)){
				$fNameEmptyErr = '<div class="alert alert-danger">First name can not be blank.</div>';
			}
			if(empty($lastname)){
				$lNameEmptyErr = '<div class="alert alert-danger">Last name can not be blank.</div>';
			}
			if(empty($email)){
				$emailEmptyErr = '<div class="alert alert-danger">Email can not be blank.</div>';
			}
			if(empty($mobilenumber)){
				$mobileEmptyErr = '<div class="alert alert-danger">Mobile number can not be blank.</div>';
			}
			if(empty($password)){
				$passwordEmptyErr = '<div class="alert alert-danger">Password can not be blank.</div>';
			}
		}
	}
?>