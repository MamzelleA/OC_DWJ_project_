<?php
ob_start();
?>
<body id="template-tour mb-1">
	<section class="container-fluid p-0">
		<?=$page?>
	</section>
</body>
<?php
$template = ob_get_clean();
include '/home/mamzelle/public_html/projet5/template/template.php';
?>
