<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(!$email || !$password){
		// No details of user received.
		echo "Please enter an email or password.";
		header("Refresh:2; url=../admin.php");
		exit();
	}

	// Escaping strings to avoid sequel injection.
	$email = $db->escape($_POST['email']);
	$password = $db->escape($_POST['password']);

	if($email && $password){
		$userQuery = "SELECT * FROM ".$subscript."admin WHERE adminmail='".$email."'";

		$userQuery = $db->query($userQuery);

		$numUsersMatching = $db->numrows($userQuery);

		if($numUsersMatching === 1){
			$user = $db->fetch($userQuery);
			$userPassword = $user["adpassword"];	// BCrypt Hash.
		// echo password_hash($userPassword,PASSWORD_BCRYPT,
		// [
		// 	"cost" => -13
		// ]);
			// Validating hash with the password sent.
			$hashedReceivedPassword = password_verify(
				$password,
				$userPassword
			);

			if($hashedReceivedPassword){
				$_SESSION[SESSION_LOGIN_KEY] = true;
				$_SESSION[SESSION_ID_KEY] = $user['adminid'];
				echo "Successfully logged in.";
				echo $_SESSION[SESSION_ID_KEY];
				echo $_SESSION[SESSION_LOGIN_KEY];

				header("refresh:1;url=../MasterAdmin/index.php?h1=none");
				exit();
			} else{
				echo "Invalid Credentials.";
				header("refresh:2;url=../admin.php");
			}
		} else{
			echo "No User with that email exists in the database.";
			header("refresh:2;url=../admin.php");
		exit();
		}
	}
	else header("refresh:0;url=../admin.php");
?>