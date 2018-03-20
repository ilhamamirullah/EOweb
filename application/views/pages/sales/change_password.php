<?php $data = $this->session->userdata(); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Change Password
      <small>Change Your Password</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>sales/c_sales/company">MyProfile</a></li>
      <li class="active">Change Password</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Rubah Password </b></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="container" style="max-width:100%;padding:30px 10px;">
            <form class="form-horizontal" autocomplete="off" role="form" action="<?php echo base_url();?>sales/c_sales/change_password" method="post">
               <div class="form-group">
                  <label for="pw_baru" class ="control-label col-sm-2">Password Baru</label>
              <div class="col-sm-8">
                    <input type="password" class="form-control"  name="new" value="<?php echo set_value('new');?>" required>
                     <?= form_error('password_baru'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cpw_baru" class ="control-label col-sm-2">Konfirmasi Password Baru</label>
              <div class="col-sm-8">
                  <input type="password" class="form-control"  name="re_new" value="<?php echo set_value('re_new');?>" required>
              </div>
                </div>
                <br>
               <div class="col-sm-offset-2 col-sm-8">
                  <button type="Submit" class="btn btn-success" href="<?php echo base_url();?>sales/c_sales/change_password">Ganti Password</button>
                  <button class="btn btn-warning" type="reset">Reset</button>
                  <a class="btn btn-danger" type="button" href="<?php echo base_url();?>sales/c_sales/company">Cancel</a>
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
