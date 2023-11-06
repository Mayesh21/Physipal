<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";
	
	$email = $_POST['email'];

	if(!$email){
		// No details of user received.
		echo "Please enter an email";
		header("Refresh:2; url=../login.php");
		exit();
	}

	// Escaping strings to avoid sequel injection.
	$email = $db->escape($_POST['email']);
	$phonenum = $db->escape($_POST['phonenumber']);

	if($email){
		$userQuery = "SELECT * FROM ".$subscript."allusers WHERE email='".$email."'";

		$userQuery = $db->query($userQuery);

		$numUsersMatching = $db->numrows($userQuery);

		if($numUsersMatching === 1){
			$user = $db->fetch($userQuery);
			$userid = $user["phone"];


			if($userid==$phonenum){
				$_SESSION[SESSION_LOGIN_KEY] = true;
				$_SESSION[SESSION_ID_KEY] = $user['aid'];

				echo "Email Verified";
				header("refresh:0;url=../changepwd.php");
				exit();
			} else{
				echo "Invalid Credentials.";
				header("refresh:2;url=../forgotpwd.php");
			}
		} else{
			echo "No User with that email exists in the database.";
			header("refresh:2;url=../forgotpwd.php");
		}
	}
	else header("refresh:0;url=../forgotpwd.php");
?>