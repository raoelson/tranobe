<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title ?></title>
<?php 
	if (isset($keywords) && $keywords<>"") $key = $keywords; 
	else $key = "tantsaha, serasera, mpamokatra, agriculture, élevage, pêche, chambre d'agriculture, tranobe, tranoben'ny tantsaha, producteur, reseau producteur, reseau interCSA, reseau CSA, FRDA";
?>
<meta name="description" content="Le réseau des producteurs est un espace d'échange pour les producteurs et tous les acteurs du développement rural à Madagascar.">
<meta name="keywords" content="<?php echo $key?>">
<meta name="revisit-after" content="14 days" />
<meta name="revisit" content="7 days" />
 
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css"
	href="<?php echo base_url()?>assets/frontend/css/bootstrap.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url()?>assets/frontend/css/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url()?>assets/frontend/css/font-awesome.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url()?>assets/frontend/css/style.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url()?>assets/frontend/lib/parallax/css/style2.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url()?>assets/frontend/lib/map/map.css" />
<script type="text/javascript"
	src="<?php echo base_url()?>assets/frontend/lib/parallax/js/modernizr.custom.28468.js"></script>
	<?php echo $_styles ?>
<script type="text/javascript">
	var BASE_URL = "<?php echo base_url()?>";
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45418123-1', 'sera2tantsaha.mg');
  ga('send', 'pageview');

</script>
</head>

<body>

	<?php echo $header ?>
	<!-- Menu -->
	<section class="container">
		<div class="row">
			<!-- MAIN -->
			<span class="span9"> 
			<?php echo $slider ?>
			<?php echo $content ?>
			</span>
			<!-- END MAIN -->
			<!-- SIDEBAR -->
			<span class="span3">
			<?php echo $sidebar ?>	
			</span>
			<!-- END SIDEBAR  -->	
		</div>
	</section>
	<footer>
  		  <?php echo $footer ?>	
	</footer>
	
	
	<!-- End body -->
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/frontend/js/jquery.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/frontend/lib/parallax/js/jquery.cslider.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/frontend/js/bootstrap.js"></script>
	<script type="text/javascript"
		src="<?php echo base_url()?>assets/frontend/js/init.js"></script>
		<?php echo  $_scripts ?>
</body>
</html>
