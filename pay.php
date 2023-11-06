<?php 
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";
	require_once "./inc/config.php";
    require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
if ($_SESSION[SESSION_ID_KEY] != "") {
    $userQuery = "SELECT * FROM " . $subscript . "users WHERE aid='" . $_SESSION[SESSION_ID_KEY] . "'";
    $userQuery = $db->query($userQuery);
    $user = $db->fetch($userQuery);
    $uid = $user['uid'];
	$userQuery1 = "SELECT * FROM " . $subscript . "card WHERE uid='" . $uid . "'";
    $userQuery1 = $db->query($userQuery1);
	if($db->numrows($userQuery1)){
		$user = $db->fetch($userQuery1);
		$uname = $user['uname'];
    	$uemail = $user['email'];
    	$uphn = $user['phone'];
		$card = $user['cardno'];
    	$mm = $user['expm'];
    	$yy = $user['expy'];

	} 
	else {
		$uname = $user['name'];
		$uemail = $user['email'];
		$uphn = $user['phone'];
	}
    // $uadd = $user['city'] , "," , $user['country'];

    function qur($sq1)
    {
        global $db;
        $result = $db->query($sq1);
        return $result;
    }
    $sq1 = "SELECT * FROM " . $subscript . "cart WHERE uid='" . $uid . "'";
    $Totalamt = 0;
    $cat = qur($sq1);
    foreach ($cat as $i) {
        $Totalamt = $Totalamt + ($i['price'] * $i['quantity']);
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME . " - Checkout"); ?>
	</head>
	<body>
		<div class="authpage">
			<div class="authpage-main row">
				<div class="authpage-main-image col-md-7">
					<img
						src="./assets/2879855.jpg"
						onmouseover="this.src='./assets/41340ab1a4529c7dd753f03268087e08.gif'"
						onmouseout="this.src='./assets/2879855.jpg'"
						alt="Register"
						title="Register"
						aria-label="Register"
						class="resimage registerimage"
					/>
				</div>
				<div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h1 class="authpage-main-desc-heading">
							Checkout
						</h1>
						<br />
						<form class="authpage-form" action="./processors/paydetails.php" method="POST" enctype="multipart/form-data">
							<input
								placeholder="Your Name"
								type="text"
								name="uname"
                                value="<?= $uname;?>"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="Email"
								type="email"
								name="mail"
                                value=<?= $uemail;?>
								class="input form-control authpage-form-input"
								required
							/>
							<br />
                            <input
								placeholder="Phone number"
								type="numeric"
								name="phone"
                                value=<?= $uphn;?>
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="Address"
								type="text"
								name="address"
								<?php if ($db->numrows($userQuery1)) { ?> value="<?= $user['address'] ?>"<?php } else { ?>
                                value= "<?= $user['city'], ",", $user['country']; ?>"<?php }?>
								class="input form-control authpage-form-input"
								required
							/>
                            <br />
							<input
								placeholder="16 digit Card Number"
								type="numeric"
								name="card"
								<?php if ($db->numrows($userQuery1)) { ?> value="<?= $card;?>"<?php }?>
								class="input form-control authpage-form-input"
                                minlength="16"
                                maxlength="16"
								required
							/>
							<br /><a class="input-group mb-3" style="width:130px; margin: 0px 25px;">
							<input
								placeholder="month"
								type="numeric"
								name="month"
								<?php if ($db->numrows($userQuery1)) { ?> value="<?= $mm;?>"<?php }?>
								class="input form-control authpage-form-input"
                                minlength="2"
                                maxlength="2"
								required
							/>
                            <input
								placeholder="year"
								type="numeric"
								name="year"
								<?php if ($db->numrows($userQuery1)) { ?> value="<?= $yy;?>"<?php }?>
								class="input form-control authpage-form-input"
                                minlength="2"
                                maxlength="2"
								required
							/></a>
							
							<br /><h4 style="margin:0px 0px 0px -290px;">
                            <?php echo "Total Cost ", $Totalamt ,"Rs"?>
                            </h4>
							<div
								class="authpage-form-buttons d-flex align-items-center justify-content-center"
							>
								<button
									type="submit"
									class="button primarybutton loginbutton"
								>
									Pay and Proceed
								</button>
								&nbsp;<a
                                title="submit"
									class="dangerbutton"
									href="./carts.php?h1=d"
								>
									Back</a
								>
							</div>
						</form>
			</div>
		</div>
	</body>
</html>

<?php }?>