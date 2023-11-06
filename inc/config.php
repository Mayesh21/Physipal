<?php
	$scriptName = $_SERVER["SCRIPT_NAME"];
	$subdirectoriesInScriptName = preg_split("#/#", $scriptName); 

	$GLOBALS['adjustedPath'] = "";

	for ($i=0; $i < count($subdirectoriesInScriptName); $i++) { 
		if(
			!strlen($subdirectoriesInScriptName[$i])
		){
			array_splice($subdirectoriesInScriptName, $i, 1);
		}
	}

	if(count($subdirectoriesInScriptName) > 2)
		$GLOBALS['adjustedPath'] .= "../";

    require_once $GLOBALS['adjustedPath'].'inc/db.php';
    require_once $GLOBALS['adjustedPath'].'reusables/constants.php';
    require_once $GLOBALS['adjustedPath'].'inc/credentials.php';
    require_once $GLOBALS['adjustedPath'].'reusables/head.php';

    $subscript = APPNAME.'_';

    $db = new dbdriver;

    $db -> connect($host,$username,$password,$dbname);
?>