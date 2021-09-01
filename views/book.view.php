<?php ob_start();?>

<div class="container d-flex flex-column align-items-center">

    <div class="card" style="width: 25rem;">

        <img style="border-radius: 3px 3px 0px 0px/20px 15px 0px 0px;" src="<?=URL?>image/<?=$book->getImage();?>" alt="Couverture du livre <?=$book->getTitle();?> ">
        
        <div class="card-body">
            <h5 class="card-title"><?=$book->getTitle();?></h5>
            <p class="card-text">Ce livre contient <?=$book->getPages();?> pages.</p>
        </div>

    </div>

    <a href="<?=URL?>livres" class="mt-3">retour</a>

</div>


<?php
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require_once "template.php";