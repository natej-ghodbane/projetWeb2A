


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css.css" />
    <title>reclamation</title>
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
<?php

include 'c:xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'c:xampp/htdocs/projetWeb2A/model/Livraison.php';

$livraison = new LivraisonC();
$tab = $livraison->listLivraisons();

?>

<center>
    <h1>Liste des Livraisons</h1>
    
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Livraison</th>
        <th>DateLivraison</th>
        <th>AdresseLivraison</th>
        <th>StatutLivraison</th>
    </tr>


    <?php
    foreach ($tab as $livraison) {
    ?>
    
        <tr>
            <td><?= $livraison['IdLivraison']; ?></td>
            <td><?= $livraison['DateLivraison']; ?></td>
            <td><?= $livraison['AdresseLivraison']; ?></td>
            <td><?= $livraison['StatutLivraison']; ?></td>
            <td><form action="updateLivraison.php" method="post">
                <input type="submit" name="update" value="update">
                <input type="hidden" value=<?php echo $livraison['IdLivraison'];?> name="idliv">
            </form></td>
            <td>
                <a href="deletelivraison.php?IdLivraison=<?php echo $livraison['IdLivraison'];?>">supprimer</a>
            </td>
        </tr>
        
    <?php
    }
    ?>
</table>

