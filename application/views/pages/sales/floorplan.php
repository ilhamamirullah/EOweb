

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
              <h3 class="box-title">Floor Plan List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Event</th>
                    <th>Title</th>
                    <th>File name</th>
                    <th>Description</th>
                    <th style="width: 70px">Show</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (!empty($floorplan)) {
                  foreach ($floorplan as $floorplan1) {
                    $no = 1;
                   ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $floorplan1->event_id ?></td>
                    <td><?php echo $floorplan1->title ?></td>
                    <td><?php echo $floorplan1->file_name ?></td>
                    <td><?php echo $floorplan1->description?></td>
                    <td><a href="#" class="btn btn-success btn-xs">Show</a> </td>
                  </tr>
                <?php } } ?>
                </tbody>
              </table>
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
