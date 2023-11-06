<?php
    session_start();
	require_once "../inc/config.php";
	require_once "../inc/authcheckerinvert.php";
    if($_SESSION[SESSION_ID_KEY] ==1){
    $q1 = 1;
    } else {
    $q1 = 0;
}

    $_SESSION[SESSION_LOGIN_KEY] = false;
    $_SESSION[SESSION_ID_KEY] = "";

    echo "Successfully logged out.";
    if($q1){
        header("refresh:0;url=../admin.php");
} else {
    header("refresh:0;url=../login.php");
}
    exit();
?>