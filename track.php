<?php
	require_once "./inc/authchecker.php";
	require_once "./inc/config.php";
    require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");

$h1 = $_GET['h1'];
$userQuery = "SELECT * FROM " . $subscript . "orders WHERE oid='" . $h1 . "'";
    $userQuery = $db->query($userQuery);
    $user = $db->fetch($userQuery);
if ($user['status'] == 'transporting' || 'exchanging' || 'returning') {
    $vnd = $db->fetch($db->query("SELECT * FROM " . $subscript . "vendor WHERE vid='" . $user['vid'] . "'"));

    $mdb = $db->fetch($db->query("SELECT * FROM " . $subscript . "medibuddy WHERE mid='" . $user['mid'] . "'"));
    $adm = $db->fetch($db->query("SELECT * FROM " . $subscript . "admin"));
    $check = $db->fetch($db->query("SELECT * FROM " . $subscript . "allusers where aid='" . $_SESSION[SESSION_ID_KEY] . "'"));
    if($user['status'] == 'transporting'){
        $vpro = $vnd['profit'] + ($user['tprice'] * 70 / 100);
        $mpro = $mdb['profit'] + ($user['tprice'] * 10 / 100);
        $apro = $adm['profit'] + ($user['tprice'] * 20 / 100);        
    }
    if($user['status'] == 'returning'){
        $vpro = $vnd['profit'] - ($user['tprice'] * 70 / 100);
        $mpro = $mdb['profit'] - ($user['tprice'] * 10 / 100);
        $apro = $adm['profit'] - ($user['tprice'] * 20 / 100);  
    }

    ?>
<!DOCTYPE html>
<html>
<head>
		<?php generateHead(APPNAME . " - Map"); ?>
</head>
<body>
<div class="authpage">
			<div class="authpage-main row">
				<div class="authpage-main-image col-md-7">
					<img
						src="./assets/21491239.jpg"
						alt="Login"
						title="Login"
						aria-label="Login"
						class="resimage loginimage"
					/>
				</div>
                <div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h1 class="authpage-main-desc-heading">
							Options
						</h1>
						<br />
<div class="mapContainer">
    <a class="primarybutton" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=18.5228,73.8389&amp;hl=en">Get Directions</a>
    <div id="map"></div>
</div>
<?php if ($check['ucat'] != 'medibuddy') {
            if ($user['status'] == "transporting") { ?>
    <a class="primarybutton" href="?h1=<?= $h1; ?>&hh=confirm">Delivered</a><?php }
    if ($user['status'] == "returning") { ?>
    <a class="dangerbutton" href="?h1=<?= $h1; ?>&hh=confirm">Return?</a><?php }
    if ($user['status'] == "exchanging") { ?>
    <a class="primarybutton" href="?h1=<?= $h1; ?>&hh=confirm">Exchange</a><?php }
            if ($_GET['hh'] == "confirm") {
                if ($user['status'] == "transporting") {
                    $db->query("UPDATE " . $subscript . "orders SET status='delivered',apro='" . ($user['tprice'] * 20 / 100) . "',vpro='" . ($user['tprice'] * 70 / 100) . "',mpro='" . ($user['tprice'] * 10 / 100) . "' WHERE oid='" . $h1 . "'");
                    $db->query("UPDATE " . $subscript . "vendor SET profit='" . $vpro . "' WHERE vid='" . $user['vid'] . "'");
                    $db->query("UPDATE " . $subscript . "medibuddy SET profit='" . $mpro . "' WHERE mid='" . $user['mid'] . "'");
                    $db->query("UPDATE " . $subscript . "admin SET profit='" . $apro . "'");
                    header("refresh:0;url=./orders.php?h1=none");
                }
                if ($user['status'] == "returning") {
                    $db->query("UPDATE " . $subscript . "orders SET status='cancelled',apro='" . 0 . "',vpro='" . 0 . "',mpro='" . 0 . "' WHERE oid='" . $h1 . "'");
                    $db->query("UPDATE " . $subscript . "vendor SET profit='" . $vpro . "' WHERE vid='" . $user['vid'] . "'");
                    $db->query("UPDATE " . $subscript . "medibuddy SET profit='" . $mpro . "' WHERE mid='" . $user['mid'] . "'");
                    $db->query("UPDATE " . $subscript . "admin SET profit='" . $apro . "'");
                    header("refresh:0;url=./orders.php?h1=none");
                }
                if ($user['status'] == "exchanging") {
                    $db->query("UPDATE " . $subscript . "orders SET status='exchanged' WHERE oid='" . $h1 . "'");
                    header("refresh:0;url=./orders.php?h1=none");
                }
            }
        }
    ?>
    <div class="authpage-separator"></div>
						<div class="authpage-alternatives">
							<a
								class="dangerbutton"
								title="Go Back"
								href="./orders.php?h1=none&hh=none"
							>
								Go Back?</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
<?php } else {
    echo nl2br("This order is not yet confirmed..\n\n\n");
    echo nl2br('Your medibuddy is on the way.....');
    header("refresh:5;url=./orders.php?h1=none");
}?>