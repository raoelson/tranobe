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

<!-- Header Starts -->
<header>
  <div class="container">
    <div class="row">
      <div class="span6">
        <div class="logo">
          <h1><a href="/assets/#">
            <?= ucfirst(lang("site_name"))?>
            </a></h1>
          <div class="hmeta">
            <?= ucfirst(lang("slogan"))?>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="form">
          <form method="get" id="searchform" action="#" class="form-search">
            <input type="text" value="" name="s" id="s" class="input-medium"/>
            <button type="submit" class="btn">
            <?= lang("search")?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Navigation bar starts -->
<div class="navbar">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span>Menu</span> </a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><a href="/"><?php echo ucwords(lang("home"))?></a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?= ucwords(lang("about"))?>
            <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/presentation/historique">Historique</a></li>
              <li><a href="/presentation/responsable">Responsables</a></li>
              <li><a href="/presentation/objectif">Objectifs&amp;Mission</a></li>
              <li><a href="/presentation/role">R&ocirc;les&amp;Attributions</a></li>
              <li><a href="/presentation/activite">Activit&eacute;s</a></li>
              <li><a href="/presentation/perspective">Perspectives&amp;Visions</a></li>
              <li><a href="/presentation/realisation">R&eacute;alisation</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Les TT Régionales<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Amoron'i Mania</a></li>
              <li><a href="#">Anosy</a></li>
              <li><a href="#">Analamanga</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="/csa" class="dropdown-toggle" data-toggle="dropdown">Les CSA<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Présentation</a></li>
              <li><a href="#">Rôles et attributions</a></li>
              <li><a href="#">Tous les CSA</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a href="/opf" class="dropdown-toggle" data-toggle="dropdown">Les OPF<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">CPM</a></li>
              <li><a href="#">FEKRITAMA</a></li>
              <li><a href="#">FIFATA</a></li>
              <li><a href="#">KOLOHARENA</a></li>
              <li><a href="#">RESEAU SOA</a></li>
            </ul>
          </li>
          <li><a href="aboutus.html">Les partenaires</a></li>
          <li><a href="contactus.html">
            <?= ucwords(lang('contact'))?>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Navigation bar ends -->

<div class="content">
<div class="container">

<!-- Slider starts -->

<div class="row">
  <div class="span12"> 
    <!-- Slider (Parallax Slider) -->
    <div id="da-slider" class="da-slider">
      <div class="da-slide">
        <div class="da-blue">
          <h2><span>Metro Mania</span></h2>
          <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
          <a href="#" class="da-link">Read more</a>
          <div class="da-img"><img src="/assets/img/parallax/1.png" alt="image01" /></div>
        </div>
      </div>
      <div class="da-slide">
        <div class="da-green">
          <h2><span>Easy management</span></h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <a href="#" class="da-link">Read more</a>
          <div class="da-img"><img src="/assets/img/parallax/2.png" alt="image01" /></div>
        </div>
      </div>
      <div class="da-slide">
        <h2><span>Revolution</span></h2>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        <a href="#" class="da-link">Read more</a>
        <div class="da-img"><img src="/assets/img/parallax/3.png" alt="image01" /></div>
      </div>
      <div class="da-slide">
        <h2><span>Quality Control</span></h2>
        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
        <a href="#" class="da-link">Read more</a>
        <div class="da-img"><img src="/assets/img/parallax/4.png" alt="image01" /></div>
      </div>
      <nav class="da-arrows"> <span class="da-arrows-prev"></span> <span class="da-arrows-next"></span> </nav>
    </div>
  </div>
</div>

<!-- Slider Ends --> 

<!-- Hero Unit -->

<div class="row">
  <div class="span12">
    <h2>
      <?= lang("welcome") ?>
    </h2>
    <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean sodales augue ac lacus hendrerit sed rhoncus erat hendrerit. Vivamus vel ultricies elit. Nulla vitae cursus leo. Praesent eleifend sodales felis, in congue purus scelerisque eget.</p>
    <hr />
  </div>
</div>

<!-- Hero Ends --> 

<!-- Discover starts -->

<div class="discover">
  <div class="row">
    <div class="span12">
      <h3>
        <?= ucfirst(lang('word_president')) ?>
      </h3>
      <div class="medium grey">Dépuis plusieurs années nous avons focalisé nos efforts dans le Développement Rural.</div>
      <div class="dis-nav button"> <a href="#" id="one">
        <?= lang("more")?>
        </a> </div>
      <div class="dis-content">
        <div class="one" style="text-align:justify"> <img src="/assets/img/president.png" alt="president" title="Président de la Chambre d'Agriculture Nationale" align="left" vspace="12" style="padding:0 10px">
          <p>
            <?= lang("word_president_full")?>
          </p>
          <a href="#" class="btn btn-success" onclick="$('.one').toggle('slow')">
          <?= lang("close") ?>
          </a> </div>
      </div>
    </div>
  </div>
