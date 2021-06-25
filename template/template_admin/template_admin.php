<?php
ob_start();
?>
<body class="templates">
  <header class="container-fluid px-0">
    <div class="header-site text-center pt-1">
      <a class="py-3" href="home.html">
        <img class="img-fluid icon8-big" id="logo-pyramide" src="public/images/logo/logo-white.png" alt="logo pyramide">
      </a>
      <h1 class="pt-3 text-white header-site-h1">DESTINATION : LOUVRE</h1>
      <h2 class="pb-3 text-white">Administration du site</h2>
    </div>
    <?php if(isset($_SESSION['admin-conn_token'])) : ?>
    <nav class="text-center navbar navbar-expand p-0 rounded-0" id="nav-admin">
      <div class="bg-self d-flex flex-column justify-content-around align-items-center my-0 w-100" id="navbarAdmin">
        <ul class="navbar-nav text-center">
          <li <?php if($title == 'Admin') : echo 'class="active nav-item text-uppercase color-dark wght-bold"'; else : echo'class="nav-item"'; endif;?>>
            <a class="nav-link" href="admin.html">Accueil</a>
          </li>
          <li <?php if($title == 'Pages') : echo 'class="active nav-item dropdown text-uppercase color-dark wght-bold"'; else : echo 'class="nav-item dropdown text-lg-center pl-3 pl-lg-1"'; endif; ?>>
            <a class="nav-link dropdown-toggle" href="datas.html" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="home.html">Accueil site</a>
              <a class="dropdown-item" href="site.html">Site</a>
              <a class="dropdown-item" href="museum.html">Musée</a>
              <a class="dropdown-item" href="preparation.html">Préparation</a>
              <a class="dropdown-item" href="visit.html">Visite</a>
            </div>
          </li>
          <li <?php if($title == 'Membres') : echo 'class="active nav-item text-uppercase color-dark wght-bold"'; else : echo 'class="nav-item text-lg-center pl-3 pl-lg-1"'; endif; ?>>
            <a class="nav-link" href="members.html">Membres</a>
          </li>
          <li <?php if($title == 'Données') : echo 'class="active nav-item dropdown text-uppercase color-dark wght-bold"'; else : echo 'class="nav-item dropdown text-lg-center pl-3 pl-lg-1"'; endif; ?>>
            <a class="nav-link dropdown-toggle" href="datas.html" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Données</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="entrances-datas.html">Entrées</a>
              <a class="dropdown-item" href="titles-datas.html">Titres d'accès</a>
              <a class="dropdown-item" href="hours-datas.html">Horaires</a>
              <a class="dropdown-item" href="rooms-datas.html">Salles</a>
              <a class="dropdown-item" href="artworks-datas.html">Oeuvres</a>
              <a class="dropdown-item" href="tours-datas.html">Parcours</a>
            </div>
          </li>
          <li <?php if($title == 'Profil') : echo 'class="active nav-item text-uppercase color-dark wght-bold"'; else : echo'class="nav-item text-lg-center pl-3 pl-lg-1"'; endif; ?>>
            <a class="nav-link" href="account.html">Profil</a>
          </li>
          <li class="nav-item align-items-center mb-3 mb-lg-0 ">
            <a class="nav-link" href="disconnect.html" title="déconnexion"><img class="img-fluid icon8-xsmall" alt="icône déconnexion" src="public/images/icon8/logout.png"></a>
          </li>
        </ul>
      </div>
    </nav>
  <?php endif; ?>
  </header>
  <section class="container-fluid mb-3">
    <?=$page?>
  </section>
</body>
<?php
$template = ob_get_clean();
include '/home/mamzelle/public_html/projet5/template/template.php';
?>
