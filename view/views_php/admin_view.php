<?php
$this->_title = 'Admin';
if(isset($_COOKIE['alert'])) :
?>
<div class="alert alert-dark alert-dismissible fade show mt-3 mx-0 fade-alert" role="alert">
	<?=$_COOKIE['alert']?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<?php endif; ?>
<div class="link-btn-zone mx-lg-3 mx-1 my-lg-5 my-1">
  <div class="row text-center">
    <a class="col-lg btn btn-outline-light text-dark m-3 px-1 py-5 link-card shadow bg-white rounded" href="pages.html">
      <img class="icon8-big" src="public/images/icon8/design.png" alt="icône design">
      <h3 class="text-uppercase mt-5">pages</h3>
    </a>
    <a class="col-lg btn btn-outline-light text-dark m-3 px-1 py-5 link-card shadow bg-white rounded" href="members.html">
      <img class="icon8-big" src="public/images/icon8/adherent.png" alt="icône membre">
      <h3 class="text-uppercase mt-5">membres</h3>
    </a>
    <a class="col-lg btn btn-outline-light text-dark m-3 px-1 py-5 link-card shadow bg-white rounded" href="datas.html">
      <img class="icon8-big" src="public/images/icon8/cloud.png" alt="icône données">
      <h3 class="text-uppercase mt-5">données</h3>
    </a>
    <a class="col-lg btn btn-outline-light text-dark m-3 px-1 py-5 link-card shadow bg-white rounded" href="account.html">
      <img class="icon8-big" src="public/images/icon8/user.png" alt="icône profil">
      <h3 class="text-uppercase mt-5">profil</h3>
    </a>
  </div>
</div>
