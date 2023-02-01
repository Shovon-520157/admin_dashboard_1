<?php
  @include 'includes/db_config.php';
  session_start();

  $msg = '';
  if(isset($_REQUEST['login'])) {
    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];

    $select = "SELECT * FROM user WHERE Name='$user_name' AND Pass='$user_pass'";
    $ex = mysqli_query($connect,$select);
    $row = mysqli_fetch_array($ex);

    if($row) {
      header('location: pages/dashboard/dashboard.php');
      $_SESSION['user_info']=$row['Email'];
    } else {
      $msg = 'User name & password is not valid';
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php @include 'includes/index_header.php' ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-center mb-5">Login</h3>
                <p class="text-danger mb-3"><?php echo $msg; ?></p>
                <form action="" method="post">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" name="user_name" class="form-control p_input text-light">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text" name="user_pass" class="form-control p_input text-light">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label> <input type="checkbox" name=""> Remember</label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn mb-3">Login</button>
                  </div>
                </form>

                <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="pages/samples/register.php"> Sign Up</a></p>

              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!--=== js link ===-->
    <?php @include '../../includes/pages_js_link.php' ?>
  </body>
</html>