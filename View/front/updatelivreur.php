<?php

include 'c:xampp/htdocs/projetWeb2A/controller/livreurC.php';
include 'c:xampp/htdocs/projetWeb2A/model/livreur.php';

$error = "";


$livreur = null;


$livreurC = new LivreurC();
if (
    isset($_POST["idlivreur"]) &&
    isset($_POST["nom_livreur"]) &&
    isset($_POST["numero_tel"]) &&
    isset($_POST["Statut_livreur"]) &&
    isset($_POST["idlivreur"])

) {
    if (
        !empty($_POST['idlivreur']) &&
        !empty($_POST['nom_livreur']) &&
        !empty($_POST["numero_tel"]) &&
        !empty($_POST["statut_livreur"]) &&
        !empty($_POST["idlivreur"])

    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";}
        $livreur = new livreur(
            null,
            $_POST['nom_livreur'],
            $_POST['numero_tel'],
            $_POST['statut_livreur'],
            $_POST['idlivraison']

        );
        var_dump($livreur);
        
        $livreurC->updateLivreur($livreur, $_POST["idlivreur"]);

        header('Location:listLivreur.php');
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
    <button><a href="listLivreur.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idliv'])) {
        $livreur = $livreurC->showlivreur($_POST['idliv']);

    ?>

        <form action="" method="POST">
            <table>
            
                <tr>
                    <td>
                        <label for="Idlivreur">Id livreur:
                        </label>
                    </td>
                    <td><input type="text" name="Idlivreur" id="Idlivreur" value="<?php echo $livreur['idlivreur']; ?>" readonly maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">nom:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $livreur['nom_livreur']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">prix:
                        </label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" value="<?php echo $livreur['numero_tel']; ?>" maxlength="20"></td>
                    <span id="erreurAdresse" style="color: red"></span>
                </tr>
                <tr>
                    <td>
                        <label for="statut">Statutlivreur
                        </label>
                    </td>
                    <td>
                        <input type="radio" name="statut" value="<?php echo $livreur['statut_livreur']; ?>" id="statut">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="idlivreur" value="<?php echo $livreur['idlivraison'];?>" id="idlivraison">
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