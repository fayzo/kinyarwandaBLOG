<?php
$user = 'root';
$password = '';
$db = 'retrieve_data';
$host = '127.0.0.1';
$port = 3308;
$conn = new mysqli($host, $user, $password, $db, $port);

// $conn = new mysqli('localhost', 'fayzo', 'fayzo123', 'retrieve_data', '3306');
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// if (isset($_SESSION['key'])) {
//     header('location:login.php');
//     exit();
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $sql = $conn->query("SELECT name,email FROM retrieve_data WHERE email ='{$email}'and name='{$name}'");
    $row = $sql->fetch_assoc();
    if ($row['email'] ==  $email) {
        exit('<p style="color:green;">success</p>');
        // header('location:login.php');
    } else {
        exit('<p style="color:red;">fail</p>');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <img src="img/avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
                </div>
                <input name="submit" id="submit" onclick="manage('login');" class="btn btn-primary" type="button" value="submit">
                <p><a class="btn btn-primary" href="forgetPassword.php">Forget Password</a></p>
                <p><a class="btn btn-primary" href="sign_up.php">Sign_up</a></p>
            </form><span id='response'></span>
            <!-- <p id="result"></p> -->
        </div>
    </div>
</body>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/popper.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script>
    function manage(key) {
        var name = $("#name");
        var email = $("#email");
        if (isEmpty(name) && isEmpty(email)) {
            $('form').on('click', function(e) {
                e.preventDefault();
                var form = $(this).serialize();
                $('#result').text(form);
                $.ajax({
                    key: key,
                    url: 'forgetPassword.php',
                    method: 'POST',
                    dataType: 'Text',
                    data: form,
                    success: function(response) {
                        $("#response").html(response);

                        console.log(response);
                        if (response.indexOf('success') >= 0) {
                            window.location = 'login.php';
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

</html> 