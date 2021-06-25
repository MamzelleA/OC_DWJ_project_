<?php $this->_title = 'Membres';?>
<div class="mx-lg-3 mx-1">
  <div class="row head-zone align-item-center mt-3">
    <div class="col-lg-1 text-lg-right text-center">
      <img class="img-fluid" src="public/images/icon8/adherent.png" alt="icône membre">
    </div>
    <div class="col-lg text-lg-left text-center">
      <h3 class="border-bottom border-dark text-uppercase heading-title-h3">Les membres</h3>
      <h4 class="heading-title-h4">Administration des membres du site.</h4>
    </div>
  </div>
  <div class="row select-zone mt-lg-5">
    <?php if(isset($alert) || isset($_COOKIE['alert'])) : ?>
      <div class="alert alert-dark alert-dismissible fade show mx-3 w-100" role="alert">
        <?php if(isset($alert)) :  echo $alert;
        elseif(isset($_COOKIE['alert'])) : echo $_COOKIE['alert'];
        endif; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
     <?php endif; ?>
    <div class="table-responsive text-center mx-lg-3 mx-1" id="members-result-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class="text-uppercase align-middle" scope="col">nom</th>
            <th class="text-uppercase align-middle" scope="col">prénom</th>
            <th class="text-uppercase align-middle" scope="col">identifiant</th>
            <th class="text-uppercase align-middle" scope="col">email</th>
            <th class="text-uppercase align-middle" scope="col">connexion</th>
          </tr>
        </thead>
        <tbody id="members-table-body">
          <?php foreach ($members as $me) :
            if($me['code'] == '0') : ?>
            <tr class="text-danger">
            <?php else : ?>
              <tr class="text-dark">
              <?php endif; ?>
              <td class="p-1 align-middle"><?=$me['lastname']?></td>
              <td class="p-1 align-middle"><?=$me['firstname']?></td>
              <td class="p-1 align-middle"><?=$me['pseudo']?></td>
              <td class="p-1 align-middle"><?=$me['email']?></td>
              <td class="p-1 align-middle"><?=$me['last_conn']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php if($pages > 1) : ?>
    <div class="row text-center ml-3">
      <ul class="pagination text-center w-100">
        <?php if($page > 1) : ?>
        <li class="page-item">
          <a class="page-link text-dark" href="members.html/page-<?=$page - 1?>">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Précédente</span>
          </a>
        </li>
        <?php endif;
        for($i=1; $i<=$pages; $i++) : ?>
        <li class="page-item"><a class="page-link text-dark" href="members.html/page-<?=$i?>"><?=$i?></a></li>
        <?php endfor;
        if($page < $pages) : ?>
        <li class="page-item">
          <a class="page-link text-dark" href="members.html/page-<?=$page + 1?>">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Suivante</span>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  <?php endif; ?>
  </div>
</div>
