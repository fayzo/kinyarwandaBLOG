$(document).ready(function () {
    $("#AddUsers").on('click', function () {
        $("#table_form").modal('show');
        $("#profile_image").fadeOut();
        $("#save").attr('value', "save").attr('onclick', "manage('addpost')").fadeOut();
    });

    $("#table_form").on('hidden.bs.modal', function () {
        $("#edit_Content").fadeIn();
        $("#view_Content").fadeOut();
        $("#profile_image").fadeOut();
        $("#post_editRowID").val(0);
        $("#username").val("");
        $("#firstname").val("");
        $("#lastname").val("");
        $("#email").val("");
        $("#password").val("");
        $("#date").val("");
        $("#address").val('');
        $("#country").val("");
        $("#state").val("");
        $("#closeBtn").fadeIn();
        $(".user_form").fadeIn();
        $("#save").attr('value', "save").attr('onclick', "manage('addpost')").fadeOut();
    });
    getExistingData_(0,50);
});

   function deleteRow_(rowID) {
       if (confirm('Are you sure ?')) {
           $.ajax({
               url: 'core/ajax/users_CRUD_table_fecth.php',
               method: 'POST',
               dataType: 'text',
               data: {
                   key: 'deleteRow',
                   rowID: rowID
               },
               success: function (response) {
                   $("#username" + rowID).parent().remove();
                   alert(response);
               }
           });
       }
   }
 

function getExistingData_(begin_nmber,end_nmber) {
    $.ajax({
        url: 'core/ajax/users_CRUD_table_fecth.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: 'fetch_array',
            begin_nmber: begin_nmber,
            end_nmber: end_nmber
        },
        success: function (response) {
            if (response != "Max") {
                $('#tbody').append(response);
                begin_nmber += end_nmber;
                getExistingData_(begin_nmber, end_nmber);
            } else
                $(".table").DataTable({
                    "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
                });
        }
    });
}


function viewORedit_(rowID, type) {
    $.ajax({
        url: 'core/ajax/users_CRUD_table_fecth.php',
        method: 'POST',
        dataType: 'json',
        data: {
            key: 'viewORedit',
            rowID: rowID
        },
        success: function (response) {
            if (type == "view") {
                $("#show_Content").fadeIn();
                $("#edit_Content").fadeOut();
                $("#profile_image").fadeOut();
                $("#usernameView").html(response.username);
                $("#firstnameView").html(response.firstname);
                $("#lastnameView").html(response.lastname);
                $("#passwordView").html(response.password);
                $("#emailView").html(response.email);
                $("#dateView").html(response.date);
                $("#addressView").html(response.address);
                $("#countryView").html(response.country);
                $("#stateView").html(response.state);
                $("#cover_imageView").html(response.cover_image);
                $("#profile_imageView").attr('src', 'assets/image/users/user_image_profile/'+response.profile_image);
                $("#closeBtn").fadeIn();
                $(".user_form").fadeOut();
                $("#save").fadeOut();


            } else {
                $("#edit_Content").fadeIn();
                $("#show_Content").fadeOut();
                $("#profile_image").fadeOut();
                $("#post_editRowID").val(rowID);
                $("#username").val(response.username);
                $("#firstname").val(response.firstname);
                $("#lastname").val(response.lastname);
                $("#email").val(response.email);
                $("#password").val(response.password);
                $("#date").val(response.date);
                $("#address").val(response.address);
                $("#country").val(response.country);
                $("#state").val(response.state);
                $("#closeBtn").fadeIn();
                $(".user_form").fadeOut();
                $(".image").fadeOut();
                $("#save").attr('value', 'update').attr('onclick', "manage('updateRow')").fadeIn();
                console.log(response);
            }

            $(".modal-title").html(response.title);
            $("#table_form").modal('show');
        }
    });
}

 function manage(key) {
     var editRowID = $("#post_editRowID");
     var username = $("#username");
     var firstname = $("#firstname");
     var lastname = $("#lastname");
     var email = $("#email");
     var password= $("#password");
     var date= $("#date");
     var address= $("#address");
     var country= $("#country");
     var state = $("#state");

         $.ajax({
             url: 'core/ajax/users_CRUD_table_fecth.php',
             type: 'post',
             dataType: 'text',
             data: {
                 key: key,
                 rowID: editRowID.val(),
                 username: username.val(),
                 firstname: firstname.val(),
                 lastname: lastname.val(),
                 email: email.val(),
                 password: password.val(),
                 date: date.val(),
                 address: address.val(),
                 country: country.val(),
                 state: state.val(),

             }, success: function (response) {
                 if (response != "success") {
                     alert(response);
                     console.log(response);

                 } else {
                     $("#username_" +editRowID.val()).html(username.val());
                     $("#firstname_"+editRowID.val()).html(firstname.val());
                     $("#lastname_"+editRowID.val()).html(lastname.val());
                     $("#email_"+editRowID.val()).html(email.val());
                     $("#password_"+editRowID.val()).html(password.val());
                     $("#date_"+editRowID.val()).html(date.val());
                     username.val("");
                     firstname.val("");
                     lastname.val("");
                     email.val("");
                     password.val("");
                     date.val("");
                     address.val("");
                     country.val("");
                     state.val("");
                     $("#table_form").modal('hide');
                     $("#save").attr('value', "save").attr('onclick', "manage('addpost')").fadeOut();
                     $(".user_form").fadeIn();
                 }
             }
         });
}
 
 $(document).ready(function () {
     $("#users_form").on('submit', (function (e) {
         e.preventDefault();
             $.ajax({
                 url: 'core/ajax/adduser_upload.php',
                 dataType: 'text',
                 type: "POST",
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend: function () {
                     //  $(".user_form").fadeOut
                     //  $("#save").fadeOut();
                 },
                 success: function (response) {
                     alert(response);
                     console.log(response);
                     //  $("#table_form").modal('hide').fadeOut();
                 },
                 error: function (response) {
                     $("#err").html(response).fadeIn();
                 }

             });
     }));
 });

