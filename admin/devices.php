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
  <link rel="stylesheet" href="../bootstrap/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../bootstrap/dist/css/adminlte.min.css">

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
        <img src="../bootstrap/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                    <a href="#" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Devices</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="history.php" class="nav-link">
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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Devices</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Devices</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <div class="card">

                <!-- /.card-header -->
                <div class="card-body p-0">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Last seen</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($connected):
                        $deveuis = $conn->query("select * from sensors");
                        if ($deveuis->num_rows) :
                          // output data of each row
                          while ($row = $deveuis->fetch_assoc()):
                            $deveui[] = $row['dev_eui'];
                          endwhile;
                        endif;
                        ?>
                        <?php 
                        for ($i = 0; $i < count($deveui); $i++):
                          $devices = $conn->query("select * from eui_" . $deveui[$i] . " order by timestamp desc");
                          if ($devices->num_rows):
                            // output data of each row
                            $row = $devices->fetch_assoc();
                        ?>
                            <tr>
                              <td> <a class="nav-link" href="history.php?id=eui_<?php echo $deveui[$i]; ?>"> <?php echo $row['device_id']; ?> </a> </td>
                              <td> <?php echo $row['timestamp'];  ?></td>
                            </tr>
                        <?php
                          else:
                            echo "0 results";
                          endif;
                        endfor;
                        $conn->close();
                      endif;
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
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
</body>

</html>