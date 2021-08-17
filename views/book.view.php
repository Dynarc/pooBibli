<?php ob_start();?>

<div class="container d-flex justify-content-center">

    <div class="card" style="width: 25rem;">

        <img class="card-img-top" src="<?=htmlspecialchars($book->getImage());?>" alt="Couverture du livre <?=htmlspecialchars($book->getTitle());?> ">
        
        <div class="card-body">
            <h5 class="card-title"><?=htmlspecialchars($book->getTitle());?></h5>
            <p class="card-text">Ce bouquin contient <?=htmlspecialchars($book->getPages());?> pages.</p>
        </div>

    </div>

</div>


<?php
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require_once "template.php";