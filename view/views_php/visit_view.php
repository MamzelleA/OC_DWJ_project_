<?php $this->_title = 'Visite'; var_dump($_COOKIE);?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid icon8-size" src="public/images/icon8/vip.png" alt="icone visite">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">Visite</h3>
      <h4 class="heading-title-h4">Et maintenant, je profite !</h4>
    </div>
  </div>
  <div class="content-zone my-5 mx-3">
    <?php if(isset($_COOKIE['alert'])) : ?>
      <div class="alert alert-dark alert-dismissible fade show mx-3 fade-alert" role="alert">
        <?=$_COOKIE['alert']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif;
    if(is_null($title['id_title']) && is_null($day['id_day']) && is_null($tour['id_tour'])) : ?>
    <h4 class="wght-bold text-center mb-3 mt-lg-5">Je n'ai pas encore enregistré mes informations indispensables pour bien profiter de ma visite ?</h4>
    <h4 class="wght-bold text-center mt-3 mb-lg-5">Je me rends à la rubrique <a class="text-uppercase" href="preparation.html" title="rubrique préparation">préparation</a> de ce pas !</h4>
  <?php else :
    if(is_null($title['id_title'])) : ?>
    <div class="row my-lg-5">
      <div class="col-lg text-left p-0">
        <h4 class="wght-bold">Je n'ai pas encore enregistré mon titre d'accès !</h4>
      </div>
      <div class="col-lg text-lg-right p-0">
        <a class="btn btn-outline-dark link-card text-uppercase" href="preparation.html" title="rubrique préparation">enregistrer un titre</a>
      </div>
    </div>
  <?php else : ?>
    <div class="row align-items-center my-3">
      <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
        <img class="img-fluid icon8-size" src="public/images/icon8/billetterie.png" alt="icône titre">
      </div>
      <div class="col-sm">
        <div class="row align-items-center">
          <div class="col-lg text-center text-sm-left p-0">
            <h4 class="wght-bold">Mon titre d'accès enregistré :</h4>
            <h4 class="text-uppercase"><?=$title['name_title']?></h4>
            <input type="hidden" id="title-saved" value="<?=$title['id_title']?>"/>
          </div>
          <div class="col-lg text-center text-sm-left text-lg-right p-0">
            <form class="inline-lg-form" action="" method="POST">
              <a class="btn btn-outline-dark link-card text-uppercase" href="preparation.html" title="rubrique préparation">modifier</a>
              <input class="btn btn-outline-dark text-uppercase" type="submit" name="del-my-title" value="supprimer"/>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endif;
  if(is_null($day['id_day'])) : ?>
  <div class="row my-lg-5">
    <div class="col-lg text-left p-0">
      <h4 class="wght-bold">Je n'ai pas encore enregistré mon jour de visite !</h4>
    </div>
    <div class="col-lg text-lg-right p-0">
      <a class="btn btn-outline-dark link-card text-uppercase" href="preparation.html" title="rubrique préparation">enregistrer un jour</a>
    </div>
  </div>
<?php else : ?>
  <div class="row align-items-center my-3">
    <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
      <img class="img-fluid icon8-size" src="public/images/icon8/calendar.png" alt="icône calendrier">
    </div>
    <div class="col-sm">
      <div class="row align-items-center">
        <div class="col-lg text-center text-sm-left p-0">
          <h4 class="wght-bold">Mon jour de visite enregistré :</h4>
          <h4 class="text-uppercase"><?=$day['name_day'] ?></h4>
          <input type="hidden" id="day-saved" value="<?=$day['id_day']?>"/>
        </div>
        <div class="col-lg text-center text-sm-left text-lg-right p-0">
          <form class="inline-lg-form" action="" method="POST">
            <a class="btn btn-outline-dark link-card text-uppercase" href="preparation.html" title="rubrique préparation">modifier</a>
            <input class="btn btn-outline-dark link-card text-uppercase" type="submit" name="del-my-day" value="supprimer"/>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif;
