<?php ob_start();?>

<div class="container d-flex align-items-center flex-column">

    <form action="<?=URL?>livres/modified" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label class="form-label mt-4">Nouveau titre</label>
            <input type="text" class="form-control" name="title" value='<?=$book->getTitle();?>'>
        </div>

        <div class="form-group">
            <label class="form-label mt-4">Nouveau nombre de page</label>
            <input type="text" class="form-control" name="pages" value='<?=$book->getPages();?>'>
        </div>

        <div class="card mt-4" style="width: 19rem;">

            <img style="border-radius: 3px 3px 3px 3px/20px 20px 15px 2px;" src="<?=URL?>image/<?=$book->getImage();?>" alt="Couverture du livre <?=$book->getTitle();?> ">

        </div>

        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Nouvelle image</label>
            <input class="form-control" type="file" name="image">
        </div>

        <input type="hidden" name="id" value ="<?=$book->getId()?>">
        
        <button type="submit" class="btn btn-primary">Modifier le livre</button>

    </form>

</div>



<?php
$titre = "Modifier un livre";
$content = ob_get_clean();
require_once "template.php";