<!DOCTYPE html>
<html lang="fr">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> -->
    <link href="<?php echo base_url() ?>assets/backend/css/font-awesome.css" rel="stylesheet">
    
    <link href="<?php echo base_url() ?>assets/backend/css/base-admin.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/backend/css/base-admin-responsive.css" rel="stylesheet">
       
    <link href="<?php echo base_url() ?>assets/backend/css/pages/dashboard.css" rel="stylesheet">   
	 <link href="<?php echo base_url() ?>assets/backend/css/bootstrap-toggle-buttons.css" rel="stylesheet">
      <link type="text/css" href="<?php echo base_url() ?>assets/backend/js/lib/ui/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script type="text/javascript">
		var active = "<?php echo $active ?>";
		var SITE_URL = "<?php echo base_url()?>";
		var BASE_URL = "<?php echo base_url()?>admin.php/";
		var LIB_JS = "<?php echo base_url()?>assets/backend/js/lib/";
		var MEDIA_DIR = "<?php echo base_url()?>assets/medias/";
	</script>
	<?php echo  $_styles ?>
  </head>

<body>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="<?php echo base_url() ?>" target="_blank">
				Tranoben'ny Tantsaha				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Options
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Options générales</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Aide</a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<?php echo $user["username"]?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url() ?>admin.php/user/profile">Mon Profil</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url() ?>admin.php/auth/logout">Se déconnecter</a></li>
						</ul>
						
					</li>
				</ul>
			
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">
<?php $this->load->view("partials/header")?>	
	
</div> <!-- /subnavbar -->
    
    
<div class="main">
	
	<?php echo $content ?>
    
</div> <!-- /main -->
   
<?php $this->load->view("partials/footer");?>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url() ?>assets/backend/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/jquery.toggle.buttons.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/lib/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/lib/localscroll/jquery.localscroll.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/lib/localscroll/jquery.scrollTo.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/lib/ui/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/lib/ui/js/jquery.ui.datepicker-fr.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/sites/init.js"></script>


<script src="<?php echo base_url() ?>assets/backend/js/base.js"></script>
<?php echo  $_scripts ?>
  </body>

</html>
