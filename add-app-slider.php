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
           
           
 <style>
   


    .swiper {
      width: 100%;
    
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 400px;
    }

    .swiper-slide img {
      display: block;
      width:100%;
      height: 100%;
      object-fit: fill;
    }
    .sliderClassStyle{
        width:60%;
        margin-bottom:10px;
    }
  </style>
<!-- Modal with form end -->
           <section class="section">
           <div class="section-body">
            <div class="row">
        <div class="sliderClassStyle">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                        <?php 
                                    $run =  mysqli_query($con,"SELECT * FROM ".MOBILESLIDERTABLE."");
                                    $count = mysqli_num_rows($run);
                                    if($count>0){
                                        while($getSlides = mysqli_fetch_array($run)){
                                        echo 
                                        '<div class="swiper-slide"><img  src="'.BASE_URL.'assets/Mobile_slider/'.$getSlides['sliderImage'].'" alt=""></div>';
                                        }
                                    }
                                ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>        
              <div class="col-12">
                <div class="card">

                  <div class="card-header">

                    <h4>App Slider Table</h4>
                    <div class="card-header-action">

                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-primary col-12 "><i class="fa fa-plus"></i> Add App Slider</a>
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
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th> <button type="button" id="dlt-selected" class="btn btn-danger" title="Delete Selected Items"><i class="fas fa-trash"></i> </th>
                            <th>Sr.</th>
                            <th>Slider Photo</th>
                            <th>Type Of Image</th>
                            <th>Alt Text</th>
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
                                                <h4>Add New App Slider</h4>
                                            </div>

                                            <div class="card-body">
                                                
                                                <div>
                                                    <label id="process_msg_add" for=""></label>
                                                    <label id="process_msg_added" for=""></label>
                                                    <label id="error_msg_added" for=""></label>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>Slider Photo</label>
                                                            <input id="sliderPhotoAdd" type="file" name="sliderPhotoAdd[]" class="form-control ed_sliderPhotoAdd" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Alt</label>
                                                            <input id="altText" type="text" placeholder="" name="altText" class="form-control ed_altText">
                                                            (<small>Alt text describes images for people who have trouble seeing them. it will optimize your images.</small> )
                                                        </div>
                                                    </div>   
                                                     <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Select the Type</label>
                                                            <select class="form-control form-select" aria-label="Default select example" id="selectOptiones" name='typeOfImage'>
                                                              <option selected disabled>Open this select menu</option>
                                                              <option value="share">Share</option>
                                                              <option value="links">Links</option>
                                                              <option value="mobileNumber">Mobile Number</option>
                                                              <option value="mobileScreen">Mobile Screen</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" name="add_Now" type="submit" id="add_now_post_category">Add Now</button>
                                        <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
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
//===========add silder=======================//
    maxFileSize = 1 * 1024 * 1024; // 1MB
    $('#sliderPhotoAdd').on('change', function () {
        var tempPhotoadd = $('#sliderPhotoAdd').val();
        filesize = this.files[0].size;
        if(filesize > maxFileSize){
            this.setCustomValidity("You can upload photo only under 1MB");
            this.reportValidity();
           // $imageFile.val(''); 
           $('#sliderPhotoAdd').val("");
        }else{
            this.setCustomValidity("");
        }
    });



$("#form_add_slider").on('submit', function (e) {
    e.preventDefault();
    var sliderPhotoAdd = $('#sliderPhotoAdd').val();
    var altText = $('#altText').val();
    if(sliderPhotoAdd==""){
        $('#error_msg_added').text("Please select at least one Template plan.").css('color','red');
    }
    else if(altText==""){
        altText = sliderPhotoAdd;
    }else{
       let runing = submitDataForm(this,"add-app-slider-ajax");
        if(runing===true){
            loadData();
            $('#sliderPhotoAdd').val("");
            $('#altText').val("");
        }
    }

});


function loadData(page){
    $.ajax({
        type: "POST",
        url: "ajax/fetch-data/fetch-app-slider-data",
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
    var onSliderDelt = $(this).closest('tr').find('#sliderIdEdit').text();
    // alert(onSliderDelt);
    var onSliderDeltID = "onSliderDeltID";
    var url = "delete-app-slider";
    var run = deleteDataAjax(url,onSliderDelt,onSliderDeltID);
    if(run==true){
        loadData();
    }
});


//================multipla silder image====================//
$("#dlt-selected").on('click', function () {
    var onSliderId = [];
    var pageUrl = "delete-app-multiple";
    var keyDataName = "onSliderIdKey";
    
    $(":checkbox:checked").each(function(key){
        onSliderId[key] = $(this).val();
    });
    // alert(onSliderId);
    let runs = multiDeleteData(pageUrl,keyDataName,onSliderId);
    if(runs==true){
        loadData();
    }
});        

});


</script>
<script>
  const mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    speed: 300,
   mousewheel: true,
   coverflowEffect: {
    rotate: 30,
    slideShadows: true
  },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })
  
</script>
   <!--Reuseable function file-->
 <script src="reuseAjax/functionsAjax.js"></script>
 
 <?php include('assets/includes/footer-script.php'); ?>



</script>
     
