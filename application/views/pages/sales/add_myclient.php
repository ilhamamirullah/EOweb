<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Debindo
      <small>Client</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>sales/c_sales/company">Company</a></li>
      <li class="active">Add Client</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Add New Client</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="container" style="max-width:100%;padding:30px 10px;">
            <?php
             foreach($company as $company2){
           ?>
            <form class="form-horizontal" role="form" action="<?php echo base_url();?>sales/c_sales/add_company_save" method="post">
              <div class="form-group">
                 <label for="company_name" class ="control-label col-sm-2">Company Name</label>
             <div class="col-sm-8">
               <input type="hidden" name="company_id" value="<?php echo $company2->company_id ?>" required>
               <input type selected disabled hidden class="form-control" id="company_name" name="company_name" value="<?php echo $company2->company_name ?>">
             </div>
               </div>
               <div class="form-group">
                 <label class ="control-label col-sm-2">Event</label>
                 <div class="col-sm-8">
                 <select class="form-control select2" name="event_id" style="width: 100%;">
                   <option selected disabled hidden>Choose here</option>
                   <?php
                    foreach($event as $event2){
                  ?>
                   <option value="<?php echo $event2->event_id ?>"><?php echo $event2->event_name ?></option>
                   <?php } ?>
                 </select>
                 <span class="help-block"></span>
                 </div>
               </div>
                <div class="form-group">
                  <label class ="control-label col-sm-2">Status</label>
                  <div class="col-sm-8">
                  <select class="form-control select2" name="status_id" style="width: 100%;">
                    <option selected disabled hidden>Choose here</option>
                    <?php
                     foreach($status as $status2){
                   ?>
                    <option value="<?php echo $status2->status_id ?>"><?php echo $status2->status_name ?></option>
                    <?php } ?>
                  </select>
                  <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sqm" class ="control-label col-sm-2">Luas Space(sqm)</label>
              <div class="col-sm-8">
                  <input type="sqm" class="form-control" id="sqm" name="sqm" placeholder="Enter sqm">
                  <span class="help-block"></span>
              </div>
                </div>
                <div class="form-group">
                  <label for="design" class ="control-label col-sm-2">Design</label>
              <div class="col-sm-8">
                  <input type="design" class="form-control" id="design" name="design" placeholder="(standard/special)">
              </div>
                </div>
                <div class="form-group">
                  <label for="notes" class ="control-label col-sm-2">Notes</label>
              <div class="col-sm-8">
                  <input type="notes" class="form-control" id="notes" name="notes" placeholder="Enter notes">
              </div>
                </div>
                <br>
               <div class="col-sm-offset-2 col-sm-8">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <button class="btn btn-warning" type="reset">Reset</button>
                  <a class="btn btn-danger" type="button" href="<?php echo base_url();?>sales/c_sales/myclient">Cancel</a>
               </div>
            </form>
             <?php } ?>
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
