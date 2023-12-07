<?php

include 'c:xampp/htdocs/projetWeb2A/controller/commande.php';


$livraison = new commandeC();
$tab = $livraison->listcommandes();

?>
<!DOCTYPE html>
<html>
<head>

	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head> 
<body>

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

   <?php
   foreach ($tab as $livraison) {
   ?>
   <center>
    <h1>Liste des commandes</h1>
    
</center>
<table border="1" align="center" width="70%">
<tr>
        <th>Id commandes</th>
        <th>adreese</th>
        <th>prix</th>
        <th>statut</th>
    </tr>
       <tr>
           <td><?= $livraison['idcommande']; ?></td>
           <td><?= $livraison['adressecommande']; ?></td>
           <td><?= $livraison['prix']; ?></td>
           <td><?= $livraison['statutcommande']; ?></td>
      
           <td><form action="updateLivraison.php" method="post">
           <a href="addlivraison.php?idcommande=<?php echo $livraison['idcommande'];?>">livrer</a>
               <input type="hidden" value=<?php echo $livraison['idcommande'];?> name="idliv">
           </form></td>
           <td>
               <a href="deletelivraison.php?idcommande=<?php echo $livraison['idcommande'];?>">supprimer</a>
           </td>
       </tr>
       
   <?php
   }
   ?>
   </table>   


  
    
</section>	
</body>
</html>	