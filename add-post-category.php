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
           




 <!-- Modal with form -->
       

        <!-- Modal with form end -->
           <section class="section">
           <div class="section-body">
            <div class="row">
                
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <h4>Category Table</h4>
                    <div class="card-header-action">

                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-primary col-12 "><i class="fa fa-plus"></i> Add Category</a>
                    </div>
                  </div>
                    
                  <input style="border-radius:4px;border:1px solid silver;outline:none;padding:10px;margin:0px 30px;" class="searchbox" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Category Type..." title="Search Catgeory Type">

                 
                  <div class="card-body">
                  <div style="display:none;" class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                       
                      </div>
                    </div>

                    <div style="display:none;" class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <!-- <th> <button type="button" id="dlt-selected" class="btn btn-danger" title="Delete Selected Items"><i class="fas fa-trash"></i> </th> -->
                            <th>Sr.</th>
                            <th colspan="8">Add Posts</th>
                            <th>Category Photo</th>
                            <th>Category Name</th>
                            <th>Category Type</th>
                            <th>Upload Place</th>
                            <th>Alt Text</th>
                            <th>Status - <small>active/deactive</small></th>
                            <th>upload date</th>
                            <th colspan="8">Edit / Delete</th>
                           
                          </tr>
                        </thead>
                        <tbody id="category-list"></tbody>
                            <!-- <tfoot id="pagination">
                                 <tr align="center">
                                    <td colspan="12"><button  id="ajaxbtn" data-id="" class="btn btn-info col-12 col-md-2">Load More</button> </td>
                                 </tr>
                            </tfoot> -->
                      </table>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="openPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Add posts in the category</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="form_add_posts" action="" method="post">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add posts in the category</h4>
                        </div>
                        <div class="card-body">
                            <div class="messages" >
                                <label id="process_msg1" for=""></label>
                                <label id="process_msg" for=""></label>
                                <label id="error_msg" for=""></label>
                            </div>

                            <!-- row start -->
                            <div class="row">
                                <!-- -- -->
                                <div class="col-12 col-md-12 mb-4">
                                    <label for="">
                                        <img class="ed_img" width="80" height="80" src="" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" alt="">
                                    </label>
                                </div>
                                <!-- -- -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <input type="hidden" name="catid" class="cat_ed_id" >

                                    <div class="form-group">
                                        <label>Category type</label>
                                        <input type="text" name="category_type" id="category_type" class="form-control ed_cat" readonly="true" >
                                    </div>
                                </div>

                                <!-- -- -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Select Upload Place</label>
                                        <input type="text" name="upload_place" id="upload_place" class="form-control ed_place" readonly="true">
                                    </div>
                                </div>
                                <!-- <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Category Photo</label>
                                        <input id="category_photo_edit" type="file"   name="category_photo" class="form-control ed_photo" accept=".jpg" >
                                    </div>
                                </div> -->
                                <!-- -- -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                            <label>Category Name</label>
                                            <input id="category_name" type="text" name="category_name" class="form-control ed_catname" readonly="true">            
                                    </div>
                                </div>
                                <!-- -- -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Alt </label>
                                        <input id="alt_text" type="text" placeholder="" name="alt" class="form-control ed_alt_text" readonly="true">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </div>
                                <!-- -- -->

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" name="update_Now" type="submit" id="update_now_post_category">Update Now</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </div>

  
                            <!-- row end -->
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>




<!-- ============================================ -->









      <!-- add category category modal -->
      <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!-- <h5 class="modal-title" id="formModal">Add Post Category</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- form gose here -->
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

                                   
                                    
                                    <div class="col-12 col-md-6 col-lg-6">
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
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Select Upload Place</label>
                                            <select name="upload_place" id="upload_place" class="form-control" required>
                                                <option value="" selected>Select Upload Place</option>
                                                <option value="Upcoming" >Upcoming</option>
                                                <option value="Todays" >Todays</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Category Photo</label>
                                            <input id="category_photo" type="file"   name="category_photo" class="form-control" accept=".jpg" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
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
                                                <input id="alt_text" type="text" placeholder="" name="alt" class="form-control">
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
                <!-- form end -->
              </div>
            </div>
          </div>
        </div>
     <!-- end -->



        </div>
   
        <!-- edit post category modal -->
        <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
             aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="formModal">Edit Post Category</h5> -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                <!-- form gose here -->
                    <form id="form_edit_post_category" class="update_now_post_category" enctype="multipart/form-data">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                            <div class="card-header">
                                                <h4>Edit Post Category</h4>
                                            </div>
                                    
                                            <div class="card-body">
                                                <div>
                                                    <label id="process_msg1" for=""></label>
                                                    <label id="process_msg" for=""></label>
                                                    <label id="error_msg" for=""></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-12 mb-4">
                                                        <label for="">
                                                            <img class="ed_img" width="80" height="80" src="" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" alt="">
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <input type="hidden" name="catid" class="cat_ed_id" >

                                                        <div class="form-group">
                                                            <label>Select Category type</label>
                                                            <select name="category_type" id="category_type" class="form-control ed_cat" >
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
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Select Upload Place</label>
                                                            <select name="upload_place" id="upload_place" class="form-control ed_place" >
                                                                <option value="" selected>Select Upload Place</option>
                                                                <option value="Upcoming" >Upcoming</option>
                                                                <option value="Todays" >Todays</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Category Photo</label>
                                                            <input id="category_photo_edit" type="file"   name="category_photo" class="form-control ed_photo" accept=".jpg" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Category Name</label>
                                                            <input id="category_name" type="text" name="category_name" class="form-control ed_catname" >
                                                        </div>
                                                    <div>    
                                                </div>
                                            </div>
                                        
                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Alt ( <small>Alt text describes images for people who have trouble seeing them. it will optimize your images.</small> )</label>
                                                            <input id="alt_text" type="text" placeholder="" name="alt" class="form-control ed_alt_text">
                                                        </div>
                                                    </div>             
                                            
                                            
                                
                                    
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" name="update_Now" type="submit" id="update_now_post_category">Update Now</button>
                                        <button class="btn btn-secondary" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- form end -->
              </div>
            </div>
          </div>
        </div>


       

