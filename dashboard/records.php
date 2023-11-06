<?php
	// User Dashboard
	require_once "../inc/config.php";
	require_once "../inc/authcheckerinvert.php";
?>
<!DOCTYPE html>
<html>
<head>
	<? generateHead(APPNAME." - Records") ?>
</head>
<body>
	<?php include "./components/header.php"; ?>

	<div class="reusable-modal-container" id="recordcreatormodal">
		<div class="reusable-modal">
			<div class="reusable-modal-top">
				<div class="reusable-modal-top-heading">
					Add Record
				</div>
			</div>
			<form class="reusable-modal-content" id="recordForm">
				<div id="alert-error" class="alert alert-error"></div>
				<label for="recordName">
					Record Title
				</label>
				<Input
					class="form-control"
					id="recordName"
					name="recordName"
					placeholder="Example: Saturday Visit Prescription"
					required
				/>
				<br />
				<label for="recordURL">
					Record URL
				</label>
				<Input
					class="form-control"
					id="recordURL"
					name="recordURL"
					placeholder="https://abc.xyz"
					required
					type="url"
				/>
				<br />
				<label
					for="recordDesc"
				>
					Record Description
				</label>
				<textarea
					class="form-control"
					id="recordDesc"
					name="recordDesc"
					placeholder="Example: Visit To Doctor XYZ."
				></textarea>
				<br />
				<div class="reusable-modal-bottom d-flex">
					<button class="button primarybutton" type="submit">
						Create Record
					</button>&nbsp;
					<button class="button dangerbutton" id="cancelrecordcreatorbutton">
						Cancel
					</button>
				</div>
			</form>
		</div>
	</div>

	<div class="dashboard-records">
		<div class="dashboard-top row">
			<div class="dashboard-top-left col-6">
				<div class="dashboard-heading">
					<i class="fas fa-file-medical-alt"></i> Records
				</div>
			</div>
			<div class="dashboard-top-right col-6">
				<button id="recordcreatortoggler" class="button primarybutton">
					Add Record
				</button>
			</div>
		</div>
		<div class="fixedcontainer">
			<div id="records"></div>
		</div>
	</div>
	<?php include "../reusables/request.php"; ?>
	<script type="text/javascript">
		let records = [];

		let recordCreatorModalContainer = document.getElementById("recordcreatormodal");
		let recordCreatorToggler = document.getElementById("recordcreatortoggler");
		let cancelRecordCreatorButton = document.getElementById("cancelrecordcreatorbutton");

		function toggleRecordCreator(event){
			if(event && event.preventDefault) event.preventDefault();
			if(
				recordCreatorModalContainer.classList.contains("visible")
			) recordCreatorModalContainer.classList.remove("visible");
			else recordCreatorModalContainer.classList.add("visible");
		}

		recordCreatorToggler.addEventListener(
			"click",
			toggleRecordCreator
		);
		cancelRecordCreatorButton.addEventListener(
			"click",
			toggleRecordCreator
		);

		async function createRecord(event){
			event.preventDefault();

			let recordName = document.getElementById("recordName").value;
			let recordDesc = document.getElementById("recordDesc").value;
			let recordURL = document.getElementById("recordURL").value;

			requester("/physipal/api/uploadrecord.php", "post", {
				recordName,
				recordURL,
				recordDesc,
			}, (err, response) => {
				if(err) return document.getElementById("alert-error").innerHTML = err || "Something went wrong. Please try again later.";
				toggleRecordCreator();
				getRecords();
			});
		}

		document.getElementById("recordForm").addEventListener(
			"submit",
			createRecord
		);

		function renderRecords(){
			let recordsDiv = document.getElementById("records");
			if(records && records.length){
				let recordsIndividualComponent = (record) => `
				<div class="record" data="${record.recordid}">
					<div class="record-title">${record.recordName}</div>
					<div class="record-desc">${record.recordDesc || ""}</div>
					<div class="record-link">
						<a href="${record.recordurl}" target="_blank" title="View Record">
							<i class="fas fa-external-link-alt"></i> View Record
						</a>
					</div>
					<div class="record-createdat">${record.createdAt}</div>
				</div>
				`;
				let recordsHTML = records
					.map(recordsIndividualComponent)
					.join("");

				recordsDiv.innerHTML = `<div class="text-center m-auto">${
					recordsHTML
				}</div>`;
			}
			else{
				recordsDiv.innerHTML = `
					<div class="nonefound">
						<img src="../assets/doctors.svg" alt="None Found" title="None Found" class="nonefound-image" />
						<br />
						<div class="nonefound-label">
							No Records Added Yet.
						</div>
					</div>
				`;
			}
		}

		async function getRecords(){
			await requester(
				"/physipal/api/getrecords.php", 
				"get",
				null, 
				(err, response) => {
					if(
						!err && 
						response && 
						response.records && 
						Array.isArray(response.records)
					){
						records = response.records;
						renderRecords();
					}
				}
			);
		}

		getRecords();
	</script>
</body>
</html>