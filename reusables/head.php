<?php
// PHP File to generate a head.
function generateHead(
	$title = 'APPNAME'. " - " . 'APPTAGLINE'
) {
?>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#3161DF" />
	<meta name="description" content="A web app for medical bookkeeping and sharing it with your doctors. Hassle Free." />
	<meta name="author" content="" />
	<meta name="HandheldFriendly" content="True" />

	<!-- Manifest and Logo -->
	<link rel="shortcut icon" href="<?php echo $GLOBALS['adjustedPath'] . "/assets/logo.png"; ?>" />

	<!-- Insert any required Scripts here. -->

	<!-- Insert any required Styles here. -->
	<link rel="stylesheet" href="styles/all1/bootstrap.min.css" />
	<link rel="stylesheet" href="styles/all1/all.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['adjustedPath'] . "styles/main.css"; ?>" />
<?php
}
?>
