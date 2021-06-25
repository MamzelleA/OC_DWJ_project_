<?php $this->_title = 'Connexion'; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/adherent.png" alt="icone membre">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">espace membre</h3>
      <h4 class="heading-title-h4">Je me connecte à mon espace.</h4>
    </div>
  </div>
  <div class="content-zone my-5">
  <?php if (isset($alert)) : ?>
		<div class="alert alert-dark alert-dismissible fade show ml-3" role="alert">
			<?=$alert?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
  <?php elseif(isset($_COOKIE['alert'])) : ?>
    <div class="alert alert-dark alert-dismissible fade show ml-3 fade-alert" role="alert">
      <?=$_COOKIE['alert']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>
    <div class="text-center" id="connexion-form">
      <p>Pour accéder à cet espace, vous devez être membre. Pas encore membre ? Rendez-vous <a href="suscribe.html" class="text-uppercase">ici</a>.</p>
      <p>Veuillez renseigner les champs ci-dessous pour vous connecter à votre espace membre.</p>
      <form name="form-conn" action="connexion.html" method="POST">
        <div class="form-group align-items-center row">
            <div class="col-sm-3 offset-sm-2 text-sm-right">
              <label class="mr-1" for="pseudo-conn">Identifiant</label>
            </div>
            <div class="col-sm text-sm-left">
              <input type="text" name="pseudo-conn" id="pseudo-conn">
            </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="pw-conn">Mot de passe</label>
          </div>
          <div class="col-sm text-sm-left">
            <input class="mr-1" type="password" name="pw-conn" id="pw-conn">
            <a  id="forget-help" class="form-text text-muted mt-0" href="forget.html" title="oubli mot de passe"><small>Oups, j'ai oublié mon mot de passe !</small></a>
          </div>
        </div>
        <input class="btn btn-outline-dark mt-3 text-uppercase" name="valid-conn" type="submit" value="valider">
      </form>
    </div>
  </div>
</div>