//  START OF UPLOAD IMAGE CONTENT 

$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function (e) {
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });
    //On select file to upload
    $("#fileInput").on('change', function () {
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        //validate file type
        if (!img_ex.exec(image)) {
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#fileInput').val('');
            return false;
        } else {
            $('.uploadProcess').show();
            $('#uploadForm').hide();
            $("#picUploadForm").submit();
       }
    });
    $(".editLinks").on('click', function (e) {
        e.preventDefault();
        $("#cover_fileInput:hidden").trigger('click');
    });

    $("#cover_fileInput").on('change', function () {
        var cover_image = $('#cover_fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        //validate file type
        if (!img_ex.exec(cover_image)) {
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#cover_fileInput').val('');
            return false;
        } else {
            $('.cover_uploadProcess').show();
            $('#cover_uploadForm').hide();
            $("#cover_picUploadForm").submit();
       }
    });
});

// After completion of image upload process
function completeUpload(success, fileName) {
    if (success == $('#edit_profile').val()) {
        $('#imagePreview').attr("src", "");
        $('#imagePreview').attr("src", fileName);
        $('#fileInput').attr("value", fileName);
        $('.uploadProcess').hide();
        console.log(success);
        console.log(fileName);
        
    } else {
        $('.uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}

function cover_completeUpload(success, cover_Name) {
    if (success == $('#edit_profile').val()) {
        $('#cover_imagePreview').attr("src", "");
        $('#cover_imagePreview').attr("src", cover_Name);
        $('#cover_fileInput').attr("value", cover_Name);
        $('.cover_uploadProcess').hide();
        console.log(success);
        console.log(cover_Name);
        
    } else {
        $('.cover_uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}

$(document).on('click', '.update_profile_id', function () {
    $('#edit_profile').val($(this).attr("id"));
    $('#edit_cover').val($(this).attr("id"));
    var t = $(this).attr("id");
    console.log(t);
    $.ajax({
        url: 'core/ajax/users_CRUD_table_fecth.php',
        type: 'post',
        dataType: 'json',
        data: {
            key: 'image',
            id: t
        },
        success: function (response) {
            $('#nameView4').html(response.username);
            var userPicture = (response.profile_image) ? response.profile_image : 'load.jpg';
            var userPictureURL = 'assets/image/users/user_image_profile/' + userPicture;
            $('.imagePreview').attr('src', userPictureURL);
            $('#cover_nameView4').html(response.username);
            var cover_userPicture = (response.cover_image) ? response.cover_image : 'load.jpg';
            var cover_userPictureURL = 'assets/image/users/user_image_profile/' + cover_userPicture;
            $('.cover_imagePreview').attr('src', cover_userPictureURL);
            $(".modal-title").html(response.username);
            $("#table_form").modal('show');
            $("#profile_image").fadeIn();
            $("#edit_Content").fadeOut();
            $("#show_Content").fadeOut();
            $("#closeBtn").fadeIn();
            $("#save").fadeOut();
            console.log(response);
            console.log(userPictureURL);
            console.log(cover_userPictureURL);
        }
    });
});

function isEmpty(caller) {
    if (caller.val() == "") {
        caller.css("border", "1px solid red");
        return false;
    } else {
        caller.css("border", "1px solid green");
    }
    return true;
}
//  END OF UPLOAD IMAGE CONTENT 