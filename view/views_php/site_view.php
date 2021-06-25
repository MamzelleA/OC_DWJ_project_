<?php $this->_title = "Le site"; ?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid icon8-big" src="public/images/icon8/manual.png" alt="icone site">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">le site</h3>
      <h4 class="heading-title-h4">Je comprends ce site en moins de 5 minutes.</h4>
    </div>
  </div>
  <?php if(isset($_COOKIE['alert'])) : ?>
  <div class="alert alert-dark alert-dismissible fade show mt-3 mx-0 p-0 fade-alert" role="alert">
  	<?=$_COOKIE['alert']?>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <?php endif; ?>
  <div class="row content-zone my-lg-5">
    <div class="accordion" id="accordionSite">
      <div class="card w-100 border-0">
          <button class="btn btn-link btn-block text-left p-0 heading-title-h3 card-header text-uppercase border-0" id="headingGoal" type="button" data-toggle="collapse" data-target="#collapseGoal" aria-expanded="true" aria-controls="collapseGoal">but du site</button>
          <div id="collapseGoal" class="collapse show" aria-labelledby="headingGoal" data-parent="#accordionSite">
            <div class="card-body mx-3 p-0">
              <?=$content[0]?>
            </div>
          </div>
      </div>
      <div class="card w-100 border-0">
        <button class="btn btn-link btn-block text-leftcard-header text-uppercase border-0" id="headingMember" type="button" data-toggle="collapse" data-target="#collapseMember" aria-expanded="true" aria-controls="collapseMember">pourquoi devenir membre ?</button>
        <div id="collapseMember" class="collapse" aria-labelledby="headingMember" data-parent="#accordionSite">
          <div class="card-body mx-3 p-0">
            <?=$content[1]?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
