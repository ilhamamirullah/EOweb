<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">
body{
	background:url(<?php echo base_url(); ?>assets/icon/bg.jpg);
	margin:0;
	width: auto;
	height: auto;
}
.img{
	margin: 120px;
}
.sub a{
    color:white;
    background:rgba(0,0,0,0.3);
    text-decoration:none;
    padding:25px 35px;
    font-size:20px;
    font-family: arial, serif;
    font-weight:bold;
}
</style>
</head>
<body>
	    <div class="wrap">
	       <div class="logo">
					  <img src="<?php echo base_url();?>assets/icon/debindo.png" style="width: 10%; height: 10%;">
					 <center>
						 <div class="img">
							 <img src="<?php echo base_url(); ?>assets/icon/404.png" style="width: 70%; height: 70%;"/>
						 </div>

								 <div class="sub">
	                 <p><a href="<?php echo base_url(); ?>">Go Back</a></p>
	               </div>
	        </div>
	     </div>
</body>
</html>
