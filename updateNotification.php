<?
include_once 'db_functions.php';
if(isset($_REQUEST['id'])&&isset($_REQUEST['desc'])&&isset($_REQUEST['traff'])&&isset($_REQUEST['uid'])){
	$id=$_REQUEST['id'];
	$desc=$_REQUEST['desc'];
	$traff=$_REQUEST['traff'];
	$uid=$_REQUEST['uid'];
	$db = new DB_Functions();
	echo "1";
	$result = $db->updateNotification($id,$desc,$traff,$uid);

}
else{
	$id=$_REQUEST['id'];
	$desc=$_REQUEST['desc'];
	$uid=$_REQUEST['uid'];
	$db = new DB_Functions();
	
	echo "2";
	$result = $db->updateNotification1($id,$desc,$uid);
}
print json_encode($result);
?>