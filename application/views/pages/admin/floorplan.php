

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
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Event</th>
                    <th>Title</th>
                    <th>File name</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (!empty($floorplan)) {
                      $no = 1;
                  foreach ($floorplan as $floorplan1) {
                   ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $floorplan1->event_id ?></td>
                    <td><?php echo $floorplan1->title ?></td>
                    <td><?php echo $floorplan1->file_name ?></td>
                    <td><?php echo $floorplan1->description?></td>
                    <td>
                      <form action="<?php echo base_url();?>admin/c_admin/delete_floorplan/<?php echo $floorplan1->floorplan_id ?>" method="post">
                      <a href="<?php echo base_url();?>admin/c_admin/download_file/<?php echo $floorplan1->floorplan_id ?>" class="btn btn-success btn-xs">Show</a>
                      <input type="submit" value="hapus" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda Yakin Data ini Dihapus?')">
                    </form>
                    </td>
                  </tr>
                <?php } }else{ ?>
                  <tr>
                    <td align="top" colspan="6" class="dataTables_empty"> <center> No data available in table</center></td>
                  </tr>
                <?php } ?>
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
