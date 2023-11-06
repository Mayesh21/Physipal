<?php
// User Dashboard
require_once "../inc/config.php";
require_once "../inc/authcheckerinvert.php";
?>
<!DOCTYPE html>
<html>

<head>
	<? generateHead(APPNAME." - Appointments") ?>

	<script src='../scripts/calendar/main.js'></script>
	<link rel="stylesheet" href="../scripts/calendar/main.css" />
</head>

<body>
	<?php include "./components/header.php"; ?>

	<div class="reusable-modal-container" id="appointmentcreatormodal">
		<div class="reusable-modal">
			<div class="reusable-modal-top">
				<div class="reusable-modal-top-heading">
					Add Appointment
				</div>
			</div>
			<form class="reusable-modal-content" id="appointmentform">
				<div id="alert-error" class="alert alert-error"></div>
				<label for="appointmentTitle">
					Appointment Title
				</label>
				<Input class="form-control" id="appointmentTitle" name="appointmentTitle" placeholder="Example: Paracetamol" required />
				<br />
				<label for="appointmentDesc">
					Appointment Description
				</label>
				<textarea class="form-control" id="appointmentDesc" name="appointmentDesc" placeholder="Example: Any extra information regarding the appointment here."></textarea>
				<br />
				<label for="appointmentTime">Appointment Time</label>
				<br />
				<input type="time" class="form-control" required name="appointmentTime" id="appointmentTime" />
				<br />
				<label for="appointmentDate">Appointment Date</label>
				<br />
				<input type="date" class="form-control" required name="appointmentDate" id="appointmentDate" />
				<br />
				<div class="reusable-modal-bottom d-flex">
					<button class="button primarybutton" type="submit">
						Create Appointment
					</button>&nbsp;
					<button class="button dangerbutton" id="cancelappointmentcreatorbutton">
						Cancel
					</button>
				</div>
			</form>
		</div>
	</div>

	<div class="dashboard-appointments">
		<div class="dashboard-top row">
			<div class="dashboard-top-left col-6">
				<div class="dashboard-heading">
					<i class="far fa-calendar"></i> Appointments
				</div>
			</div>
			<div class="dashboard-top-right col-6">
				<button id="appointmentcreatortoggler" class="button primarybutton">
					Add Appointment
				</button>
			</div>
		</div>
		<div class="fixedcontainer">
			<div id="calendar">

			</div>
		</div>
	</div>
	<?php include "../reusables/request.php"; ?>
	<script type="text/javascript">
		let appointments = [];

		let appointmentCreatorModalContainer = document.getElementById("appointmentcreatormodal");
		let appointmentCreatorToggler = document.getElementById("appointmentcreatortoggler");
		let cancelAppointmentCreatorButton = document.getElementById("cancelappointmentcreatorbutton");
		let appointmentForm = document.getElementById("appointmentform");

		function toggleAppointmentCreator(event) {
			if (event && event.preventDefault) event.preventDefault();
			if (
				appointmentCreatorModalContainer.classList.contains("visible")
			) appointmentCreatorModalContainer.classList.remove("visible");
			else appointmentCreatorModalContainer.classList.add("visible");
		}

		appointmentCreatorToggler.addEventListener(
			"click",
			toggleAppointmentCreator
		);
		cancelAppointmentCreatorButton.addEventListener(
			"click",
			toggleAppointmentCreator
		);

		async function updateAppointment(appointment) {
			await requester(
				"/physipal/api/updateappointment.php",
				"patch", {
					appointmentDate: appointment.start.toISOString().split("T")[0],
					updatedAt: new Date(),
					appointmentId: appointment.id,
				}
			);
		}

		function renderCalendar(events = []) {
			let calendarEl = document.getElementById("calendar");
			window.calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				events,
				eventDrop: ({
					event
				}) => updateAppointment(event)
			});
			window.calendar.render();
		}

		async function getAppointments() {
			await requester(
				"/physipal/api/getappointments.php",
				"get",
				null,
				(err, response) => {
					if (
						!err &&
						response &&
						response.appointments &&
						Array.isArray(response.appointments)
					) {
						appointments = response.appointments;
						// Add these appointments to the calendar
						let events = [];
						for (let appointment of appointments) {
							events.push({
								title: appointment.appointmentTitle,
								start: `${appointment.appointmentDate}T${appointment.appointmentTime}`,
								allDay: false,
								id: appointment.appointmentid,
								editable: true,
								droppable: true
							});
						}

						// Re-render calendar.
						renderCalendar(events);
					}
				}
			);
		}

		async function createMedication(event) {
			event.preventDefault();

			let appointmentTitle = document.getElementById("appointmentTitle").value;
			let appointmentTime = document.getElementById("appointmentTime").value;
			let appointmentDesc = document.getElementById("appointmentDesc").value;
			let appointmentDate = document.getElementById("appointmentDate").value;

			requester("/physipal/api/createappointment.php", "post", {
				appointmentTitle,
				appointmentTime,
				appointmentDesc,
				appointmentDate
			}, (err, response) => {
				if (err) return document.getElementById("alert-error").innerHTML = err || "Something went wrong. Please try again later.";
				toggleAppointmentCreator();
				getAppointments();
			});
		}

		document.getElementById("appointmentform").addEventListener(
			"submit",
			createMedication
		);

		renderCalendar();
		getAppointments();
	</script>
</body>

</html>