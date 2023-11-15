<?php
include 'C:\xampp\htdocs\projetWeb2A\Controller\commande.php';

$c = new commande();
$tab = $c->listJoueurs();

?>

<center>
    <h1>List of commandes</h1>
    <h2>
        <a href="addcommande.php">Add commande</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id commande</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>statut</th>
        <th>adresse</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $joueur) {
    ?>




        <tr>
            <td><?= $joueur['id']; ?></td>
            <td><?= $joueur['nom']; ?></td>
            <td><?= $joueur['prenom']; ?></td>
            <td><?= $joueur['statut']; ?></td>
            <td><?= $joueur['adresse']; ?></td>
           
            <td>
                <a href="deleteJoudeletecommandeeur.php?id=<?php echo $joueur['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>