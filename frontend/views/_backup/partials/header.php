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
          <li><a href="/contact">
            <?= ucwords(lang('contact'))?>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Navigation bar ends -->
