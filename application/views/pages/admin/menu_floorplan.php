

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
        <li class="active">FloorPlan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">

          <h2>Floor Plan</h2>
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="<?php echo base_url(); ?>admin/c_admin/create_floorplan" class="btn btn-primary btn-sm" >Add FloorPlan</a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <?php foreach ($event as $event1) {

               ?>
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <!-- <div class="small-box bg-green"> -->
                  <div class="small-box <?php $a = array('bg-green', 'bg-orange', 'bg-red', 'bg-purple', 'bg-blue', 'bg-olive', 'bg-aqua', 'bg-fuchsia', 'bg-maroon'); echo $a[rand(0,8)];?>">
                    <div class="inner">
                      <h4><?php $date = date_create($event1->event_start_date); echo date_format($date, 'd/m/Y'); ?></h4>
                      <p><b><?php echo $event1->event_name; ?></b></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-map"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>admin/c_admin/floorplan/<?php echo $event1->event_id; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              <?php } ?>
                <!-- ./col -->
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <p>floorplan debindo</p>
            </div>
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
