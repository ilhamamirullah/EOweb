

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a href="<?php echo base_url(); ?>debindo/add_company" class="btn btn-primary btn-sm" >Add Company</a> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
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
                <tr>
                  <td>PT. Agung Abadi Sejahtera</td>
                  <td>Craft</td>
                  <td>Ilham Amirullah</td>
                  <td>081517147321</td>
                  <td>emailrahasia@rahasia.com</td>
                  <td>JustLion</td>
                  <td> <a href="#" class="btn-success btn-xs">edit</a> | <a href="#" class="btn-success btn-xs">delete</a> </td>
                </tr>
                <tr>
                  <td>PT. Jaya Makmur</td>
                  <td>Consumer Goods</td>
                  <td>Yandra Budianto </td>
                  <td>081313006441</td>
                  <td>yandra@debindo.com</td>
                  <td>Jakarta</td>
                  <td> <a href="#" class="btn-success btn-xs">edit</a> | <a href="#" class="btn-success btn-xs">delete</a> </td>
                </tr>
                <tr>
                  <td>PT. Cyber Intertama</td>
                  <td>Techonolgy</td>
                  <td>Nabil Iswar Siregar</td>
                  <td>081572892831</td>
                  <td>nabil@cyber.com</td>
                  <td>Bojong Gede</td>
                  <td> <a href="#" class="btn-success btn-xs">edit</a> | <a href="#" class="btn-success btn-xs">delete</a> </td>
                </tr>
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
