<?php $this->_title = "Le musée"; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid icon8-size" src="public/images/icon8/museum.png" alt="icône musée">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">le musée</h3>
      <h4 class="heading-title-h4">Je comprends le musée en 7 points et quelques conseils</h4>
    </div>
  </div>
  <?php if(isset($_COOKIE['alert'])) : ?>
  <div class="alert alert-dark alert-dismissible fade show mt-3 mx-0 fade-alert" role="alert">
  	<?=$_COOKIE['alert']?>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <?php endif; ?>
  <div class="row content-zone my-5">
    <div class="accordion w-100" id="accordionMuseum">
      <div class="card border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">1</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingBuilding" type="button" data-toggle="collapse" data-target="#collapseBuilding" aria-expanded="true" aria-controls="collapseBuilding">
                  le bâtiment          
                </button>
              </div>
             </div>
        </div>
        <div id="collapseBuilding" class="collapse show" aria-labelledby="headingBuilding" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[0]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">2</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingTitle" type="button" data-toggle="collapse" data-target="#collapseTitle" aria-expanded="true" aria-controls="collapseTitle">
                  les titres d'accès         
                </button>
              </div>
             </div>
        </div>
        <div id="collapseTitle" class="collapse" aria-labelledby="headingTitle" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[1]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">3</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingEntrances" type="button" data-toggle="collapse" data-target="#collapseEntrances" aria-expanded="true" aria-controls="collapseEntrances">
                  les entrées        
                </button>
              </div>
             </div>
        </div>
        <div id="collapseEntrances" class="collapse" aria-labelledby="headingEntrances" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[2]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">4</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingAccueil" type="button" data-toggle="collapse" data-target="#collapseAccueil" aria-expanded="true" aria-controls="collapseAccueil">
                  le hall d'accueil         
                </button>
              </div>
             </div>
        </div>
        <div id="collapseAccueil" class="collapse" aria-labelledby="headingAccueil" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[3]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">5</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingAcces" type="button" data-toggle="collapse" data-target="#collapseAcces" aria-expanded="true" aria-controls="collapseAcces">
                  accéder au collections        
                </button>
              </div>
             </div>
        </div>
        <div id="collapseAcces" class="collapse" aria-labelledby="headingAcces" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[4]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">6</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingCollections" type="button" data-toggle="collapse" data-target="#collapseCollections" aria-expanded="true" aria-controls="collapseCollections">
                  les collections      
                </button>
              </div>
             </div>
        </div>
        <div id="collapseCollections" class="collapse" aria-labelledby="headingCollections" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[5]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">7</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingWalkin" type="button" data-toggle="collapse" data-target="#collapseWalkin" aria-expanded="true" aria-controls="collapseWalkin">
                  circuler dans les collections       
                </button>
              </div>
             </div>
        </div>
        <div id="collapseWalkin" class="collapse" aria-labelledby="headingWalkin" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[6]?>
          </div>
        </div>
      </div>
      <div class="card w-100 border border-light rounded-0">
        <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-1 px-0">
                <h4 class="border rounded-circle border-dark text-center m-0 px-0 py-1 wght-bold">+</h4>
              </div>
              <div class="col">
                <button class="btn btn-link btn-block text-left heading-title-h4 text-uppercase py-1" id="headingAdvices" type="button" data-toggle="collapse" data-target="#collapseAdvices" aria-expanded="true" aria-controls="collapseAdvices">
                  petits conseils        
                </button>
              </div>
             </div>
        </div>
        <div id="collapseAdvices" class="collapse" aria-labelledby="headingAdvices" data-parent="#accordionMuseum">
          <div class="card-body">
            <?=$content[7]?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
