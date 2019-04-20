<?php
include('../init.php');

if(!empty($_FILES['picture']['name'])){
    $id= $_POST['edit_profile'];
    $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_Kinyarwanda/private/assets/image/users/user_image_profile/';
    $fileName = time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir.$fileName;
    // FILES TO DELETE ON ITS DESTINATIONS
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        // FILES TO DELETE ON ITS DESTINATIONS
        $query= $db->query("SELECT profile_image FROM users WHERE user_id= $id ");
        $rows= $query->fetch_assoc();
        $files= $uploadDir.$rows['profile_image'];
        $filename = 'defaultprofileimage.png';
         if (file_exists($files) == true && $filename == $rows['profile_image']) { 
              link($files);
              echo "<script>alert('file was uploaded')</script>";
            }else{
                unlink($files);
                echo "<script>alert('file deleted')</script>";
         }
        $update = $db->query("UPDATE users SET profile_image = '".$fileName."' WHERE user_id = $id");
        
        //Update status
        if($update){
            $result = $id ;
            // $result = 2;
        }
    }

    //Load JavaScript function to show the upload status
    $path= $_SERVER['DOCUMENT_ROOT'].'Blog_Kinyarwanda/private/assets/image/users/user_image_profile/'.$fileName.'';
    $strpos_countsTo = strpos($path, 'assets/image/users/user_image_profile/'.$fileName.'');
    $path_replace= substr_replace($path,'', 0,$strpos_countsTo);
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' .$path_replace. '\');</script>  ';
}

if(!empty($_FILES['cover_picture']['name'])){
    $id= $_POST['edit_cover'];
    $uploadDir = $_SERVER['DOCUMENT_ROOT'].'Blog_Kinyarwanda/private/assets/image/users/user_image_profile/';
    $coverName = time().'_'.basename($_FILES['cover_picture']['name']);
    $targetPath = $uploadDir.$coverName;
    // FILES TO DELETE ON ITS DESTINATIONS
    if(@move_uploaded_file($_FILES['cover_picture']['tmp_name'], $targetPath)){
        // FILES TO DELETE ON ITS DESTINATIONS
        $query= $db->query("SELECT cover_image FROM users WHERE user_id= $id ");
        $rows= $query->fetch_assoc();
        $files= $uploadDir.$rows['cover_image'];
		$covername = 'defaultCoverImage.png';

		if (file_exists($files) == true && $covername == $rows['cover_image']) { 
              link($files);
              echo "<script>alert('file was uploaded')</script>";
            }else{
                unlink($files);
                echo "<script>alert('file deleted')</script>";
         }
        $update = $db->query("UPDATE users SET cover_image = '".$coverName."' WHERE user_id = $id");
        
        //Update status
        if($update){
            $result = $id ;
            // $result = 2;
        }
    }

    //Load JavaScript function to show the upload status
    $path= $_SERVER['DOCUMENT_ROOT'].'Blog_Kinyarwanda/private/assets/image/users/user_image_profile/'.$coverName.'';
    $strpos_countsTo = strpos($path, 'assets/image/users/user_image_profile/'.$coverName.'');
    $path_replace= substr_replace($path,'', 0,$strpos_countsTo);
    echo '<script type="text/javascript">window.top.window.cover_completeUpload(' . $result . ',\'' .$path_replace. '\');</script>  ';
}


