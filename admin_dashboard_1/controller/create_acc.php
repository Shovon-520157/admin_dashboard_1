<?php
	@include '../includes/db_config.php';

	if(isset($_REQUEST['sign_up'])) {
		$user_name = $_REQUEST['user_name'];
		$user_email = $_REQUEST['user_email'];
		$user_pass = $_REQUEST['user_pass'];
		$user_Cpass = $_REQUEST['user_Cpass'];

		if(empty($user_name) || empty($user_email) || empty($user_pass) || empty($user_Cpass)) {
			// $msg = "Please fill up all field";
			echo "Please fill up all field";
		} else {
			$select = "SELECT * FROM user WHERE Email='$user_email'";
			$ex = mysqli_query($connect,$select);
			$email_check = mysqli_num_rows($ex);

			if( $email_check > 0) {
				// $msg = 'Email is already exist';
				echo 'Email is already exist';
			} else {
				if($user_pass !== $user_Cpass) {
					// $msg = 'Password & confirm password is not matched';
					echo 'Password & confirm password is not matched';
				} else {
					$insert = "INSERT INTO user(Name,Email,Pass) VALUES('$user_name','$user_email','$user_pass')";
					$ex = mysqli_query($connect,$insert);
					if($ex) {
						header('location: ../index.php');
					}
				}
			}
		}

		
	}
?>