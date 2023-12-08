<?php
require 'C:\xampp\htdocs\projet\config.php';
include 'C:\xampp\htdocs\projet\Controller\clientC.php';
$db=config::getConnexion();
$id=$_GET['id'];

$query=$db->prepare("select * from utilisateur where id='$id'");
$query->execute(); 
$results = $query->fetchAll($db::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css.css" />
  <title>MediMart</title>
  

</head>

<body>


    <header>

        <div class="header">
            <a href="profile.php" class="logo"><img src="images/logo.png" alt=""></a>
            <div class="header-right">
              <a href="#">Home</a>
              <a href="blog.html">BLOG</a>
              <a href="#profile">profile</a>
              <a href="panier.html" class="fas fa-shopping-cart"></a>
              <a href="reclamation.html" class="fas fa-headphones"></a>
            </div>
          </div>
          
   </header>
   <br>
   <section id="profile">
   <div class="col-sm-12 col-md-6">
  
</div>
      <?php 
      foreach($results as $t){
        ?>
        <div>
          <h1 style="text-align: center;">welcome: <?php echo $t['nom']?></h1>
          <h1 style="text-align: center;">prenom: <?php echo $t['prenom']?></h1>
          <h1 style="text-align: center;">email: <?php echo $t['Email']?></h1>
          <h1 style="text-align: center;">adresse: <?php echo $t['Adresse']?></h1>
          <a href="index.html">log out</a>
        </div>
        
       
      <?php  
      }
      ?>
      <pre>




































</pre>
</section>
<div class="slideshow " >
<img class="mySlides" src="images/bann1.png" >
<img class="mySlides" src="images/bann2.png" >
<img class="mySlides" src="images/bann3.png">
</div>
<br><br>

<div class="row">
<div class="column">
<div class="card1">
  <img src="images/deal.jpg" style="width:100%">
  <div class="container">
    <h2>DEALS DU MOIS</h2>
    <button class="button"><a class="d" href="cactus.html"> voir les produits</button></a>
    
  </div>
</div>
</div>

<div class="column">
<div class="card1">
  <img src="images/coffret.png" style="width:100%">
  <div class="container">
    <h2>NOS COFFRETS</h2>
   
    <button class="button"><a class="d" href="cactus.html"> voir les produits</button></a>
  </div>
</div>
</div>

<div class="column">
<div class="card1">
  <img src="image/succulantes.jpg" style="width:100%">
  <div class="container">
    <h2>NOS BEST SELLERS</h2>
   
  <button class="button"><a class="d" href="cactus.html"> voir les produits</button></a>
  </div>
</div>
</div>
</div>
<br><br>

<center>
<table style="width: 90%;">
<caption style="text-align: center;"><h2 ><i>TOP MARQUES DE PARAPHARMACIE</i></h2></caption>
<tr>
<td  class="image-container"><img src="images/avene.png" alt=""></td>
<td  class="image-container"><img src="images/filorga.png" alt=""></td>
<td class="image-container"><img src="images/sesderma.png" alt=""></td>
<td   class="image-container"><img src="images/svr.png" alt=""></td>
<td  class="image-container"><img src="images/nuxe.png" alt=""></td>
</tr>
</table>
<br><br>
</center>
<br>
<center>
<div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d2889.322901655833!2d10.172476955464342!3d36.84712824755623!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzbCsDUwJzUwLjEiTiAxMMKwMTAnMzAuNiJF!5e1!3m2!1sfr!2stn!4v1699546334228!5m2!1sfr!2stn" width="1080" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div></div>
</center>
<br><br><br>

<footer class="site-footer">
<div class="container">
<div class="row">
<table style="width: 100%;">
<tr style="text-align: center;">
  <td>
<div class="col-sm-12 col-md-6">
  <h6>Information</h6>
  <p class="text-justify">MediMart.tn <i>un site web de parapharmacie </i>  pour promouvoir la santé et le bien-être. Avec une large gamme de produits de qualité, nous visons à fournir des informations et un accès, tout en mettant à disposition nos conseillers pour satisfaire les besoins de nos clients et les aider à faire des choix éclairés pour leur santé.</p>
</div>
</td>
<td>
<div class="col-xs-6 col-md-3">
  <h6>Notre Magazin</h6>
  <ul class="footer-links">
    <li>Adresse: 12 Rue de la democratie </li>
    <li>Manzah 5,Tunis,2091</li>
    <li>Tel: +216 70 125 002</li>
    <li>E-mail: contact@medimart.tn</li>
  </ul>
</div>
</td>
</tr>
</div>

</div>
<tr>
<td>
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-6 col-xs-12">
  <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
<a href="index.html">MediMart</a>.
  </p>
</div>
</td>
</tr>
</table>
</div>
</footer>


<script>
    var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}
</script>
</body>
</html>