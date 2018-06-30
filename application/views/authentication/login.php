<html>
  <head>
    <title>Debindo Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/icon/debindo-logo.png">
  </head>
  </head>
  <body class="hold-transition login-page" style="height:500px;">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/icon/debindo-logo.png" style="width:30px; height:30px; margin-right: 5px;"><b>Debindo</b></a>
      </div>
    <div class="login-box-body">
      <p class="login-box-msg">Login to start your session</p>
    <form method="post" action="<?php echo base_url('authentication/auth/login'); ?>" role="login">
      <?php
      //menampilkan error menggunakan alert javascript
        if(isset($error)){
        echo '<script>
        alert("'.$error.'");
        </script>';
        }
      ?>

      <div class="form-group has-feedback">
        <input type="text" name="username" size="30" required class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" size="30" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="login" class="btn btn-primary">Login</button>
        </div>
        <!-- /.col -->
      </div>

    </form>
  </div>
</div>

    <!-- jQuery 3 -->
    <script src=".<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  </body>
</html>
