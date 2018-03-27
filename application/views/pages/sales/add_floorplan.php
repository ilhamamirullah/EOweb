<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Debindo
      <small>Add New Company</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>sales/c_sales/company">Company</a></li>
      <li class="active">Add Company</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Add FloorPlan</b></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="container" style="max-width:100%;padding:30px 10px;">
            <form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url();?>sales/c_sales/add_company_save" method="post">
               <div class="form-group">
                  <label for="title" class ="control-label col-sm-2">title</label>
              <div class="col-sm-8">
                  <input type="title" class="form-control" id="title" name="title" placeholder="Enter title" required>
                    <span class="help-block" style="color:red;"><?php echo form_error('title'); ?></span>
              </div>
                </div>
               <div class="form-group">
                  <label for="description" class ="control-label col-sm-2">description</label>
              <div class="col-sm-8">
                  <input type="description" class="form-control" id="description" name="description" placeholder="Enter description" required>
                  <span class="help-block" style="color:red;"><?php echo form_error('description'); ?></span>
              </div>
                </div>
                <div class="form-group">
                  <label for="file" class ="control-label col-sm-2">File Upload</label>
              <div class="col-sm-8">
                  <input id="file" multiple="multiple" class="form-control multi with-preview" type="file" name="files[]" maxlength="5"/>
                  <span class="help-block"></span>
              </div>
                </div>
                <br>
               <div class="col-sm-offset-2 col-sm-8">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a class="btn btn-danger" type="button" href="<?php echo base_url();?>sales/c_sales/floorplan">Cancel</a>
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
