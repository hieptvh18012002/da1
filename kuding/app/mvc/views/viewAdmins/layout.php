<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ico -->
  <link rel="shortcut icon" type="image/png" href="./public/images/layout/kooding-app-icon.ico" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrator kooding</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./public/vendors/feather/feather.css">
  <link rel="stylesheet" href="./public/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./public/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="./public/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="./public/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="./public/js/jsadmin/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./public/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <!-- js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>
    #displayImg img {
      width: 100% !important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once "./app/mvc/views/viewAdmins/partials/_navbar.php" ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php include_once "./app/mvc/views/viewAdmins/partials/_settings-panel.php" ?>
      <?php include_once "./app/mvc/views/viewAdmins/partials/_right-sidebar.php" ?>
   
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include_once "./app/mvc/views/viewAdmins/partials/_sidebar.php" ?>
      <!-- partial -->
      <div class="main-panel">
        <!-- start include content -->
        <?php include_once "./app/mvc/views/viewAdmins/pages/" . $data['page'] . ".php" ?>
        <!-- partial:partials/_footer.html -->
        <?php include_once "./app/mvc/views/viewAdmins/partials/_footer.php" ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <!-- editor -->

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- plugins:js -->
  <script src="./public/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./public/vendors/chart.js/Chart.min.js"></script>
  <script src="./public/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="./public/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="./public/js/jsadmin/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./public/js/jsadmin/off-canvas.js"></script>
  <script src="./public/js/jsadmin/hoverable-collapse.js"></script>
  <script src="./public/js/jsadmin/template.js"></script>
  <script src="./public/js/jsadmin/settings.js"></script>
  <script src="./public/js/jsadmin/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./public/js/jsadmin/dashboard.js"></script>
  <script src="./public/js/jsadmin/Chart.roundedBarCharts.js"></script>

  <script src="./public/js/file-upload.js"></script>
  <script src="./public/js/typeahead.js"></script>
  <script src="./public/js/select2.js"></script>
  <!-- End custom js for this page-->
  <!-- js -->
  <script src="./public/js/layout/previewImg.js"></script>
  <!-- editor -->
  <script src="./public/js/jsadmin/editor.js"></script>
  <!-- handle data php -->
  <script src="./public/js/handle/filter_pro_admin.js"></script>

  <!-- lib js query validate cdn-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- validate form -->
  <script src="./public/js/validate/validatorAdmin/validator__cate.js"></script>


</body>

</html>