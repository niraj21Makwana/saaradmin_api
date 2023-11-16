<?php
  include('assets/includes/header.php');
?>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
       <!-- navabar here -->
       <?php include('assets/includes/navbar.php'); ?>
      <!-- navbar here -->
      <!-- sidebar start -->
      <?php include('assets/includes/sidebar.php'); ?>
      <!-- sidebar end -->
      <!-- Main Content -->
      <div class="main-content">
            <form id="form_add_post_category" enctype="multipart/form-data">
                <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Post Category</h4>
                            </div>
                            
                        <div class="card-body">
                                <div>
                                    <label id="process_msg1" for=""></label>
                                     <label id="process_msg" for=""></label>
                                    <label id="error_msg" for=""></label>
                                </div>
                                   
                                <div class="row">
                                    
                                <div class="col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label>Select Category type</label>
                                        <select name="category_type" id="category_type" class="form-control" required>
                                            <option value="" selected>Select Category type</option>
                                            <option value="Politicle">Politicle</option>
                                            <option value="General People">General People</option>
                                            <option value="Local Business">Local Business</option>
                                            <option value="Educational">Educational</option>
                                            <option value="Socail Worker">Socail Worker</option>
                                            <option value="Societies">Societies</option>
                                           

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label>Select Upload Place</label>
                                        <select name="upload_place" id="upload_place" class="form-control" required>
                                            <option value="" selected>Select Upload Place</option>
                                            <option value="Upcoming" >Upcoming</option>
                                            <option value="Todays" >Todays</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Category Photo</label>
                                        <input id="category_photo" type="file"   name="category_photo" class="form-control" accept=".jpg" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input id="category_name" type="text" name="category_name" class="form-control" required>
                                    </div>
                                <div>    
                                </div>
                            </div>
                           
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Alt ( <small>Alt text describes images for people who have trouble seeing them. it will optimize your images.</small> )</label>
                                                <input id="alt_text" type="text" placeholder="(Optional)" name="alt" class="form-control">
                                            </div>
                                        </div>
                           
                            
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" name="Add_Now" type="submit" id="add_now_post_category">Add Now</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
            </form>
           </div>

           <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Export Table 2</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="category-list" id="table_id" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                          </tr>
                        </thead>
                       
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


     
        </div>
    </div>
   
     
   
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


    $("#form_add_post_category").on('submit', function (e) {
        e.preventDefault();


       

    var category_type = $('#category_type').val();
    var post_place = $('#upload_place').val();
    var category_photo = $('#category_photo').val();
    var catgory_title = $('#category_name').val();
    var photo_alt = $('#alt_text').val();
    

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
            url: "ajax/add-post-ajex",
            data: new FormData(this),//+ "&category_photo=" + category_photo
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
            // setting a timeout
            $('#process_msg').text("Processing...").css('color','green');
            $('#error_msg').text("Please select category name.").css('display','none');
            },
            success: function (data) {
                $('#error_msg').text("Please select category name.").css('display','none');
                $('#process_msg').text("Processing...").css('display','none');
                if(data == 1){
                    $('#process_msg1').text("Category Post added successfully").css('color','blue');
                    $('#category_type').val("");
                    $('#upload_place').val("");
                    $('#category_photo').val("");
                    $('#category_name').val("");
                    $('#alt_text').val("");
                    // function call
                          loadData();
                    // function call end

                    setTimeout(() => {
                    $('#process_msg1').fadeOut();
                    }, 3000);
                }else if(data == 0){
                    $('#process_msg1').text("someting went wrong").css('color','red');
                }else if(data == 3){
                    $('#process_msg1').text("Duplicate category name in this catgeory type.").css('color','red');
                }  
            }
    });
    }


    

    
  
   
});

loadData();
function loadData(){
    $.ajax({
        type: "POST",
        url: "ajax/fetch-data/fetch-category-data",
        success: function (response) {
            $(".category-list").html(response);
        }
    });
}


});



    $(document).ready(function () {
        $('#table_id').dataTable();
    });


</script>
<?php include('assets/includes/footer.php'); ?>
      <?php include('assets/includes/footer-script.php'); ?>