<?php 
$user = 'root'; $password = ''; $db = 'retrieve_data'; $host = '127.0.0.1'; $port = 3308;
$conn = new mysqli($host, $user, $password, $db, $port);
// $conn = new mysqli( 'localhost','fayzo','fayzo123','retrieve_data','3306');
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'):
    $name=  $conn->real_escape_string($_POST['name']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    # code...
    $sql_found = $conn->query("SELECT name,lastname,email FROM retrieve_data WHERE name ='{$name}'and lastname='{$lastname}'");
    $row= $sql_found->fetch_assoc();
        # code...
    if($row['name'] == $name && $row['lastname'] == $lastname && $row['email'] == $email){
       echo 'Already token';
       exit('<p style="color:red;">fail</p>');
    }else{
        echo "Records added successfully.";
        $sql= $conn->query("INSERT INTO retrieve_data(name,lastname,email) VALUES('$name','$lastname','$email')");
        exit('<p style="color:green;">successfully</p>');
    }
    // else{
    //         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    // }
    
    endif;
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
            <h1>Sign up</h1>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
                </div>
                <input name="submit" id="submit" onclick="manage('sign_up');" class="btn btn-primary" type="button" value="submit">
                <p><a class="btn btn-primary" href="login.php">Login</a></p>
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
        var lastname = $("#lastname");
        var email = $("#email");
        //   use 1 or second method to validaton
        if (isEmpty(name) && isEmpty(lastname) && isEmpty(email)) {
            $('form').on('click', function(e) {
                e.preventDefault();
                var form = $(this).serialize();
                $('#result').text(form);
                $.ajax({
                    key: key,
                    url: 'sign_up.php',
                    method: 'POST',
                    dataType: 'Text',
                    data: form,
                    success: function(response) {
                        $("#response").html(response);
                        console.log(response);
                        if (response.indexOf('successfully') >= 0) {
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