 <?php
  include('assets/includes/header.php');
  $error ="";
  $success = "";
  if(isset($_POST['submit'])){

    $firstName = trim(ucfirst($_POST['firstname']));
    $lastName = trim(ucfirst($_POST['lastname']));
    $emailId = trim(strtolower($_POST['emailId']));
    $password = trim($_POST['password']);
    $bioData = trim(ucwords(strtolower($_POST['bioData'])));



    if($firstName!='' && $lastName!='' && $emailId!='' && $password!='' &&  $bioData){
      $run = mysqli_query($con,"UPDATE `saar_adminAuth` SET `firstName`='$firstName',`lastName`='$lastName',`bio`='$bioData',`email`='$emailId',`password`='$password' WHERE `id`='1'");
      if($run){
        $success = "Your Profile has been updated";
      }else{
        $error = "Profile Could not be updated.";
      }
    }else{
       $error = "Please fill the details";
    }
      
 }
 ?>
 


?> <div id="app">
    <div class="main-wrapper main-wrapper-1">
       <!-- navabar here -->
       <?php include('assets/includes/navbar.php'); ?>
      <!-- navbar here -->
      <!-- sidebar start -->
      <?php include('assets/includes/sidebar.php'); ?>
      <!-- Main Content -->
      <?php
                $run = mysqli_query($con,"SELECT * FROM `saar_adminAuth` WHERE `id`='1'");
                $getAdmin = mysqli_fetch_array($run);
                
              ?>

      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="https://saars.in/adminsaar/assets/img/saarlogo.png" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $getAdmin['firstName']." ".$getAdmin['lastName'] ?></a>
                      </div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                        <?php echo $getAdmin['bio'];?>
                        </p>
                      </div>
                      <!--<div class="mb-2 mt-3">-->
                      <!--  <div class="text-small font-weight-bold">Follow Hasan On</div>-->
                      <!--</div>-->
                      <!--<a href="#" class="btn btn-social-icon mr-1 btn-facebook">-->
                      <!--  <i class="fab fa-facebook-f"></i>-->
                      <!--</a>-->
                      <!--<a href="#" class="btn btn-social-icon mr-1 btn-twitter">-->
                      <!--  <i class="fab fa-twitter"></i>-->
                      <!--</a>-->
                      <!--<a href="#" class="btn btn-social-icon mr-1 btn-github">-->
                      <!--  <i class="fab fa-github"></i>-->
                      <!--</a>-->
                      <!--<a href="#" class="btn btn-social-icon mr-1 btn-instagram">-->
                      <!--  <i class="fab fa-instagram"></i>-->
                      <!--</a>-->
                      <!--<div class="w-100 d-sm-none"></div>-->
                    </div>
                  </div>
                </div>
              </div>

             
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="true">Porfile</a>
                      </li>
                      
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                     
                      <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                      <!-- form -->
                      <form method="post" class="needs-validation update_profile" id="form-edit-profile" >
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div>
                             <?php
                             if($success){
                              ?>
                                  <div class="alert alert-success">
                                    <p><?php echo $success; ?></p>
                                  </div>
                                  <script>
                                    setTimeout(() => {
                                      $('.alert').hide();
                                    }, 3000);
                                  </script>
                              <?php
                             }else if($error){
                              ?>
                                <div class="alert alert-danger">
                                  <p><?php echo $error; ?></p>
                                </div>
                                <script>
                                    setTimeout(() => {
                                      $('.alert').hide();
                                    }, 3000);
                                  </script>
                          <?php
                             }
                             ?>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="firstName" value="<?php echo $getAdmin['firstName']; ?>" name="firstname">
                                <div class="invalid-feedback">
                                  Please fill in the first name
                                </div>
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lastName" value="<?php echo $getAdmin['lastName']; ?>" name="lastname">
                                <div class="invalid-feedback">
                                  Please fill in the last name
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" id="emailId" value="<?php echo $getAdmin['email']; ?>" name="emailId">
                                <div class="invalid-feedback">
                                  Please fill in the email
                                </div>
                              </div>
                              <div class="form-group col-md-5 col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" value="<?php echo $getAdmin['password']; ?>" name="password">
                                <input type="checkbox" onclick="myFunction()"> <small>Show Password</small>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea class="form-control summernote-simple" id="bioData"  name="bioData"><?php echo $getAdmin['bio']; ?></textarea>
                              </div>
                            </div>
                           
                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary" id="submit" name="submit" type="submit">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      
  <script>
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
<?php include('assets/includes/footer.php'); ?>

 <?php include('assets/includes/footer-script.php'); ?>
