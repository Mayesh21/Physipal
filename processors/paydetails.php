<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";

	$uname = $_POST['uname'];
	$mail = $_POST['mail'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$card = $_POST['card'];
    $month = $_POST['month'];
    $year = $_POST['year'];

	// Escaping strings to avoid sequel injection.
	$uname = $db->escape($_POST['uname']);
	$mail = $db->escape($_POST['mail']);
	$phone = $db->escape($_POST['phone']);
	$address = $db->escape($_POST['address']);
	$card = $db->escape($_POST['card']);
    $month = $db->escape($_POST['month']);
    $year = $db->escape($_POST['year']);

			$userQuery = "SELECT * FROM ".$subscript."users WHERE aid='".$_SESSION[SESSION_ID_KEY]."'";
			$userQuery = $db->query($userQuery);
			$user = $db->fetch($userQuery);
			$uid = $user['uid'];

            $uq1 = "SELECT * FROM ".$subscript."card WHERE uid='".$uid."'";
            $uq1 = $db->query($uq1);


if ($db->numrows($uq1) === 0) {
    $creatorQuery = "INSERT INTO " . $subscript . "card(
				uid,
				uname,
				phone,
				email,
				address,
				cardno,
				expm,
				expy
			) VALUES(
				\"" . $uid . "\",
				\"" . $uname . "\",
				\"" . $phone . "\",
				\"" . $mail . "\",
				\"" . $address . "\",
				\"" . $card . "\",
				\"" . $month . "\",
				\"" . $year . "\"
			)";
}
else{
    $creatorQuery = "UPDATE " . $subscript . "card SET
        uname=\"" . $uname . "\",
        phone=\"" . $phone . "\",
        email=\"" . $mail . "\",
        address=\"" . $address . "\",
        cardno=\"" . $card . "\",
        expm=\"" . $month . "\",
       expy=\"" . $year . "\" WHERE uid='".$uid."'";
}
			
			$created = $db -> query($creatorQuery);

			if($created){
				echo "Successfully added.";
				header("refresh:2;url=../processors/addorders.php?h1=none");
			} else{
				echo "Something went wrong, please try again later.";
				header("refresh:2;url=../pay.php");
			}
?>