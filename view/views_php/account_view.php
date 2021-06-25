<?php $this->_title = 'Profil'; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/user.png" alt="icone compte">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">profil</h3>
      <h4 class="heading-title-h4">Je gère mon compte.</h4>
    </div>
  </div>
  <?php if(isset($_COOKIE['alert']) || isset($alert)) : ?>
    <div class="alert alert-dark alert-dismissible fade show fade-alert" role="alert">
      <?php if (isset($_COOKIE['alert'])) : echo $_COOKIE['alert'];
      elseif(isset($alert)) : echo $alert;
      endif; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
  <?php endif; ?>
  <div class="content-zone my-5 ml-3">
    <h4 class="text-left text-uppercase border-bottom pb-1">mes informations personnelles</h4>
    <div class="row">
      <div class="col-lg-2 wght-bold">
        <p class="text-lg-right text-left">Identifiant</p>
      </div>
      <div class="col-lg">
        <p class="text-left mb-0"><?= $pseudo ?></p>
        <small class="text-muted">L'identifiant ne peut-être modifié.</small>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-2 font-weight-bold">
        <p class="text-lg-right text-left">Nom</p>
      </div>
      <div class="col-lg">
        <p class="text-left"><?= $lastname ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2 font-weight-bold">
        <p class="text-lg-right text-left">Prénom</p>
      </div>
      <div class="col-lg">
        <p class="text-left"><?= $firstname ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-2 font-weight-bold">
        <p class="text-lg-right text-left">E-mail</p>
      </div>
      <div class="col-lg">
        <p class="text-left"><?= $email ?></p>
      </div>
    </div>
    <div class="row border-top">
      <button class="btn btn-outline-dark mt-3 link-card text-uppercase" id="modify-info">modifier mes informations</button>
    </div>
    <div class="d-none text-center mt-3" id="div-modify-info">
      <p class="text-center">Veuillez renseigner les champs que vous souhaitez modifier.</p>
      <form name="form-modify-info" action="" method="POST" onsubmit="return validate()">
        <div class="form-group align-items-center row">
            <div class="col-sm-3 offset-sm-2 text-sm-right">
              <label class="mr-1" for="lastname">Nom</label>
            </div>
            <div class="col-sm text-sm-left">
              <input type="text" name="lastname" value="<?=$lastname?>" required>
            </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="firstname">Prénom</label>
          </div>
          <div class="col-sm text-sm-left">
            <input class="mr-1" type="text" name="firstname" value="<?=$firstname?>" required>
          </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="email">Email</label>
          </div>
          <div class="col-sm text-sm-left">
            <input class="mr-1" type="email" name="email" value="<?=$email?>" required>
          </div>
        </div>
        <input class="btn btn-outline-dark mt-3 text-uppercase" name="valid-modify-info" type="submit" value="valider">
      </form>
    </div>
    <div class="row">
      <button class="btn btn-outline-dark mt-3 link-card text-uppercase" id="modify-pw">modifier mon mot de passe</button>
    </div>
    <div class="d-none text-center mt-3" id="div-modify-pw">
      <p class="text-center">Pour modifier votre mot de passe, veuillez complèter tous les champs ci-dessous.</p>
      <form name="form-modify-pw" action="" method="POST" onsubmit="return validate()">
        <div class="form-group align-items-center row">
            <div class="col-sm-3 offset-sm-2 text-sm-right">
              <label class="mr-1" for="old-pw">Mot de passe</label>
            </div>
            <div class="col-sm text-sm-left">
              <input type="password" name="old-pw" required>
            </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="new-pw">Nouveau mot de passe</label>
          </div>
          <div class="col-sm text-sm-left">
            <input type="password" name="new-pw" required>
            <img class="img-fluid" id="pw-help" src="public/images/icon8/help.png" title="Doit contenir entre 6 et 15 caractères dont 1 majuscule, 1 minuscule et 1 chiffre."/>
          </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="confirm-new-pw">Confirmer le mot de passe</label>
          </div>
          <div class="col-sm text-sm-left">
            <input type="password" name="confirm-new-pw" required>
          </div>
        </div>
        <input class="btn btn-outline-dark mt-3 text-uppercase" name="valid-modify-pw" type="submit" value="valider">
      </form>
    </div>
    <div class="row">
      <input class="btn btn-outline-dark mt-3 link-card text-uppercase" id="del-account" name="del-account" type="submit" value="supprimer le compte"/>
    </div>
    <div class="d-none text-center mt-3" id="div-del-account">
      <p class="text-center">Pour supprimer votre compte, vous devez vous identifier à nouveau. Veuillez complèter tous les champs ci-dessous.</p>
      <form name="form-del-account" action="" method="POST">
        <div class="form-group align-items-center row">
            <div class="col-sm-3 offset-sm-2 text-sm-right">
              <label class="mr-1" for="del-pseudo">Identifiant</label>
            </div>
            <div class="col-sm text-sm-left">
              <input type="text" name="del-pseudo" required>
            </div>
        </div>
        <div class="form-group align-items-start row">
          <div class="col-sm-3 offset-sm-2 text-sm-right">
            <label class="mr-1" for="del-pw">Mot de passe</label>
          </div>
          <div class="col-sm text-sm-left">
            <input type="password" name="del-pw" required>
          </div>
        </div>
        <input class="btn btn-outline-dark mt-3 text-uppercase" id="valid-del-account" name="valid-del-account" type="submit" value="valider">
      </form>
    </div>
  </div>
</div>
