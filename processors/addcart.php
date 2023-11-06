<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";


$pid = $_GET['h1'];
$pqty = $_GET['hh'];
$userQuery = "SELECT * FROM " . $subscript . "users WHERE aid='" . $_SESSION[SESSION_ID_KEY] . "'";
$userQuery = $db->query($userQuery);
$user = $db->fetch($userQuery);
$uid = $user['uid'];
$userQueryq = "SELECT * FROM ".$subscript."cart WHERE pid='".$pid."' AND uid='".$uid."'";
$userQueryq = $db->query($userQueryq);


if ($db->numrows($userQueryq) == 0 ) {

	$uq = "SELECT * FROM " . $subscript . "add_products WHERE pid='" . $pid . "'";
	$uq = $db->query($uq);
	$u = $db->fetch($uq);
	$pname = $u['pname'];
	$price = $u['price'];
	$filename = $u['images'];



	$creatorQuery = "INSERT INTO " . $subscript . "cart(
				uid,
                pid,
				pname,
				price,
				quantity,
				image
			) VALUES(
				\"" . $uid . "\",
                \"" . $pid . "\",
				\"" . $pname . "\",
				\"" . $price . "\",
				\"" . $pqty . "\",
				\"" . $filename . "\"
			)";



	$created = $db->query($creatorQuery);

	if ($created) {
		echo "Successfully added.";
		header("refresh:1;url=../carts.php?h1=none");
	} else {
		echo "Something went wrong, please try again later.";
		header("refresh:1;url=../prolist.php?h1=none");
	}
}
else{
	echo "This Product already exist in your cart";
		header("refresh:1;url=../carts.php?h1=none");
}
?>