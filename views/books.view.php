<?php ob_start();?>

<table class="table text-center">

    <tr class = "table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Action</th>
    </tr>

    <?php

    foreach($books as $book){
        echo '<tr>
        <td class="align-middle"><a href="lire/'.htmlspecialchars($book->getId()).'"><img src="'.htmlspecialchars($book->getImage()).'" alt="couverture du livre : '.htmlspecialchars($book->getTitle()).'" width="60px;"></a></td>
        <td class="align-middle">'.htmlspecialchars($book->getTitle()).'</td>
        <td class="align-middle">'.htmlspecialchars($book->getPages()).'</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>';
    }?>
   
</table>

<a href="" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require_once "template.php";