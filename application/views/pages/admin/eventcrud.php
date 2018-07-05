  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">event</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>admin/c_admin/show_add_event" class="btn btn-primary btn-sm" >Add event</a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Event Name</th>
                  <th>Event Start</th>
                  <th>Event End</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($event)) {
                		$no = 1;
                		foreach($event as $event2){
                	?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $event2->event_name ?></td>
                  <td><?php echo $event2->event_start_date ?></td>
                  <td><?php echo $event2->event_end_date ?></td>
                  <td><?php echo $event2->event_desc ?></td>
                  <td <?php if ($event2->event_status == "done") {
                    ?>style="background:red;" <?php } ?>><?php echo $event2->event_status ?></td>
                  <td>
                          <a class="btn btn-success btn-xs" <?php echo anchor('admin/c_admin/edit_event/'.$event2->event_id,'Edit'); ?></a>
                  </td>
                </tr>
              <?php } }?>
                </tbody>
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
