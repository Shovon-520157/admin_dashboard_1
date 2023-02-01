<?php
  @include '../../includes/db_config.php';
  session_start();

  if($_SESSION['user_info'] == true) {
    $user_info = $_SESSION['user_info'];
  } else {
    header('location: ../../index.php');
  }

  $msg = '';
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php @include '../../includes/pages_header.php' ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container">
        <form action="../../controller/settings.php" method="post" enctype="multipart/form-data">
          <!--=== uploade profile pic ===-->
          <h4 class="text-danger mt-5"><?php 
          if(isset($_REQUEST['msg'])) {
            echo $_REQUEST['msg'];
          }
          ?></h4>
          <div class="row mt-5 w-100">
            <div class="col-3">
              <h4>Uploade pic </h4>
            </div>
            <div class="col-1">
              <h4> : </h4>
            </div>
            <div class="col-6">
              <input type="file" name="profile_img" class="w-100" placeholder="">
            </div>
          </div>
          <div class="offset-9 w-100 mt-5">
            <a href="../dashboard/dashboard.php" class="mx-4">Cancel</a>
            <button type="submit" name="apply_changes" class="text-light" style="background: green;">Apply changes</button>
          </div>
        </form>
      </div>
    </div>

    <!--=== js link ===-->
    <?php @include '../../includes/pages_js_link.php' ?>

  </body>
</html>