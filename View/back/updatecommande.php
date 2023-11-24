<?php

include 'C:\xampp\htdocs\projetWeb2A\Controller\commande.php';
include 'C:\xampp\htdocs\projetWeb2A\Model\commande.php';
$error = "";

// create commande

// create an instance of the controller
$commandeC = new commande();


if (
    isset($_POST["status"]) 
 
) {
    if (
        !empty($_POST['status']) 
        
    ) {
        $comm = new commandeM(
            $_POST['idcommande'],
            $_POST['userid'],
            $_POST['name'],
            $_POST['number'],
            $_POST['email'],
            $_POST['address'],
            $_POST['address_type'],
            $_POST['method'],
            $_POST['product_id'],
            $_POST['price'],
            $_POST['qty'],
            new DateTime($_POST['date']),
            $_POST['status'],
            $_POST['idpan']
        );
        $commandeC->updatecommande($comm,$_POST['idcommande'],);

        header('Location:index.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listcommandes.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idcommande'])) {
        $commande = $commandeC->showOrders($_POST['idcommande']);

    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="nom">Idcommande :</label></td>
                    <td>
                        <input type="text" id="idcommande" name="idcommande" readonly value="<?php echo $_POST['idcommande'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr> <td><label for="nom">userid :</label></td>
                    <td><input type="text" name="userid" readonly value="<?php echo $commande['user_id']; ?>"></td></tr>
                <tr> <td><label for="nom">nom :</label></td>
                <td><input type="text" name="name" readonly value="<?php echo $commande['name']; ?>"></td></tr>
                <tr> <td><label for="nom">numero :</label></td>
                <td><input type="text" name="number" readonly value="<?php echo $commande['number']; ?>"></td></tr>
                <tr> <td><label for="nom">mail :</label></td>
                <td><input type="text" name="email" readonly value="<?php echo $commande['email']; ?>"></td></tr>
                <tr> <td><label for="nom">adresse :</label></td>
                <td><input type="text" name="adresse" readonly value="<?php echo $commande['address']; ?>"></td></tr>
                <tr> <td><label for="nom">adressetype:</label></td>
                <td><input type="text" name="adresset" readonly value="<?php echo $commande['address_type']; ?>"></td></tr>
                <tr> <td><label for="nom">method :</label></td>
                <td><input type="text" name="method" readonly value="<?php echo $commande['method']; ?>"></td></tr>
                <tr> <td><label for="nom">product id :</label></td>
                <td><input type="text" name="proid" readonly value="<?php echo $commande['product_id']; ?>"></td></tr>
                <tr> <td><label for="nom">prix:</label></td>
                <td><input type="text" name="price" readonly value="<?php echo $commande['price']; ?>"></td></tr>
                <tr> <td><label for="nom">quantité :</label></td>
                <td><input type="text" name="qty" readonly value="<?php echo $commande['qty']; ?>"></td></tr>
                <tr> <td><label for="nom">date :</label></td>
                <td><input type="text" name="date" readonly value="<?php echo $commande['date']; ?>"></td></tr>

                <tr>
                   
                    <td><label for="status">Status :</label></td>  
                    <td>
                    <!-- <input type="text" id="status" name="status" value=" <?//php echo $commande['status'] ?>"  /> -->
                     <label ><input type="radio" name="status" id="status"  value="<?php echo $commande['status'] ?>" checked> <?php echo $commande['status'] ?> </label> 
                     <label ><input type="radio" name="status" id="status" value="canceled"> canceled </label> 
                     <label ><input type="radio" name="status" id="status" value="delivered" > delivered </label> 
                    </td>
                </tr>
                <tr> <td><label for="nom">Idpan :</label></td>
                    <td><input type="text" name="idpan" readonly value="<?php echo $commande['idpan']; ?>"></td></tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>