<?php
	require_once "../inc/config.php";
	require_once "../inc/authchecker.php";


	$userQuery = "SELECT * FROM " . $subscript . "users WHERE aid='" . $_SESSION[SESSION_ID_KEY] . "'";
	$userQuery = $db->query($userQuery);
	$user = $db->fetch($userQuery);
	$uid = $user['uid'];
$uname = $user['name'];


	$u = "SELECT * FROM " . $subscript . "cart WHERE uid='" . $uid . "'";
	function qur($u)
	{
		global $db;
		$result = $db->query($u);
		return $result;
	}
$counter = 0;
$cat = qur($u);
foreach ($cat as $u) {
	$pid = $u['pid'];
	$pname = $u['pname'];
	$price = $u['price'];
	$quantity = $u['quantity'];
	$tprice = $price * $quantity;
	$filename = $u['image'];

	$as = "SELECT * FROM " . $subscript . "add_products WHERE pid='" . $pid . "'";
	$as = $db->query($as);
	$as = $db->fetch($as);


	$uqv = "SELECT * FROM " . $subscript . "vendor WHERE vid='" . $as['vid'] . "'";
	$uqv = $db->query($uqv);
	$uqv = $db->fetch($uqv);
	$vid = $uqv['vid'];
	$vname = $uqv['vendorname'];
	$pharmname = $uqv['pharmacyname'];


	$creatorQuery = "INSERT INTO " . $subscript . "orders(
		vid,
		uname,
				uid,
                pid,
				pname,
				tprice,
				rate,
				quantity,
				image,
				vendorname,
				pharmname
			) VALUES(
				\"" . $vid . "\",
				\"" . $uname . "\",
				\"" . $uid . "\",
                \"" . $pid . "\",
				\"" . $pname . "\",
				\"" . $tprice . "\",
				\"" . $price . "\",
				\"" . $quantity . "\",
				\"" . $filename . "\",
				\"" . $vname . "\",
				\"" . $pharmname . "\"
			)";





	$created = $db->query($creatorQuery);
	if ($created) {
		$db->query("DELETE FROM " . $subscript . "cart WHERE pid='" . $pid . "'");
		$counter++;
	}
}
if($counter>0){
	echo "Orders Placed.";
	header("refresh:1;url=../orders.php?h1=none");
}
else{
	echo "Something went wrong, please try again later.";
	header("refresh:1;url=../carts.php?h1=none");
}

	
?>