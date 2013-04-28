<?
include_once 'db_functions.php';
$db = new DB_Functions();
$notifs = $db->getUserNotVerified($_REQUEST['id']);
print json_encode($notifs);
?>