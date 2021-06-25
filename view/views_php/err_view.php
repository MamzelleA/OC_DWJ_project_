<?php $this->_title = 'Oups...'; ?>
<div class="text-center mx-lg-3 mx-1 my-5">
  <img class="img-fluid my-3" src="public/images/icon8/deception.png" alt="icône déçu">
  <h3 class="mt-3 mb-5 border-bottom border-dark pb-5 text-uppercase heading-title-h3">...vous rencontrez un problème.</h3>
  <h4 class="my-5 heading-title-h4 font-weight-bold">Erreur <?=$errCode?></h4>
  <h4 class="my-5 heading-title-h4"><?=$errMessage?></h4>
  <?php if(isset($_SESSION['admin-conn_token'])) : ?>
  <a class="btn btn-outline-dark my-5 link-card text-uppercase" href="admin.html">revenir à l'accueil</a>
  <?php else : ?>
  <a class="btn btn-outline-dark my-5 link-card text-uppercase" href="home.html">revenir à l'accueil</a>
  <?php endif; ?>
</div>
