<?php
session_start();
include('../core/init.php');
// if (isset($_POST['login'])) {
    # code...
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
 if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email= $dashboardpage->test_input($_POST['email']);
        $password= $dashboardpage->test_input($_POST['password']);
        $datetime= $dashboardpage->test_input($_POST['datetime']);

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error['email']= 'invalid format';
            exit('<p style="color:red;">invalid Email Format</p>');

        }elseif (!preg_match("/^[a-zA-Z ]*$/", $password)) {
            $error['password'] = "Only letters and white space allowed";
            exit('<p style="color:red;">Only letters and white space allowed</p>');
        }else {
            if ($dashboardpage->login($email,$password,$datetime) == false) {
                if ($email == $_SESSION['email']) {
                    $error['email']= 'Email correct ';
                    exit('<p style="color:red;">Email correct</p>');
                }
                exit('<p style="color:red;">Please insert your Email and Password Correct</p>');
            }
                exit('<p style="color:green;">success</p>');
        }
    }
    // else{
    //    $error['fields']= "Please insert your email and password ";
    // }
}
// }
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = $db->real_escape_string($_POST['email']);
//     $password = $db->real_escape_string($_POST['password']);
//     $sql = $db->query("SELECT user_id,email,password FROM users WHERE email ='{$email}'and password='{$password}'");
//     $row= $sql->fetch_assoc();
//     if ($sql->num_rows > 0) {
//         $_SESSION['user_id'] = $row['user_id'];
//         exit('<p style="color:green;">success</p>');
//     } else {
//         exit('<p style="color:red;">Please insert your email and password</p>');
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/login.css">
    <script src="<?php echo BASE_URL_LINK ;?>/icon/fontawesome_5_4/js/all.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script> -->
    <title>Admin Areas | Edit Pages</title>
</head>


<body>
<div class="front-img">
	<img src="<?php echo BASE_URL_LINK ;?>image/login_photo/image.jpg">
</div>	
    <div class="container">
        <div class="login-box">
            <img src="<?php echo BASE_URL_LINK ;?>image/login_photo/avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form method="post">

                <div class="form-group">
                    <input type="hidden" name="datetime" value ="<?php echo  date('Y-m-d H-i-s') ;?>">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                        placeholder="Email...">
                </div>
                <ul style="list-style-type:none;">
                    <?php 
                if (isset($error['email']))
                {
                echo ' <li class="error-li">
                <div class="span-fp-error">'.$error["email"].'</div>
                          </li> ';
                     }
                 ?>
                </ul>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="Password">
                </div>
                <!-- <input id="submit" name="login" class="btn btn-primary" type="submit" value="submit"> -->
                <input onclick="manage('login');" class="btn btn-primary" type="button" value="submit">
                <span id='response'></span>
                <ul style="list-style-type:none;">
                    <?php
                if (isset($error['fields']))
                {
                    echo ' <li class="error-li">
                    <div class="span-fp-error">'.$error["fields"].'</div>
                    </li> ';
                }
                ?>
                </ul>
                <a class="btn btn-primary mr-3" href="<?php FORGET_PASSPOWRD_LOGIN ;?>">Forget Password</a>
                <a class="btn btn-primary" href="<?php SIGNUP ;?>">Sign_up</a>
            </form>
            <!-- <p id="result"></p> -->
        </div>
    </div>
    <!-- FOOTER COPYRIGHT YEAR  -->
    <!-- FOOTER COPYRIGHT YEAR  -->
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/popper.min.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>dist/js/bootstrap.min.js"></script>
    <script>
    function manage(key) {
        var email = $("#email");
        var password = $("#password");
        if (isEmpty(email) && isEmpty(password)) {
            $('form').on('click', function(e) {
                e.preventDefault();
                var form = $(this).serialize();
                $('#result').text(form);
                $.ajax({
                    key: key,
                    url: '<?php echo LOGIN ;?>',
                    type: 'POST',
                    dataType: 'Text',
                    data: form,
                    success: function(response) {
                        $('#response').html(response);
                        console.log(response);
                        if (response.indexOf('success') >= 0) {
                            window.location = '<?php echo BASE_URL_PRIVATE.'dashboard.php' ;?>';
                        } else {
                            email.css("border", "1px solid red");
                            password.css("border", "1px solid red");
                        }
                    }
                });
            });
        }
    }

    function isEmpty(caller) {
        if (caller.val() == "") {
            caller.css("border", "1px solid red");
            return false;
        } else {
            caller.css("border", "1px solid green");
        }
        return true;
    }
    </script>
    <?php $dbase->closeDb();?>
</body>

</html>