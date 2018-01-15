<div class="subnavbar-inner">
  <div class="container">
    <ul class="mainnav">
      <li id="menu_home"> <a href="<?php echo base_url()?>admin.php"> <i class="icon-home"></i> <span>Accueil</span> </a> </li>
      <li class="dropdown" id="menu_article"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Articles & Pages</span> <b class="caret"></b></a>
       <ul class="dropdown-menu">
       		<li><a href="<?php echo base_url()?>admin.php/categorie/">Catégories</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/sous_categorie/">Sous Catégories</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/article/"><?php if ($user["idgroup"] == 1) :?>Gestion des articles <?else : ?>Mes articles<?php endif ?></a></li>	
       		<li><a href="<?php echo base_url()?>admin.php/article/to_publish"><?php if ($user["idgroup"] == 1) :?>Articles à publier <?else : ?>Articles en attente de publication<?php endif ?></a></li>
       		<li><a href="<?php echo base_url()?>admin.php/article/edit">Nouvel article</a></li>
       		 <?php if ($user["idgroup"] == 1) :?>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/page/">Gestion des pages </a></li>
       		<li><a href="<?php echo base_url()?>admin.php/page/edit">Nouvelle page</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/edl">EDL</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/actualite/">Actualités</a></li>
       		<?php endif ?>	
       </ul>
      </li>
      <?php if ($user["idgroup"] == 1) :?>
      <li class="dropdown" id="menu_user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i><span>Utilisateurs</span> <b class="caret"></b></a>
       <ul class="dropdown-menu">
       		<li><a href="<?php echo base_url()?>admin.php/group/">Groupes &amp; Keywords</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/user">Tous les utilisateurs</a></li>	
       		<li><a href="<?php echo base_url()?>admin.php/user/to_validate">Inscriptions &agrave; confirmer</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/suscriber">Tous les abonnés</a></li>
       </ul>
      </li>
      <li class="dropdown" id="menu_sms"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-large"></i><span>Gestion SMS</span> <b class="caret"></b></a>
       <ul class="dropdown-menu">
       		<li><a href="<?php echo base_url()?>admin.php/inbox/">Bo&icirc;tes de r&eacute;ception</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/outbox/">Bo&icirc;tes d'envoi</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/outbox/message">Envoyer un message</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/outbox/message_group">Envoyer un message aux groupes</a></li>
       		 
       </ul>
      </li>
      <?php endif ?>
     <li class="dropdown" id="menu_sim"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-money"></i><span>SIM</span> <b class="caret"></b></a>
       <ul class="dropdown-menu">
       		<li><a href="<?php echo base_url()?>admin.php/sim/produit/">Listes des produits</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/sim/prix/">Prix du Riz</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/sim/prix/prod/autre">Prix d'autres produits</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/sim/offre_demande/">Offre et demande</a></li>
       </ul>
      </li>
       <li class="dropdown" id="menu_graph"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bar-chart"></i><span>Stats & Graphs</span> <b class="caret"></b></a>
       <ul class="dropdown-menu">
       		<li><a href="<?php echo base_url()?>admin.php/graph/user">Utilisateurs</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/graph/message">SMS reçus et envoyés</a></li>
       		<li class="divider"></li>
       		<li><a href="<?php echo base_url()?>admin.php/graph/prix">Prix du Riz</a></li>
       		<li><a href="<?php echo base_url()?>admin.php/graph/prix/autre">Prix d'autres produits</a></li>
       </ul>
      </li>
      <li class="dropdown" id="menu_op"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-group"></i><span>BDD OP</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
          <li><a href="<?php echo base_url()?>admin.php/op/op">Toutes les OP</a></li>
          <li><a href="<?php echo base_url()?>admin.php/op/op/import">Importer</a></li>
          <li class="divider"></li>
        </ul>
      </li>
      <li id="menu_media"><a href="<?php echo base_url()?>admin.php/media/"> <i class="icon-picture"></i> <span>M&eacute;dias</span> </a></li>
      <?php if ($user["idgroup"] == 1) :?>
      <li id="menu_file"><a href="<?php echo base_url()?>admin.php/file/"> <i class="icon-file"></i> <span>Fichiers</span> </a></li>
      <?php endif ?>
      <li class="dropdown" id="menu_divers"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-share-alt"></i> <span>Divers</span> <b class="caret"></b> </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url()?>admin.php/region">Listes des R&eacute;gions & Districts</a></li>
          <li class="divider"></li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- /container --> 
</div>
<!-- /subnavbar-inner -->