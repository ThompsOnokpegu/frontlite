<?php include "../templates/header.php";?>
    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <div class="row">
                    <div class="col-md-3">
                    <a href="./create.php" type="button" class="btn btn-block bg-gradient-info"><span class="nav-icon fas fa-plus"></span> Add New Customer</a>
                    </div>
                    <div class="col-md-9">
                    </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="customer_table" class="table table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>View Details</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "../templates/footer.php"; ?>