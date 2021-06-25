<?php $this->_title = "Les oeuvres"; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/masterpiece.png" alt="icône oeuvres">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">les oeuvres</h3>
      <h4 class="heading-title-h4">Gestion des oeuvres sélectionnées.</h4>
    </div>
  </div>
  <div class="row select-zone mt-lg-5">
    <div class="row m-3 text-left w-100">
      <div class="table-responsive mx-3 table-hover" id="titles-datas-body">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th class="text-uppercase text-left" scope="col">#</th>
              <th class="text-uppercase text-left" scope="col">nom</th>
              <th class="text-uppercase text-left" scope="col">auteur</th>
              <th class="text-uppercase text-left" scope="col">aile</th>
              <th class="text-uppercase text-left" scope="col">étage</th>
              <th class="text-uppercase text-left" scope="col">salle</th>
            </tr>
          </thead>
          <tbody id="titles-table-body">
            <?php foreach ($artworks as $aw) : ?>
              <tr>
                <td class="text-left align-middle"><?=$aw['id']?></td>
                <td class="text-left align-middle"><?=$aw['name_aw']?></td>
                <td class="text-left align-middle"><?=$aw['author']?></td>
                <td class="text-left align-middle"><?=$aw['wing']?></td>
                <td class="text-left align-middle"><?=$aw['floor']?></td>
                <td class="text-left align-middle"><?=$aw['room']?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
  </div>
</div>
