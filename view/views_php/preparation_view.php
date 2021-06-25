<?php $this->_title = "Préparation"; var_dump($alert); var_dump($_COOKIE);?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid icon8-big" src="public/images/icon8/prepare.png" alt="icône préparation">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">préparation</h3>
      <h4 class="heading-title-h4">Je prends le temps de me préparer.</h4>
    </div>
  </div>
  <div class="row select-zone mt-lg-5">
    <?php if(isset($_COOKIE['alert'])) : ?>
      <div class="alert alert-dark alert-dismissible fade show mx-3 fade-alert" role="alert">
        <?=$_COOKIE['alert']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif; ?>
    <div class="accordion w-100 mx-3 my-lg-5" id="accordionSelect">
        <div class="row align-items-center">
          <div class="col-lg-1 text-center mb-1 mb-lg-0">
            <img class="img-fluid icon8-big" src="public/images/icon8/important.png" alt="icône important">
          </div>
          <div class="col-lg text-center text-lg-left">
                <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="headingRubrique" type="button" data-toggle="collapse" data-target="#collapseRubrique" aria-expanded="true" aria-controls="collapseRubrique">
                    comment me préparer ?
                </button>
          </div>
        </div>
      <div id="collapseRubrique" class="collapse" aria-labelledby="headingRubrique" data-parent="#accordionSelect">
        <p class="mx-3">Lorque je clique sur : "<span class="wght-bold text-uppercase">je choisis un titre d'accès</span>", j'accède à la rubrique :</p>
        <div class="accordion w-100 mx-3 my-lg-5" id="accordionEntrances">
            <div class="row align-items-center">
              <div class="col-lg-1 text-center mb-1 mb-lg-0">
                <img class="img-fluid icon8-big" src="public/images/icon8/entrance.png" alt="icône entrées">
              </div>
              <div class="col-lg text-center text-lg-left border-bottom border-dark">
                    <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="entrancesRubrique" type="button" data-toggle="collapse" data-target="#collapseEntrancesRubrique" aria-expanded="true" aria-controls="collapseEntrancesRubrique">
                        les entrées
                    </button>
              </div>
            </div>
            <div id="collapseEntrancesRubrique" class="collapse mx-3" aria-labelledby="entrancesRubrique" data-parent="#accordionEntrances">
                <?=$content[0]?>
             </div>
        </div>
        <p class="mx-3">Lorque je clique sur : "<span class="wght-bold text-uppercase">je choisis un jour de visite</span>", j'accède aux rubriques :</p>
        <div class="accordion w-100 mx-3 my-lg-5" id="accordionDays">
            <div class="row align-items-center">
              <div class="col-lg-1 text-center mb-1 mb-lg-0">
                <img class="img-fluid icon8-big" src="public/images/icon8/hours.png" alt="icône horaires">
              </div>
              <div class="col-lg text-center text-lg-left border-bottom border-dark">
                    <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="hoursRubrique" type="button" data-toggle="collapse" data-target="#collapseHoursRubrique" aria-expanded="true" aria-controls="collapseHoursRubrique">
                        les horaires
                    </button>
              </div>
            </div>
            <div id="collapseHoursRubrique" class="collapse mx-3" aria-labelledby="hoursRubrique" data-parent="#accordionDays">
                <?=$content[1]?>
            </div>
            <div class="row align-items-center">
              <div class="col-lg-1 text-center mb-1 mb-lg-0">
                <img class="img-fluid icon8-big" src="public/images/icon8/close.png" alt="icône salles fermées">
              </div>
              <div class="col-lg text-center text-lg-left border-bottom border-dark">
                    <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="roomsRubrique" type="button" data-toggle="collapse" data-target="#collapseRoomsRubrique" aria-expanded="true" aria-controls="collapseRoomsRubrique">
                        les salles
                    </button>
              </div>
            </div>
          <div id="collapseRoomsRubrique" class="collapse mx-3" aria-labelledby="roomsRubrique" data-parent="#accordionDays">
            <?=$content[2]?>
          </div>
          <div class="row align-items-center">
              <div class="col-lg-1 text-center mb-1 mb-lg-0">
                <img class="img-fluid icon8-big" src="public/images/icon8/masterpiece.png" alt="icône oeuvres">
              </div>
              <div class="col-lg text-center text-lg-left border-bottom border-dark">
                    <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="artworksRubrique" type="button" data-toggle="collapse" data-target="#collapseArtworksRubrique" aria-expanded="true" aria-controls="collapseArtworksRubrique">
                        les oeuvres
                    </button>
              </div>
            </div>
          <div id="collapseArtworksRubrique" class="collapse mx-3" aria-labelledby="artworksRubrique" data-parent="#accordionDays">
            <?=$content[3]?>
          </div>
          <div class="row align-items-center">
              <div class="col-lg-1 text-center mb-1 mb-lg-0">
                <img class="img-fluid icon8-big" src="public/images/icon8/tours.png" alt="icône parcours">
              </div>
              <div class="col-lg text-center text-lg-left border-bottom border-dark">
                    <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="toursRubrique" type="button" data-toggle="collapse" data-target="#collapseToursRubrique" aria-expanded="true" aria-controls="collapseToursRubrique">
                        les parcours
                    </button>
              </div>
            </div>
          <div id="collapseToursRubrique" class="collapse mx-3" aria-labelledby="toursRubrique" data-parent="#accordionDays">
            <?=$content[4]?>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
          <div class="col-lg-1 text-center mb-1 mb-lg-0">
            <img class="img-fluid icon8-big" src="public/images/icon8/billetterie.png" alt="icône titre">
          </div>
          <div class="col-lg text-center text-lg-left">
                <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="titleGoal" type="button" data-toggle="collapse" data-target="#collapseTitle" aria-expanded="true" aria-controls="collapseTitle">
                    je choisis un titre d'accès
                </button>
          </div>
        </div>
      <div id="collapseTitle" class="collapse" aria-labelledby="titleGoal" data-parent="#accordionSelect">
        <form class="form-group" method="POST" action="preparation.html" id="form-titles">
          <label for="title-selection">Je sélectionne un titre d'accès dans la liste ci-dessous puis je clique sur le bouton :</label>
          <ul class="select-explain">
            <li><span class="text-uppercase font-weight-bold">entrée</span> : pour connaître les différentes entrées possibles vers le hall d'accueil avec mon titre d'accès.</li>
          </ul>
          <div class="row" id="title-selection-zone">
            <div class="col-lg-4 col-6 pr-1">
              <select name="select-title" class="form-control select-form" id="title-selection">
                <option value="tous">Tous</option>
                <option value="1|Sans titre">Sans titre</option>
                <option value="2|-26 ans de l'EEE">-26 ans de l'EEE</option>
                <option value="3|-18 ans">-18 ans</option>
                <option value="4|Demandeurs d'emploi">Demandeurs d'emploi</option>
                <option value="5|E-billet">E-billet</option>
                <option value="6|Personne handicapée">Personne handicapée</option>
                <option value="7|Adhérent">Adhérent</option>
                <option value="8|Partenaire">Partenaire</option>
                <option value="9|ICOM/ICOMOS">ICOM/ICOMOS</option>
                <option value="10|Presse">Presse</option>
                <option value="11|Pass éducation">Pass éducation</option>
              </select>
            </div>
            <?php if(isset($_SESSION['form-conn_token']) || isset($_SESSION['admin-conn_token'])) : ?>
              <div class="col pl-1">
                <input class="btn btn-outline-dark ml-lg-3 mt-0 px-1 text-uppercase" type="submit" name="save-title" id="save-title" value="enregistrer">
              </div>
            <?php endif; ?>
          </div>
          <?php if(isset($_SESSION['form-conn_token']) || isset($_SESSION['admin-conn_token']) && !is_null($title['name_title'])) : ?>
            <small class="text-left mt-1">Votre titre actuellement enregistré : <span class="wght-bold text-uppercase"><?=$title['name_title']?></span>.</small>
          <?php endif; ?>
        </form>
        <div class="row justify-content-between">
          <a class="col-lg-3 btn btn-outline-light text-dark m-3 p-3 link-card shadow bg-white rounded" title="valider" id="title-select">
            <img class="img-fluid icon8-big" src="public/images/icon8/entrance.png" alt="icône entrées">
            <h3 class="text-uppercase mt-3">entrées</h3>
          </a>
        </div>
      </div>
      <div class="row align-items-center">
          <div class="col-lg-1 text-center mb-1 mb-lg-0">
            <img class="img-fluid icon8-big" src="public/images/icon8/calendar.png" alt="icône calendrier">
          </div>
          <div class="col-lg text-center text-lg-left">
                <button class="btn btn-link btn-block text-left btn-collapse text-uppercase heading-title-h4"  id="dayGoal" type="button" data-toggle="collapse" data-target="#collapseDay" aria-expanded="true" aria-controls="collapseDay">
                    je choisis un jour de visite
                </button>
          </div>
        </div>
      <div id="collapseDay" class="collapse" aria-labelledby="dayGoal" data-parent="#accordionSelect">
        <form class="form-group" method="POST" action="preparation.html">
          <label for="day-selection">Je sélectionne une option dans la liste ci-dessous puis je clique sur le bouton :</label>
          <ul class="select-explain">
            <li><span class="text-uppercase wght-bold mb-1">horaires</span> : pour connaitre tous les horaires ou ceux du jour sélectionné.</li>
            <li><span class="text-uppercase wght-bold mb-1">salles</span> : pour voir quelles salles sont fermées le jour sélectionné. Par souci de clarté, l'option "Tous" n'est pas possible.</li>
            <li><span class="text-uppercase wght-bold mb-1">oeuvres</span> : pour voir toute la sélection des oeuvres proposées et leur visibilité quand un jour est sélectionné.</li>
            <li><span class="text-uppercase wght-bold mb-1">parcours</span> : pour avoir un apperçu de tous les parcours ou de ceux réalisables le jour sélectionné.</li>
          </ul>
          <div class="row align-items-center" id="day-selection-zone">
            <div class="col-lg-4 col-6 pr-1">
              <select name="select-day" class="form-control select-form" id="day-selection">
                <option value="tous|">Tous</option>
                <option value="1|Lundi">Lundi</option>
                <option value="2|Mardi">Mardi</option>
                <option value="3|Mercredi">Mercredi</option>
                <option value="4|Jeudi">Jeudi</option>
                <option value="5|Vendredi">Vendredi</option>
                <option value="6|Samedi">Samedi</option>
                <option value="7|Dimanche">Dimanche</option>
              </select>
            </div>
            <?php if(isset($_SESSION['form-conn_token'])) : ?>
            <div class="col pl-1">
              <input class="btn btn-outline-dark ml-lg-3 mt-0 px-1 text-uppercase" type="submit" name="save-day" id="save-day" value="enregistrer">
            </div>
            <?php endif; ?>
          </div>
          <?php if(isset($_SESSION['form-conn_token']) || isset($_SESSION['admin-conn_token']) && !is_null($day['name_day'])) : ?>
          <small class="text-left mt-1">Votre jour actuellement enregistré : <span class="wght-bold text-uppercase"><?=$day['name_day']?></span>.</small>
          <?php endif; ?>
        </form>
        <div class="row justify-content-between">
          <div class="col-lg btn btn-outline-light text-dark m-3 p-3 link-card shadow bg-white rounded" id="hours-select">
            <img class="img-fluid icon8-big" src="public/images/icon8/hours.png" alt="icône horaires">
            <h3 class="text-uppercase mt-3">horaires</h3>
          </div>
          <div class="col-lg btn btn-outline-light text-dark m-3 p-3 link-card shadow bg-white rounded" id="rooms-select">
            <img class="img-fluid icon8-big" src="public/images/icon8/close.png" alt="icône salles">
            <h3 class="text-uppercase mt-3">salles</h3>
          </div>
          <div class="col-lg btn btn-outline-light text-dark m-3 p-3 link-card shadow bg-white rounded" id="artworks-select">
            <img class="img-fluid icon8-big" src="public/images/icon8/masterpiece.png" alt="icône oeuvres">
            <h3 class="text-uppercase mt-3">oeuvres</h3>
          </div>
          <div class="col-lg btn btn-outline-light text-dark m-3 p-3 link-card shadow bg-white rounded" id="tours-select">
            <img class="img-fluid icon8-big" src="public/images/icon8/tours.png" alt="icône parcours">
            <h3 class="text-uppercase mt-3">parcours</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row content-zone w-100 mx-3">
      <div class="text-center d-none datas-result" id="entrance-result">
        <h3 class="text-uppercase entrances-result-title"></h3>
        <?=$content[5]?>
      </div>
      <div class="text-center d-none datas-result" id="hours-result">
        <h3 class="text-uppercase hours-result-title"></h3>
        <?=$content[6]?>
      </div>
      <div class="text-center d-none datas-result" id="rooms-result">
        <h3 class="text-uppercase rooms-result-title"></h3>
        <h4 class="h4-hours text-left p-1" id="h4-hours-day"></h4>
        <h4 class="h4-hours text-left p-1 d-none" id="h4-hours-noc">de 17:30 à 21:45</h4>
        <?=$content[7]?>
      </div>
      <div class="text-center d-none datas-result" id="artworks-result">
        <h3 class="text-uppercase artworks-result-title"></h3>
        <div class="d-none checkbox-artworks" id="checkbox-artworks-prep">
          <p class="mt-3">Je sélectionne un horaire :</p>
          <form class="form-check-inline text-left" id="noc-aw-check" method="POST" action="preparation.html">
            <input type="radio" name="input-radio-aw" class="form-check-input check-artworks" id="check-aw-day" value="daytime"/>
            <label class="form-check-label mr-3" for="check-aw-day">jusqu'à 17h30</label>
            <input type="radio" name="input-radio-aw" class="form-check-input check-artworks" id="check-aw-noc" value="noctime"/>
            <label class="form-check-label" for="check-aw-noc">de 17h30 à 21h45</label>
          </form>
        </div>
        <?=$content[8]?>
        <div class="map-aw-viewer mt-1">
          <h4 class="text-justify text-uppercase mt-1 display-map">voir sur le plan.</h4>
        </div>
        <div class="d-none aw-map">
          <button type="button" class="close close-map-aw"><span aria-hidden="true">&times;</span></button>
        </div>
      </div>
      <div class="d-none datas-result" id="tours-result">
        <h3 class="text-uppercase text-center tours-result-title"></h3>
        <div class="d-none checkbox-tours text-center" id="checkbox-tours-prep">
          <p class="mt-3">Faites une sélection :</p>
          <form class="form-check-inline text-left" id="noc-check" method="POST" action="preparation.html">
            <input type="radio" name="input-radio-tours" class="form-check-input check-tours" id="check-to-day" value="daytime"/>
            <label class="form-check-label mr-3" for="check-to-day">jusqu'à 17h30</label>
            <input type="radio" name="input-radio-tours" class="form-check-input check-tours" id="check-to-noc" value="noctime"/>
            <label class="form-check-label" for="check-to-noc">de 17h30 à 21h45</label>
          </form>
        </div>
        <?=$content[9]?>
        <?php if(isset($_SESSION['form-conn_token']) || isset($_SESSION['admin-conn_token'])) : ?>
        <div class="d-none" id="tour-selection-form">
          <p class="text-justify" id="p-select-tous">Je sélectionne un parcours dans la liste ci-dessous afin d'en voir le détail. Pour enregistrer un parcours, je dois d'abord sélectionner un jour.</p>
          <p class="text-jsutify" id="p-select-day">Je sélectionne un parcours dans la liste ci-dessous afin de soit en voir le détail soit le sauvegarder pour ma visite.</p>
          <form class="form-group mb-0" method="POST" action="preparation.html">
            <div class="row align-items-center">
              <div class="col-lg-4 col-6 pr-1">
                <select name="select-tour" class="form-control select-form" id="tour-selection"></select>
              </div>
              <div class="col pl-1">
                <input class="btn btn-outline-dark ml-lg-3 px-1 mt-0 text-uppercase" type="button" name="see-tour" id="see-tour" value="détail">
                <input class="btn btn-outline-dark ml-lg-3 px-1 mt-0 text-uppercase d-none" type="submit" name="save-tour" id="save-tour" value="enregistrer">
              </div>
            </div>
          </form>
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['form-conn_token']) || isset($_SESSION['admin-conn_token']) && !is_null($tour['name_tour'])) : ?>
        <small class="text-left mt-1" id="p-saved-tour">Votre parcours actuellement enregistré : <span class="wght-bold text-uppercase"><?=$tour['name_tour']?></span>.</small>
        <?php endif; ?>
        <div class="d-none card shadow mt-1 mb-5 bg-white rounded border-0" id="tour-detail">
          <?=$content[10]?>
        </div>
      </div>
    </div>
  </div>
</div>
