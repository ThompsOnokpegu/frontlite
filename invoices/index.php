<?php 
if(!$_SESSION['role']==='office'){
  header('Location: '. $_SERVER['HTTP_REFERER']);
}
include "../templates/header.php"; ?>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 column">
        <div class="card">
          <div class="card-header">
              <div class="row">
                <div class="col-md-3">
                <a href="../customers" type="button" class="btn btn-block bg-gradient-info"><span class="nav-icon fas fa-clipboard"></span> New Invoice</a>
                </div>
                <div class="col-md-9">
                </div>
              </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="invoice_table" class="table table-striped">
              <thead>
              <tr>
                <th>Invoice ID</th>
                <th>Client Name</th>
                <th>Amount</th>
                <th>Deposit</th>
                <th>Print Invoice</th>
                <th>Edit Invoice</th>
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