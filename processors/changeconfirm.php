<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";
	
	$password1 = $_POST['npassword'];
    $password2 = $_POST['cpassword'];


	if($password1!=$password2 ){
		// No details of user received.
		echo "Passwords do not match.";
		header("refresh:2; url=../changepwd.php");
		exit();
	}
	// Escaping strings to avoid sequel injection.
	$password = $db->escape($_POST['npassword']);
		// No existing user with those credentials.
		// Creating a hash.

		// Validating hash with the password sent.
		$hashedReceivedPassword = password_hash(
			$password,
			PASSWORD_BCRYPT,
			[
				"cost" => 13
			]
		);

		$hashedReceivedPassword = $db->escape($hashedReceivedPassword);
        $userQuery = "UPDATE ".$subscript."allusers SET password='".$hashedReceivedPassword."' WHERE aid='".$_SESSION[SESSION_ID_KEY]."'";


		$created = $db -> query($userQuery);

		if($created){
			echo "Password Changed Successfully.";
			header("refresh:2;url=../login.php");
			exit();
		}
        else{
			echo "Something went wrong, please try again later.";
			header("refresh:2;url=../register.php");
		}
?>