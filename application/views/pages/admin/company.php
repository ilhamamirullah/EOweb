
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company List
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
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>admin/c_admin/add_company" class="btn btn-primary btn-sm" >Add Company</a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Company Name</th>
                  <th>Category</th>
                  <th>PIC</th>
                  <th>PIC Number</th>
                  <th>PIC Email</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($company)) {
                		$no = 1;
                		foreach($company as $company2){
                	?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $company2->company_name ?></td>
                  <td><?php echo $company2->category_name ?></td>
                  <td><?php echo $company2->pic ?></td>
                  <td><?php echo $company2->pic_contact ?></td>
                  <td><?php echo $company2->email ?></td>
                  <td><?php echo $company2->address ?></td>
                  <td>
                    <!-- <form action="<?php echo base_url();?>admin/c_admin/delete_company/<?php echo $company2->company_id ?>" method="post"> -->
                          <a class="btn btn-success btn-xs" <?php echo anchor('admin/c_admin/edit_company/'.$company2->company_id,'Edit'); ?></a>
                        <!--  <input type="submit" value="hapus" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda Yakin Data ini Dihapus?')"> -->
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
