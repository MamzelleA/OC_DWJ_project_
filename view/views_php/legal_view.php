<?php $this->_title = 'Mentions légales'; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/legal.png" alt="icone légal">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">mentions légales</h3>
    </div>
  </div>
  <?php if(isset($_COOKIE['alert'])) : ?>
  <div class="alert alert-dark alert-dismissible fade show mt-3 mx-0 fade-alert" role="alert">
  	<?=$_COOKIE['alert']?>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <?php endif; ?>
  <div class="content-zone my-5 ml-3">
    <h4 class="heading-title-h4 text-uppercase border-bottom border-dark pb-1"><img class="img-fluid mr-1" src="public/images/icon8/owner.png" alt="icone propriétaire"> propriétaire</h4>
    <p class="text-justify">
      Agnès MASETTY<br>
      Paris 19<br>
      agnes.masetty@mamzellea.fr
    </p>
    <h4 class="heading-title-h4 text-uppercase border-bottom border-dark pb-1"><img class="img-fluid mr-1" src="public/images/icon8/local.png" alt="icone hébergement"> hébergement</h4>
    <p class="text-justify">
      OBAMBU SARL<br>
      RCS Paris 80398875700016<br>
      10 rue de Penthièvre<br>
      75008 Paris<br>
      <a href="https://www.obambu.com" target="blank">Site internet</a>
    </p>
    <h4 class="heading-title-h4 text-uppercase border-bottom border-dark pb-1"><img class="img-fluid mr-1" src="public/images/icon8/important.png" alt="icone important"> remarque importante</h4>
    <p class="text-justify">Ce site a été développé dans le cadre de la formation Développeur Web Junior d'<a href="https://www.openclassrooms.com" target="blank">OPENCLASSROOMS</a>.</p>
    <p class="text-justify">De ce fait, les informations concernant le Musée du Louvre données dans ce site peuvent être erronées ou caduques.</p>
    <h4 class="heading-title-h4 text-uppercase border-bottom border-dark pb-1" id="cookies"><img class="img-fluid mr-1" src="public/images/icon8/cookie.png" alt="icone cookie"> cookies</h4>
    <p class="text-justify">Ce site utilise des cookies uniquement à des fins de fonctionnement. Ils ne contiennent aucune information personnelle laissée par l'utilisateur. Ils expirent au maximum au bout de 3 secondes.</p>
    <h4 class="heading-title-h4 text-uppercase border-bottom border-dark pb-1"><img class="img-fluid mr-1" src="public/images/icon8/intellectual.png" alt="icone propriété"> propriété intellectuelle</h4>
    <h4 class="text-uppercase ml-5"><img class="img-fluid mr-1" src="public/images/icon8/image.png" alt="icone illustration"> illustrations</h4>
    <p class="text-justify ml-5">Les plans et illustrations (hors Icônes, voir ci-après) de ce site sont la propriété exclusive d'Agnès Masetty.</p>
    <p class="text-justify ml-5">Ils sont mis à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" class="font-italic">Licence Creative Commons Attribution - Pas d’Utilisation Commerciale - Partage dans les Mêmes Conditions 4.0 International</a>.</p>
    <h4 class="text-uppercase ml-5"><img class="img-fluid mr-1" src="public/images/icon8/photo.png" alt="icone photographies"> photographies</h4>
    <p class="text-justify ml-5">Toutes les photographies d'oeuvres utilisées dans ce site proviennent de l' <a href="https://www.photo.rmn.fr/C.aspx?VP3=CMS3&VF=Home" target="blank" class="font-weight-bold">Agence photo RMN-Grand Palais</a> à l'exception de celle de la Galerie Tactile qui provient du site du <a href="https://www.louvre.fr/pistes-de-visite/premiers-pas-au-musee-du-louvre" target="blank" class="font-weight-bold">Musée du Louvre / Antoine Mongodin</a>.</p>
    <h4 class="text-uppercase ml-5"><img class="img-fluid mr-1" src="public/images/icon8/icon8_b.png" alt="icone illustration"> icônes</h4>
    <div class="ml-5">
      <p class="text-justify"> Les icônes proviennent toutes du site <a href="https://icons8.com/" target="blank" class="font-weight-bold">ICON8</a>, vous trouverez ci-dessous la liste des icônes utilisées ainsi qu'un lien vers la page correspondante pour chaque icône.</p>
      <?=$icon?>
    </div>
    <h4 class="text-uppercase ml-5 pt-1"><img class="img-fluid mr-1" src="public/images/icon8/design.png" alt="icone web design"> outils de développement</h4>
    <p class="text-justify ml-5">Ce site a été développé en utilisant <a href="https://getbootstrap.com/" target="blank" class="wght-bold text-uppercase">bootstrap (v4.5)</a> et <a href="https://jquery.com/" target="blank" class="font-weight-bold">jQUERY (v3.5.1)</a>.</p>
  </div>
 </div>
