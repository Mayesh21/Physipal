<?php 
	require_once("./reusables/head.php"); 
	require_once("./reusables/constants.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php generateHead(APPNAME." - About"); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.24.0/babel.js"></script>
	<script type="text/javascript" src="./scripts/react.production.min.js"></script>
	<script type="text/javascript" src="./scripts/react-dom.production.min.js"></script>
</head>
<body>
	<div id="aboutpageroot">
		
	</div>
	<script type="text/babel" src="./scripts/aboutpage.js" defer></script>
</body>
</html>