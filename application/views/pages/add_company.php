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
        <div class="box box-default">
        <?php
            $this->load->library('form_validation');
            echo validation_errors(); ?>
        <?php echo form_open('debindo/add_company_save');?>
          </div>
        <div class="box-body">
          <div class="row">
            <div class="container" style="max-width:100%;padding:30px 10px;">
            	<form class="form-horizontal" role="form" action="<?php echo base_url();?>debindo/add_company_save" method="post">
            	   <div class="form-group">
                   <label class ="control-label col-sm-2">Category</label>
                   <div class="col-sm-8">
                   <select class="form-control select2" name="id_category" style="width: 100%;">
                     <?php
                   		foreach($category as $category2){
                   	?>
                     <option selected="selected" value="<?php echo $category2->category_id ?>"><?php echo $category2->category_name ?></option>
                     <?php } ?>
                   </select>
                   </div>
                 </div>
            	   <div class="form-group">
            	      <label for="name_company" class ="control-label col-sm-2">Company Name</label>
            		<div class="col-sm-8">
            	      <input type="name" class="form-control" id="address" name="name" placeholder="Enter company name">
            		</div>
            	    </div>
            	   <div class="form-group">
            	      <label for="address" class ="control-label col-sm-2">Address</label>
            		<div class="col-sm-8">
            	      <input type="address" class="form-control" id="address" name="address" placeholder="Enter Address">
            		</div>
            	    </div>
                  <div class="form-group">
             	      <label for="website" class ="control-label col-sm-2">Website</label>
             		<div class="col-sm-8">
             	      <input type="website" class="form-control" id="website" name="website" placeholder="Enter website">
             		</div>
             	    </div>
                  <div class="form-group">
             	      <label for="pic" class ="control-label col-sm-2">PIC</label>
             		<div class="col-sm-8">
             	      <input type="pic" class="form-control" id="pic" name="pic" placeholder="Enter pic">
             		</div>
             	    </div>
                  <div class="form-group">
                    <label for="email" class ="control-label col-sm-2">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                  </div>
                  <div class="form-group">
             	      <label for="pic_contact" class ="control-label col-sm-2">PIC Contact</label>
             		<div class="col-sm-8">
             	      <input type="pic_contact" class="form-control" name="pic_contact" id="pic_contact" placeholder="Enter pic contact">
             		</div>
             	    </div>
                  <br>
            	   <div class="col-sm-offset-2 col-sm-8">
            	     <input type="submit" value="Save">
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
