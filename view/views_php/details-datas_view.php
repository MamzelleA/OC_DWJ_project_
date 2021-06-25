<?php $this->_title = $details['name'];?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="icon8-big" src="public/images/icon8/tours.png" alt="icône parcours">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">gestion du parcours</h3>
      <h4 class="heading-title-h4"><?=$details['name']?></h4>
    </div>
  </div>
  <div class="row select-zone mt-lg-5">
    <div class="row m-3 text-left w-100">
        <div class="table-responsive mx-3 table-hover" id="tours-details-body">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th class="text-uppercase text-left" scope="col">étape</th>
                  <th class="text-uppercase text-left" scope="col" colspan="2">oeuvre</th>
                  <th class="text-uppercase text-left" scope="col" >plan</th>
                </tr>
              </thead>
              <tbody id="titles-table-body">
                <?php foreach ($details['steps'] as $st) : ?>
                  <tr>
                    <td class="text-left align-middle"><?=$st['step']?></td>
                    <td class="text-left align-middle"><?=$st['id_aw']?></td>
                    <td class="text-left align-middle"><?=$st['artwork']?></td>
                    <td class="text-left align-middle"><img class="img-fluid" src="public/images/tours/<?=$st['map']?>.jpg" alt="plan étape <?=$st['step']?>"></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div>
  </div>
</div>
