<?php
  include('assets/includes/header.php');
?>
<script src="assets/CK/ckeditor.js"></script>
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
        <!-- Modal with form end -->
           <section class="section">
           <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <h4>FAQ Table</h4>
                    <div class="card-header-action">
                        <a class="btn btn-icon icon-left btn-danger col-12" style="color:white;" id="alldataDelete"><i class="fas fa-trash"></i>Delete All Data</a>
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-primary col-12 "><i class="fa fa-plus"></i> Add New FAQ</a>
                    </div>
                  </div>
                    
                  <input style="border-radius:4px;border:1px solid silver;outline:none;padding:10px;margin:0px 30px;" class="searchbox" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Slider..." title="Search FAQ...">

                 
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
                            <th> <button type="button" id="dlt-selected" class="btn btn-danger" title="Delete Selected Items"><i class="fas fa-trash"></i> </th>
                            <th>Sr.</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Date</th>
                            <th colspan="8">Edit/Delete</th>
                           
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



<!-- ============================================ -->

      <!-- add category category modal -->
      <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true" >
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
                    <form id="form_add_slider"  enctype="multipart/form-data">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                            <div class="card-header">
                                                <h4>Add New FAQ</h4>
                                            </div>
                                            <div class="card-body">
                                                
                                                <div>
                                                    <label id="process_msg_add" for=""></label>
                                                    <label id="process_msg_added" for=""></label>
                                                    <label id="error_msg_added" for=""></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <div class="form-group">
                                                            <label>Question</label>
                                                            <input id="faqQuestion" name="faqQuestion" type="text" class="form-control ed_faqQuestion" placeholder="Write a Question ?">
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Answer</label>
                                                            <textarea id="faqAnswer" type="text" placeholder="Write a Answer." name="faqAnswer" class="form-control ed_faqAnswer"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" name="add_Now" type="submit" id="add_now_post_category">Add Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- form end -->
              </div>
            </div>
          </div>
<!--=================================-->
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
                    <form id="form_edit_post_category"  class="update_now_post_category" enctype="multipart/form-data">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                            <div class="card-header">
                                                <h4>Edit FAQ</h4>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <label id="process_msg1" for=""></label>
                                                    <label id="process_msg" for=""></label>
                                                    <label id="error_msg" for=""></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 ">
                                                    <input type="hidden" name="faqId" class="faqId" >
                                                        <div class="form-group">
                                                            <label>Question</label>
                                                            <input id="faqQuestion" name="faqQuestion" type="text" class="form-control edfaqQuestion" placeholder="Write a Question ?">
                                                        </div>
                                                    </div> 
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Answer</label>
                                                            <textarea id="faqAnswer01" type="text" placeholder="Write a Answer." name="faqAnswer" class="form-control edfaqAnswer"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" name="update_Now" type="submit" id="update_now_post_category">Update Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
          </div>
        </div>
<!-- edit post category modal end -->
</div> 
<!--====================================-->
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
      
        var faqQuestion = $(this).closest('tr').find('#faqQuestionEdit').text();
        var faqAnswer = $(this).closest('tr').find('#faqAnswerEdit').text();
        var ids = $(this).closest('tr').find('#faqIdEdit').text();
        
        // alert(occupation +" "+ gotra);

     $('#editModal').modal('show');
        $('.faqId').val(ids);
        $('.edfaqQuestion').val(faqQuestion);

        CKEDITOR.instances.faqAnswer01.setData(faqAnswer);
    });


// edit form data send
$(".update_now_post_category").on('submit', function (e) {
    e.preventDefault();
     var faqAnswer = CKEDITOR.instances.faqAnswer01.getData();
    var formData = new FormData(this);
    formData.append('faqAnswer', faqAnswer);
    var fileUrl = 'update-faq-data';
    updateFormData(formData,fileUrl, function () {
        loadData();
    });
});
// end here

    
    

  loadData(); 

$("#form_add_slider").on('submit', function (e) {
    e.preventDefault();
    var fieldIds=['faqQuestion','faqAnswer'];
    var valid = validateForm(fieldIds);
    // var faqAnswer = CKEDITOR.instances.faqAnswer.getData();
    if (valid==true) {
    // var faqAnswer = CKEDITOR.instances.faqAnswer.getData();
        // var formData = new FormData(this);
        // formData.append('faqAnswer', faqAnswer);
       let runing = submitDataForm(this,"add-FAQ-ajax");
        if(runing===true){
            // CKEDITOR.instances.faqAnswer.setData("");
               clearFormFields(fieldIds);
            loadData();
        }
     }

});


function loadData(page){
    $.ajax({
        type: "POST",
        url: "ajax/fetch-data/fetch-FAQ-data",
        data:{page_no:page},
        success: function (response) {
            $("#category-list").html(response);
        }
    });
}

$(document).on("click","#pagination a", function(e){
            e.preventDefault();
            var page_id = $(this).attr("id");            
            loadData(page_id);
        });



//=====================delete===================//
$(document).on("click",".dlt-btn", function () {
    var onfaqIdDel = $(this).closest('tr').find('#faqIdEdit').text();
    // alert(onSliderDelt);
    var deleteTypeIs = "Single";
    var onfaqIdDeltID = "onfaqIdDeltID";
    var url = "delete-faq-data";
    deleteDataAjax(url,onfaqIdDel,onfaqIdDeltID,deleteTypeIs,function(){
            loadData();
    });
});


//================multiple silder image====================//
$("#dlt-selected").on('click', function () {
    var onfaqId = [];
    var pageUrl = "delete-faq-data";
    var keyDataName = "onfaqIdKey";
    var deleteTypeIs = "Multiple";
    $(":checkbox:checked").each(function(key){
        onfaqId[key] = $(this).val();
    });
    // alert(onSliderId);
    multiDeleteData(pageUrl,keyDataName,onfaqId,deleteTypeIs,function(){
            loadData();
        });
});               

//===================All Data Deleted========================//
$(document).on("click","#alldataDelete", function () {
  swal({
   title: "Are you sure?",
   text: "Once deleted, you will not be able to recover all this notification!",
   icon: "warning",
    buttons: true,
    dangerMode: true,
  })
.then((willDelete) => {
  if(willDelete){ 
    $.ajax({
        type: "POST",
        url: "ajax/delete-data/delete-faq-data",
      success: function (response) {
      if(response==1){
        swal("Success! Your Data has been deleted!", {
        icon: "success",
        });
        loadData();
      }else{
        swal("Warning! Your Data has been not deleted!", {
        icon: "Warning",
        });
        loadData();
      }
    }
    });
} else {
    swal("Your data is safe!");
  }
});
}); 
// ==========================End================//      

});


</script>
<script>
  CKEDITOR.replace('faqAnswer');
  CKEDITOR.replace('faqAnswer01');
</script>
   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>
 
 <?php include('assets/includes/footer-script.php'); ?>



</script>
     
