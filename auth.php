<?php
 include('assets/includes/header.php');

 if(isset($_SESSION['admin_email'])){
    header('Location:index');
 }else{
  $wrongdata = "Please fill correct information";
 }


 $emailerro = "";
 $passworderror = "";
 $wrongdata = "";
 if(isset($_POST['login'])){

    $email  =  htmlspecialchars(strtolower(trim($_POST['email'])));
    $password  =  htmlspecialchars(trim($_POST['password']));

    if($email==""){
         $emailerro = "Please fill in your email";
    }else if($password==""){
         $passworderror=="Please fill in your password";
    }else if($email!="" && $password!=""){
        $sql_login = mysqli_query($con,"SELECT * FROM ".UserAuthTable." WHERE `email`='$email' AND `password`='$password'");
        $count = mysqli_num_rows($sql_login);
        if($count==1){
            $lastlogindate = date("Y-m-d");
            mysqli_query($con,"UPDATE ".UserAuthTable." SET `last_login`='$lastlogindate' WHERE `email`='$email'");
            $_SESSION['admin_email'] = $email;
            header('Location:index');
        }else{
             $wrongdata = "Please fill correct information";
        }
    }


 }

?>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Saar Login</h4>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email"  required autofocus>
                    <span id="emerr"></span>
                    <?php 
                         if($emailerro){
                            ?>
                                
                                <div class="text-danger p-1">
                                    <?php echo $emailerro; ?>
                                </div>
                            <?php
                         }   

                    ?>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <!--<a href="auth-forgot-password.html" class="text-small">-->
                        <!--  Forgot Password?-->
                        <!--</a>-->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password"  required>
                    

                    <?php 
                         if($passworderror){
                            ?>
                                
                                    <div class="text-danger p-1">
                                        <?php echo $passworderror;  ?>
                                    </div>
                            <?php
                         }   

                    ?>

                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" onclick="showPassword()" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me" id="rem">Show</label>
                    </div>
                  </div>

                  <?php 
                         if($wrongdata){
                            ?>
                                
                                    <div class="text-danger text-center p-3">
                                        <?php echo $wrongdata; ?>
                                    </div>
                            <?php
                         }   

                    ?>
                  <div class="form-group">
                    <button type="submit" name="login" id="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
  // login

$(document).ready(function () {
    $('#login').on('click', function () {
         var email = $('#email').val();
         var password = $('#password').val();

         if(email==''){
             $('#email').css('border','1px solid red');
            
         }else if(password==''){
             $('#password').css('border','1px solid red');
         }else if(email=='' && password==''){
             $('#email').css('border','1px solid red');
             $('#password').css('border','1px solid red');
         }else{
             $('#email').css('border','1px solid green');
             $('#password').css('border','1px solid green');
         }

    });

    $('#email').on('keyup', function () {
      $('#email').css('border','1px solid green');
      
    });

    $('#password').on('keyup', function () {
    
      $('#password').css('border','1px solid green');
    });

 });



    function showPassword() {

  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("rem").innerHTML = "Hide";
  } else {
    x.type = "password";
    document.getElementById("rem").innerHTML = "Show";
  }
}



  </script>

<?php include('assets/includes/footer-script.php'); ?>