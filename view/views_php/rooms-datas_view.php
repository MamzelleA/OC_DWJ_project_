<?php $this->_title = "Les salles"; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/close.png" alt="icône salles fermées">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">les salles</h3>
      <h4 class="heading-title-h4">Gestion des salles et de leur jour de fermeture.</h4>
    </div>
  </div>
  <div class="row m-3 text-left w-100">
    <div class="table-responsive mx-3 table-hover" id="titles-datas-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class="text-uppercase text-left" scope="col">nom</th>
            <th class="text-uppercase text-left" scope="col">aile</th>
            <th class="text-uppercase text-left" scope="col">étage</th>
            <th class="text-uppercase text-left" scope="col">salles</th>
            <th class="text-uppercase text-left" scope="col">collection</th>
          </tr>
        </thead>
        <tbody id="titles-table-body">
          <?php foreach ($rooms as $ro) : ?>
            <tr>
              <td class="text-left align-middle"><?=$ro['name_rooms']?></td>
              <td class="text-left align-middle"><?=$ro['wing']?></td>
              <td class="text-left align-middle"><?=$ro['floor']?></td>
              <td class="text-left align-middle"><?=$ro['numbers']?></td>
              <td class="text-left align-middle"><?=$ro['collection']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
