<?

class RAP {

    //put your code here
    // constructor
    function __construct() {
        
    }

    /**
     * Sending Push Notification
     */
    public function sendNotification( $apiKey, $registrationIdsArray, $messageData )
{   
        // include config
        include_once './config.php';
		$headers = array("Content-Type:" . "application/json", "Authorization:" . "key=" . $apiKey);
		$data = array(
			'data' => $messageData,
			'registration_ids' => $registrationIdsArray
			);
 
		$ch = curl_init();
 
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
		curl_setopt( $ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send" );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
	
		$response = curl_exec($ch);
		curl_close($ch);
 
		return $response;
}

}
?>