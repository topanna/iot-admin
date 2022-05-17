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

  <?php include 'inc/mysql_config.php'; ?>
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

                <?php include 'inc/history_layout_variables.php'; ?>

                <div class="card-header">
                  <h3 class="card-title"> <strong> <?php echo strtoupper($devicename); ?> </strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <?php if ($column_names->num_rows) : ?>
                      <thead>
                        <tr>
                          <?php // display column names and save to array columns[]
                          while ($row = $column_names->fetch_array()) : ?>
                            <th> <?php echo $row[0];  ?> </th>
                          <?php $columns[] = $row[0];
                          endwhile; ?>
                        </tr>
                      </thead>
                    <?php endif; ?>
                    <!-- display one page output -->
                    <?php if ($one_page_data->num_rows) : ?>
                      <?php while ($row = $one_page_data->fetch_array()) : ?>
                        <tbody>
                          <tr>
                            <?php for ($i = 0; $i < count($columns); $i++) : ?>
                              <td> <?php echo $row[$i]; ?> </td>
                            <?php endfor; ?>
                          </tr>
                        </tbody>
                      <?php endwhile; ?>
                    <?php else :
                      echo "0 results";
                    endif; ?>
                  </table>
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
                                                    echo "?id=" . $tablename . "&page=" . $prev;
                                                  } ?>">Previous</a>
                    </li>
                    <?php // display intermediate pagination links
                    if ($subset_range[0] > $superset_range[0]) : ?>
                      <li class="page-item disabled">
                        <a class="page-link"> <?php echo " ...&nbsp;"; ?> </a>
                      </li>
                    <?php endif; ?>

                    <?php foreach ($subset_range as $p) : ?>
                      <li class="page-item <?php if ($page == $p) {
                                              echo 'active';
                                            } ?>">
                        <a class="page-link" href="<?php echo "?id=" . $tablename . "&page=" . $p; ?>"> <?php echo $p; ?> </a>
                      </li>
                    <?php endforeach; ?>

                    <?php // display intermediate pagination links
                    if ($subset_range[count($subset_range) - 1] < $superset_range[count($superset_range) - 1]) : ?>
                      <li class="page-item disabled">
                        <a class="page-link"> <?php echo " ...&nbsp;"; ?> </a>
                      </li>
                    <?php endif; ?>

                    <li class="page-item <?php if ($page >= $totoalPages) {
                                            echo 'disabled';
                                          } ?>">
                      <a class="page-link" href="<?php if ($page >= $totoalPages) {
                                                    echo '#';
                                                  } else {
                                                    echo "?id=" . $tablename . "&page=" . $next;
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

    <!-- Main Footer -->
    <?php include 'inc/footer.php'; ?>
    <!-- / Main Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../bootstrap/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../bootstrap/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->

</body>

</html>