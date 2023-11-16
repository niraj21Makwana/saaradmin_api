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
                    <h4>Patwari Details Table</h4>
                    <div class="card-header-action">
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-primary col-12 "><i class="fa fa-plus"></i> Add New Patwari</a>
                    </div>
                  </div>
                    
                  <input style="border-radius:4px;border:1px solid silver;outline:none;padding:10px;margin:0px 30px;" class="searchbox" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Slider..." title="Search Catgeory Type">

                 
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
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%; ">
                        <thead>
                          <tr>
                            <th> <button type="button" id="dlt-selected" class="btn btn-danger" title="Delete Selected Items"><i class="fas fa-trash"></i> </th>
                            <th>Sr.</th>
                            <th>Name Of Patwari</th>
                            <th>Date Of Birth</th>
                            <th>Date Of Joining</th>
                            <th>Employee Code</th>
                            <th>Post District</th>
                            <th colspan="8">Delete</th>
                          </tr>
                        </thead>
                        <tbody id="category-list">
                        </tbody>
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
                                                <h4>Add New Patwari Details</h4>
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
                                                            <label>Name Of Patwari</label>
                                                            <input id="NameOfPatwari" type="text" placeholder="Name Of Patwari" name="NameOfPatwari" class="form-control edNameOfPatwari">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Date Of Birth</label>
                                                            <input id="DateOfBirth" type="date" placeholder="Date Of Birth" name="DateOfBirth" class="form-control edDateOfBirth">
                                                        </div>
                                                    </div>   
                                                     <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Date Of Joining</label>
                                                            <input id="DateOfJoining" type="date" placeholder="Date Of Joining" name="DateOfJoining" class="form-control edDateOfJoining">
                                                        </div>
                                                    </div> 
                                                     <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>EmployeeCode</label>
                                                            <input id="EmployeeCode" type="text" placeholder="Employee Code" name="EmployeeCode" class="form-control edEmployeeCode">
                                                        </div>
                                                    </div> 
                                                     <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Post District</label>
                                                            <input id="PostingDistrict" type="text" placeholder="Post District" name="PostingDistrict" class="form-control edPostingDistrict">
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
        </div>


     <!-- end -->

        </div>   
        <!-- edit post category modal -->
        
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

  loadData(); 

$("#form_add_slider").on('submit', function (e) {
    e.preventDefault();
    var fieldIds=['NameOfPatwari','DateOfBirth','DateOfJoining','EmployeeCode','PostingDistrict'];
     var valid = validateForm(fieldIds);
     if (valid==true) {
    submitDataForm(this,"add-patwari-ajax",function(){
        loadData();
    });
    clearFormFields(fieldIds);
}
});


function loadData(page){
    $.ajax({
        type: "POST",
        url: "ajax/fetch-data/fetch-patwariDetails-data",
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
    var onPatwariDelt = $(this).closest('tr').find('#idEdit').text();
    // alert(onSliderDelt);
     var deleteTypeIs = "Single";
    var onPatwariDeltID = "onPatwariDeltID";
    var url = "delete-patwariDetails-data";
    deleteDataAjax(url,onPatwariDelt,onPatwariDeltID,deleteTypeIs,function(){
            loadData();
    });
});


//================multipla silder image====================//
$("#dlt-selected").on('click', function () {
    var onPatwariId = [];
    var pageUrl = "delete-patwariDetails-data";
    var keyDataName = "onPatwariIdKey";
    var deleteTypeIs = "Multiple";
    $(":checkbox:checked").each(function(key){
        onPatwariId[key] = $(this).val();
    });
    // alert(onSliderId);
   multiDeleteData(pageUrl,keyDataName,onPatwariId,deleteTypeIs,function(){
            loadData();
        });
});        

});


</script>
   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>
 
 <?php include('assets/includes/footer-script.php'); ?>



</script>
     
