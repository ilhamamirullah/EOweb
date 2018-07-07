<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Company list Debindo</title>
    <style>
    body{
      font-family: sans-serif;
    }
      table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          font-size: 12px;
          margin-left: auto;
          margin-right: auto;
      }
      th, td {
        padding: 8px;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <div class="page-header">
      <span><img src="assets/icon/debindo-logo.png" style="width:50px; height:50px; margin-left:30px; margin-right:20px; margin-top:15px;" alt=""> <b style="font-size: 20px;">Company List</b></span>
    </div>
    <br>
    <br>
    <div class="container">
        <table>
          <thead>
          <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Category</th>
            <th>PIC</th>
            <th>PIC Number</th>
            <th>PIC Email</th>
            <th>Address</th>
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
          </tr>
        <?php } ?>
        <tr>
          <td colspan="6"><center><b>Total</b> <center></td>
          <td> <b> <?php echo count($company); ?></b></td>
        </tr>
      <?php } ?>
          </tbody>
        </table>
    </div>
    <footer style="margin-top:50px;"><center><strong>Copyright &copy; 2018 <a href="https://debindo.com">PT. Debindomulti Adhiswasti</a>.</strong> All right reserved.</center></footer>
  </body>
</html>
