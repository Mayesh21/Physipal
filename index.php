<?php require_once "./inc/config.php";
	if(!session_id())session_start();
	// If the user is logged in, simply redirect them to the dashboard.
	require_once("./reusables/constants.php");
	require_once("./reusables/head.php");	
if ($_SESSION[SESSION_ID_KEY] == "") {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Physipal - Your Health Pal!</title>
		<?php generateHead(); ?>
	</head>
	<body>
		<div class="home">
			<img
				src="./assets/cornerplant.svg"
				alt="Plants"
				title="Plants"
				aria-label="Plants"
				class="resimage cornerplantimage"
			/>
			<div class="homepage">
				<div class="fixedcontainer">
					<img
						src="./assets/homepage-hero.svg"
						alt="Physipal - Your Health Pal"
						title="Physipal - Your Health Pal"
						aria-label="Physipal - Your Health Pal"
						class="resimage "
					/>
					<div class="homepage-desc">
						<div class="homepage-desc-heading">
							<img
								src="./assets/logovector.svg"
								alt="Physipal"
								title="Physipal"
								aria-label="Physipal"
								class="resimage logoimage"
							/>
							&nbsp;PhysiPal
						</div>
						<div class="homepage-desc-desc"></div>
						<div class="homepage-desc-options">
							
							<br />
							<a title="Login" aria-label="Login" href="./login.php">
								<button class="button optionbutton">
									<i
										class="fas fa-user fa-lg"
										aria-hidden="true"
									>
									</i>
									&nbsp;Sign In To PhysiPal
								</button>
							</a>
							<br />
							<a
								title="Sign Up For PhysiPal"
								aria-label="Sign Up For PhysiPal"
								href="./homepage.php"
							>
								<button class="button optionbutton">
									<i
										class="fas fa-user-plus fa-lg"
										aria-hidden="true"
									>
									</i>
									&nbsp;Sign Up For PhysiPal
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
}
else{
		echo "You Are Already Signed In";
		header("refresh:0;url=./prolist.php?h1=d");
	}
?>