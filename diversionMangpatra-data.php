<?php
  include('assets/includes/header.php');
?>
<style>
    tr{
        background-color: #FFEFC6;
        cursor: pointer;
    }
</style>
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
 <?php
   $mob_dire = mysqli_query($con,"SELECT * FROM `saar_diversion_maang`");
   $total_con = mysqli_num_rows($mob_dire);
   if($total_con>0 || $total_con==0){
        ?>
                    <h4> डायवर्सन– मांगपत्र  List (Total Data <?php echo $total_con; ?>)</h4>
          
        <?php
   }
   ?>
                    <div class="card-header-action">
                        <a href="ajax/export/export-diversionMandPatra-data.php" class="btn btn-icon icon-left btn-primary col-12"><i class="fas fa-download"></i>Download xls File</a>
                    <!--<a class="btn btn-icon icon-left btn-danger col-12" style="color:white;" id="alldataDelete"><i class="fas fa-trash"></i>Delete All Data</a>-->
                    </div>
                  </div>
                    
                  <input style="border-radius:4px;border:1px solid silver;outline:none;padding:10px;margin:0px 30px;" class="searchbox" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Member ...." title="Search Catgeory Type">

                 
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
                            <th>Contact us-<small>User Name/Mobile Number</small></th>
                            <th>क्र</th>
                             <th>प्र न</th>
                            <th>आवेदक का नाम </th>
                            <th>आवेदक का पता</th>
                            <th>भूमि स्‍थान का पता</th>
                            <th>भूमि सर्वे नम्‍बर</th>
                            <th>रकबा</th>
                            <th>तहसील</th>
                            <th>जिला</th>
                             <th>न्यायालय </th>
                            <th>राशि</th>
                            <th>Date</th>
                            <th colspan="8">Delete</th>
                           
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
<!-- ============================================ -->
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
                                                <h4>Edit Blood Donor Member From</h4>
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
                                                            <img class="edImg" width="80" height="80" src="" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" alt="">
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                    <input type="hidden" name="bloodDonerId" class="bloodDonerId" >
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input id="donerImage" type="file" name="donerImage" class="form-control eddonerImage" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Prefix</label>
                                                            <select name="donerPrifiex" id="donerPrifiex" class="form-control eddonerPrifiex" >
                                                                <option value="Mr" >Mr</option>
                                                                <option value="Mrs" >Mrs</option>
                                                                <option value="Ms" >Ms</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input id="donerName" type="text" name="donerName" class="form-control eddonerName" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Date of Birth</label>
                                                            <input id="donerDateOfBrith" type="text"  name="donerDateOfBrith" class="form-control eddonerDateOfBrith">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input id="donerAge" type="text" name="donerAge" class="form-control eddonerAge" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Mobile Number</label>
                                                            <input id="donerMobileNumber" type="text" name="donerMobileNumber" class="form-control eddonerMobileNumber" >
                                                        </div>
                                                    </div>
                                                     <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Whatsapp Number</label>
                                                            <input id="donerWhatsappNumber" type="text" name="donerWhatsappNumber" class="form-control eddonerWhatsappNumber" >
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Doner Blood Group</label>
                                                            <select name="donerBloodGroup" id="donerBloodGroup" class="form-control eddonerBloodGroup" >
                                                                <option value="A+" >A+</option>
                                                                <option value="A-" >A-</option>
                                                                <option value="B+" >B+</option>
                                                                <option value="B-" >B-</option>
                                                                <option value="O+" >O+</option>
                                                                <option value="O-" >O-</option>
                                                                <option value="AB+" >AB+</option>
                                                                <option value="AB-" >AB-</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Locality</label>
                                                             <input id="donerLocality" type="text" name="donerLocality" class="form-control eddonerLocality" >
                                                        </div>
                                                    </div>
                                                     <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Diabetes</label>
                                                               <select name="donerDiabetes" id="donerDiabetes" class="form-control eddonerDiabetes" >
                                                                   <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Blood pressure</label>
                                                              <select name="donerBloodPressure" id="donerBloodPressure" class="form-control eddonerBloodPressures" >
                                                                   <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Any Other Health Issues</label>
                                                              <select name="donerAnyOtherHealthIssues" id="donerAnyOtherHealthIssues" class="form-control eddonerAnyOtherHealthIssues" >
                                                                   <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Health Issue Description</label>
                                                             <input id="donerOtherIssueDes" type="text" name="donerOtherIssueDes" class="form-control eddonerOtherIssueDes" >
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                 
                                    
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" name="update_Now" type="submit" id="update_now_post_category">Update Now</button>
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
  
    $(document).on('change', '#getstatus', function() {
        var realstatus;
        var pendingPersonId = $(this).data("statusid");
       // $(this).attr('name');
        var statusvalue = $(this).find(":selected").val() 
       if(statusvalue == 'Pending'){
        realstatus = 'Approved';
       }else if(statusvalue == 'Approved'){
        realstatus = 'Pending';
       }

       $.ajax({
        type: "POST",
        url: "ajax/update-data/update-diversionAavedan-status.php",
        data: {diversionId:pendingPersonId,status:realstatus},
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

loadData();
function loadData(page){
    $.ajax({
        type: "POST",
        data:{page_no:page},
        url: "ajax/fetch-data/fetch-diversionMangpatra-data",
        
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
    var onDiversionIdDel = $(this).closest('tr').find('#diversionIdEdit').text();
    // alert(onSliderDelt);
    var deleteTypeIs = "Single";
    var onDiversionIdDeltID = "onDiversionIdDeltID";
    var url = "delete-diversionMangpatra-data";
    deleteDataAjax(url,onDiversionIdDel,onDiversionIdDeltID,deleteTypeIs,function(){
            loadData();
    });
});


//================multiple Delete====================//
$("#dlt-selected").on('click', function () {
    var onDiversionId  = [];
    var pageUrl = "delete-diversionMangpatra-data";
    var keyDataName = "onDiversionIdKey";
    var deleteTypeIs = "Multiple";
    $(":checkbox:checked").each(function(key){
        onDiversionId[key] = $(this).val();
    });
    // alert(onSliderId);
    multiDeleteData(pageUrl,keyDataName,onDiversionId,deleteTypeIs,function(){
            loadData();
        });
});               

    
    
    
    
});

</script>



   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>


      <?php include('assets/includes/footer-script.php'); ?>
     
