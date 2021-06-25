<?php
$this->_title = 'Accueil';
if(isset($_COOKIE['alert'])) :
?>
<div class="alert alert-dark alert-dismissible fade show mt-3 mx-0 fade-alert" role="alert">
	<?=$_COOKIE['alert']?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<?php endif; ?>
<?=$content[0]?>
