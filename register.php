<?php
	ini_set('display_errors',0);
	session_start();
	
	// If the user is logged in, simply redirect them to the dashboard.
	require_once "./inc/authchecker.php";

	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
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
		<?php generateHead(APPNAME." - Register"); ?>
	</head>
	<body>
		<div class="authpage">
			<div class="authpage-main row">
				<div class="authpage-main-image col-md-7">
					<img 
						src="./assets/register.svg"
						alt="Register"
						title="Register"
						aria-label="Register"
						class="resimage registerimage"
					/>
				</div>
				<div class="authpage-main-content col-md-5">
					<div class="authpage-main-desc">
						<h1 class="authpage-main-desc-heading">
							User Registration
						</h1>
						<br />
						<form class="authpage-form" action="./processors/registeruser.php" method="POST">
							<input
								placeholder="Name"
								type="text"
								name="name"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="Email"
								type="email"
								name="email"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="Username"
								type="text"
								name="username"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
		
							<input
								placeholder="Phone Number"
								type="text"
								name="phone"
								class="input form-control authpage-form-input"
								maxlength="10"
								required
							/>
							<br />
							
							<input
								placeholder="Country"
								type="text"
								name="country"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							<input
								placeholder="City"
								type="text"
								name="city"
								class="input form-control authpage-form-input"
								required
							/>
							<br />
							
							<input id="input"
								placeholder="Password"
								type="password"
								name="password"
								class="input form-control authpage-form-input"
								required
							/>
							<i class="far fa-eye" id="tp" style="margin: -30px 470px; cursor:pointer;" onmouseover="ps()" onmouseout="ps()"></i>

							<!-- <input type="checkbox" onclick="ps()"/>Show Password -->
							<br />
							<div
								class="authpage-form-buttons d-flex align-items-center justify-content-center"
							>
								<button
									type="submit"
									class="button primarybutton loginbutton"
								>
									Register
								</button>
								&nbsp;<a
									title="Cancel"
									class="dangerbutton"
									href="./homepage.php"
								>
									Cancel</a
								>
							</div>
						</form>
						<div class="authpage-separator"></div>
						<div class="authpage-authalt"></div>
						<div class="authpage-alternatives">
							<a
								class="registerswitch"
								title="Login Instead"
								href="./login.php"
							>
								Already Have an Account? Login Instead.</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>