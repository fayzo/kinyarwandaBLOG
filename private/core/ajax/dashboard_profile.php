<?php
include('../init.php');

$msg = "";
$msg_class = "";

  if (!empty($_FILES['profileImage']['name'])) {
       // for the database
      //  $bio = mysqli_real_escape_string($conn,stripslashes($_POST['bio']));
      //  $profileImageName = mysqli_real_escape_string($conn,time() . '-' . $_FILES["profileImage"]["name"]);
       $profileImage_id =  $db->real_escape_string($_POST["profileImage_id"]);
       $profileImageName =  $db->real_escape_string($_FILES["profileImage"]["name"]);

       // For image upload
       $target_dir= $_SERVER['DOCUMENT_ROOT'].'Blog_Kinyarwanda/private/assets/image/users/user_image_profile/';
    //    $target_dir = "uploads/";
       $target_file = $target_dir . basename($profileImageName);

       // VALIDATION
       // validate image size. Size is calculated in Bytes
       if($_FILES['profileImage']['size'] >= 100*1024) {

         $msg = "Image size should not be greated than 100Kb";
         $msg_class = "alert-danger";
       }else if(file_exists($target_file)) {

        // check if file exists
         $msg = "File already exists";
         $msg_class = "alert-danger";
       }else if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

       // Upload image only if no errors
         $target_dir= $_SERVER['DOCUMENT_ROOT'].'Blog_Kinyarwanda/private/assets/image/users/user_image_profile/';
         // FILES TO DELETE ON ITS DESTINATIONS

         $query= $db->query("SELECT profile_image FROM users WHERE user_id=$profileImage_id");
         $rows= $query->fetch_assoc();
         $files= $target_dir.$rows['profile_image'] ;
        if (!unlink($files)) {
             echo "<script>alert('file was not deleted')</script>";
        }else{ 
          echo "<script>alert('file was deleted')</script>";
        }

        $sql = "UPDATE users SET profile_image='$profileImageName' WHERE user_id =  $profileImage_id";
        if($db->query($sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
        
      } else {
       $msg = "There was an error in the database";
       $msg_class = "alert-danger";
      }
        header('Location:'.BASE_URL_PRIVATE.'dashboard.php');
    // echo '<script type="text/javascript">window.top.window.completeUpload(' . $profileImage_id. ',\'' . $target_file . '\');</script>  ';
  }
?>