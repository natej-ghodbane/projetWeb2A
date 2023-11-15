<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'c:xampp/htdocs/projetWeb2A/model/Livraison.php';

$error = "";

// create client
$client = null;

// create an instance of the controller
$livraisonC = new LivraisonC();
if (
    isset($_POST["idLivraison"]) &&
    isset($_POST["date"]) &&
    isset($_POST["Adresse"]) &&
    isset($_POST["Statut"]) 
) {
    if (
        !empty($_POST["idLivraison"]) &&
        !empty($_POST['date']) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["statut"]) 
    ) {
        $livraison = new Livraison(
            $_POST['idLivraison'],
            $_POST['date'],
            $_POST['adresse'],
            $_POST['Statut']
        );
        $livraisonC->updateLivraison($livraison, $_POST["idLivraison"]);

        header('Location:listLivraison.php');
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
    <button><a href="listLivraison.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idLivraison'])) {
        $client = $clientC->showClient($_POST['idLivraison']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idLivraison">Id livraison:
                        </label>
                    </td>
                    <td><input type="text" name="idLivraison" id="idLivraison" value="<?php echo $client['idLivraison']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $client['DateLivraison']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lastName">adresselivraison:
                        </label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" value="<?php echo $client['AdresseLivraison']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="address">StatutLivraison
                        </label>
                    </td>
                    <td>
                        <input type="radio" name="statut" value="<?php echo $client['StatutLivraison']; ?>" id="statut">
                    </td>
                </tr>

                <tr>
                   
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>