

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
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>c_sales/add_company" class="btn btn-primary btn-sm" >Add Company</a> </h3>
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
                    <a  class="btn-success btn-xs" <?php echo anchor('c_sales/edit_company/'.$company2->company_id,'Edit'); ?></a>
                    <a  class="btn-danger btn-xs" <?php echo anchor('c_sales/delete_company/'.$company2->company_id,'Delete'); ?></a>
                  </td>
                </tr>
              <?php } ?>
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
