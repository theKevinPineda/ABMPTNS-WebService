<?
include_once 'db_connect.php';
$db = new DB_Connect();
$db->connect();
if(isset($_REQUEST['name'])&&isset($_REQUEST['pass'])){
include_once 'db_functions.php';
$db = new DB_Functions();
$notifs = $db->getLogin($_REQUEST['name'],$_REQUEST['pass']);
print json_encode($notifs);
}

?> 