<?php

include 'C:\xampp\htdocs\projetWeb2A\Controller\panier.php';
include 'C:\xampp\htdocs\projetWeb2A\Model\Cpanier.php';
$error = "";

// create panier

// create an instance of the controller
$panierC = new panier();


if (
    isset($_POST["qty"]) 
 
) {
    if (
        !empty($_POST['qty']) 
        
    ) {
        $comm = new panierM(
            $_POST['idpanier'],
            $_POST['userid'],
            $_POST['product_id'],
            $_POST['price'],
            $_POST['qty']
            
        );
        $panierC->updatepanier($comm,$_POST['idpanier'],$_POST['qty']);

        header('Location:listecart.php');
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
    <button><a href="listpaniers.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idpanier'])) {
        $panier = $panierC->showcart($_POST['idpanier']);

    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="nom">Id :</label></td>
                    <td>
                        <input type="text" id="idpanier" name="idpanier" readonly value="<?php echo $_POST['idpanier'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr> <td><label for="nom">userid :</label></td>
                    <td><input type="text" name="userid" readonly value="<?php echo $panier['user_id']; ?>"></td></tr>
                <tr> <td><label for="nom">product_id:</label></td>
                <td><input type="text" name="product_id" readonly value="<?php echo $panier['product_id']; ?>"></td></tr>
                <tr> <td><label for="nom">price:</label></td>
                <td><input type="text" name="price" readonly value="<?php echo $panier['price']; ?>"></td></tr>
                <tr> <td><label for="nom">qty :</label></td>
                <td><input type="text" name="qty" id="q" value="<?php echo $panier['qty']; ?>"></td></tr>
               
                <td>
                    <input type="submit"   onclick="validerQuantité()" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
    <script src="inscription.js"></script>
</body>

</html>