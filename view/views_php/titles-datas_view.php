<?php $this->_title = "Les titres d'accès";?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/billetterie.png" alt="icône titre d'accès">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">les titres d'accès</h3>
      <h4 class="heading-title-h4">Gestion des titres d'accès.</h4>
    </div>
  </div>
  <div class="row display-title-zone mt-lg-5">
    <?php if(isset($alert) || isset($_COOKIE['alert'])) : ?>
      <div class="alert alert-dark alert-dismissible fade show mx-3 w-100" role="alert">
        <?php if(isset($alert)) :  echo $alert;
        elseif(isset($_COOKIE['alert'])) : echo $_COOKIE['alert'];
        endif; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif;?>
  </div>
  <?php if(isset($_GET['title'])) : 
    if(isset($_GET['action'])) :
      if($_GET['action'] == 'update') : ?>
      <div class="row w-100 text-center" id="update-form-title">
        <form method="POST" action="titles-datas.html/titles/title-<?=$ti['id']?>/action-update" class="w-100">
          <div class="form-group align-items-center row">
            <div class="col-3 offset-2 text-right">
              <label class="mr-1 mb-0" for="static-id">Id titre :</label>
            </div>
            <div class="col text-left">
              <input readonly class="form-control-plaintext p-0" name="static-id" id="static-id" value="<?=$title['id']?>">
            </div>
          </div>
          <div class="form-group align-items-center row">
            <div class="col-3 offset-2 text-right">
              <label class="mr-1 mb-0" for="name-ti">Nom titre :</label>
            </div>
            <div class="col text-left">
              <input id="input-name-ti" name="name-ti" id="name-ti" value="<?=$title['name_title']?>"/>
            </div>
          </div>
          <div class="form-group align-items-center row">
            <div class="col-3 offset-2 text-right">
              <label class="mr-1 mb-0" for="color">Couleur file :</label>
            </div>
            <div class="col text-left">
              <input id="input-color" name="color" id="color" value="<?=$title['color']?>"/>
            </div>
          </div>
          <?php foreach ($title['entrances'] as $en) :
            ?>
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1 mb-0" for="entrance-id-<?=$count?>">Id entrée :</label>
              </div>
              <div class="col text-left">
                <input id="input-id-entrance" name="entrance-id-<?=$count?>" id="entrance-id-<?=$count?>" value="<?=$en['id']?>"/>
              </div>
            </div>
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1 mb-0" for="static-location-<?=$count?>">Nom entrée :</label>
              </div>
              <div class="col text-left">
                <input readonly class="form-control-plaintext p-0" name="static-location-<?=$count?>" id="static-location-<?=$count?>" value="<?=$en['location']?>"/>
              </div>
            </div>
            <?php $count ++;
          endforeach; ?>
          <input type="submit" name="update-title" class="btn btn-outline-dark update-title-btn text-uppercase" id="update-valid-title-<?=$title['id']?>" value="valider"/>
          <a class="btn btn-outline-dark update-title-btn text-uppercase" id="cancel-title-<?=$title['id']?>" href="titles-datas.html">annuler</a>
        </form>
      </div>
    <?php elseif($_GET['action'] == 'delete') : ?>
      <div class="row w-100 text-center" id="delete-form-title">
        <p class="text-justify mx-3">Vous devez confirmer la suppresion du titre sélectionné et de ses données associées :</p>
        <form method="POST" action="titles-datas.html/titles/title-<?=$ti['id']?>/action-delete" class="w-100">
          <div class="form-group align-items-center row">
            <div class="col-3 offset-2 text-right">
              <label class="mr-1 mb-0" for="static-id">Id titre :</label>
            </div>
            <div class="col text-left">
              <input readonly class="form-control-plaintext p-0" name="static-id-ti"  id="static-id-ti" value="<?=$title['id']?>">
            </div>
          </div>
          <div class="form-group align-items-center row">
            <div class="col-3 offset-2 text-right">
              <label class="mr-1 mb-0" for="static-name-ti-<?=$title['id']?>">Nom titre :</label>
            </div>
            <div class="col text-left">
              <input readonly class="form-control-plaintext p-0" id="static-name-ti-<?=$title['id']?>" name="static-name-ti" value="<?=$title['name_title']?>"/>
            </div>
          </div>
          <div class="form-group align-items-center row">
            <div class="col-3 offset-2 text-right">
              <label class="mr-1 mb-0" for="static-color">Couleur file :</label>
            </div>
            <div class="col text-left">
              <input readonly class="form-control-plaintext p-0" name="static-color" id="static-color" value="<?=$title['color']?>"/>
            </div>
          </div>
          <?php foreach ($title['entrances'] as $en) :
            ?>
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1 mb-0" for="static-en-id-<?=$count?>">Id entrée :</label>
              </div>
              <div class="col text-left">
                <input readonly class="form-control-plaintext p-0" name="static-en-id-<?=$count?>" id="static-en-id-<?=$count?>" value="<?=$en['id']?>"/>
              </div>
            </div>
            <div class="form-group align-items-center row">
              <div class="col-3 offset-2 text-right">
                <label class="mr-1 mb-0" for="static-location-<?=$count?>">Nom entrée :</label>
              </div>
              <div class="col text-left">
                <input readonly class="form-control-plaintext p-0" name="static-location-<?=$count?>" id="static-location-<?=$count?>" value="<?=$en['location']?>"/>
              </div>
            </div>
            <?php $count ++;
          endforeach; ?>
          <input type="submit" name="delete-title" class="btn btn-outline-dark delete-title-input text-uppercase delete" id="delete-confirm-title-<?=$title['id']?>" value="confirmer"/>
          <a class="btn btn-outline-dark delete-title-btn text-uppercase" id="cancel-delete-title-<?=$title['id']?>" href="titles-datas.html">annuler</a>
        </form>
      </div>
    <?php endif; endif;
    else : ?>
    <?php if(isset($_GET['action']) && $_GET['action'] == 'create') : ?>
      <div class="row m-3 text-left w-100" id="add-form">
        <form method="POST" action="">
          <div class="form-group row">
            <div class="col-4 text-right">
              <label class="mr-1" for="add-name-ti">Nom titre :</label>
            </div>
            <div class="col-6 text-left">
              <input id="input-name-ti" name="add-name-ti" id="add-name-ti"/>
            </div>
          </div>
          <div class="form-group align-items-center row">
            <div class="col-4 text-right">
              <label class="mr-1" for="add-color">Couleur file :</label>
            </div>
            <div class="col-6 text-left">
              <input id="input-color" name="add-color" id="add-color"/>
            </div>
          </div>
          <div class="form-group align-items-center row" id="div-form-add-<?=$count?>">
            <div class="col-4 text-right align-items-center" id="label-entrance">
              <label class="mr-1" for="input-id-entrance-<?=$count?>">Id entrée :</label>
            </div>
            <div class="col-6 text-left">
              <input class="input-id-entrance" id="input-id-entrance-<?=$count?>" name="add-entrance-id-<?=$count?>"/>
            </div>
            <div class="col-2 text-left">
              <span class="ml-3 py-3 add-field" id="add-field-title"><img class="img-fluid icon8-small mr-1" src="public/images/icon8/add_row.png" alt="icône ajouter" title="ajouter un champs"/></span>
            </div>
          </div>
          <div class="text-left w-100 mt-3">
            <input type="submit" name="add-title" class="btn btn-outline-dark valid-add-btn text-uppercase mr-1" id="add-valid-title" value="valider"/>
            <a class="btn btn-outline-dark cancel-add-btn text-uppercase" id="cancel-add-title" href="titles-datas.html" title="annuler">annuler</a>
            <input type="hidden" name="hidden-max" id="hidden-max" value="0"/>
          </div>
        </form>
      </div>
    <?php else : ?>
      <div class="row mx-3 w-100">
        <a class="btn btn-outline-dark text-uppercase btn-link-add" id="add-title-link" href="titles-datas.html/action-create" title="ajouter">ajouter</a>
      </div>
      <div class="row ml-3 mt-3 text-left w-100">
        <p class="col pl-3 mr-3 text-uppercase jaune py-1 small">Sans titre et Accès gratuit</p>
        <p class="col pl-3 mr-3 text-uppercase bleue py-1 small">Personne handicapée</p>
        <p class="col pl-3 mr-3 text-uppercase noire py-1 small">Accès libre</p>
        <p class="col pl-3 text-uppercase verte py-1 small">E-billet</p>
      </div>
      <div class="row ml-3 w-100">
        <div class="table-responsive table-hover" id="titles-datas-body">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th class="text-uppercase text-left" scope="col">#</th>
                <th class="text-uppercase text-left" scope="col">titre d'accès</th>
                <th class="text-uppercase text-left" scope="col">file</th>
                <th class="text-uppercase text-left" scope="col" colspan=4>entrées associées</th>
                <th scope="col" colspan=2></th>
              </tr>
            </thead>
            <tbody id="titles-table-body">
              <?php foreach ($titles as $ti) : ?>
                <tr>
                  <td class="text-left align-middle" id="td-id-ti"><?=$ti['id']?></td>
                  <td class="text-left align-middle"><span id="td-name-ti-<?=$ti['id']?>"><?=$ti['name_title']?></span></td>
                  <td class="text-left align-middle" ><span class="<?=$ti['color']?> px-3 py-1" id="td-color-<?=$ti['id']?>"></span></td>
                  <?php foreach ($ti['entrances'] as $en) : ?>
                    <td class="text-left align-middle"><span class="span-class-id-<?=$ti['id']?>" id="span-id-entrance-<?=$ti['id']?>-<?=$en['id']?>"><?=$en['id']?></span></td>
                    <td class="text-left align-middle"><span class="span-class-location-<?=$ti['id']?>" id="span-location-<?=$ti['id']?>-<?=$en['id']?>"><?=$en['location']?></span></td>
                  <?php endforeach; ?>
                  <td class="text-center align-middle"><a class="btn btn-outline-dark update-title-a text-uppercase" id="update-title-<?=$ti['id']?>" href="titles-datas.html/titles/title-<?=$ti['id']?>/action-update">modifier</a></td>
                  <td class="text-center align-middle"><a class="btn btn-outline-dark text-uppercase delete-title-a" id="delete-title-<?=$ti['id']?>" href="titles-datas.html/titles/title-<?=$ti['id']?>/action-delete">supprimer</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif;  endif;?>
  </div>