</div>

<!-- Disconver ends -->

<hr />

<!-- Services starts -->

<div class="services">
  <div class="row">
    <div class="span12">
      <h3>
        <?= ucwords(lang("actu")) ?>
      </h3>
    </div>
    <div class="span6">
      <div class="col-l">
        <div class="service">
          <div class="b-orange serv-block"> <i class="icon-cloud"></i>
            <h3>Linux 8</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">
          <?= lang("more")?>
          </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="col-r">
        <div class="service">
          <div class="b-purple serv-block"> <i class="icon-briefcase"></i>
            <h3>Google</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">Take a look </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="span6">
      <div class="col-l">
        <div class="service">
          <div class="b-green serv-block"> <i class="icon-camera"></i>
            <h3>PlayStation</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">Take a look </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="col-r">
        <div class="service">
          <div class="b-blue serv-block"> <i class="icon-home"></i>
            <h3>GTalk</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">Take a look </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<hr />

<!-- Services Ends -->

<hr />

<!-- Services starts -->

<div class="services">
  <div class="row">
    <div class="span12">
      <h3>
        <?= ucwords(lang("actu_regional")) ?>
      </h3>
    </div>
    <div class="span6">
      <div class="col-l">
        <div class="service">
          <div class="b-orange serv-block"> <i class="icon-cloud"></i>
            <h3>Linux 8</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">
          <?= lang("more")?>
          </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="col-r">
        <div class="service">
          <div class="b-purple serv-block"> <i class="icon-briefcase"></i>
            <h3>Google</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">Take a look </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="span6">
      <div class="col-l">
        <div class="service">
          <div class="b-green serv-block"> <i class="icon-camera"></i>
            <h3>PlayStation</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">Take a look </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="col-r">
        <div class="service">
          <div class="b-blue serv-block"> <i class="icon-home"></i>
            <h3>GTalk</h3>
          </div>
          <p>Suspendisse potenti. Morbi ac felis nec mauris imperdiet fermentum. Aenean lacus hendrerit.</p>
          <a href="#">Take a look </a><i class="icon-double-angle-right"></i> </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<hr />

<!-- Services Ends --> 

<!-- Testimonial ends -->

<div class="border"></div>

<!-- Product & links starts --> 

<!-- Product & links ends --> 

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

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="widgets">
        <div class="span4">
          <div class="fwidget">
            <div class="col-l">
              <h6>Partenaires</h6>
              <ul>
                <li><a href="#">Ministères</a></li>
                <li><a href="#">Bailleurs de fonds</a></li>
                <li><a href="#">Projets & Programmes</a></li>
                <li><a href="#">Centres de formation</a></li>
                <li><a href="#">Etablissements publics & privés</a></li>
              </ul>
            </div>
            <div class="col-r">
              <h6>Support</h6>
              <ul>
                <li><a href="#">Condimentum</a></li>
                <li><a href="#">Etiam at</a></li>
                <li><a href="#">Fusce vel</a></li>
                <li><a href="#">Vivamus</a></li>
                <li><a href="#">Pellentesque</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="fwidget">
            <h6>Categories</h6>
            <ul>
              <li><a href="#">Condimentum - Condimentum gravida</a></li>
              <li><a href="#">Etiam at - Condimentum gravida</a></li>
              <li><a href="#">Fusce vel - Condimentum gravida</a></li>
              <li><a href="#">Vivamus - Condimentum gravida</a></li>
              <li><a href="#">Pellentesque - Condimentum gravida</a></li>
            </ul>
          </div>
        </div>
        <div class="span4">
          <div class="fwidget">
            <h6>Recent Posts</h6>
            <ul>
              <li><a href="#">Sed eu leo orci, condimentum gravida metus</a></li>
              <li><a href="#">Etiam at nulla ipsum, in rhoncus purus</a></li>
              <li><a href="#">Fusce vel magna faucibus felis dapibus facilisis</a></li>
              <li><a href="#">Vivamus scelerisque dui in massa</a></li>
              <li><a href="#">Pellentesque eget adipiscing dui semper</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="span12">
        <div class="copy">
          <h6>Metro <span class="color">Mania</span></h6>
          <p>Copyright &copy; <a href="#">Your Site</a> - <a href="index-2.html">Home</a> | <a href="aboutus.html">About Us</a> | <a href="faq.html">FAQ</a> | <a href="contactus.html">Contact Us</a></p>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
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