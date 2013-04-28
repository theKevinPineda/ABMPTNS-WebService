<?
include_once './db_functions.php';
include_once './GCM.php';
$db = new DB_Functions();
$users = $db->getAllRegUsers1();
if ($users != false)
            $no_of_users = 1;
        else
            $no_of_users = 0;
if($no_of_users != 0){
	$message      = "this is the ticker message";
	$tickerText   = "what the";
	$contentTitle = "GCM yo";
	$contentText  = "hello";
	
	$registrationId = $users;
	$apiKey = "AIzaSyBpdDwaHyXehKvC4Wu88TtPp6gZJlepYgU";
	$rap = new GCM();
	$response = $rap->send_notification( 
					$registrationId, 
					array('message' => $message, 'tickerText' => $tickerText, 'contentTitle' => $contentTitle, "contentText" => $contentText) );
	
	echo $response;
}

?>