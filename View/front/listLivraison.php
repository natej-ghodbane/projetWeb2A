<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'c:xampp/htdocs/projetWeb2A/model/Livraison.php';

$livraison = new LivraisonC();
$tab = $livraison->listLivraisons();

?>

<center>
    <h1>Liste des Livraisons</h1>
    
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Livraison</th>
        <th>DateLivraison</th>
        <th>AdresseLivraison</th>
        <th>StatutLivraison</th>
    </tr>


    <?php
    foreach ($tab as $livraison) {
    ?>
    
        <tr>
            <td><?= $livraison['id']; ?></td>
            <td><?= $livraison['date']; ?></td>
            <td><?= $livraison['adresse']; ?></td>
            <td><?= $livraison['statut']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>