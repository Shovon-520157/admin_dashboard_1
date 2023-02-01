<?php
  @include '../../includes/db_config.php';
  session_start();

  if($_SESSION['user_info'] == true) {
    $user_info = $_SESSION['user_info'];
  } else {
    header('location: ../../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php @include '../../includes/pages_header.php' ?>
  </head>
  <body>
    <div class="container-scroller">
      <!--=== side bar ===-->
      <?php @include '../../includes/pages_side_bar.php' ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!--=== top bar ===-->
        <?php @include '../../includes/pages_top_bar.php' ?>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          </div>
          <!-- content-wrapper ends -->
          <!--=== footer ===-->
          <?php @include '../../includes/footer.php' ?>
          <!-- partial -->
        </div>
      </div>
    </div>

    <!--=== js link ===-->
    <?php @include '../../includes/pages_js_link.php' ?>
  </body>
</html>