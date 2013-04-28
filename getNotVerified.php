<?
include_once 'db_functions.php';
$db = new DB_Functions();
if(isset($_REQUEST['long'])&&isset($_REQUEST['lat']))
{
	$long = $_REQUEST['long'];
	$lat = $_REQUEST['lat'];
}
else {
	$long = 0;
	$lat = 0;
}
$var = $db->getAllNotVerified($long,$lat);
print json_encode($var);

?>