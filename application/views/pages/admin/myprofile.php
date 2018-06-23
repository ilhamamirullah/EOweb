<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      MyProfile
      <small>Profile Anda</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url(); ?>admin/c_admin/company">Company</a></li>
      <li class="active">Add Company</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><b>Jika ada data yang salah atau ingin dirubah, harap kontak admin </b></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="container" style="max-width:100%;padding:30px 10px;">
            <form class="form-horizontal" autocomplete="off" role="form">
               <div class="form-group">
                  <label for="nama" class ="control-label col-sm-2">Nama Lengkap</label>
              <div class="col-sm-8">
                  <input type selected disabled hidden="nama" class="form-control" id="nama" name="nama" value="<?php echo $this->session->userdata('nama_lengkap'); ?>" required>
              </div>
                </div>
               <div class="form-group">
                  <label for="email" class ="control-label col-sm-2">Email</label>
              <div class="col-sm-8">
                    <input type selected disabled hidden="email" class="form-control" id="email" name="nama" value="<?php echo $this->session->userdata('email'); ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_hp" class ="control-label col-sm-2">No. HP</label>
              <div class="col-sm-8">
                  <input type selected disabled hidden="no_hp" class="form-control" id="no_hp" name="no_hp" value="<?php echo $this->session->userdata('no_hp'); ?>" required>
              </div>
                </div>
                <div class="form-group">
                  <label for="pic" class ="control-label col-sm-2">Jabatan</label>
              <div class="col-sm-8">
                  <input type selected disabled hidden="no_hp" class="form-control" id="no_hp" name="no_hp" value="<?php echo $this->session->userdata('jabatan'); ?>" required>
              </div>
                </div>
                <div class="form-group">
                  <label for="email" class ="control-label col-sm-2">NIP</label>
              <div class="col-sm-8">
                  <input type selected disabled hidden="no_hp" class="form-control" id="no_hp" name="no_hp" value="<?php echo $this->session->userdata('nip'); ?>" required>              </div>
                </div>
                <div class="form-group">
                  <label for="pic_contact" class ="control-label col-sm-2">Alamat</label>
              <div class="col-sm-8">
                  <input type selected disabled hidden="no_hp" class="form-control" id="no_hp" name="no_hp" value="<?php echo $this->session->userdata('alamat'); ?>" required>
                </div>
                </div>
                <br>
               <div class="col-sm-offset-2 col-sm-8">
                  <a type="button" class="btn btn-success" href="<?php echo base_url();?>admin/c_admin/change_password">Change Password</a>
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
