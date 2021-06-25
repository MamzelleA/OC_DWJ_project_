<?php $this->_title = 'Connexion'; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/intellectual.png" alt="icône administrateur">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">espace administration</h3>
      <h4 class="heading-title-h4">Accès restreint</h4>
    </div>
  </div>
  <div class="content-zone my-5">
  <div class="content-zone my-5 mx-3">
    <?php if(isset($_COOKIE['alert']) || isset($alert)) : ?>
      <div class="alert alert-dark alert-dismissible fade show mx-3 fade-alert" role="alert">
        <?php if(isset($_COOKIE['alert'])){echo $_COOKIE['alert'];}
        elseif(isset($alert)){echo $alert;} ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif; ?>
    <div class="text-center" id="connexion-admin-form">
      <p>Pour accéder à cet espace, vous devez avoir les droits administrateur.</p>
      <p>Veuillez renseigner les champs ci-dessous pour vous connecter.</p>
      <form name="admin-conn" action="dlad.html" method="POST">
        <div class="form-group align-items-center row">
            <div class="col-sm-3 offset-sm-2 text-sm-right">
              <label class="mr-1" for="pseudo-admin-conn">Identifiant</label>
            </div>
            <div class="col-sm text-sm-left">
              <input type="text" name="pseudo-admin-conn" id="pseudo-admin-conn">
            </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="pw-admin-conn">Mot de passe</label>
          </div>
          <div class="col-sm text-sm-left">
            <input class="mr-1" type="password" name="pw-admin-conn" id="pw-admin-conn">
          </div>
        </div>
        <input class="btn btn-outline-dark mt-3 link-card text-uppercase" name="valid-admin-conn" type="submit" value="valider">
      </form>
    </div>
  </div>
</div>
</div>
