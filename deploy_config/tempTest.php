<?
include_once 'db_functions.php';
$db = new DB_Functions();
date_default_timezone_set('Etc/GMT-8');
$st =date("H:i:s",time()-3600);
$et =date("H:i:s",time()+3600);
//$var = $db->getNotifTest($st,$et);
$var= $db->getNearest(123.91695879,10.31293288);
print json_encode($var);
?>