<?php
	ini_set('display_errors',0);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";

	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
if ($_SESSION[SESSION_ID_KEY]!="") {
	echo "You Are Already Signed In";
	header("refresh:0;url=./prolist.php");
}
else{
	
	?>
<script>
function ps(){
	var x = document.getElementById("input");
	if(x.type==="password"){
		x.type="text";
	}
	else{
		x.type="password";
	}
}
</script>
<!DOCTYPE html>
<html>
	<head>
		<?php generateHead(APPNAME . " - Login"); ?>
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
							Login
						</h1>
						<br />
						<form class="authpage-form" action="./processors/loginuser.php" method="POST">
							<input
								placeholder="Email"
								type="email"
								name="email"
								class="input form-control authpage-form-input"
								required=""
							/>
							<br />
							<input
								id="input"
								placeholder="Password"
								type="password"
								name="password"
								class="input form-control authpage-form-input"
								required=""
							/>
							<i class="far fa-eye" id="tp" style="margin: -30px 470px; cursor:pointer;" onmouseover="ps()" onmouseout="ps()"></i>
							<!-- <input type="checkbox" onclick="ps()">Show Password -->
							<br />
							<div
								class="authpage-form-buttons d-flex align-items-center justify-content-center"
							>
								<button
									type="submit"
									class="button primarybutton loginbutton"
									align="center"
								>
									Login
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
							>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a
								class="registerswitch"
								title="Change Password"
								href="./forgotpwd.php"
							>
								Forgot Password?</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
}
?>