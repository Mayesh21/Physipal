<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$Address = $_POST['Address'];


	if(!$email || !$password || !$username || !$name ){
		// No details of user received.
		echo "Please enter an email, password, username and name.";
		header("refresh:2; url=../register.php");
		exit();
	}

	// Escaping strings to avoid sequel injection.
	$email = $db->escape($_POST['email']);
	$password = $db->escape($_POST['password']);
	$username = $db->escape($_POST['username']);
	$name = $db->escape($_POST['name']);
	$phone = $db->escape($_POST['phone']);
	$Address = $db->escape($_POST['Address']);



	if($email && $password){
		$userQuery = "SELECT * FROM ".$subscript."users WHERE email='".$email."' OR username='".$username."'";

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
				medibuddyname,
				email,
				phone,
				password,
				ucat
			) VALUES(
				\"".$name."\",
				\"".$email."\",
				\"".$phone."\",
				\"".$hashedReceivedPassword."\",
				\"".'medibuddy'."\"
			)";
			$created = $db -> query($creatorQuery);
			$uq = "SELECT * FROM ".$subscript."allusers WHERE email='".$email."'";
			$uq = $db->query($uq);
			$us = $db->fetch($uq);
			$u1 = $us['aid'];

			$creatorQuery1 = "INSERT INTO ".$subscript."medibuddy(
				aid,
				username,
				email,
				medibuddyname,
				phone,
				Address
			) VALUES(
				\"".$u1."\",
				\"".$username."\",
				\"".$email."\",
				\"".$name."\",
				\"".$phone."\",
				\"".$Address."\"
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