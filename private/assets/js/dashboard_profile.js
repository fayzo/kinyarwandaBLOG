 $(document).ready(function() {
        //If image edit link is clicked
        //On select file to upload
        $("#profileImage").on('change', function() {
            var image = $('#profileImage').val(); 
            var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            //validate file type
            if (!img_ex.exec(image)) {
                alert('Please upload only .jpg/.jpeg/.png/.gif file.');
                $('#profileImage').val('');
                return false;
            } else {
                $("#picUploadForms").submit();
            }
        });
    });

    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(e.files[0]);
        }
    }

    // After completion of image upload process
     function completeUpload(success, fileName) {
         var id = document.getElementById('profileImage_id').Value;
         console.log(id);
         
        if (success == id) {
            $('#profileDisplay').attr("src", "");
            $('#profileDisplay').attr("src", fileName);
            $('#profileImage').attr("value", fileName);
            // $('.uploadProcess').hide();
        } else {
            // $('.uploadProcess').hide();
            alert('There was an error during file upload!');
        }
        return true;
    }