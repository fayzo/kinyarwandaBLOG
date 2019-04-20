<?php 
include('../init.php');

if ($_REQUEST['key']) {

 if ($_REQUEST['key'] == 'color') {
	        $conn =$db;
			$id = $conn->real_escape_string($_REQUEST['id']);
			$color = $conn->real_escape_string($_REQUEST['color']);
            $conn->query("UPDATE users SET color='$color' WHERE user_id='$id'");
            $sql= $conn->query("SELECT user_id,color FROM users WHERE user_id = '$id' ");
            // echo ($db)? 'good':"ERROR: Could not able to execute $sql.".mysqli_error($db);
        	$data = $sql->fetch_array();
        	$jsonArrays = array(
        		'user_id' => $data['user_id'],
        		'color' => $data['color'],
        	);
           exit(json_encode($jsonArrays));
      }
}
?>