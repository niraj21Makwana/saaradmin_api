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
   $mob_dire = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userType`='Goverment'");
   $total_con = mysqli_num_rows($mob_dire);
   if($total_con>0 || $total_con==0){
       $row = mysqli_fetch_array($mob_dire);
        ?>
                    <h4>App Users Details (total Users <span class="notify-badge"><?php echo $total_con; ?></span>)</h4>
          
        <?php
   }
   ?>
                    <div class="card-header-action">
                        <a href="ajax/export/export-Users.php" class="btn btn-icon icon-left btn-primary col-12"><i class="fas fa-download"></i>Download xls File</a>
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
                            <th>Sr.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>User Type</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Call</th>
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
                                                <h4>Edit User Coins</h4>
                                            </div>
                                    
                                            <div class="card-body">
                                                <div>
                                                    <label id="process_msg1" for=""></label>
                                                    <label id="process_msg" for=""></label>
                                                    <label id="error_msg" for=""></label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-12 mb-4">
                                                    <input type="hidden" name="userId" class="userId" >
                                                        <label for="">
                                                            <img class="edImg" width="80" height="80" src="" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" alt="">
                                                        </label>
                                                    </div>
                                                     <div class="col-12 col-md-12 mb-4">
                                                        <!--<h1>Total Coin <span style="color:red;"><span></h1>-->
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Cut Coins</label>
                                                             <input id="cutCoins" type="text" name="cutCoins" class="form-control edcutCoins">
                                                        </div>
                                                    </div>
                                                     <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Reword Description</label>
                                                             <textarea id="userRewordDes" type="text" name="userRewordDes" class="form-control eduserRewordDes"></textarea>
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

// end here
    $(document).on('change', '#getstatus', function() {
        var realstatus;
        var usersPostId = $(this).data("statusid");
       // $(this).attr('name');
        var statusvalue = $(this).find(":selected").val() 
       if(statusvalue == 'Pending'){
        realstatus = 'Approved';
       }else if(statusvalue == 'Approved'){
        realstatus = 'Pending';
       }

       $.ajax({
        type: "POST",
        url: "ajax/update-data/update-userpost-status",
        data: {userPostId:usersPostId,status:realstatus},
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
function loadData(){
    var usertypes ="Goverment";
    $.ajax({
        type: "POST",
        data:{usertype:usertypes},
        url: "ajax/fetch-data/fetch-total-users",
        success: function (response) {
            $("#category-list").html(response);
        }
    });
}

//=====================delete===================//
$(document).on("click",".dlt-btn", function () {
    var onUserIdDel = $(this).closest('tr').find('#userIdEdit').text();
    // alert(onSliderDelt);
    var deleteTypeIs = "Single";
    var onUserIdDeltID = "onUserIdDeltID";
    var url = "delete-user-data";
    deleteDataAjax(url,onUserIdDel,onUserIdDeltID,deleteTypeIs,function(){
            loadData();
    });
});


//================multiple silder image====================//
$("#dlt-selected").on('click', function () {
    var onUserDelId = [];
    var pageUrl = "delete-user-data";
    var keyDataName = "onUserIdKey";
    var deleteTypeIs = "Multiple";
    $(":checkbox:checked").each(function(key){
        onUserDelId[key] = $(this).val();
    });
    // alert(onSliderId);
    multiDeleteData(pageUrl,keyDataName,onUserDelId,deleteTypeIs,function(){
            loadData();
        });
});               

        
});

</script>


   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>


      <?php include('assets/includes/footer-script.php'); ?>
     
