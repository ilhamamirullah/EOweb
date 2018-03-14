

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Company</th>
                  <th>Sales/AE</th>
                  <th>Status</th>
                  <th>SQM</th>
                </tr>
                </thead>
                <?php
                  $no = 1;
                   foreach($booking as $booking2){
                 ?>
                <tbody>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $booking2->booking_updated_at ?></td>
                  <td><?php echo $booking2->company_name ?></td>
                  <td><?php echo $booking2->username?></td>
                  <td><?php echo $booking2->status_name ?></td>
                  <td><?php echo $booking2->sqm?></td>
                  <td>
                  </tr>
                </tbody>
              <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
