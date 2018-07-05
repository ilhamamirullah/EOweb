

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

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Floor Plan</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Event</th>
                    <th>Title</th>
                    <th>File name</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (!empty($floorplan)) {
                      $no = 1;
                  foreach ($floorplan as $floorplan1) {
                   ?>
                    <tr class='clickable-row-floorplan' data-href='<?php echo base_url();?>sales/c_sales/download_file/<?php echo $floorplan1->floorplan_id ?>'>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $floorplan1->event_name ?></td>
                    <td><?php echo $floorplan1->title ?></td>
                    <td><?php echo $floorplan1->file_name ?></td>
                    <td><?php echo $floorplan1->description?></td>
                  </tr>
                <?php } }else{ ?>
                  <tr>
                    <td valign="top" colspan="6" class="dataTables_empty"> <center> No data available in table</center></td>
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


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
