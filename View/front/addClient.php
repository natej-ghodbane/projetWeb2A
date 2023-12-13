<?php
include 'C:\xampp\htdocs\integration\controller\clientC.php';
include 'C:\xampp\htdocs\integration\Model\Client.php';
/*include '../Controller/clientC.php';*/
/*include '../../Model/Client.php';*/

$error = "";


$client = null;


$clientC = new ClientC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["Motdepasse"]) &&
    isset($_POST["Motdepasse1"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Adresse"])&&
    isset($_POST["Occupation"]) 

) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["Motdepasse"]) &&
       !empty($_POST["Motdepasse1"]) &&
        !empty($_POST["Email"]) &&
        !empty($_POST["Adresse"]) &&
        !empty($_POST["Occupation"]) 
       
    ) {
        $client = new Client(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['Motdepasse'],
            $_POST['Email'],
            $_POST['Adresse'],
            $_POST['Occupation']
    
        );
        $clientC->addClient($client);
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
    <a href="listClient.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nom">First Name:
                    </label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Last Name:
                    </label>
                </td>
                <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
            </tr>

<tr>
                <td>
                    <label for="Motdepasse">password:
                    </label>
                </td>
                <td>
                    <input type="text" name="Motdepasse" id="Motdepasse">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="Motdepasse1">confirm password:
                    </label>
                </td>
                <td>
                    <input type="text" name="Motdepasse1" id="Motdepasse1">
                </td>
            </tr>



            <tr>
                <td>
                    <label for="Email">email:
                    </label>
                </td>
                <td>
                    <input type="text" name="Email" id="Email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Adresse">Address:
                    </label>
                </td>
                <td>
                    <input type="text" name="Adresse" id="Adresse">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Occupation">Occupation:
                    </label>
                </td>
                <td>
                    <input type="text" name="Occupation" id="Occupation">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>