if(is_null($tour['id_tour'])) : ?>
<div class="row my-lg-5">
  <div class="col-lg text-left p-0">
    <h4 class="wght-bold">Je n'ai pas encore enregistré mon parcours !</h4>
  </div>
  <div class="col-lg text-lg-right p-0">
    <a class="btn btn-outline-dark link-card text-uppercase" href="preparation.html" title="rubrique préparation">enregistrer un parcours</a>
  </div>
</div>
<?php else : ?>
  <div class="row align-items-center my-1 border-bottom pb-3">
    <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
      <img class="img-fluid icon8-size" src="public/images/icon8/tours.png" alt="icône parcours">
    </div>
    <div class="col-sm">
      <div class="row align-items-center">
        <div class="col-lg text-center text-sm-left p-0">
          <h4 class="wght-bold">Mon parcours enregistré :</h4>
          <h4 class="text-uppercase" id="tour-name-saved"><?=$tour['name_tour']?></h4>
          <input type="hidden" id="tour-saved" value="<?=$tour['id_tour']?>"/>
        </div>
        <div class="col-lg text-center text-sm-left text-lg-right p-0">
          <form class="inline-lg-form" action="" method="POST">
            <a class="btn btn-outline-dark link-card text-uppercase" href="preparation.html" title="rubrique préparation">modifier</a>
            <input class="btn btn-outline-dark link-card text-uppercase" type="submit" name="del-my-tour" value="supprimer"/>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif;
