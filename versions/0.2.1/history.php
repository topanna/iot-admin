<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <?php include 'inc/mysql_connect.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->

    <?php include 'inc/navbar.php'; ?>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">IoT Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">




          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Starter Pages
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="devices.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Devices</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>History</p>
                    </a>
                  </li>
                </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>History</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">History</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <?php

                if ($connected) {




                  $sql = "show tables like 'eui%'";
                  $result = $conn->query($sql);

                  if ($result->num_rows) {
                    // output data of each row
                    while ($row = $result->fetch_array()) {
                      $deveui[] = $row[0];
                    }
                  }

                  $device = isset($_GET['id']) ? $_GET['id'] : $deveui[0];


                  $sql = "select device_id from " . $device . " limit 1";
                  $result = $conn->query($sql);

                  $devicename = isset($result->num_rows) ?: 'error';
                  $row = $result->fetch_array();
                  $devicename = $row[0];
                }

                ?>

                <div class="card-header">
                  <h3 class="card-title"> <?php echo $devicename ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <?php include 'inc/mysql_displayhistory.php'; ?>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Pagination -->
                <nav aria-label="Page navigation example mt-5">
                  <ul class="pagination justify-content-center">
                    <li class="page-item <?php if ($page <= 1) {
                                            echo 'disabled';
                                          } ?>">
                      <a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                  } else {
                                                    echo "?id=" . $device . "&page=" . $prev;
                                                  } ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totoalPages; $i++) : ?>
                      <li class="page-item <?php if ($page == $i) {
                                              echo 'active';
                                            } ?>">
                        <a class="page-link" href="<?php echo "?id=" . $device . "&page=" . $i; ?>"> <?php echo $i; ?> </a>
                      </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if ($page >= $totoalPages) {
                                            echo 'disabled';
                                          } ?>">
                      <a class="page-link" href="<?php if ($page >= $totoalPages) {
                                                    echo '#';
                                                  } else {
                                                    echo "?id=" . $device . "&page=" . $next;
                                                  } ?>">Next</a>
                    </li>
                  </ul>
                </nav>

              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

    <?php include 'inc/footer.php'; ?>


    <!-- / Main Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->




</body>

</html>
