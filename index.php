<?php 
error_reporting(0); 
include '../includes/dbcon.php'; 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <!-- Required meta tags --> 
  <?php include "partials/head.php";?> 
  <!-- DataTables CSS --> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css"> 
</head> 
<body> 
<div class="container-scroller"> 
  <!-- partial:partials/_navbar.html --> 
  <?php include "partials/navbar.php";?> 
  <!-- partial --> 
  <div class="container-fluid page-body-wrapper"> 
    <!-- partial:partials/_settings-panel.html --> 
    <?php include "partials/settings-panel.php";?> 
    <!-- partial --> 
    <!-- partial:partials/_sidebar.html --> 
    <?php include "partials/sidebar.php";?> 
    <!-- partial --> 
    <div class="main-panel"> 
      <div class="content-wrapper"> 
        <div class="row"> 
          <div class="col-md-12 grid-margin"> 
            <div class="row"> 
              <div class="col-12 col-xl-8 mb-4 mb-xl-0"> 
                <h3 class="font-weight-bold">Welcome Super Admin</h3> 
              </div> 
            </div> 
          </div> 
        </div> 

        <!-- START INLINE CARDS --> 
        <div class="row"> 
          <!-- Admin Count --> 
          <div class="col-md-3 mb-4 stretch-card transparent"> 
            <div class="card card-tale"> 
              <div class="card-body"> 
                <p class="mb-4">Admin</p> 
                <p class="fs-30 mb-2"></p> 
              </div> 
            </div> 
          </div> 

          <!-- Registered Students --> 
          <div class="col-md-3 mb-4 stretch-card transparent"> 
            <div class="card card-dark-blue"> 
              <div class="card-body"> 
                <p class="mb-4">Registered Students</p> 
                <p class="fs-30 mb-2"></p> 
              </div> 
            </div> 
          </div> 

          <!-- Books Available --> 
          <div class="col-md-3 mb-4 stretch-card transparent"> 
            <div class="card card-light-blue"> 
              <div class="card-body"> 
                <p class="mb-4">Books Available</p> 
                <p class="fs-30 mb-2"></p> 
              </div> 
            </div> 
          </div> 

          <!-- Number of Books Borrowed --> 
          <div class="col-md-3 mb-4 stretch-card transparent"> 
            <div class="card card-light-danger"> 
              <div class="card-body"> 
                <p class="mb-4">Number of Books Borrowed</p> 
                <p class="fs-30 mb-2"></p> 
              </div> 
            </div> 
          </div> 
        </div> 
        <!-- END INLINE CARDS --> 

        <!-- Borrowed Books Table --> 
        <div class="row"> 
          <div class="col-md-12 grid-margin stretch-card"> 
            <div class="card"> 
              <div class="card-body"> 
                <p class="card-title mb-0">Books Borrowed Table</p> 
                <div class="table-responsive"> 
                  <table id="sampletable" class="table table-striped table-borderless"> 
                    <thead> 
                      <tr> 
                        <th>Student Name</th> 
                        <th>Book Title</th> 
                        <th>Borrowed Date</th> 
                        <th>Status</th> 
                      </tr> 
                    </thead> 
                    <tbody> 
                      <!-- Table rows removed with functions --> 
                      <tr><td colspan='4' class='text-center'>No borrowed books found</td></tr> 
                    </tbody> 
                  </table> 
                </div> 
              </div> 
            </div> 
          </div> 
        </div> 

      </div> 
      <!-- content-wrapper ends --> 

      <!-- partial:partials/_footer.html --> 
      <?php include 'partials/footer.php'; ?> 
      <!-- partial --> 
    </div> 
    <!-- main-panel ends --> 
  </div> 
  <!-- page-body-wrapper ends --> 
</div> 
<!-- container-scroller --> 

<!-- plugins:js --> 
<?php include 'partials/scripts.php';?>

<!-- Initialize DataTable --> 
<script> 
$(document).ready(function () { 
  $('#sampletable').DataTable({ 
    "pageLength": 10, 
    "lengthMenu": [5, 10, 25, 50, 100], 
    "ordering": false, 
    "searching": false, 
    "scrollY": "400px", 
    "scrollCollapse": true, 
    "paging": true 
  }); 
}); 
</script> 
<!-- End custom js for this page--> 
</body> 
</html>