endif; ?>
<div class="accordion" id="accordionMyVisit">
  <?php if(!is_null($title['id_title'])) : ?>
    <div class="card w-100 border-0">
      <button class="btn btn-link btn-block text-left" id="btn-title" type="button" data-toggle="collapse" data-target="#collapseMyEntrance" aria-expanded="true" aria-controls="collapseMyEntrance">
        <div class="card-header border-0 mx-0 px-0" id="headingMyEntrance">
          <div class="row align-items-center">
            <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
              <img class="img-fluid icon8-size" src="public/images/icon8/entrance.png" alt="icône entrées">
            </div>
            <div class="col-sm text-center text-sm-left">
              <h3 class="text-uppercase">je sais par où j'entre</h3>
            </div>
          </div>
        </div>
      </button>
      <div id="collapseMyEntrance" class="collapse" aria-labelledby="headingMyEntrance" data-parent="#accordionMyVisit">
        <div class="card-body mx-0 entrance-result">
            <h3 class="text-uppercase entrances-result-title"></h3>
            <?=$content[0]?>
        </div>
      </div>
    </div><?php endif;
    if(!is_null($day['id_day'])) : ?>
    <div class="card w-100 border-0">
      <button class="btn btn-link btn-block text-left" id="btn-hour" type="button" data-toggle="collapse" data-target="#collapseMyHours" aria-expanded="true" aria-controls="collapseMyHours">
        <div class="card-header border-0 mx-0 px-0" id="headingMyHours">
          <div class="row align-items-center">
            <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
              <img class="img-fluid icon8-size" src="public/images/icon8/hours.png" alt="icône horaires">
            </div>
            <div class="col-sm text-center text-sm-left">
              <h3 class="text-uppercase">je me souviens des horaires</h3>
            </div>
          </div>
        </div>
      </button>
      <div id="collapseMyHours" class="collapse" aria-labelledby="headingMyHours" data-parent="#accordionMyVisit">
        <div class="card-body mx-0 px-0 hours-result">
          <?=$content[1]?>
        </div>
      </div>
    </div>
    <div class="card w-100 border-0">
      <button class="btn btn-link btn-block text-left" id="btn-room" type="button" data-toggle="collapse" data-target="#collapseMyRooms" aria-expanded="true" aria-controls="collapseMyRooms">
        <div class="card-header border-0 mx-0 px-0" id="headingMyHours">
          <div class="row align-items-center">
            <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
              <img class="img-fluid icon8-size" src="public/images/icon8/close.png" alt="icône salles fermées">
            </div>
            <div class="col-sm text-center text-sm-left">
              <h3 class="text-uppercase">je connais les salles fermées</h3>
            </div>
          </div>
        </div>
      </button>
      <div id="collapseMyRooms" class="collapse" aria-labelledby="headingMyRooms" data-parent="#accordionMyVisit">
        <div class="card-body mx-0 rooms-result">
          <h3 class="text-uppercase rooms-result-title"></h3>
          <?=$content[2]?>
        </div>
      </div>
          <div class="card w-100 border-0">
            <button class="btn btn-link btn-block text-left" id="btn-aw" type="button" data-toggle="collapse" data-target="#collapseMyArtworks" aria-expanded="true" aria-controls="collapseMyArtworks">
              <div class="card-header border-0 mx-0 px-0" id="headingMyArtworks">
                <div class="row align-items-center">
                  <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
                    <img class="img-fluid icon8-size" src="public/images/icon8/masterpiece.png" alt="icône oeuvres">
                  </div>
                  <div class="col-sm text-center text-sm-left">
                    <h3 class="text-uppercase">je vais voir des oeuvres</h3>
                  </div>
                </div>
              </div>
            </button>
            <div id="collapseMyArtworks" class="collapse" aria-labelledby="headingMyArtworks" data-parent="#accordionMyVisit">
              <div class="card-body mx-0 px-0 artworks-result">
                <h3 class="text-uppercase artworks-result-title"></h3>
                <div class="d-none checkbox-artworks" id="checkbox-artworks-visit">
                  <form class="form-check-inline text-left" id="noc-aw-check-visit" method="POST" action="">
                    <p class="mt-3 mr-1">Je sélectionne un horaire :</p>
                    <input type="radio" name="input-radio-aw" class="form-check-input check-artworks" id="check-aw-day-visit" value="daytime">
                    <label class="form-check-label mr-3" for="input-radio-aw-visit">jusqu'à 17h30</label>
                    <input type="radio" name="input-radio-aw" class="form-check-input check-artworks" id="check-aw-noc-visit" value="noctime">
                    <label class="form-check-label" for="input-radio-aw">de 17h30 à 21h45</label>
                  </form>
                </div>
                <?=$content[3]?>
                <div class="map-aw-viewer mt-1">
                  <h4 class="text-justify text-uppercase mt-1 display-map">voir sur le plan.</h4>
                </div>
                <div class="d-none aw-map text-center">
                  <button type="button" class="close close-map-aw"><span aria-hidden="true">&times;</span></button>
                </div>
              </div>
            </div>
          </div>
          <?php endif;
          if(!is_null($tour['id_tour'])) : ?>
          <div class="card w-100 border-0">
            <button class="btn btn-link btn-block text-left" id="btn-tour" type="button" data-toggle="collapse" data-target="#collapseMyTour" aria-expanded="true" aria-controls="collapseMyTour">
              <div class="card-header border-0 mx-0 px-0" id="headingMyTour">
                <div class="row align-items-center">
                  <div class="col-sm-2 col-lg-1 text-center text-sm-left mb-1 mb-sm-0">
                    <img class="img-fluid icon8-size" src="public/images/icon8/view.png" alt="icône détail">
                  </div>
                  <div class="col-sm text-center text-sm-left">
                    <h3 class="text-uppercase">je fais mon parcours</h3>
                  </div>
                </div>
              </div>
            </button>
            <div id="collapseMyTour" class="collapse" aria-labelledby="headingMyTour" data-parent="#accordionMyVisit">
              <div class="card-body px-0 text-center">
                <h3 class="text-uppercase tours-result-title"></h3>
                <?=$content[4]?>
                <a href="tour.html/page-1" class="btn btn-outline-dark mt-1 text-uppercase" id="tour-saved-go">c'est parti</a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
