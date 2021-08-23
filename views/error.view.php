<?php ob_start();?>

<div class="alert alert-dismissible alert-danger mt-5">
  <h4 class="alert-heading">Attention !</h4>
  <p class="mb-0"><?=$e->getMessage()?> ! Cliquez <a href="#null" onclick="javascript:history.back();">ici</a> pour revenir sur la page précédente.</p>
</div>

<?php
$titre = "ERREUR 404";
$content = ob_get_clean();
require_once "template.php";