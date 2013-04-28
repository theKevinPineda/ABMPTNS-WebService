<?
include_once 'db_functions.php';
$db = new DB_Functions();
$var = $db->getAllVerified();
print json_encode($var);

?>