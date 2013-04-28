<?

include_once 'db_connect.php';
include_once './db_functions.php';
$db = new DB_Connect();
$db->connect();
$dbfunc = new DB_Functions();

$result=mysql_query("SELECT `gcm` FROM `current_sessions`");
$row = array();
while($res = mysql_fetch_assoc($result)){
	$row[] = $res;
	}
$dbfunc->sendUser($row);
?>