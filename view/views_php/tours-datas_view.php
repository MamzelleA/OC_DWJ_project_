<?php $this->_title = "Les parcours";?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/tours.png" alt="icône parcours">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">les parcours</h3>
      <h4 class="heading-title-h4">Gestion des parcours proposés.</h4>
    </div>
  </div>
  <div class="row select-zone mt-lg-5">
    <div class="row m-3 text-left w-100">
        <div class="table-responsive mx-3 table-hover" id="tours-datas-body">
          <caption>Cliquez sur l'icône du nom pour voir le détail.</caption>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th class="text-uppercase text-left" scope="col">#</th>
                <th class="text-uppercase text-left" scope="col" colspan="2">nom</th>
                <th class="text-uppercase text-left" scope="col" colspan='2'>public</th>
                <th class="text-uppercase text-left" scope="col">durée</th>
              </tr>
            </thead>
            <tbody id="titles-table-body">
              <?php foreach ($tours as $to) : ?>
                <tr>
                  <td class="text-left align-middle"><?=$to['id']?></td>
                  <td class="text-left align-middle"><a href="details-datas.html/details/tour-<?=$to['id']?>" id="view-details"><img class="icon8-small" src="public/images/icon8/<?=$to['picture_to']?>.png" alt="icône <?=$to['name']?>"></a></td>
                  <td class="text-left align-middle"><?=$to['name_tour']?></td>
                  <td class="text-left align-middle"><img class="icon8-small" src="public/images/icon8/<?=$to['picture_pu']?>.png" alt="icône <?=$to['name_public']?>"></td>
                  <td class="text-left align-middle"><?=$to['name_public']?></td>
                  <td class="text-left align-middle"><?=$to['timing']?></td>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
