

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Debindo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($company); ?></h3>

              <p>Count of company</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url();?>director/c_director/company" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($users); ?></h3>

              <p>Count of Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count($event); ?></h3>

              <p>Count of event</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($booking); ?></h3>

              <p>Count of Booking</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <br>

      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Booking</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Company</th>
                  <th>Sales</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($booking)) {
                    $no = 1;
                    foreach($booking as $booking2){
                  ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                    <td><?php echo $booking2->booking_updated_at ?></td>
                    <td><?php echo $booking2->event_name ?></td>
                    <td><?php echo $booking2->company_name ?></td>
                    <td><?php echo $booking2->username?></td>
                  <td><span <?php if ($booking2->status_name == "Form") { ?>
                    class="label label-success"
                  <?php }elseif ($booking2->status_name == "Cancel") { ?>
                    class="label label-danger"
                  <?php }elseif ($booking2->status_name == "Normal") { ?>
                    class="label label-info"
                  <?php }elseif ($booking2->status_name == "Booking") { ?>
                    class="label label-warning"
                  <?php }elseif ($booking2->status_name == "Approach") { ?>
                    class="label label-warning"
                  <?php } ?> ><?php echo $booking2->status_name ?></span></td>
              </tr>
            <?php } }?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <!--<div class="box-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
          <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
        </div> -->
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
