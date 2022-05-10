    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">MySQL connection</h5>

                <p class="card-text">
                  
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  <?php include 'inc/mysql_importdata.php'; ?>
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Device status</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">

                <table class="table">
                  <thead>
                    <tr>
                      <th>Device</th>
                      <th>Last seen</th>
                      <th style="width: 40px">Battery</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include 'inc/mysql_displaydata.php'; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Device status</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">

                <table class="table">
                  <thead>
                    <tr>
                      <th>Device</th>
                      <th>Last seen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include 'inc/mysql_displaylatestdata.php'; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->



        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->