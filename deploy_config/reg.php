<?php

// response json
$json = array();

/**
 * Registering a user device
 * Store reg id in users table
 */
if (isset($_REQUEST["name"]) && isset($_REQUEST["pass"])) {
    $name = $_REQUEST["name"];
    $pass = $_REQUEST["pass"];
   echo "hello";
    // Store user details in db
    include_once './db_functions.php';
    include_once './GCM.php';

    $db = new DB_Functions();
    $gcm = new GCM();

    $res = $db->storeUser1($name, $pass);

    if($res==false)echo "fail";
} else {
    // user details missing
	echo "nothing";
}
?>