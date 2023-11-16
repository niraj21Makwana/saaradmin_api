        <style>
        /*CUSTOM CSS CODE FOR CARD*/
                    .totaluser{
                        background: #c9d6ff; /* fallback for old browsers */
                        background: -webkit-linear-gradient(to right, #c9d6ff, #e2e2e2); /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to right, #c9d6ff, #e2e2e2);
                    }
                    .freeusers{
                        background: #83a4d4;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to left, #b6fbff, #83a4d4);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to left, #b6fbff, #83a4d4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        
                    }
                    .goldusers{
                       background: #fceabb;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to bottom, #f8b500, #fceabb);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #f8b500, #fceabb); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 
                    }
                    .platinumusers{
                        background: #757F9A;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to bottom, #D7DDE8, #757F9A);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #D7DDE8, #757F9A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        
                    }
                    .downloadsCard{
                        background: #212656d4;  
                        background: -webkit-linear-gradient(to bottom, #98b2e1, #212656d4);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #98b2e1, #212656d4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                        position:relative;

                    }.activecategories{
                        background: #4e54c8;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to bottom, #8f94fb, #4e54c8);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #8f94fb, #4e54c8); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

                    }
                    .activepost{
                        background: #11998e;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to bottom, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #38ef7d, #11998e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                    }
                    .activetemplates{
                        background: #FFAFBD;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to bottom, #ffc3a0, #FFAFBD);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to bottom, #ffc3a0, #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

                    }
                    .onspot{
                        background: #B24592;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to left, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to left, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                    }
                    .faqs{
                        background: #CCCCB2;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to left, #757519, #CCCCB2);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to left, #757519, #CCCCB2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

                    }
                    .feedbacks{
                        background: #ff6e7f;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to left, #bfe9ff, #ff6e7f);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to left, #bfe9ff, #ff6e7f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                    }
                    .cards-row a{
                     text-decoration:none;   
                    }
                    .circlerImg{
                        width:150px;
                        height:150px;
                        border-radius:50%;
                        /*border:1px dotted #fff;*/
                    }
                    .circlerimgfit{
                        width:150px;
                        height:150px;
                        border-radius:50%;
                        object-fit: cover;
                    }
                    .postpending{
                        background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);
                    }
                    .jobs{
                        background: #3939E5;
                        background: linear-gradient(135deg, #3939E5, #070B51);
                    }
                    
                    
        /*CUSTOM CSS CODE FOR CARD END*/
        </style>       
        
        
        <?php
                $run = mysqli_query($con,"SELECT * FROM `saar_adminAuth` WHERE `id`='1'");
                $getAdmin = mysqli_fetch_array($run);
                
              ?>
               <div class="row">
                <div class="card downloadsCard w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3 my-auto ">
                                              <center>
                                                  <div class="circlerImg">
                                                        <img class="circlerimgfit" src="https://saars.in/adminsaar/assets/img/saarlogo.png" alt="" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';">
                                                        
                                              </div>
                                              </center>
                                              <br>
                                              <center>
                                                  <h3 class="text-center text-white btn btn-dark"><a style="text-decoration:none;color:#fff;" href="edit-profile.php">Edit Profile</a></h3>
                                              </center>
                                        </div>
                                        <div class="col-sm-12 col-md-5 my-auto">
                                            <h3 class="text-white">Welcome <?php echo $getAdmin['firstName']." ".$getAdmin['lastName'] ?></h3>
                                            <!-- <p class="text-white">Contact : +91 9009611093</p> -->
                                            <p class="text-white">Email : <?php echo $getAdmin['email']; ?></p>
                                            <p class="text-white">Bio :<?php echo $getAdmin['bio']; ?></p>
                                            
                                           
                                        </div>
                                        
                                         <div class="col-sm-12 col-md-4 my-auto">
                                              <center>
                                                  <div class="">
                                                        <img style="width:300px;" src="https://digiyugsolution.com/admin/assets/img/placeholders/admin.png" alt="">
                                                        
                                                    </div>
                                              </center>
                                             
                                        </div>
                                         <marquee style="color:silver">For Developers Support: +919009611093 <a href="tel:+919009611093" class="btn btn-suuccess btn-sm">Call Now</a> | info@bugsbon.com <a href="mailto:info@bugsbon.com " class="btn btn-suuccess btn-sm">Mail us</a> | www.bugsbon.com <a href="https://www.bugsbon.com " class="btn btn-suuccess btn-sm">Visit our website</a> | kundansinghpanwar7@gmail.com  <a href="mailto:kundansinghpanwar7@gmail.com " class="btn btn-suuccess btn-sm">Mail us</a></marquee>
                                    </div>
                                </div>
                            </div>                
                </div>
                    
        
       
       <?php
        $totalUser = mysqli_query($con,"SELECT * FROM `saarUsersAuth`");
        $userCount = mysqli_num_rows($totalUser);
        
       ?>
        
        <div class="row cards-row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="total-users">
                  <div class="card totaluser">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-15">Total Users</h5>
                              <h2 class="mb-3 font-18"><?php echo $userCount; ?></h2>
                              <!--<p class="mb-0"><span class="col-green">10%</span> Increase</p>-->
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="assets/img/banner/1.png" alt="">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </a>
            </div>
             <?php
        $totalUser = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userType`='Goverment'");
        $userCount = mysqli_num_rows($totalUser);
        
       ?>
             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="total-govt-users">
                  <div class="card totaluser">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-15">Total Govt Users</h5>
                              <h2 class="mb-3 font-18"><?php echo $userCount; ?></h2>
                              <!--<p class="mb-0"><span class="col-green">10%</span> Increase</p>-->
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="assets/img/banner/1.png" alt="">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </a>
            </div>
            <?php
        $totalUser = mysqli_query($con,"SELECT * FROM `saarUsersAuth` WHERE `userType`='Normal'");
        $userCount = mysqli_num_rows($totalUser);
        
       ?>
             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="total-normal-users">
                  <div class="card totaluser">
                    <div class="card-statistic-4">
                      <div class="align-items-center justify-content-between">
                        <div class="row ">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                            <div class="card-content">
                              <h5 class="font-15">Total Normal Users</h5>
                              <h2 class="mb-3 font-18"><?php echo $userCount; ?></h2>
                              <!--<p class="mb-0"><span class="col-green">10%</span> Increase</p>-->
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <img src="assets/img/banner/1.png" alt="">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                            <div class="banner-img">
                              <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 </a>
            </div>
       <?php
        $totalFreeUser = mysqli_query($con,"SELECT * FROM `saarPdfsData`");
        $freeUserCount = mysqli_num_rows($totalFreeUser);
        
       ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <a href="Users-pdf"> 
              <div class="card freeusers">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Total PDF</h5>
                          <h2 class="mb-3 font-18 text-white""><?php echo $freeUserCount;?></h2>
                          <!--<p class="mb-0"><span class="col-orange">09%</span> Decrease</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
        <?php
            $totalGoldUser = mysqli_query($con,"SELECT * FROM `saarPatwari`");
            $goldUserCount = mysqli_num_rows($totalGoldUser);
       ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!--<a href="bloodDonor-member-pending">-->
              <div class="card goldusers">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Total Patwari</h5>
                          <h2 class="mb-3 font-18 text-white"><?php echo $goldUserCount; ?></h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--</a>-->
            </div>
        <?php
            $totalplatinumUser = mysqli_query($con,"SELECT * FROM `saar_diversion_aavedan` WHERE `status`='Approved'");
            $platinumUserCount = mysqli_num_rows($totalplatinumUser);
       ?>   
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="diversionAvedan-approved">
              <div class="card platinumusers">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Diversion Aavedan Approved</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $platinumUserCount; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
            <!----------------------------------->
             <?php
                $totalActiveCategories = mysqli_query($con,"SELECT * FROM `saar_diversion_aavedan` WHERE `status`='Pending'");
                $CountActiveCategories = mysqli_num_rows($totalActiveCategories);
               ?> 
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="diversionAvedan-pending">
              <div class="card activecategories">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Diversion Aavedan Pending</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountActiveCategories; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
              <?php
                $totalActivePosts = mysqli_query($con,"SELECT * FROM `saar_fasalMP` WHERE `status`='Pending'");
                $CountActivePosts = mysqli_num_rows($totalActivePosts);
               ?> 
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="fasalMuvajaP-pending">
              <div class="card activepost">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Pending FasalMp Form</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountActivePosts; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
            <?php
                $totalActiveTemplates = mysqli_query($con,"SELECT * FROM `saar_fasalMP` WHERE `status`='Approved'");
                $CountActiveTemplates = mysqli_num_rows($totalActiveTemplates);
               ?> 
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="fasalMuvajaP-approved">
              <div class="card activetemplates">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Approved FasalMp Form</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountActiveTemplates; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
            <?php
                $totalOnSpot = mysqli_query($con,"SELECT * FROM `saar_appliedForm`");
                $CountOnSpot = mysqli_num_rows($totalOnSpot);
               ?> 
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card onspot">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Total Applied Form</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountOnSpot; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
                $totalOnSpot = mysqli_query($con,"SELECT * FROM `saar_atikraman`");
                $CountOnSpot = mysqli_num_rows($totalOnSpot);
               ?> 
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="atikraman-data">
              <div class="card onspot">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Atikraman Forms</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountOnSpot; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <?php
                $totalFAQ = mysqli_query($con,"SELECT * FROM `saar_batankan`");
                $CountFAQ = mysqli_num_rows($totalFAQ);
             ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="batankan-data">
              <div class="card faqs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Batankan Form</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFAQ; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                           <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
             <?php
                $totalFAQ = mysqli_query($con,"SELECT * FROM `saar_batwara`");
                $CountFAQ = mysqli_num_rows($totalFAQ);
             ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="batwara-data">
              <div class="card faqs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Batwara Form</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFAQ; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                           <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <!--pending users post-->
            <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_diversion_maang` ");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="diversionMangpatra-data">
              <div class="card postpending">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Diversion Maang</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
            <!--approved users post-->
            <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_kabjaVsimankan`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="kabjaVsimankan-data">
              <div class="card postpending">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Kabja V Simankan</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
           <!--jobs register-->
           <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_kalamBara`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="kalamBara-data">
              <div class="card jobs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Column 12</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
           <!--jobs application register-->
           <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_mritak_namantran`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="mrtatakNamantran-data">
              <div class="card jobs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Mritak Namantran</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
           
            <?php
                $totalOnSpot = mysqli_query($con,"SELECT * FROM `saar_nabalikSeBalik`");
                $CountOnSpot = mysqli_num_rows($totalOnSpot);
               ?> 
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="nabalikSeBalik-data">
              <div class="card onspot">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">NaBalik Se Balik</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountOnSpot; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <?php
                $totalFAQ = mysqli_query($con,"SELECT * FROM `saar_panchnamaRBC`");
                $CountFAQ = mysqli_num_rows($totalFAQ);
             ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="panchNamaRbc-data">
              <div class="card faqs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Panchnama RBC</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFAQ; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                           <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
             <?php
                $totalFAQ = mysqli_query($con,"SELECT * FROM `saar_PMSamanNidhi`");
                $CountFAQ = mysqli_num_rows($totalFAQ);
             ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="pmKisanRevoke-data">
              <div class="card faqs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">PM Saman Nidhi</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFAQ; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                           <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <!--pending users post-->
            <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_prman_patra` ");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="pramanPatra-data">
              <div class="card postpending">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Praman Patra</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
            <!--approved users post-->
            <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_registry`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="registeryLekh-data">
              <div class="card postpending">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Registry Lakh</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
           <!--jobs register-->
           <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_reg_vinamay`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="registeryVinimay-data">
              <div class="card jobs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Registry Vinimay</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
           <!--jobs application register-->
           <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_simankan`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="simankan-data">
              <div class="card jobs">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Simankan</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
           <!--end-->
            <?php
                $tdate = date("Y-m-d");
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_feedback` WHERE `date`='$tdate'");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="see-feedback">
              <div class="card feedbacks">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Todays Feedbacks</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <?php
                $totalFeedbacks = mysqli_query($con,"SELECT * FROM `saar_feedback`");
                $CountFeedbacks = mysqli_num_rows($totalFeedbacks);
               ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="see-feedback">
              <div class="card feedbacks">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15 text-white">Total Feedbacks</h5>
                          <h2 class="mb-3 font-18  text-white"><?php echo $CountFeedbacks; ?></h2>
                          <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <span style="font-size:20px" class="ml-3 fas fa-arrow-right text-white"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
            
            
           
</div>