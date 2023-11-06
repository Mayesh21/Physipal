<?php
	// User Dashboard
	require_once "../inc/config.php";
	require_once "../inc/authcheckerinvert.php";
?>
<!DOCTYPE html>
<html>
<head>
	<? generateHead(APPNAME." - Dashboard") ?>
</head>
<body>
	<?php include "./components/header.php"; ?>
	<div class="dashboard-top row">
		<div class="dashboard-top-left col-12 text-left">
			<div class="dashboard-heading">
				<i class="fas fa-columns"></i>&nbsp;Overview
			</div>
		</div>
	</div>
	<div class="nonefound">
		<img 
			src="../assets/appdoctor.svg" 
			alt="Dashboard Account Overview" 
			title="Dashboard Account Overview" 
			class="nonefound-image" 
		/>
		<br />
		<div class="nonefound-label">
			Your Account Overview will appear here.
			<br />Like Number of Medications and Appointments.
		</div>
	</div>
	<div class="smallwidth">
		<a
			title="View Your Medications"
			aria-label="View Your Medications"
			href="./medications.php"
		>
			<button class="button optionbutton">
				<i class="fas fa-capsules"></i>
				</i>
				&nbsp;View Your Medications
			</button>
		</a>
		<br />
		<a
			title="View Your Appointments"
			aria-label="View Your Appointments"
			href="./appointments.php"
		>
			<button class="button optionbutton">
				<i class="far fa-calendar-alt"></i>
				</i>
				&nbsp;View Your Appointments
			</button>
		</a>
		<br />
		<a
			title="View Your Records"
			aria-label="View Your Records"
			href="./records.php"
		>
			<button class="button optionbutton">
				<i class="fas fa-folder-open"></i>
				</i>
				&nbsp;View Your Records
			</button>
		</a>
		<br />
	</div>
</body>
</html>