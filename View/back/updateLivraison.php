<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'C:/xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'C:/xampp/htdocs/projetWeb2A/model/Livraison.php';

$error = "";
$livraison = null;
$livraisonC = new LivraisonC();

if (
    isset($_POST["IdLivraison"]) &&
    isset($_POST["date"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["statut"])
) {
    if (
        !empty($_POST['IdLivraison']) &&
        !empty($_POST['date']) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["statut"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $livraison = new Livraison(
            null,
           
            $_POST['adresse'],
            $_POST['statut']
        );

        var_dump($livraison);

        $livraisonC->updateLivraison($livraison, $_POST["IdLivraison"]);
      
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>
    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['IdLivraison'])) {
        $livraison = $livraisonC->showLivraison($_GET['IdLivraison']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="IdLivraison">Id livraison:</label>
                    </td>
                    <td><input type="text" name="IdLivraison" id="IdLivraison" value="<?php echo $livraison['IdLivraison']; ?>" readonly maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:</label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $livraison['DateLivraison']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">adresse:</label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" value="<?php echo $livraison['AdresseLivraison']; ?>" maxlength="20"></td>
                    <span id="erreurAdresse" style="color: red"></span>
                </tr>
                <tr>
                    <td>
                        <label for="statut">StatutLivraison:</label>
                    </td>
                    <td>
                        <input type="text" name="statut" value="<?php echo $livraison['StatutLivraison']; ?>" id="statut">
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
