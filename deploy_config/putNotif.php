<?
include_once 'db_functions.php';
if(isset($_REQUEST['id'])&&isset($_REQUEST['long'])&&isset($_REQUEST['lat'])&&isset($_REQUEST['loc'])&&isset($_REQUEST['prio'])){
	date_default_timezone_set('Etc/GMT-8');
	$time=date("H:i:s");
	$date=date('Y-m-d');
	if($_REQUEST['desc']!=""){
		$desc="Cause: ".$_REQUEST['desc'];
		}
	else
		$desc="Cause: Unknown";
		$dlong = $_REQUEST['dlong'];
		$dlat = $_REQUEST['dlat'];
		$long = $_REQUEST['long'];
		$lat = $_REQUEST['lat'];
		$uid=$_REQUEST['id']; 
		
	if($_REQUEST['prio']=="high"){
		$status="verified";
		$traffic=$_REQUEST['traffic']; ;
		$cb=$uid;
		}
	else{
		$status="not verified";
		$traffic="Unknown";
		$cb=0;
		}
		$loc=$_REQUEST['loc'];
		echo $long."<br />".$lat."<br />".$desc."<br />".$uid."<br />".$status."<br />".$traffic."<br />".$date."<br />".$time."<br />".$loc."<br />".$cb;
		echo "<br />";
		echo "<br />";
		echo "<br />";
	$db = new DB_Functions();
	$result = $db->storeNotification($long,$lat,$desc,$uid,$status,$traffic,$date,$time,$loc,$cb,$dlong,$dlat);
//print json_encode($result);
}
?>