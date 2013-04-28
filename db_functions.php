<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $gcm_regid) {
        // insert user into database
		$prio="normal";
        $result = mysql_query("INSERT INTO gcm_users(priority,name, email, gcm_regid, created_at) VALUES('$prio','$name', '$email', '$gcm_regid', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
	
	/**
     * Storing new user
     * returns user details
     */
    public function storeUser1($name, $pass) {
	
		$prio="normal";
        // insert user into database
        $result = mysql_query("INSERT INTO users(priority,username, password) VALUES('$prio','$name', '$pass')");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE id = $id") or die(mysql_error());
            // return user details
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
	public function storeSession($id,$gcm){
		mysql_query("INSERT INTO current_sessions(gcm,user_id) VALUES('$gcm','$id')");
		return true;
	}
		
	public function deleteSession($id){
		mysql_query("DELETE FROM  `current_sessions` WHERE  `user_id`='$id'");
	}
	
	public function sendUser($users){
	if ($users != false)
            $no_of_users = 1;
        else
            $no_of_users = 0;
if($no_of_users != 0){
	$message      = "the test message";
	$tickerText   = "ticker text message";
	$contentTitle = "content title";
	$contentText  = "content body";
	
	$registrationId = $users;
	$apiKey = "AIzaSyBpdDwaHyXehKvC4Wu88TtPp6gZJlepYgU";
	include_once './GCM.php';
	$rap = new GCM();
	$response = $rap->send_notification( 
					$registrationId, 
					array('message' => $message, 'tickerText' => $tickerText, 'contentTitle' => $contentTitle, "contentText" => $contentText) );
	
	echo $response;
}
}

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM users");
        return $result;
    }	
	public function getLogin($name,$pass){
		$result = mysql_query("select * FROM `users` WHERE `username`='$name' AND `password`='$pass'");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r;
		}
        return $row;
	}
	public function getName($id) {
         $result = mysql_query("select * FROM users WHERE `id`='$id'");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r;
		}
        return $row;
    }	
	public function updateVerification($id,$ver,$uid){
	$result=mysql_query("UPDATE  `notifications` SET  `status` =  '$ver',
`confirmed_by` =  '$uid' WHERE  `id` = '$id'");
	return $result;
	}


	public function updateNotification($id,$desc,$traff,$uid){
	$result=mysql_query("UPDATE`notifications` SET  `description` =  '$desc',`traffic` =  '$traff',
`confirmed_by` =  '$uid' WHERE  `id` ='$id'");
	return $result;
	}
	public function updateNotification1($id,$desc,$uid){
	$result=mysql_query("UPDATE`notifications` SET  `description` =  '$desc',
`confirmed_by` =  '$uid' WHERE  `id` ='$id'");
	return $result;
	}
	 public function getAllRegUsers1() {
         $result = mysql_query("select * FROM current_sessions");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r['gcm'];
		}
        return $row;
    }
	public function storeNotification($long,$lat,$desc,$uid,$status,$traffic,$date,$time,$loc,$cb,$dlong,$dlat){	
		$result = mysql_query("INSERT INTO notifications(longitude,latitude,description,user_id,status,traffic,date,time,location,confirmed_by,dlongitude,dlatitude) 
		VALUES('$long','$lat','$desc','$uid','$status','$traffic','$date','$time','$loc','$cb','$dlong','$dlat')") or die(mysql_error());
		return $result;
	}
	public function getAllVerified() {
	
		$date=date('Y-m-d');
        $result = mysql_query("select * FROM notifications WHERE status='verified' AND `date`='$date'");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r;
		}
        return $row;
    }	
	public function getAllRegUsers() {
        $result = mysql_query("select * FROM users");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r['gcm_regid'];
		}
        return $row;
    }
	
	public function getAllNotifications() {
        $result = mysql_query("select * FROM notifications");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r;
		}
        return $row;
    }
	public function getNotifications($type) {
		
		$date=date('Y-m-d');
        $result = mysql_query("select * FROM notifications WHERE `status`='$type' AND `date`='$date'");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
		$row[] = $r;
		}
        return $row;
    }
    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT id from users WHERE username = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }
	public function getNotifTest($st,$et){
		$date=date('Y-m-d');
		$type= "verified";
		$result = mysql_query("select * FROM notifications WHERE `date`='$date' AND `status`='$type' AND `time` BETWEEN '$st' AND '$et'");
		$row = array();
		while($r = mysql_fetch_assoc($result)){
			$row[] = $r;
		}
        return $row;
	}

	public function getNearest($long,$lat){
		$sql = "SELECT *, SQRT(POW(69.1 * (latitude - '$lat'), 2) + POW(69.1 * ('$long' - longitude) * COS(latitude / 57.3), 2)) AS distance	
FROM notifications HAVING distance < 9999 ORDER BY distance";
		$result = mysql_query($sql);
		$row = array();
		while($r = mysql_fetch_assoc($result)){
			$row[] = $r;
		}
        return $row;
	}
	
	public function getUserVerified($id){
	$sql  ="select * FROM notifications WHERE `user_id`='$id' AND `status`='verified'";
	$result = mysql_query($sql);
		$row = array();
		while($r = mysql_fetch_assoc($result)){
			$row[] = $r;
		}
        return $row;
	}
	public function getUserCanceled($id){
	$sql  ="select * FROM notifications WHERE `user_id`='$id' AND `status`='canceled'";
	$result = mysql_query($sql);
		$row = array();
		while($r = mysql_fetch_assoc($result)){
			$row[] = $r;
		}
        return $row;
	}
	public function getUserNotVerified($id){
	$sql  ="select * FROM notifications WHERE `user_id`='$id' AND `status`='not verified'";
	$result = mysql_query($sql);
		$row = array();
		while($r = mysql_fetch_assoc($result)){
			$row[] = $r;
		}
        return $row;
	}
	
}
?>