<?php
	ini_set('display_errors',0);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";

	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME." - Login"); ?>
	</head>
	<body>
		<div class="authpage">
			<div class="authpage-main row">
				<div class="authpage-main-image col-md-7">
					<img
						src="./assets/login.svg"
						alt="Login"
						title="Login"
						aria-label="Login"
						class="resimage loginimage"
					/>
				</div>
				<div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h1 class="authpage-main-desc-heading">
							Verify Account
						</h1>
						<br />
						<form class="authpage-form" action="./processors/pwdnew.php" method="POST">
							<input
								placeholder="Email"
								type="email"
								name="email"
								class="input form-control authpage-form-input"
								required=""
							/>
							<br />
                            <input
								placeholder="Phone Number"
								type="phonenumber"
								name="phonenumber"
								class="input form-control authpage-form-input"
								required=""
							/>
							<br />
							<div
								class="authpage-form-buttons d-flex align-items-center justify-content-center"
							>
								<button
									type="submit"
									class="button primarybutton loginbutton"
									align="center"
								>
									Confirm
								</button>
								&nbsp;<a
									title="Cancel"
									class="dangerbutton"
									href="./"
								>
									Cancel</a
								>
							</div>
						</form>
						<div class="authpage-separator"></div>
						<div class="authpage-alternatives">
							<a
								class="registerswitch"
								title="Register Instead"
								href="./homepage.php"
							>
								Register Instead</a
                            >
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>