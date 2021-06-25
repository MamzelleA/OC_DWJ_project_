<?php $this->_title = 'Petit oubli...'; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/forget.png" alt="icone oubli">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">oups, j'ai oublie mon mot de passe...</h3>
      <h4 class="heading-title-h4">Je définis un nouveau mot de passe.</h4>
    </div>
  </div>
  <div class="content-zone my-5">
  <?php if(isset($alert)) : ?>
		<div class="alert alert-dark alert-dismissible fade show ml-3" role="alert">
			<?=$alert?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
  <?php endif; ?>
    <div class="text-center" id="forget-form">
      <p>Afin de définir un nouveau mot de passe, veuillez renseigner le champs ci-dessous.</p>
      <form name="form-forget" action="forget.html" method="POST">
        <div class="form-group align-items-center row">
            <div class="col-sm-4 offset-sm-2 text-sm-right">
              <label class="mr-1" for="email-forget">Email renseigné lors de l'inscription</label>
            </div>
            <div class="col-sm text-sm-left">
              <input type="email" name="email-forget" id="email-forget" value="<?php if(isset($_SESSION['email-help'])) : $_SESSION['email-help']; endif;?>">
            </div>
        </div>
        <input class="btn btn-outline-dark mt-3 link-card text-uppercase" id="valid-forget" name="valid-forget" type="submit" value="envoyer">
        <a class="btn btn-outline-dark mt-3 link-card text-uppercase" id="cancel-forget" href="connexion.html" title="retour page connexion">annuler</a>
      </form>
    </div>
  </div>
</div>
