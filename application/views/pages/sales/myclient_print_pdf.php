<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Booking List Debindo</title>
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
      <span><img src="assets/icon/debindo-logo.png" style="width:50px; height:50px; margin-left:30px; margin-right:20px; margin-top:15px;" alt="">
        <b style="font-size: 20px;">My Client</b></span>
    </div>
    <br>
    <br>
    <div class="container">
        <table>
          <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Event</th>
                <th>Company</th>
                <th>Status</th>
                <th>SQM</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($booking)) {
              $no = 1;
              foreach($booking as $booking2){
                if ($booking2->username == $this->session->userdata('username') && $booking2->event_status == "undone") {?>
          <tr>
            <td><?php echo $no++ ?></td>
              <td><?php $date = date_create($booking2->booking_updated_at); echo date_format($date, 'd/m/Y H:i:s'); ?></td>
              <td><?php echo $booking2->event_name?></td>
              <td><?php echo $booking2->company_name ?></td>
              <td><?php echo $booking2->status_name ?></td>
              <td><?php echo $booking2->sqm?></td>
          </tr>
        <?php } } }?>
          </tbody>
        </table>
    </div>
    <footer style="margin-top:50px;"><center><strong>Copyright &copy; 2018 <a href="https://debindo.com">PT. Debindomulti Adhiswasti</a>.</strong> All right reserved.</center></footer>
  </body>
</html>
