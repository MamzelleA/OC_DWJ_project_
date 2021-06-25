<?php $this->_title = 'Parcours : ' .$_SESSION['name_tour']; ?>
<div class="d-none" id="tour-session"><?=$_SESSION['id_tour']?></div>
    <div class="w-100" id="tour-launch">
        <div class="row control-zone bg-light pt-1 px-1 border-bottom m-0">
            <div class="col-3">
                <ul class="pagination mb-0">
                    <li class="page-item" id="prev-link"></li>
                    <li class="page-item" id="num-link"></li>
                    <li class="page-item" id="next-link"></li>
                </ul>
            </div>
            <div class="col-7 my-0">
                <div class="row text-left">
                    <div class="col-1 mr-3" id="img-tour-launch"></div>
                    <div class="col px-0"><h3 class="heading-title-h3 text-uppercase" id="tour-title"><?=$_SESSION['name_tour']?></h3></div>
                </div>
            </div>
            <div class="col-2 text-right">
                <a href="visit.html" class="inline-block align-top" id="close-tour"><img class="icon8-size" src="public/images/icon8/cross.png" alt="icone fermer"></a>
            </div>
        </div>
        <div class="detail-zone align-items-center mt-3 mx-1">
            <h3 class="text-uppercase text-center text-lg-left" id="step-details-h3"></h3>
            <h4 class="heading-title-h4 mb-0  text-center text-lg-left" id="step-details-h4"><span class="text-uppercase">Objectif</span> : <span class="font-weight-bold" id="step-details-name"></span><span class="font-italic" id="step-details-author"></span></h4>
            <div class="row w-100 m-0" id="step-way-div">
                <div class="col-lg pr-3 border-lg-right border-dark" id="step-map">
                    <h4 class="heading-title-h4 mb-1 mt-3 mt-lg-0 text-center text-lg-left text-uppercase" id="step-way-h4">Comment s'y rendre ?</h4>
                </div>
            </div>
        <div class="text-center my-3 d-none" id="end-tour">
            <h4 class="heading-title-h4">Vous avez terminé le parcours <span class="text-uppercase font-weight-bold"><?=$_SESSION['name_tour']?></span>.<br>Bonne fin de visite !</h4>
            <a href="home.html" class="btn btn-outline-dark mt-3 link-card text-uppercase" id="tour-leave">quitter</a>
        </div>
    </div>
</div>
