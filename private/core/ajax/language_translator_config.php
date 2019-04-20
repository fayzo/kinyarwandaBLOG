<?php
// session_start();

	if (isset($_REQUEST['key'])) {

		if($_REQUEST['key'] == 'lang'){
            # code...
            include('../init.php');
            
			$id = $db->real_escape_string($_REQUEST['id']);
	        $lang = $db->real_escape_string($_REQUEST['lang']);
            $db->query("UPDATE users SET language ='$lang' WHERE user_id= '$id' ");
            $sql= $db->query("SELECT user_id,language FROM users WHERE user_id = '$id'");
            $data = $sql->fetch_array(); 
            $language = array(
                'language' => $data['language'],
             );
            //  echo ($db)? 'good':"ERROR: Could not able to execute $sql.".mysqli_error($db);
			// $_SESSION['language'] = $data['language'];
            exit(json_encode($language));
		}
	}

    // if (!isset($_SESSION['language'])){
    // 		$_SESSION['lang'] = "en";
    // 	}else if (isset($_SESSION['language']) && !empty($_SESSION['language'])) {
    // 			$_SESSION['lang'] = $_SESSION['language'];
	// 	}
   
	// require_once "assets/languages/" .$_SESSION['lang']. ".php";

?>