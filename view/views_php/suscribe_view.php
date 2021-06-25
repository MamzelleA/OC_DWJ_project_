<?php $this->_title = 'Inscription'; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid icon8-size" src="public/images/icon8/add_user.png" alt="icone ajout membre">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">inscription</h3>
      <h4 class="heading-title-h4">Profitez de l'expérience jusqu'au bout</h4>
    </div>
  </div>
  <div class="content-zone my-5">
    <div class="text-center">
      <p>Veuillez renseigner tous les champs ci-dessous pour créer votre espace membre.</p>
    </div>
    <?php if(isset($_COOKIE['alert']) || isset($alert)) : ?>
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
      <?php if(isset($alert)) : echo $alert;
      elseif(isset($_COOKIE['alert'])) : echo $_COOKIE['alert'];
      endif; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
    <?php endif; ?>
    <div class="text-center">
      <form action="suscribe.html" method="POST">
        <div class="form-group align-items-center row">
            <div class="col-lg-3 offset-lg-2 text-lg-right">
              <label class="mr-1" for="lastname">Nom</label>
            </div>
            <div class="col-lg text-lg-left">
              <input type="text" name="lastname" id="lastname" value="<?php if(isset($_SESSION['last'])): echo $_SESSION['last']; endif;?>" required>
            </div>
        </div>
        <div class="form-group align-items-center row">
            <div class="col-lg-3 offset-lg-2 text-lg-right">
              <label class="mr-1" for="firstname">Prénom</label>
            </div>
            <div class="col-lg text-lg-left">
              <input type="text" name="firstname" id="firstname" value="<?php if(isset($_SESSION['first'])): echo $_SESSION['first']; endif;?>" required>
            </div>
        </div>
        <div class="form-group align-items-center row">
            <div class="col-lg-3 offset-lg-2 text-lg-right">
              <label class="mr-1" for="email">E-mail</label>
            </div>
            <div class="col-lg text-lg-left">
              <input type="email" name="email" id="email" value="<?php if(isset($_SESSION['email'])) : echo $_SESSION['email']; endif;?>" required>
            </div>
        </div>
        <div class="form-group align-items-center row" id="my-pot">
            <div class="col-lg-3 offset-lg-2 text-lg-right">
              <label class="mr-1" for="email-checking">Ce champs doit rester vide *</label>
            </div>
            <div class="col-lg text-lg-left">
              <input type="email" name="email-checking" id="email-checking">
            </div>
        </div>
        <div class="form-group align-items-start row">
            <div class="col-lg-3 offset-lg-2 text-lg-right">
              <label class="mr-1" for="pseudo">Identifiant</label>
            </div>
            <div class="col-lg text-lg-left">
              <input class="mr-1" type="text" name="pseudo" id="pseudo" value="<?php if(isset($_SESSION['pseudo'])): echo $_SESSION['pseudo']; endif;?>" required>
              <img class="icon8-xsmall pw-help" src="public/images/icon8/help.png" title="Peut contenir entre 2 et 15 caractères alphanumériques et - _"/>
            </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-lg-3 offset-lg-2 text-lg-right">
            <label class="mr-1" for="suscribe-pw">Mot de passe</label>
          </div>
          <div class="col-lg text-lg-left">
            <input class="mr-1" type="password" name="password" id="suscribe-pw" required>
            <img class="icon8-xsmall pw-help" src="public/images/icon8/help.png" title="Doit contenir entre 6 et 15 caractères dont 1 majuscule, 1 minuscule et 1 chiffre."/>
          </div>
        </div>
        <div class="form-group align-items-center row">
          <div class="col-lg-3 offset-lg-2 text-lg-right">
            <label class="mr-1" for="confirm-pw">Confirmer le mot de passe</label>
          </div>
          <div class="col-lg text-lg-left">
            <input class="mr-1" type="password" name="confirm-pw" id="confirm-pw" required>
          </div>
        </div>
        <input class="btn btn-outline-dark mt-3 link-card text-uppercase" name="valid-suscribe" type="submit" value="valider">
      </form>
    </div>
  </div>
</div>
