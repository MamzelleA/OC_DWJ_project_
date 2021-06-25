<?php
ob_start();
?>
<body class="templates">
  <header class="container-fluid px-0">
    <div class="header-site text-center pt-1">
      <a class="py-3" href="home.html">
        <img class="img-fluid icon8-big" id="logo-pyramide" src="public/images/logo/logo-white.png" alt="logo pyramide">
      </a>
      <h1 class="pt-3 text-white header-site-h1">DESTINATION : LOUVRE</h1>
      <h2 class="pb-3 text-white">Oups...</h2>
    </div>
  </header>
  <section class="container-fluid mb-3">
    <?=$page?>
  </section>
</body>
<?php
$template = ob_get_clean();
include '/home/mamzelle/public_html/projet5/template/template.php';
?>
