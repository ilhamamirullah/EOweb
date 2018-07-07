
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event    <b>   <?php
                if (!empty($booking)) {
                foreach($booking as $booking2){
                  echo $booking2->event_name;
                  break;
                }
              }else {
                foreach ($event as $event1) {
                      if ($event1->event_id == $whereid) {
                        echo $event1->event_name;
                      }
                }
                }
              ?> </b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>director/c_director/print_book/<?php echo $whereid; ?>"  target="_blank" class="btn btn-warning btn-sm" >Print All</a> </h3>
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>director/c_director/print_book_form/<?php echo $whereid; ?>"  target="_blank" class="btn btn-success btn-sm" >Print Form</a> </h3>
              <!-- <h3 class="box-title"> <a href="<?php echo base_url(); ?>admin/c_admin/excel_book" class="btn btn-success btn-sm" >Save to Excel</a> </h3> -->

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
                <tbody>
                  <?php
                  if (!empty($booking)) {
                		$no = 1;
                		foreach($booking as $booking2){
                	?>
                <tr>
                  <td><?php echo $no++ ?></td>
                    <td><?php $date = date_create($booking2->booking_updated_at); echo date_format($date, 'd/m/Y H:i:s'); ?></td>
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
                    <td><?php echo $booking2->sqm?></td>
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
