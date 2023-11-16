<?php 
include('../assets/includes/connection.php');


if(isset($_POST['category_type']) && isset($_POST['upload_place']) && isset($_POST['category_name']) && isset($_POST['category_photo'])){
   
   $category_id = uniqid();
   $catgeory_type = $_POST['category_type'];
   $upload_place = $_POST['upload_place'];
   $category_name = trim(ucwords($_POST['category_name']));
   $alt_text = trim(ucfirst($_POST['alt']));
   $category_photo = time().'_'.$_FILES['category_photo']['name'];
   $category_phot_temp = $_FILES['category_photo']['tmp_name'];

   $check_duplicates = mysqli_query($con,"SELECT * FROM `dy_post_category` WHERE `category_type`='$catgeory_type' AND `category_name`='$category_name' AND `upload_place`='$upload_place'");

   $countduplicates = mysqli_num_rows($check_duplicates);
    if($countduplicates<0 || $countduplicates==0){
        $run = mysqli_query($con,"INSERT INTO `dy_post_category`(`category_id`, `category_type`, `upload_place`, `category_name`, `category_photo`, `alt_text`) VALUES ('$category_id','$catgeory_type','$upload_place','$category_name','$category_photo','$alt_text')");
        if($run){
           // move_uploaded_file($category_phot_temp,"category_images/$category_photo");
           echo 1;
        }else{
            echo 0;
        }
    }else{
        echo 2;
    }
}

?>













<script>

$(document).ready(function () {
    maxFileSize = 1 * 1024 * 1024; // 1MB
    $('#category_photo').on('change', function () {
        var category_photo = $('#category_photo').val();
        filesize = this.files[0].size;
        if(filesize > maxFileSize){
            this.setCustomValidity("You can upload photo only under 1MB");
            this.reportValidity();
           // $imageFile.val(''); 
           $('#category_photo').val("");
        }else{
            this.setCustomValidity("");
        }
    });


    $("#add_now_post_category").on('click', function () {
    var category_type = $('#category_type').val();
    var post_place = $('#upload_place').val();
    var category_photo = $('#category_photo').val();
    var catgory_title = $('#category_name').val();
    var photo_alt = $('alt_text').val();
    

    if(category_type==""){

        $('#error_msg').text("Please select at least one category type.").css('color','red');

    }else if(post_place==""){
        $('#error_msg').text("Please select place where you want to upload category.").css('color','red');
    }else if(category_photo==""){
        $('#error_msg').text("Please select category photo.").css('color','red');
    }
    else if(catgory_title==""){
        $('#error_msg').text("Please select category name.").css('color','red');
    }
    else if(photo_alt==""){
        photo_alt = category_type;
    }else{
        
        setTimeout(() => {
        $('#error_msg').fadeOut();
            }, 2000);
        $.ajax({
        type: "POST",
            url: "ajex/add-post-ajex",
            data: $("#form_add_post_category").serialize(),//+ "&category_photo=" + category_photo
            contentType: false,
            
            cache:false,
            beforeSend: function() {
            // setting a timeout
            $('#process_msg').text("Processing...").css('color','green');
            $('#error_msg').text("Please select category name.").css('display','none');
            },
            success: function (data) {
                $('#error_msg').text("Please select category name.").css('display','none');
                $('#process_msg').text("Processing...").css('display','none');
                if(data == 1){
                    $('#process_msg').text("Category Post added successfully").css('color','blue');
                }else if(data == 0){
                    $('#process_msg').text("someting went wrong").css('color','red');
                }else if(data == 3){
                    $('#process_msg').text("Duplicate category name in this catgeory type.").css('color','red');
                }  
            }
    });
    }


    

    
  
   
});

});





</script>