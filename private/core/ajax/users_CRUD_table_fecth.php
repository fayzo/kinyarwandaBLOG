<?php
	include('../init.php');

if (isset($_POST['key'])) {
	
    	if ($_POST['key'] == 'viewORedit') {
			$rowID = $db->real_escape_string($_POST['rowID']);
			$sql = $db->query("SELECT * FROM users WHERE user_id='$rowID'");
			$data = $sql->fetch_array();
			$jsonArrays = array(
				'username' => $data['username'],
				'firstname' => $data['firstname'],
				'lastname' => $data['lastname'],
				'email' => $data['email'],
				'password' => $data['password'],
				'profile_image' => $data['profile_image'],
				'cover_image' => $data['cover_image'],
				'date' => $data['date'],
				'address' => $data['address'],
				'country' => $data['country'],
				'state' => $data['state'],
			);

			exit(json_encode($jsonArrays));
 		}

		if ($_POST['key'] == 'fetch_array') {
			$begin_nmber = $db->real_escape_string($_POST['begin_nmber']);
			$end_nmber = $db->real_escape_string($_POST['end_nmber']);

			$sql = $db->query("SELECT * FROM users LIMIT $begin_nmber, $end_nmber");
			if ($sql->num_rows > 0) {
				$response = "";
				$increment=0;
				while($row = $sql->fetch_array()) {
				   $increment++;
					$response .= '
						<tr>
							<td>'.$increment.'</td>
							<td  style="width:100px;"id="username_'.$row["user_id"].'">
							'.
                            (strlen($row["username"]) > 20 ?
                              $row["username"] = substr($row["username"],0,10)."..."
                            : $row["username"])
							.'
							</td>
							<td  style="width:100px;"id="firstname_'.$row["user_id"].'">
							'.
                            (strlen($row["firstname"]) > 20 ?
                              $row["firstname"] = substr($row["firstname"],0,10)."..."
                            : $row["firstname"])
							.'
							</td>
							<td  style="width:100px;"id="lastname_'.$row["user_id"].'">
							'.
                            (strlen($row["lastname"]) > 20 ?
                              $row["lastname"] = substr($row["lastname"],0,10)."..."
                            : $row["lastname"])
							.'
							</td>
							<td  style="width:100px;"id="email_'.$row["user_id"].'">
							'.
                            (strlen($row["email"]) > 20 ?
                            $row["email"] = substr($row["email"],0,10)."..."
                            : $row["email"])
							.'
                            </td>
                            <td  style="width:100px;"id="password_'.$row["user_id"].'">
							'.
                            (strlen($row["password"]) > 20 ?
                              $row["password"] = substr($row["password"],0,10)."..."
                            : $row["password"])
							.'
							</td>
							<td  style="width:100px;"id="profile_image_'.$row["user_id"].'">
                            <img width = "60px"  src="'.BASE_URL_LINK.'image/users/user_image_profile/'.$row["profile_image"].'"></td>

							<td  style="width:100px;"id="cover_image_'.$row["user_id"].'">
                            <img width = "60px"  src="'.BASE_URL_LINK.'image/users/user_image_profile/'.$row["cover_image"].'"></td>
                            
							<td  style="width:100px;"id="date_'.$row["user_id"].'">'.$row["date"].'</td>
							<td style="width:250px;" class="d-inline-block">
								<button type="button" onclick="viewORedit_('.$row["user_id"].',\'edit\')" value="" class="btn btn-primary"><span class="fa fa-edit"></span></button>
								<button type="button" onclick="viewORedit_('.$row["user_id"].',\'view\')" value="" class="btn btn-secondary"><span class="fa fa-book"></span></button>
								<button type="button" onclick="deleteRow_('.$row["user_id"].')" value="" class="btn btn-danger"><span class="fa fa-trash"></span></button>
								<button type="button" name="update_profile_id" id="'.$row["user_id"].'" class="btn btn-primary update_profile_id" role="button"><span class="fa fa-image"></button>
							</td>
						</tr>
					';
				}
				exit($response);
			} else
				exit('Max');
		}

		if ($_POST['key'] == 'image') {
        	$rowID = $db->real_escape_string($_POST['id']);
        	$sql = $db->query("SELECT user_id, username, profile_image , cover_image FROM users WHERE user_id=' $rowID'");
        	$data = $sql->fetch_array();
        	$jsonArrays = array(
        		'user_id' => $data['user_id'],
        		'username' => $data['username'],
        		'profile_image' => $data['profile_image'],
        		'cover_image' => $data['cover_image'],
        	);
        	exit(json_encode($jsonArrays));
		}

		
		if ($_POST['key'] == 'deleteRow') {
			$rowID = $db->real_escape_string($_POST['rowID']);
			$uploadDir = $_SERVER['DOCUMENT_ROOT'].'socialKinyarwanda/private/assets/image/users/user_image_profile/';
			$query= $db->query("SELECT profile_image ,cover_image FROM users WHERE user_id= $rowID ");
            $rows= $query->fetch_assoc();
			$files= $uploadDir.$rows['profile_image'];
			$fileName = 'defaultprofileimage.png';
			$coverName = 'defaultCoverImage.png';

			if (file_exists($files) == true && $fileName == $rows['profile_image'] && $coverName == $rows['cover_image']) { 
				    link($files);
					echo "file is default ";
			}else{
					unlink($files);
					echo "file deleted ";
			}

			$db->query("DELETE FROM users WHERE user_id='$rowID'");
			exit('The Row Has Been Deleted!');
		}

		$username = $db->real_escape_string($_POST['username']);
		$firstname = $db->real_escape_string($_POST['firstname']);
		$lastname = $db->real_escape_string($_POST['lastname']);
		$email = $db->real_escape_string($_POST['email']);
		$password = $db->real_escape_string($_POST['password']);
		$date = $db->real_escape_string($_POST['date']);
        $address = $db->real_escape_string($_POST['address']);
        $country = $db->real_escape_string($_POST['country']);
        $state = $db->real_escape_string($_POST['state']);

		$rowID = $db->real_escape_string($_POST['rowID']);
		if ($_POST['key'] == 'updateRow') {
			$db->query("UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname',
			email='$email', password='$password', date='$date', address='$address', country='$country', state='$state' WHERE user_id='$rowID'");
			exit('Post Has Been Update!');
		}
		
		   
		if ($_POST['key'] == 'addpost') {
		    	$sql = $db->query("SELECT username, email FROM users WHERE username = '$username' and email = '$email' ");
		    	if ($sql->num_rows > 0){
		    	   exit("User information Already Exists!");
		    	}else {
		            $db->query("INSERT INTO users (firstname,Username,lastname,email,password,date,address,country,state) 
		    		VALUES ('$firstname','$username','$lastname','$email','$password','$date','$address','$country','$state')");
		            exit('User information Has Been Inserted!');
		    	}
			}
			
		$db->close();
	}
    ?>