<?php $this->_title = "Les horaires";?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/hours.png" alt="icône horaires">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">les horaires</h3>
      <h4 class="heading-title-h4">Gestion des horaires.</h4>
    </div>
  </div>
  <div class="row ml-lg-3 mt-lg-5">
    <p>Les différents horaires :</p>
    <div class="table-responsive text-left table-hover">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class="text-uppercase text-center align-top" scope="col" rowspan="2">ouverture</th>
            <th class="text-uppercase text-center align-top" scope="col" colspan="5">fermetures</th>
          </tr>
          <tr>
            <th class="text-center" scope="col-1">Caisse</th>
            <th class="text-center" scope="col-1">Accès</th>
            <th class="text-center" scope="col-1">Collections</th>
            <th class="text-center" scope="col-1">Musée</th>
            <th class="text-center" scope="col-1">Pyramide</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hours as $ho): ?>
            <tr>
              <td class="text-center align-middle"><?=$ho['open']?></td>
              <td class="text-center align-middle"><?=$ho['close_cashier']?></td>
              <td class="text-center align-middle"><?=$ho['close_access']?></td>
              <td class="text-center align-middle"><?=$ho['close_rooms']?></td>
              <td class="text-center align-middle"><?=$ho['close_museum']?></td>
              <td class="text-center align-middle"><?=$ho['close_pyramid']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <p>La répartition des horaires sur les jours de la semaine : [ <span class="font-italic">0 = ouvert ; 1 = fermé</span> ]</p>
    <div class="table-responsive text-left table-hover">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class="text-uppercase text-center align-top" scope="col">jour</th>
            <th class="text-uppercase text-center align-top" scope="col">diurne<br><span class="small text-lowercase">9h00 à 18h00</span></th>
            <th class="text-uppercase text-center align-top" scope="col">nocturne<br><span class="small text-lowercase">18h00 à 21h45</span></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($days as $da) : ?>
          <tr>
            <td class="text-center align-middle"><?=$da['name_day']?></td>
            <td class="text-center align-middle"><?=$da['daytime']?></td>
            <td class="text-center align-middle"><?=$da['evening']?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
