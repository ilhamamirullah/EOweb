
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Record book
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
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>director/c_director/print_record_book"  target="_blank" class="btn btn-warning btn-sm" >Print All</a> </h3>
              <!-- <h3 class="box-title"> <a href="<?php echo base_url(); ?>director/c_director/print_book_form/"  target="_blank" class="btn btn-success btn-sm" >Print Form</a> </h3> -->
              <!-- <h3 class="box-title"> <a href="<?php echo base_url(); ?>director/c_director/excel_book" class="btn btn-success btn-sm" >Save to Excel</a> </h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Book Id</th>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Company</th>
                    <th>Sales/AE</th>
                    <th>Status</th>
                    <th>SQM</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($record_book)) {
                		$no = 1;
                		foreach($record_book as $record_book2){
                	?>
                <tr>
                  <td><?php echo $no++ ?></td>
                    <td><?php echo $record_book2->booking_id ?></td>
                    <td><?php $date = date_create($record_book2->record_booking_created_at); echo date_format($date, 'd/m/Y H:i:s'); ?></td>
                    <td><?php echo $record_book2->event_name ?></td>
                    <td><?php echo $record_book2->company_name ?></td>
                    <td><?php echo $record_book2->username?></td>
                    <td><span <?php if ($record_book2->status_name == "Form") { ?>
                      class="label label-success"
                    <?php }elseif ($record_book2->status_name == "Cancel") { ?>
                      class="label label-danger"
                    <?php }elseif ($record_book2->status_name == "Normal") { ?>
                      class="label label-info"
                    <?php }elseif ($record_book2->status_name == "Booking") { ?>
                      class="label label-warning"
                    <?php }elseif ($record_book2->status_name == "Approach") { ?>
                      class="label label-warning"
                    <?php } ?> ><?php echo $record_book2->status_name ?></span></td>
                    <td><?php echo $record_book2->sqm?></td>
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
