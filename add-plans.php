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
        <!-- Modal with form end -->
           <section class="section">
           <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <h4>Plans Table</h4>
                    <div class="card-header-action">
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-primary col-12 "><i class="fa fa-plus"></i> Add New plans</a>
                    </div>
                  </div>
                    
                  <input style="border-radius:4px;border:1px solid silver;outline:none;padding:10px;margin:0px 30px;" class="searchbox" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Plans..." title="Search Plans...">

                 
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
                            <th>Plan Name</th>
                            <th>Plan Price</th>
                            <th>No. of Form</th>
                            <th>Status<small>Active/Deactive</small></th>
                            <th>Date</th>
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
                                                <h4>Add New Plan</h4>
                                            </div>

                                            <div class="card-body">
                                                
                                                <div>
                                                    <label id="process_msg_add" for=""></label>
                                                    <label id="process_msg_added" for=""></label>
                                                    <label id="error_msg_added" for=""></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Plan Name</label>
                                                            <input id="planName" type="text" placeholder="Enter Plan Name" name="planName" class="form-control ed_planName">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Plan Price</label>
                                                            <input id="planPrice" name="planPrice" class="form-control ed_planPrice" placeholder="Enter Plan Price">
                                                        </div>
                                                    </div> 
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Number of Forms</label>
                                                            <input id="planNoOfForm" name="planNoOfForm" class="form-control planNoOfForm" placeholder="Enter Number of Form">
                                                            <small>(In this Field You can add Numbers of forms User can Fill In this Price Point)<small>
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
          
          <!---================================->
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
                                                <h4>Edit Plan</h4>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <label id="process_msg1" for=""></label>
                                                    <label id="process_msg" for=""></label>
                                                    <label id="error_msg" for=""></label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="hidden" name="planId" class="planId" >
                                                        <div class="form-group">
                                                            <label>Plan Name</label>
                                                            <input id="planName" type="text" placeholder="Enter Plan Name" name="planName" class="form-control edplanName">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Plan Price</label>
                                                            <input id="planPrice" name="planPrice" class="form-control edplanPrice" placeholder="Enter Plan Price">
                                                        </div>
                                                    </div> 
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Number of Forms</label>
                                                            <input id="planNoOfForm" name="planNoOfForm" class="form-control edplanNoOfForm" placeholder="Enter Number of Form">
                                                            <small>(In this Field You can add Numbers of forms User can Fill In this Price Point)<small>
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


     <!-- end -->
        </div>
        </div>   
        <!-- edit post category modal -->
        
        </div>
<!-- edit post category modal end -->

      <?php include('assets/includes/footer.php'); ?>
  
<!--</script>-->

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
        
        var planName = $(this).closest('tr').find('#planNameEdit').text();
        var planPrice = $(this).closest('tr').find('#planPriceEdit').text();
        var planNoOfForm = $(this).closest('tr').find('#planNoOfFormEdit').text();
        var ids = $(this).closest('tr').find('#planIdEdit').text();

        $('#editModal').modal('show');
        
        $('.edplanName').val(planName);
        $('.edplanPrice').val(planPrice);
        $('.edplanNoOfForm').val(planNoOfForm);
        $('.planId').val(ids);

    });
         

// // edit form data send
$(".update_now_post_category").on('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var fileUrl = 'update-plan-data';
    updateFormData(formData,fileUrl, function () {
        loadData();
    });
});
// // end here

  loadData(); 
//  ========================status========================
    $(document).on('change', '#getstatus', function() {
        var realstatus;
        var pendingPersonId = $(this).data("statusid");
       // $(this).attr('name');
        var statusvalue = $(this).find(":selected").val() 
       if(statusvalue == 'Deactive'){
        realstatus = 'Active';
       }else if(statusvalue == 'Active'){
        realstatus = 'Deactive';
       }

       $.ajax({
        type: "POST",
        url: "ajax/update-data/update-plan-status.php",
        data: {planId:pendingPersonId,status:realstatus},
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
//   =================end status===============//
  
  
  
  
  
  
  
//===========add silder=======================//

$("#form_add_slider").on('submit', function (e) {
    e.preventDefault();
    var fieldIds=['planPrice','planName','planNoOfForm'];
    var valid = validateForm(fieldIds);
    
    if (valid==true) {
    submitDataForm(this,"add-plan-ajax",function(){
            loadData();
        });
        clearFormFields(fieldIds);
     }
});

function loadData(page){
    $.ajax({
        type: "POST",
        url: "ajax/fetch-data/fetch-plan-data",
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
    var onPlanIdDel = $(this).closest('tr').find('#planIdEdit').text();
    // alert(onSliderDelt);
    var deleteTypeIs = "Single";
    var onPlanIdDeltID = "onPlanIdDeltID";
    var url = "delete-plan-data";
    deleteDataAjax(url,onPlanIdDel,onPlanIdDeltID,deleteTypeIs,function(){
            loadData();
    });
});


//================multiple Delete====================//
$("#dlt-selected").on('click', function () {
    var onPlanId = [];
    var pageUrl = "delete-plan-data";
    var keyDataName = "onPlanIdKey";
    var deleteTypeIs = "Multiple";
    $(":checkbox:checked").each(function(key){
        onPlanId[key] = $(this).val();
    });
    // alert(onSliderId);
    multiDeleteData(pageUrl,keyDataName,onPlanId,deleteTypeIs,function(){
            loadData();
        });
});      

});


</script>
   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>
 
 <?php include('assets/includes/footer-script.php'); ?>

</script>
