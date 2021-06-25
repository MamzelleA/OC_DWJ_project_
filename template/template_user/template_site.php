<?php
ob_start();
?>
<body class="templates">
	<header class="container-fluid px-0">
		<div class="header-site text-center pt-1">
				<img class="icon8-big" id="logo-pyramide" src="public/images/logo/logo-white.png" alt="logo pyramide">
				<h1 class="pt-1 pt-lg-3 text-white header-site-h1 my-0">DESTINATION : LOUVRE</h1>
				<h2 class="pb-1 pb-lg-3 text-white">Se préparer pour mieux profiter.</h2>
		</div>
		<nav class="text-lg-center text-left navbar navbar-expand-lg p-0 rounded-0" id="nav-user">
			<button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle nav-user">
				<i class="fas fa-bars" title="Ouvrir Menu" id="menu-sandwich"></i>
				<i class="fas fa-times" title="Fermer Menu" id="menu-close"></i>
			</button>
			<div class="collapse navbar-collapse bg-self d-lg-flex flex-lg-row flex-column justify-content-lg-around align-items-lg-center my-0" id="navbarSupportedContent">
				<ul class="navbar-nav text-center">
					<li <?php if($this->_title == 'Accueil') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo'class="nav-item pl-0 pl-lg-1"'; endif;?>>
						<a class="nav-link" href="home.html">Accueil</a>
					</li>
					<li <?php if($this->_title == 'Le site') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo 'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif; ?>>
						<a class="nav-link" href="site.html">Le site</a>
					</li>
					<li <?php if($this->_title == 'Le musée') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo 'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif; ?>>
						<a class="nav-link" href="museum.html">Le musée</a>
					</li>
					<li <?php if($this->_title == 'Préparation') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif; ?>>
						<a class="nav-link" href="preparation.html">Préparation</a>
					</li>
					<?php if(isset($_SESSION['form-conn_token'])) : ?>
						<li <?php if($this->_title == 'Visite') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo 'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif;?>>
							<a class="nav-link" href="visit.html">Visite</a>
						</li>
						<li <?php if($this->_title == 'Profil') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo 'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif; ?>>
							<a class="nav-link" href="account.html">Profil</a>
						</li>
						<li class="nav-item align-items-center mb-3 mb-lg-0 ">
							<a class="nav-link" href="disconnect.html" title="déconnexion"><img class="img-fluid icon8-small pl-0 pl-lg-1" alt="icône déconnexion" src="public/images/icon8/logout.png"></a>
						</li>
					<?php else : ?>
						<li <?php if($this->_title == 'Connexion') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-0 pl-lg-1"'; else : echo'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif; ?>>
							<a class="nav-link" href="connexion.html">Connexion</a>
						</li>
						<li <?php if($this->_title == 'Inscription') : echo 'class="active nav-item text-uppercase color-dark wght-bold pl-à pl-lg-1"'; else : echo'class="nav-item text-lg-center pl-0 pl-lg-1"'; endif; ?>>
							<a class="nav-link" href="suscribe.html">Inscription</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</header>
	<section class="container-fluid mb-3">
		<?=$page?>
	</section>
	<footer class="page-footer container-fluid text-white py-1">
		<div class="row">
			<div class="col-md-3 text-center">
				<a target="_blank" href="https://www.louvre.fr">
					<img class="img-fluid icon8-size" id="officiel" src="public/images/icon8/pyramide_w.png" alt="logo pyramide">
					<p class="mb-1">Site<br>officiel</p>
				</a>
			</div>
			<div class="col-md-6 text-center">
				<a href="https://www.instagram.com/explore/tags/destinationlouvre/" target="_blank" title="tag destination louvre">
					<img class="img-fluid icon8-size" id="instagram" src="public/images/icon8/instagram.png" alt="logo instagram">
					<p class="mb-1">Partagez vos souvenirs sur Instagram<br>#destinationLouvre</p>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a target="_blank" href="https://icones8.fr">
					<img class="img-fluid icon8-size" id="icon8" src="public/images/icon8/icon8_w.png" alt="logo icon8">
					<p class="mb-1">Icônes par<br>Icons8</p>
				</a>
			</div>
		</div>
		<div class="p-1 mt-1">
			<h4 class="text-center">- <a href="legal.html">Mentions légales</a> -</h4>
			<h4 class="text-center my-1"><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img class="img-fluid icon8-big" alt="Licence Creative Commons" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a></h4>
		</div>
		<div class="p-1">
			<p class="small text-center">Site créé par Agnès Masetty dans le cadre de la formation Développeur Web Junior d'OpenClassrooms | mars 2021</p>
		</div>
	</footer>
	<script src="public/js/cookiechoices.js"></script>
    <script>document.addEventListener('DOMContentLoaded', function(event){cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir une meilleure expérience. Ces cookies sont uniquement fonctionnels et ils sont détruits à la fin de la session.<br>', 'Je comprends', 'En savoir plus', 'https://projet5.mamzellea.fr/legal.html"cookies');});</script>
</body>
<?php
$template = ob_get_clean();
include '/home/mamzelle/public_html/projet5/template/template.php';
?>
