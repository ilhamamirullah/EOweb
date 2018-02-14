  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Company
        <small>Debindo</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Company</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="container" style="max-width:100%;padding:30px 10px;">
            	<form class="form-horizontal" role="form" action="<?php echo base_url();?>debindo/add_company_save" method="post">
            	   <div class="form-group">
                   <label class ="control-label col-sm-2">Category</label>
                   <div class="col-sm-8">
                   <select class="form-control select2" name="category_id" style="width: 100%;">
                     <option selected disabled hidden>Choose here</option>
                     <?php
                   		foreach($category as $category2){
                   	?>
                     <option value="<?php echo $category2->category_id ?>"><?php echo $category2->category_name ?></option>
                     <?php } ?>
                   </select>
                   <span class="help-block"></span>
                   </div>
                 </div>
            	   <div class="form-group">
            	      <label for="company_name" class ="control-label col-sm-2">Company Name</label>
            		<div class="col-sm-8">
            	      <input type="company_name" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" required>
                      <span class="help-block" style="color:red;"><?php echo form_error('company_name'); ?></span>
            		</div>
            	    </div>
            	   <div class="form-group">
            	      <label for="address" class ="control-label col-sm-2">Address</label>
            		<div class="col-sm-8">
            	      <input type="address" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    <span class="help-block" style="color:red;"><?php echo form_error('address'); ?></span>
            		</div>
            	    </div>
                  <div class="form-group">
             	      <label for="website" class ="control-label col-sm-2">Website</label>
             		<div class="col-sm-8">
             	      <input type="website" class="form-control" id="website" name="website" placeholder="Enter website">
                    <span class="help-block"></span>
             		</div>
             	    </div>
                  <div class="form-group">
             	      <label for="pic" class ="control-label col-sm-2">PIC</label>
             		<div class="col-sm-8">
             	      <input type="pic" class="form-control" id="pic" name="pic" placeholder="Enter pic" required>
                    <span class="help-block" style="color:red;"><?php echo form_error('pic'); ?></span>
             		</div>
             	    </div>
                  <div class="form-group">
                    <label for="email" class ="control-label col-sm-2">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    <span class="help-block" style="color:red;"><?php echo form_error('email'); ?></span>
                </div>
                  </div>
                  <div class="form-group">
             	      <label for="pic_contact" class ="control-label col-sm-2">PIC Contact</label>
             		<div class="col-sm-8">
             	      <input type="pic_contact" class="form-control" name="pic_contact" id="pic_contact" placeholder="Enter pic contact" required>
                    <span class="help-block" style="color:red;"><?php echo form_error('pic_contact'); ?></span>
             		</div>
             	    </div>
                  <br>
            	   <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                    <a class="btn btn-danger" type="button" href="<?php echo base_url();?>debindo/company">Cancel</a>
            	   </div>
            	</form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          debindo
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
