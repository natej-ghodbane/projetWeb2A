<?php

include '../Controller/ClientC.php';
include '../model/Client.php';
$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["Motdepasse"]) &&
    isset($_POST["Email"])&&
    isset($_POST["Adresse"])&&
    isset($_POST["Occupation"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["Motdepasse"]) &&
        !empty($_POST["Email"])&&
        !empty($_POST["Adresse"]) &&
        !empty($_POST["Occupation"])

    ) {
        $client = new Client(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['Motdepasse'],
            $_POST['Email'],
            $_POST['Adresse'],
            $_POST['Occupation'],
           
        );
        $clientC->updateClient($client, $_POST["id"]);
        header('Location:listClient.php');
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
    <button><a href="listClient.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $client = $clientC->showClient($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id Client:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $client['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $client['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $client['prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Motdepasse">Password:
                        </label>
                    </td>
                    <td><input type="text" name="Motdepasse" id="Motdepasse" value="<?php echo $client['Motdepasse']; ?>" maxlength="20"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="Email">mail:
                        </label>
                    </td>
                    <td><input type="text" name="Email" id="Email" value="<?php echo $client['Email']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Adresse">Adress:
                        </label>
                    </td>
                    <td><input type="text" name="Adresse" id="Adresse" value="<?php echo $client['Adresse']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Occupation">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="Occupation" id="Occupation" value="<?php echo $client['Occupation']; ?>" maxlength="20"></td>
                </tr>
             
                <tr>
                    <td></td>
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