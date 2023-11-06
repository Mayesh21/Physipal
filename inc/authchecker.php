<?php
	// File to check for user login and redirect them to the dashboard.
	if (!session_id()) session_start();

	$scriptName = $_SERVER["SCRIPT_NAME"];
	$subdirectoriesInScriptName = preg_split("#/#", $scriptName); 

	$adjustedPath = "";

	for ($i=0; $i < count($subdirectoriesInScriptName); $i++) { 
		if(
			!strlen($subdirectoriesInScriptName[$i])
		)
			array_splice($subdirectoriesInScriptName, $i, 1);
	}

	if(count($subdirectoriesInScriptName) > 2)
		$adjustedPath .= "../";

    require_once $adjustedPath.'reusables/constants.php';

    #if($_SESSION[SESSION_LOGIN_KEY] === true && $_SESSION[SESSION_ID_KEY]){
    #	header("refresh:0;url=./dashboard");
    #	exit();
    #}
?>