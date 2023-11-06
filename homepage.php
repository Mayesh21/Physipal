<?php	
ini_set('display_errors',0);
	session_start();
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";

	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME." - Register"); ?>
	</head>
	<body>
		<div class="authpage">
			<div class="authpage-main row">
				<div class="authpage-main-image col-md-7">
					<img
						src="./assets/Pharmacy-Illustration.svg"
						alt="Register"
						title="Hii"
						aria-label="Register"
						class="resimage registerimage"
					/>
				</div>
				<div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h1 class="authpage-main-desc-heading">
							Welcome To Physipal
						</h1>
						<br />

						<div class="authpage-alternatives" >
							<ul>
								<br />
								<a
									class="primarybutton"
									title="Are you a customer?"
									href="./register.php"
									style="display:flex;"
								>
									Register as Customer</a
								>
								<br />
								<a
									class="primarybutton"
									title="Are you a vendor?"
									href="./vendorlog.php"
									style="display:flex;"
								>
									Register as Vendor</a
								>
								<br />
								<a
									class="primarybutton"
									title="Looking for a delivery job?"
									href="./medibuddy.php"
									style="display:flex;"
								>
									Register as Delivery Person</a
								>
								&nbsp;<a
									title="Cancel"
									class="dangerbutton"
									href="./"
									style="display:flex;"
								>
									Back</a
								><br />
								<a
								class="registerswitch"
								title="Login Instead"
								href="./login.php"
							>
								Already Have an Account? Login Instead.</a
							></ul>
						</div>

	</body>
</html>