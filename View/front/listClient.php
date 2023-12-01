<?php
include "../../Controller/clientC.php";

$c = new ClientC();
$tab = $c->listClients();

?>

<center>
    <h1>List of clients</h1>
    <h2>
        <a href="addClient.php">add client</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Client</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>password</th>
        <th>Email</th>
        <th>Address</th>
        <th>Occupation</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $client) {
    ?>


        <tr>
            <td><?= $client['id']; ?></td>
            <td><?= $client['nom']; ?></td>
            <td><?= $client['prenom']; ?></td>
            <td><?= $client['Motdepasse']; ?></td>
            <td><?= $client['Email']; ?></td>
            <td><?= $client['Adresse']; ?></td>
            <td><?= $client['Occupation']; ?></td>
            <td align="center">
                <form method="POST" action="updateClient.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $client['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteClient.php?id=<?php echo $client['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>