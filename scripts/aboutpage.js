const AboutPage = (props) => {
	const [activeSection, setactiveSection] = React.useState(0);

	let sections = [
		{
			sectionName: "Section1",
			sectionImage: "./assets/about/doctors.svg",
			sectionDesc: `
Take control of your own medication.
So those long lists of prescription papers are history.`,
			sectionHeading: "Take Control Of Your  Medication",
		},
		{
			sectionName: "Section2",
			sectionImage: "./assets/about/list.svg",
			sectionHeading: "All your history,\nIn One Place!",
			sectionDesc: `Everything is recorded as you proceed, just list everything from your prescriptions to your medicine timings, and we will remember everything, forever!`,
		},
		{
			sectionName: "Section3",
			sectionImage: "./assets/about/peace.svg",
			sectionDesc: `With reminders built in, 
those missed medications are history!`,
			sectionHeading: "Peace Of Mind!\nAlways!",
		},
	];

	return (
		<div className={"aboutpage"}>
			{activeSection > 0 ? (
				<a
					className={`accessibility aboutpage-switchers lefticon ${
						activeSection === 0 ? "hidden" : ""
					}`}
					href={"#"}
					onClick={(e) => {
						e.preventDefault();
						setactiveSection((activeS) => activeS - 1);
					}}
					title={"Previous Section"}
				>
					<i className={"fas fa-chevron-left"} />
				</a>
			) : (
				""
			)}

			{activeSection < sections.length - 1 ? (
				<a
					className={`accessibility aboutpage-switchers righticon`}
					href={"#"}
					onClick={(e) => {
						e.preventDefault();
						setactiveSection((activeS) => activeS + 1);
					}}
					title={"Previous Section"}
				>
					<i className={"fas fa-chevron-right"} />
				</a>
			) : (
				""
			)}
			<div className={"aboutslides"}>
				<div className={"aboutslides-slide"}>
					<div className={"aboutslides-slide-heading"}>
						{sections[activeSection].sectionHeading}
					</div>
					<div className={"aboutslides-slide-image"}>
						<img
							src={sections[activeSection].sectionImage}
							alt={sections[activeSection].sectionHeading}
						/>
					</div>
					<div className={"aboutslides-slide-desc"}>
						{sections[activeSection].sectionDesc}
					</div>
				</div>
			</div>
			<div className={"section-indicators"}>
				{sections.map((_, index) => (
					<div
						key={index}
						className={`section-indicator ${
							activeSection === index ? "active" : ""
						}`}
					/>
				))}
			</div>
			<div className={"aboutpage-back"}>
				<a
					href={"./"}
					title={"Back To Home"}
					aria-label={"Back To Home"}
				>
					<button className={"optionbutton"}>Back To Home</button>
				</a>
			</div>
			<br />
		</div>
	);
};

ReactDOM.render(<AboutPage />, document.getElementById("aboutpageroot"));
