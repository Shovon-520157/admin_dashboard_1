<?php
  	@include '../includes/db_config.php';
  	session_start();

  	if($_SESSION['user_info'] == true) {
    	$user_info = $_SESSION['user_info'];
  	} else {
    	header('location: ../../index.php');
 	}


	if(isset($_REQUEST['apply_changes'])) {
		$profile_img = $_FILES['profile_img'];

		$profile_img_name = $_FILES['profile_img']['name'];
		$profile_img_tmp = $_FILES['profile_img']['tmp_name'];
		$profile_img_size = $_FILES['profile_img']['size'];

		$ext_pos = strpos($profile_img_name,'.') + 1;
		$img_ext = substr($profile_img_name,$ext_pos);

		// $select = "SELECT * FROM user WHERE Email='$user_info'";

		if($img_ext != 'jpg') {
			$msg = 'Please select jpg file';
			header("location: ../pages/settings/settings.php?msg=$msg");
		} else {
			if($profile_img_size > '10000000') {
				$msg = 'Please select image between 10 mb';
				header("location: ../pages/settings/settings.php?msg=$msg");
			} else {
				$update = "UPDATE user SET P_pic='$profile_img_name' WHERE Email='$user_info'";
				$ex = mysqli_query($connect,$update);
				if($ex) {
					$msg = 'Update succeded';
					move_uploaded_file($profile_img_tmp,'../assets/images/uploaded_img/'.$profile_img_name);
					header("location: ../pages/settings/settings.php?msg=$msg");
				}
			}
		}

	}
?>