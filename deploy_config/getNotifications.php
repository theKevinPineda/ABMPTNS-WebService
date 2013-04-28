<?
include_once 'db_functions.php';
$db = new DB_Functions();
$notifs = $db->getNotifications($_REQUEST['type']);
print json_encode($notifs);
?>