<!-- edit post category modal end -->
</div>







        </div>
    </div>
      <?php include('assets/includes/footer.php'); ?>







   
      <script>




function myFunction() {
                        var input, filter, table, tr, td, cell, i, j;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tableExport");
                        tr = table.getElementsByTagName("tr");
                        for (i = 1; i < tr.length; i++) {
                            // Hide the row initially.
                            tr[i].style.display = "none";

                            td = tr[i].getElementsByTagName("td");
                            for (var j = 0; j < td.length; j++) {
                                cell = tr[i].getElementsByTagName("td")[j];
                                if (cell) {
                                    if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                        break;
                                    }
                                }
                            }
                        }
                    }


$(document).ready(function () {


    $(document).on('click','#openeditmodal',function(){
      
        var imgurl = $(this).closest('tr').find('#catgeoryimg_url_edit').prop('src');
        var category_name = $(this).closest('tr').find('#category_name_edit').text();
        var category_type = $(this).closest('tr').find('#category_type_edit').text();
        var upload_place = $(this).closest('tr').find('#upload_place_edit').text();
        var alt_text = $(this).closest('tr').find('#alt_text_edit').text();
        var status = $(this).closest('tr').find('#getstatus').val();
        var ids = $(this).closest('tr').find('#cat_id').text();
       // alert(imgurl +" "+category_name+" "+category_type+" "+upload_place+" "+alt_text+" "+status);

     $('#editModal').modal('show');
      
        $('.ed_img').attr("src", imgurl);
        $('.ed_photo').val();
        $('.cat_ed_id').val(ids);
        $('.ed_cat').val(category_type);
        $('.ed_place').val(upload_place);
        $('.ed_catname').val(category_name);
        $('.ed_alt_text').val(alt_text);

        maxFileSize = 1 * 1024 * 1024; // 1MB
    $('#category_photo_edit').on('change', function () {
        var category_photo = $('#category_photo_edit').val();
        filesize = this.files[0].size;
        if(filesize > maxFileSize){
            this.setCustomValidity("You can upload photo only under 1MB");
            this.reportValidity();
           // $imageFile.val(''); 
           $('#category_photo_edit').val("");
        }else{
            this.setCustomValidity("");
        }
    });

    });



// edit form data send

$(".update_now_post_category").on('submit', function (e) {

    e.preventDefault();

   var update_photo = $('.ed_photo').val();
   var update_id = $('.cat_ed_id').val();
   var update_cat_id =     $('.ed_cat').val();
   var update_place =     $('.ed_place').val();
   var update_name =     $('.ed_catname').val();
   var update_alttext =     $('.ed_alt_text').val();

   $.ajax({
            type: "POST",
            url: "ajax/update-data/update-new-category-data",
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
                
                if(data == 1){
                    $('#editModal').modal('hide');
                    swal("Update Message", "Your status has been updated.", "success");

                    // function call
                          loadData();
                    // function call end

                  
                }else if(data == 0){
                    swal("error", "Your status could not updated.", "success");

                    loadData();
                    $('#process_msg1').text("someting went wrong").css('color','red');
                }
            }
    });



   

});

// end here








  
    $(document).on('change', '#getstatus', function() {
        var realstatus;

        var category_status_id = $(this).data("statusid");
       // $(this).attr('name');
        var statusvalue = $(this).find(":selected").val() 
       if(statusvalue == 'Active'){
        realstatus = 'Deactive';
       }else if(statusvalue == 'Deactive'){
        realstatus = 'Active';
       }

       $.ajax({
        type: "POST",
        url: "ajax/update-data/update-category-status",
        data: {catid:category_status_id,status:realstatus},
        success: function (response) {
            if(response==1){
                loadData();
                swal("Congrats", "Your status has been updated.", "success");

            }else{
                loadData();
                swal("Opps!", "Status could not updated sorry", "error");
            }
        }
       });


       
});














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

   var update_photo = $('.ed_photo').val();
   var update_id = $('.cat_ed_id').val();
   var update_cat_id =     $('.ed_cat').val();
   var update_place =     $('.ed_place').val();
   var update_name =     $('.ed_catname').val();
   var update_alttext =     $('.ed_alt_text').val();
       alert(update_place);

    // var category_type = $('#category_type').val();
    // var post_place = $('#upload_place').val();
    // var category_photo = $('#category_photo').val();
    // var catgory_title = $('#category_name').val();
    // var photo_alt = $('#alt_text').val();
    

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
            $("#category-list").html(response);
        }
    });
}





