  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Debindo
        <small>Add New event</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>admin/c_admin/event">event</a></li>
        <li class="active">Add event</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Add Event </b></h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="container" style="max-width:100%;padding:30px 10px;">
            	<form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url();?>admin/c_admin/add_event" method="post">
            	   <div class="form-group">
            	      <label for="event_name" class ="control-label col-sm-2">Event Name</label>
            		<div class="col-sm-8">
            	      <input type="event_name" class="form-control" id="event_name" name="event_name" placeholder="Enter event name" required>
                      <span class="help-block" style="color:red;"><?php echo form_error('event_name'); ?></span>
            		</div>
            	    </div>
                  <!-- Date -->
                  <div class="form-group">
                    <label for="event_name" class ="control-label col-sm-2">Event Start Date:</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="event_start_date" id="event_start_date" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        <span class="help-block" style="color:red;"><?php echo form_error('event_start_date'); ?></span>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="event_name" class ="control-label col-sm-2">Event End Date:</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input name="event_end_date" id="event_end_date" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        <span class="help-block" style="color:red;"><?php echo form_error('event_end_date'); ?></span>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
             	      <label for="event_desc" class ="control-label col-sm-2">Description</label>
             		<div class="col-sm-8">
             	      <input type="event_desc" class="form-control" id="event_desc" name="event_desc" placeholder="Enter event_desc">
                    <span class="help-block" style="color:red;"><?php echo form_error('event_desc'); ?></span>
             		</div>
             	    </div>
                  <br>
            	   <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                    <a class="btn btn-danger" type="button" href="<?php echo base_url();?>admin/c_admin/event">Cancel</a>
            	   </div>
            	</form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
