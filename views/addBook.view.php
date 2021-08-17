<?php ob_start();?>



  
<form action="/livres/validate" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4">Titre du livre</label>
        <input type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4">Nombre de pages</label>
        <input type="text" class="form-control" name="pages" required>
    </div>

    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Image du livre</label>
        <input class="form-control" type="file" name="image" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter le livre</button>

</form>

  



<?php
$titre = "Ajouter un livre";
$content = ob_get_clean();
require_once "template.php";