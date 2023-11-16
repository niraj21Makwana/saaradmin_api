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
   $mob_dire = mysqli_query($con,"SELECT * FROM `saarPdfsData`");
   $total_con = mysqli_num_rows($mob_dire);
   if($total_con>0 || $total_con==0){
        ?>
                    <h4>User Pdf List (total Approved <span class="notify-badge"><?php echo $total_con; ?></span>)</h4>
          
        <?php
   }
   ?>
                    <div class="card-header-action">
                        
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
                            <th>Contact us-<small>User Name</small></th>
                            <th>Contact us-<small>Mobile Number</small></th>
                            <th>PDF Name</th>
                            <th>PDF Payment</th>
                            <th>PDF Download</th>
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
        url: "ajax/fetch-data/fetch-pdfs-data",
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
    var onPdfDataIdDel = $(this).closest('tr').find('#pdfDataIdEdit').text();
    // alert(onSliderDelt);
    var deleteTypeIs = "Single";
    var onPdfDataIdDeltID = "onPdfDataIdDeltID";
    var url = "delete-pdf-data";
    deleteDataAjax(url,onPdfDataIdDel,onPdfDataIdDeltID,deleteTypeIs,function(){
            loadData();
    });
});


//================multiple Delete====================//
$("#dlt-selected").on('click', function () {
    var onPdfDataId = [];
    var pageUrl = "delete-pdf-data";
    var keyDataName = "onPdfDataIdKey";
    var deleteTypeIs = "Multiple";
    $(":checkbox:checked").each(function(key){
        onPdfDataId[key] = $(this).val();
    });
    // alert(onSliderId);
    multiDeleteData(pageUrl,keyDataName,onPdfDataId,deleteTypeIs,function(){
            loadData();
        });
});               
// ========================end multi========================
    
    
    
    
});

</script>



   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>


      <?php include('assets/includes/footer-script.php'); ?>
     
