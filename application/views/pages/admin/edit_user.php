<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Debindo
      <small>Add New User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>admin/c_admin/user">User List</a></li>
      <li class="active">Edit User Data</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Pastikan Data User Yang Akan Diinput Benar </b></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="container" style="max-width:100%;padding:30px 10px;">
            <?php
             foreach($users as $users2){
           ?>
            <form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url();?>admin/c_admin/update_user" method="post">
               <div class="form-group">
                  <label for="username" class ="control-label col-sm-2">Username</label>
              <div class="col-sm-8">
                <input type="hidden" name="id" value="<?php echo $users2->id ?>" required>
                  <input type="company_name" class="form-control" id="username" name="username" value="<?php echo $users2->username ?>" required>
                    <span class="help-block" style="color:red;"><?php echo form_error('username'); ?></span>
              </div>
            </div>
                  <div class="form-group">
                    <label class ="control-label col-sm-2">Level</label>
                    <div class="col-sm-8">
                    <select class="form-control select2" name="level" style="width: 100%;">
                      <option selected disabled hidden>Choose here</option>
                      <option <?php if($users2->level === "sales"){echo "selected";} ?> value="sales">Sales</option>
                      <option <?php if($users2->level === "director"){echo "selected";} ?>value="director">Director</option>
                      <option <?php if($users2->level === "admin"){echo "admin";} ?>value="admin">Admin</option>
                    </select>
                    <span class="help-block"></span>
                    </div>
                  </div>
               <div class="form-group">
                  <label for="name" class ="control-label col-sm-2">Full Name</label>
              <div class="col-sm-8">
                  <input type="name" class="form-control" id="name" name="name" value="<?php echo $users2->name?>" required>
                  <span class="help-block" style="color:red;"><?php echo form_error('name'); ?></span>
              </div>
                </div>
                <div class="form-group">
                  <label for="address" class ="control-label col-sm-2">Address</label>
              <div class="col-sm-8">
                  <input type="address" class="form-control" id="address" name="address" value="<?php echo $users2->address ?>" required>
                  <span class="help-block"></span>
              </div>
                </div>
                <div class="form-group">
                  <label for="email" class ="control-label col-sm-2">Email</label>
              <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $users2->email ?>" required>
                  <span class="help-block" style="color:red;"><?php echo form_error('email'); ?></span>
              </div>
                </div>
                <div class="form-group">
                  <label for="contact" class ="control-label col-sm-2">Phone Number</label>
              <div class="col-sm-8">
                  <input type="contact" class="form-control" name="contact" id="contact" value="<?php echo $users2->contact?>" required>
                  <span class="help-block" style="color:red;"><?php echo form_error('contact'); ?></span>
              </div>
                </div>
                <br>
               <div class="col-sm-offset-2 col-sm-8">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <button class="btn btn-warning" type="reset">Reset</button>
                  <a class="btn btn-danger" type="button" href="<?php echo base_url();?>admin/c_admin/user">Cancel</a>
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
