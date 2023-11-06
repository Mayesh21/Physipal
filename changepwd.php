<?php
	ini_set('display_errors',0);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";

	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
#echo $_SESSION[SESSION_ID_KEY];
?>
<script>
function ps(){
	var x = document.getElementById("input");
    var y = document.getElementById("input1");
	if(x.type==="password"){
		x.type="text";
        y.type="text";
	}
	else{
		x.type="password";
        y.type="password";
	}
}
</script>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME." - ChangePassword"); ?>
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
							Change Password
						</h1>
						<br />
						<form class="authpage-form" action="./processors/changeconfirm.php" method="POST">
                        <input
								id="input"
								placeholder="New Password"
								type="password"
								name="npassword"
								class="input form-control authpage-form-input"
								required=""
							/>
							<br />
							<input
								id="input1"
								placeholder="Comfirm Password"
								type="password"
								name="cpassword"
								class="input form-control authpage-form-input"
								required=""
							/>
							<input type="checkbox" onclick="ps()">Show Password
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
									href="./login.php"
								>
									Cancel</a
								>
							</div>
						</form>
				</div>
			</div>
		</div>
	</body>
</html>