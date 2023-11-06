<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pharmacyname = $_POST['pharmacyname'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];


	if(!$email || !$password || !$username || !$name ){
		// No details of user received.
		echo "Please enter an email, password, username and name.";
		header("refresh:2; url=../register.php");
		exit();
	}

	// Escaping strings to avoid sequel injection.
	$email = $db->escape($_POST['email']);
	$password = $db->escape($_POST['password']);
	$pharmacyname = $db->escape($_POST['pharmacyname']);
	$name = $db->escape($_POST['name']);
	$phone = $db->escape($_POST['phone']);
	$location = $db->escape($_POST['location']);



	if($email && $password){
		$userQuery = "SELECT * FROM ".$subscript."users WHERE email='".$email."' OR name='".$name."'";

		$userQuery = $db->query($userQuery);

		$numUsersMatching = $db->numrows($userQuery);

		if($numUsersMatching <= 0){
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

			// Creating a user in the database.

			$creatorQuery = "INSERT INTO ".$subscript."allusers(
				vendorname,
				email,
				phone,
				password,
				ucat
			) VALUES(
				\"".$name."\",
				\"".$email."\",
				\"".$phone."\",
				\"".$hashedReceivedPassword."\",
				\"".'vendor'."\"
			)";
			$created = $db -> query($creatorQuery);
			$uq = "SELECT * FROM ".$subscript."allusers WHERE email='".$email."'";
			$uq = $db->query($uq);
			$us = $db->fetch($uq);
			$u1 = $us['aid'];

			$creatorQuery1 = "INSERT INTO ".$subscript."vendor(
				aid,
				pharmacyname,
				email,
				vendorname,
				phone,
				location
			) VALUES(
				\"".$u1."\",
				\"".$pharmacyname."\",
				\"".$email."\",
				\"".$name."\",
				\"".$phone."\",
				\"".$location."\"
			)";

			
			$create = $db->query($creatorQuery1);

			if($created && $create){
				echo "Successfully signed up.";
				header("refresh:2;url=../login.php");
				exit();
			} else{
				echo "Something went wrong, please try again later.";
				header("refresh:2;url=../register.php");
			}
		} else{
			echo "User with that email or username already exists. Kindly login with that.";
			header("refresh:2;url=../login.php");
		}
	}
	else header("refresh:0;url=../register.php");
?>