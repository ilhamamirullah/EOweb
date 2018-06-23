
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Company</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>admin/c_admin/add_user" class="btn btn-primary btn-sm" >Add User</a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($users)) {
                		$no = 1;
                		foreach($users as $users2){
                	?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $users2->username ?></td>
                  <td><?php echo $users2->name ?></td>
                  <td><?php echo $users2->level ?></td>
                  <td>
                    <form action="<?php echo base_url();?>admin/c_admin/delete_user/<?php echo $users2->id ?>" method="post">
                          <a class="btn btn-success btn-xs" <?php echo anchor('admin/c_admin/edit_user/'.$users2->id,'Edit'); ?></a>
                          <input type="submit" value="hapus" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda Yakin Data ini Dihapus?')">
                    </form>
                  </td>
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
