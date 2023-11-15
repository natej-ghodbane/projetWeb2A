<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'c:xampp/htdocs/projetWeb2A/model/Livraison.php';


$error = "";


$livraison = null;



$livraisonR = new LivraisonC();
if (
    isset($_POST["id"]) &&
    isset($_POST["date"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["statut"])
) {
    if (
        !empty($_POST['id']) &&
        !empty($_POST["date"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["statut"])
    ) {
        $livraison = new Livraison(
            null,
            $_POST['id'],
            $_POST['date'],
            $_POST['adresse'],
            $_POST['statut']
        );
        $livraisonR=new LivraisonC();
        $livraisonR->addLivraison($livraison);
        header('Location:addlivraison.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livraison</title>
</head>

<body>
    
    

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="id">idLivraison:</label></td>
                <td>
                    <input type="text" id="id" name="id" />
                </td>
            </tr>
            <tr>
                <td><label for="date">DateLivraison</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                </td>
            </tr>
            <tr>
                <td><label for="email" >AdresseLivraison</label></td>
                <td>
                   <textarea name="adresse" id="adresse" cols="30" rows="10"></textarea> 
                </td>
            </tr>
            <tr>
                <td><label for="telephone">StatutLivraison</label></td>
                <td>
                    <input type="radio" id="statut" name="statut" />
                    non livrée</td>
                    
                
                <td><input type="radio" id="statut" name="statut">livrée</td>
            </tr>
            <tr>
                <td>
            <button class="button"><a class="d" href="listLivraison.php">valider la livraison</button></a>
            </td>
            </tr>
        </table>

    </form>
</body>

</html>