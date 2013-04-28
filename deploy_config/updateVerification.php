<?
include_once 'db_functions.php';
if(isset($_REQUEST['id'])&&isset($_REQUEST['ver'])&&isset($_REQUEST['uid'])){
	$id=$_REQUEST['id'];
	$ver=$_REQUEST['ver'];
	$uid=$_REQUEST['uid'];
	$db = new DB_Functions();
	$result = $db->updateVerification($id,$ver,$uid);
print json_encode($result);
}
?>