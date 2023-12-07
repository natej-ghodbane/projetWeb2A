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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css.css" />
    <title>update</title>
    <style>
        * {
          box-sizing: border-box;
        }
        
        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }
        
        label {
          padding: 12px 12px 12px 0;
          display: inline-block;
        }
        
        input[type=submit] {
          background-color: #123132;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
        }
        
        input[type=submit]:hover {
          background-color: #ddd;
        }
        
        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        
        .col-25 {
          float: left;
          width: 25%;
          margin-top: 6px;
        }
        
        .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
        }
        
        /* Clear floats after the columns */
        .row::after {
          content: "";
          display: table;
          clear: both;
        }
        
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
          }
        }
        </style>
</head>
<header>

<div class="header">
    <a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
    <div class="header-right">
      <a href="index.html">Home</a>
      <a href="blog.html">BLOG</a>
      <a href="login.html">Se Connecter</a>
      <a href="panier.html" class="fas fa-shopping-cart"></a>
      <a href="reclamation.html" class="fas fa-headphones"></a>
    </div>
  </div>
  
</header>
<br>

<body>
    <button><a href="listLivraison.php">Back to list</a></button>
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
                        <input type="text" name="statut" value="non livree" id="statut">
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