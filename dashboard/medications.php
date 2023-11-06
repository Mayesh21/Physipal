<?php
	// User Dashboard Medications
	require_once "../inc/config.php";
	require_once "../inc/authcheckerinvert.php";
?>
<!DOCTYPE html>
<html>
<head>
	<? generateHead(APPNAME." - Medications") ?>
</head>
<body>
	<?php include "./components/header.php"; ?>

	<div class="reusable-modal-container" id="medicationcreatormodal">
		<div class="reusable-modal">
			<div class="reusable-modal-top">
				<div class="reusable-modal-top-heading">
					Add Medication
				</div>
			</div>
			<form class="reusable-modal-content" id="medicationForm">
				<div id="alert-error" class="alert alert-error"></div>
				<label for="medicationTitle">
					Medication Title
				</label>
				<Input
					class="form-control"
					id="medicationTitle"
					name="medicationTitle"
					placeholder="Example: Paracetamol"
					required
				/>
				<br />
				<label
					for="medicationDesc"
				>
					Medication Description
				</label>
				<textarea
					class="form-control"
					id="medicationDesc"
					name="medicationDesc"
					placeholder="Example: Daily twice."
				></textarea>
				<br />
				<label for="medicationTime">Medication Time</label>
				<br />
				<input 
					type="time" 
					class="form-control" 
					required 
					name="medicationTime" 
					id="medicationTime" 
				/>
				<br />
				<label for="medicationFrequency">Medication Frequency</label>
				<br />
				<select 
					class="form-control" 
					id="medicationFrequency" 
					name="medicationFrequency" 
					initialValue="0"
				>
					<option value="0">Once</option>
					<option value="1">Daily</option>
					<option value="2">Weekly</option>
				</select>
				<br />
				<div class="reusable-modal-bottom d-flex">
					<button class="button primarybutton" type="submit">
						Create Medicaiton
					</button>&nbsp;
					<button class="button dangerbutton" id="cancelmedicationcreatorbutton">
						Cancel
					</button>
				</div>
			</form>
		</div>
	</div>

	<div class="dashboard-medications">
		<div class="dashboard-top row">
			<div class="dashboard-top-left col-6">
				<div class="dashboard-heading">
					<i class="fas fa-capsules"></i> Medications
				</div>
			</div>
			<div class="dashboard-top-right col-6">
				<button id="medicationcreatortoggler" class="button primarybutton">
					Add Medication
				</button>
			</div>
		</div>
		<div class="fixedcontainer">
			<div id="medications">

			</div>
		</div>
	</div>

	<?php require_once "../reusables/request.php"; ?>
	<script type="text/javascript">
		let medications = [];

		let medicationFrequencies = ["Once", "Daily", "Weekly"];

		let medicationCreatorModalContainer = document.getElementById("medicationcreatormodal");
		let medicationCreatorToggler = document.getElementById("medicationcreatortoggler");
		let cancelMedicationCreatorButton = document.getElementById("cancelmedicationcreatorbutton");

		function toggleMedicationCreator(event){
			if(event && event.preventDefault) event.preventDefault();
			if(
				medicationCreatorModalContainer.classList.contains("visible")
			) medicationCreatorModalContainer.classList.remove("visible");
			else medicationCreatorModalContainer.classList.add("visible");
		}

		medicationCreatorToggler.addEventListener(
			"click",
			toggleMedicationCreator
		);
		cancelMedicationCreatorButton.addEventListener(
			"click",
			toggleMedicationCreator
		);

		async function getMedications(){
			await requester(
				"/physipal/api/getmedications.php", 
				"get", 
				null, 
				(err, response) => {
					if(
						!err && 
						response && 
						response.medications && 
						Array.isArray(response.medications)
					){
						medications = response.medications;
						renderMedications();
					}
				}
			);
		}

		async function createMedication(event){
			event.preventDefault();

			let medicationTitle = document.getElementById("medicationTitle").value;
			let medicationTime = document.getElementById("medicationTime").value;
			let medicationDesc = document.getElementById("medicationDesc").value;
			let medicationFrequency = document.getElementById("medicationFrequency").value;

			requester("/physipal/api/createmedication.php", "post", {
				medicationTitle,
				medicationTime,
				medicationDesc,
				medicationFrequency: Number(medicationFrequency)
			}, (err, response) => {
				if(err) return document.getElementById("alert-error").innerHTML = err || "Something went wrong. Please try again later.";
				toggleMedicationCreator();
				getMedications();
			});
		}

		document.getElementById("medicationForm").addEventListener(
			"submit",
			createMedication
		);

		const renderMedications = () => {
			let medicationDiv = document.getElementById("medications");
			if(medications && medications.length){
				let medicationIndividualComponent = (medication) => `
				<div class="medication" data="${medication.medicationid}">
					<div class="medication-title">${medication.medicationTitle}</div>
					<div class="medication-desc">${medication.medicationDesc}</div>
					<div class="medication-time">${medicationFrequencies[medication.medicationFrequency]} at ${medication.medicationTime}</div>
					<div class="medication-createdat">${medication.createdAt}</div>
				</div>
				`;
				let medicationsHTML = medications
					.map(medicationIndividualComponent)
					.join("");

				medicationDiv.innerHTML = `<div class="text-center m-auto">${
					medicationsHTML
				}</div>`;
			}
			else{
				medicationDiv.innerHTML = `
					<div class="nonefound">
						<img src="../assets/doctors.svg" alt="None Found" title="None Found" class="nonefound-image" />
						<br />
						<div class="nonefound-label">
							No Medications Added Yet.
						</div>
					</div>
				`;
			}
		}
		
		renderMedications();
		getMedications();
	</script>
</body>
</html>