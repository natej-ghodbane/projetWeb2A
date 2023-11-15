<?php

include 'C:\xampp\htdocs\projetWeb2A\Controller\produit.php';


$c = new Produit();

$liste = $c->listProduits();
?>

<!DOCTYPE html>
<html>
<head>

	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="css.css">


</head> 
<body>

	<header>

        <div class="header">
            <a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
            <div class="header-right">
              <a href="index.html">Home</a>
              <a href="produit.php">Produits</a>
              <a href="#contact">Contact</a>
              <a href="panier.html">Panier</a>
              <a href="blog.html">BLOG</a>
              <a href="login.html">Se Connecter</a>
            </div>
          </div>
          
   </header>



<div align="center">
    <h1>CART</h1>
    <table border="1">
    <form action="" method="get">
        <tr>
            <td>Id</td>
            <td>imgage</td>
            <td>name</td>
            <td>price</td>
            <td>quantité</td>
            <td>action</td>
        </tr>
        <?php foreach ($liste as $l) {  ?>
            <tr>
                <td><?php echo $l['id'] ?></td>
                <td><img src="<?=$l['img']?>" width="90"></td>
                <td><?php echo $l['name'] ?></td>
                <td><?php echo $l['price'] ?></td>
                <td>
                <form action="update.php" methode="get" >
                    <input type="hidden" name="id" value="<?php echo $l['id'] ?>"> 
                    <input type="text" name="quantité" id="q" value="<?php echo $l['quantité'] ?>">
                    <input type="submit" onclick="return validerQuantité()" name="update" value="update ">
                </form>
                </td>
                <td><a href="delete.php?id=<?php echo $l['id'] ?>"><img src="delete.png" width="70"></a></td>
            </tr>
        <?php  } ?>
        <tr>
            <td>
            <button type="submit">passer la commande</button>
            </td>
        </tr>
    </form>


    </table>
    
</div>
<script src="inscription.js"></script>
<footer class="site-footer" style="margin-top: 500px;">
    <center>
     <div class="foot">
         <div class="column1">
             <p class="p">NOTRE BOUTIQUE</p> 
             <p>Adresse : 15 rue du château</p>
             <p>Paris, France 75001</p>
             <p>Tél : 01 23 45 67 89</p>
             <p>E-mail :  info@monsite.fr</p>   
         </div>
 
         <div class="column1">
             <p class="p">HORAIRES </p> 
             <p>Lun - Ven : 7 h - 22h</p>
             <p>​​Samedi : 8h - 22h</p>
             <p>​Dimanche : 8h - 23h</p>           
         </div>
     </div>    
     </center>
     
 </footer>
</body>
</html>	