<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Tranoben'ny Tantsaha</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<!-- Stylesheets -->
<link href="/assets/style/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/style/font-awesome.css">
<link href="/assets/style/prettyPhoto.css" rel="stylesheet">
<!-- Parallax slider -->
<link rel="stylesheet" href="/assets/style/slider.css">
<!-- Flexslider -->
<link rel="stylesheet" href="/assets/style/flexslider.css">
<link href="/assets/style/style.css" rel="stylesheet">

<!-- Colors - Orange, Purple, Light Blue (lblue), Red, Green and Blue -->
<link href="/assets/style/green.css" rel="stylesheet">
<link href="/assets/style/bootstrap-responsive.css" rel="stylesheet">

<!-- HTML5 Support for IE -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shim.js"></script>
  <![endif]-->

<!-- Favicon -->
<link rel="icon" type="image/gif" href="/assets/img/favicon.gif" >
</head>

<body>
<?php $this->load->view('partials/header'); ?>
  <div class="content">
  <div class="container">
    
    <?php echo $content ?> 
    <!-- Social -->
    
    <div class="social-links">
      <div class="container">
        <div class="row">
          <div class="span12">
            <p class="big"><span>Follow Us On</span> <a href="#"><i class="icon-facebook"></i>Facebook</a> <a href="#"><i class="icon-twitter"></i>Twitter</a> <a href="#"><i class="icon-google-plus"></i>Google Plus</a> <a href="#"><i class="icon-linkedin"></i>LinkedIn</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <?php $this->load->view("partials/footer") ?>
</footer>

<!-- JS --> 
<script src="/assets/js/jquery.js"></script> 
<script src="/assets/js/bootstrap.js"></script> 
<script src="/assets/js/jquery.isotope.js"></script> <!-- Isotope for gallery --> 
<script src="/assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto for images --> 
<script src="/assets/js/jquery.cslider.js"></script> <!-- Parallax slider --> 
<script src="/assets/js/modernizr.custom.28468.js"></script> 
<script src="/assets/js/filter.js"></script> <!-- Filter for support page --> 
<script src="/assets/js/cycle.js"></script> <!-- Cycle slider --> 
<script src="/assets/js/jquery.flexslider-min.js"></script> <!-- Flex slider --> 
<script src="/assets/js/jquery.tweet.js"></script> <!-- jQuery Twitter --> 
<script src="/assets/js/easing.js"></script> <!-- Easing --> 
<script src="/assets/js/custom.js"></script>
</body>
</html>