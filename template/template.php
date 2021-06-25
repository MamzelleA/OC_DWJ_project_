<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Projet réalisé dans le cadre de la formation DWJ d'Openclassrooms - Réalisation d'un site pour préparer sa visite au musée du Louvre. ">
		<meta name="author" content="Agnès Masetty">

		<title><?=$title?></title>
		
		<!--reecriture d'url -> éviter les répertoires virtuels -->
		<base href="https://projet5.mamzellea.fr/repertoire" />

		<link rel="shortcut icon" href="public/images/logo/favicon.ico">

		<!-- CSS -->
		<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="public/css/style.css" rel="stylesheet" type="text/css">

		<!--SCRIPT-->
		<script src="public/js/jquery_prod.js"></script>
		<script src="public/js/bootstrap.min.js"></script>
		<script src="public/js/function.js"></script>
		<script src="public/js/api_function.js"></script>
		<script src="public/js/api.js"></script>

		<!-- FONTS -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" rel="stylesheet" crossorigin="anonymous">
	</head>
  <?=$template?>
</html>
