<?
include_once 'db_functions.php';
if(isset($_REQUEST['id']))
	$id=$_REQUEST['id'];
else 
	$id=0;
$db = new DB_Functions();
$user = $db->getName($id);
print json_encode($user);

?>