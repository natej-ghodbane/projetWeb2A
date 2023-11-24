<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'c:xampp/htdocs/projetWeb2A/model/Livraison.php';

$error = "";


$livraison = null;


$livraisonC = new LivraisonC();
if (
    isset($_POST["IdLivraison"]) &&
    isset($_POST["date"]) &&
    isset($_POST["Adresse"]) &&
    isset($_POST["Statut"]) 
) {
    if (
        !empty($_POST['IdLivraison']) &&
        !empty($_POST['date']) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["statut"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";}
        $livraison = new Livraison(
            null,
            $_POST['date'],
            $_POST['adresse'],
            $_POST['Statut']
        );
        var_dump($livraison);
        
        $livraisonC->updateLivraison($livraison, $_POST["IdLivraison"]);

        header('Location:listLivraison.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>
    <button><a href="listLivraison.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['IdLivraison'])) {
        $livraison = $livraisonC->showLivraison($_POST['IdLivraison']);

    ?>

        <form action="" method="POST">
            <table>
            
                <tr>
                    <td>
                        <label for="IdLivraison">Id livraison:
                        </label>
                    </td>
                    <td><input type="text" name="IdLivraison" id="IdLivraison" value="<?php echo $livraison['IdLivraison']; ?>" readonly maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $livraison['DateLivraison']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">adresselivraison:
                        </label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" value="<?php echo $livraison['AdresseLivraison']; ?>" maxlength="20"></td>
                    <span id="erreurAdresse" style="color: red"></span>
                </tr>
                <tr>
                    <td>
                        <label for="statut">StatutLivraison
                        </label>
                    </td>
                    <td>
                        <input type="radio" name="statut" value="<?php echo $livraison['StatutLivraison']; ?>" id="statut">
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