// delete
$(document).on("click",".dlt-btn", function () {
    var category_dlt_id = $(this).data("id");
    //alert(category_dlt_id);
    var element = this;
    $.ajax({
        type: "POST",
        url: "ajax/delete-data/delete-category-ajax",
        data: {category_dlt_id:category_dlt_id},
        success: function (response) {
            if(response==1){
                $(element).closest("tr").fadeOut();

                $(".alert-success").html("Category Deleted Successfully!").slideDown();
                $(".alert-danger").html("Category can't Deleted!").slideUp();

                setTimeout(() => {
                    $(".alert-success").slideUp();  
                }, 2000);
            }else{
                $(".alert-success").html("Category Deleted Successfully!").slideUp();
                $(".alert-danger").html("Category can't Deleted!").slideDown();

                setTimeout(() => {
                    $(".alert-danger").slideUp();
                }, 2000);
            }
        }
    });
});

        $("#dlt-selected").on('click', function () {
            var catid = [];
            $(":checkbox:checked").each(function(key){
                catid[key] = $(this).val();
            });
            if(catid.length === 0){
                $(".alert-success").slideUp(); 
                $(".alert-danger").html("Please select at least one category to delete.!").slideDown();
                setTimeout(() => {
                    $(".alert-danger").slideUp();
                }, 4000);
            }else{
                $.ajax({
                    type: "Post",
                    url: "ajax/delete-data/delete-category-ajax-multiple",
                    data: {category_dlt_id:catid},
                    success: function (response) {
                       // console.log(response);
                        if(response==1){
                            $(".alert-success").html("Category Deleted Successfully!").slideDown();
                            $(".alert-danger").html("Category can't Deleted!").slideUp();
                            loadData();
                        }else{
                            $(".alert-success").html("Category Deleted Successfully!").slideUp();
                            $(".alert-danger").html("Category can't Deleted!").slideDown();
                        }
                    }
                });
            }
            //console.log(catid);
        });

        

});



    // $(document).ready(function () {
    //    function tableExport(page){
    //     $.ajax({
    //         url:
    //         type:"POST"
    //     })
    //    }
    // });



    $(document).ready(function () {
        $(document).on('click','#openaddpostsmodal',function(){
      
      var imgurl = $(this).closest('tr').find('#catgeoryimg_url_edit').prop('src');
      var category_name = $(this).closest('tr').find('#category_name_edit').text();
      var category_type = $(this).closest('tr').find('#category_type_edit').text();
      var upload_place = $(this).closest('tr').find('#upload_place_edit').text();
      var alt_text = $(this).closest('tr').find('#alt_text_edit').text();
      var status = $(this).closest('tr').find('#getstatus').val();
      var ids = $(this).closest('tr').find('#cat_id').text();
     // alert(imgurl +" "+category_name+" "+category_type+" "+upload_place+" "+alt_text+" "+status);

   $('#openPostModal').modal('show');
    
      $('.ed_img').attr("src", imgurl);
      $('.ed_photo').val();
      $('.cat_ed_id').val(ids);
      $('.ed_cat').val(category_type);
      $('.ed_place').val(upload_place);
      $('.ed_catname').val(category_name);
      $('.ed_alt_text').val(alt_text);

      maxFileSize = 1 * 1024 * 1024; // 1MB
  $('#category_photo_edit').on('change', function () {
      var category_photo = $('#category_photo_edit').val();
      filesize = this.files[0].size;
      if(filesize > maxFileSize){
          this.setCustomValidity("You can upload photo only under 1MB");
          this.reportValidity();
         // $imageFile.val(''); 
         $('#category_photo_edit').val("");
      }else{
          this.setCustomValidity("");
      }
  });

  });
    });

</script>






      <?php include('assets/includes/footer-script.php'); ?>
     
