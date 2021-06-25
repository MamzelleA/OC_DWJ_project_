<?php $this->_title = "Les entrées";?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/entrance.png" alt="icône entrées">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">les entrées</h3>
      <h4 class="heading-title-h4">Gestion des entrées.</h4>
    </div>
  </div>
  <div class="row select-zone mt-lg-5">
    <?php if (isset($alert)) : ?>
      <div class="alert alert-dark alert-dismissible fade show ml-3" role="alert">
        <?=$alert?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif;
    if(isset($_GET['action'])) :
        if($_GET['action'] == 'update') : ?>
        <div class="row w-100 text-center" id="update-form-entrance">
          <h3 class="text-uppercase w-100 mt-5">en construction</h3>
          <div class="w-100 mb-5"><a class="btn btn-outline-dark update-entrance-btn text-uppercase" href="entrances-datas.html" title="retour">retour</a></div>
          <form method="POST" action="entrances-datas.html" class="w-100 d-none">
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1" for="static-id">Id entrée :</label>
              </div>
              <div class="col text-left">
                <input readonly class="form-control-plaintext" name="static-id" value="<?=$entrance['id']?>">
              </div>
            </div>
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1" for="name-ti">Nom entrée :</label>
              </div>
              <div class="col text-left">
                <input id="input-name-ti" name="name-ti" value="<?=$entrance['location']?>"/>
              </div>
            </div>
            <?php foreach ($entrance['lines'] as $li) : ?>
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1" for="color">Couleur file :</label>
              </div>
              <div class="col text-left">
                <input id="input-color" name="color" value="<?=$li?>"/>
              </div>
            </div>
            <?php endforeach; ?>
            <input type="submit" name="update-entrance" class="btn btn-outline-dark update-entrance-btn text-uppercase" id="update-valid-entrance-<?=$entrance['id']?>" value="valider"/>
            <a class="btn btn-outline-dark update-entrance-btn text-uppercase" id="cancel-entrance-<?=$entrance['id']?>" href="entrances-datas.html">annuler</a>
          </form>
        </div>
      <?php elseif($_GET['action'] == 'delete') : ?>
        <div class="row w-100 text-center" id="delete-form-entrance">
          <p class="text-justify mx-3 d-none">Vous devez confirmer la suppresion du titre sélectionné et de ses données associées :</p>
          <h3 class="text-uppercase w-100 mt-5">en construction</h3>
          <div class="w-100 mb-5"><a class="btn btn-outline-dark update-entrance-btn text-uppercase" href="entrances-datas.html" title="retour">retour</a></div>
        </div>
      <?php elseif($_GET['action'] == 'create') : ?>
        <div class="row m-3 text-center w-100">
          <h3 class="text-uppercase w-100 mt-5">en construction</h3>
          <div class="w-100 mb-5"><a class="btn btn-outline-dark update-entrance-btn text-uppercase" href="entrances-datas.html" title="retour">retour</a></div>
        </div>
        <div class="row m-3 text-left w-100 d-none" id="add-form-entrance">
          <form method="POST" action="">
            <div class="form-group row">
              <div class="col-4 text-right">
                <label class="mr-1" for="name-ti">Nom entrée :</label>
              </div>
              <div class="col-6 text-left">
                <input id="input-name-ti" name="add-name-ti"/>
              </div>
            </div>
            <div class="form-group align-items-center row" id="div-form-add-<?=$count?>">
              <div class="col-4 text-right align-items-center" id="label-entrance">
                <label class="mr-1" for="color-id-<?=$count?>">Couleur file :</label>
              </div>
              <div class="col-6 text-left">
                <input class="input-id-entrance" id="input-color-<?=$count?>" name="add-entrance-id-<?=$count?>"/>
              </div>
              <div class="col-2 text-left">
                <span class="ml-3 py-3 add-field" id="add-field-color"><img class="img-fluid icon8-small mr-1" src="public/images/icon8/add_row.png" alt="icône ajouter" title="ajouter un champs"/></span>
              </div>
            </div>
            <div class="text-left w-100 mt-3">
              <input type="button" name="update-entrance" class="btn btn-outline-dark valid-add-btn text-uppercase mr-1" id="update-valid-entrance-<?=$entrance['id']?>" value="en construction"/>
              <a class="btn btn-outline-dark cancel-add-btn text-uppercase" id="cancel-entrance-add" href="entrances-datas.html">annuler</a>
            </div>
          </form>
        </div>
      <?php endif;
    else : ?>
    <div class="row mx-3 w-100">
      <a class="btn btn-outline-dark text-uppercase btn-link-add" href="entrances-datas.html/action-create" id="add-entrance-link">ajouter</a>
    </div>
    <div class="row m-3 text-left w-100">
        <p class="col pl-3 mr-3 text-uppercase jaune py-1 small">Sans titre et Accès gratuit</p>
        <p class="col pl-3 mr-3 text-uppercase bleue py-1 small">Personne handicapée</p>
        <p class="col pl-3 mr-3 text-uppercase noire py-1 small">Accès libre</p>
        <p class="col pl-3 text-uppercase verte pl-1 small">E-billet</p>
    </div>
    <div class="table-responsive text-left mx-3 table-hover" id="entrances-datas-table">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class="text-uppercase text-left" scope="col">entrée</th>
            <th class="text-uppercase text-center" scope="col">files</th>
            <th class="text-uppercase text-center" scope="col"></th>
          </tr>
        </thead>
        <tbody id="entrances-datas-body">
            <?php foreach ($entrances as $en) : ?>
              <tr>
                <td class="text-left align-middle"><?=$en['location']?></td>
                <td class="text-center align-middle">
                <?php foreach ($en['lines'] as $li) : ?>
                  <span class="<?=$li?> px-3 py-1 mx-1"></span>
                <?php endforeach; ?>
                </td>
                <td class="text-center align-middle">
                  <a class="btn btn-outline-dark update-entrance-btn text-uppercase mb-1 w-100" id="update-entrance-<?=$en['id']?>" href="entrances-datas.html/entrances/entrance-<?=$en['id']?>/action-update">modifier</a>
                    <a class="btn btn-outline-dark delete-entrance-btn text-uppercase mb-1 w-100" id="delete-entrance-<?=$en['id']?>" href="entrances-datas.html/entrances/entrance-<?=$en['id']?>/action-delete">supprimer</a>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
  </div>
</div>