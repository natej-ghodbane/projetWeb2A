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
            <a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
            <div class="header-right">
              <a href="index.html">Home</a>
              <a href="blog.html">BLOG</a>
              <a href="produits.php">Produit</a>
              <a href="login.html">Se Connecter</a>
              <a href="panier.html" class="fas fa-shopping-cart"></a>
              <a href="reclamation.html" class="fas fa-headphones"></a>
            </div>
          </div>
          
   </header>
   <br>

   <h1 class="page-title">Liste des Produits</h1>
   <br><br>
   <form method="GET">
        <div class="form-group row">
            <div>
                <input type="search" name="search" class="DocSearch-Input form-control" placeholder="Nom du produit">
            </div>
            <div>
                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
   
   <?php
        require_once '../../model/Produit.php';
        require_once '../../controller/ProduitC.php';
        $ProduitC = new ProduitC();
        $Produits = $ProduitC->listProduits();
        ?>
    <?php foreach ($Produits as $product) { ?>
        <div class="row">
          <div class="column">
            <div class="card1">
            <?php
                $imagePath = $product['image'];
                $basePathToRemove = 'C:/xampp/htdocs';
                $relativePath = str_replace($basePathToRemove, '', $imagePath);?>                
                <img src="<?= $relativePath ?>" style="width:100%">
                <div class="container">
                    <h2><?=$product['nom']?></h2>
                <button class="button"><a class="d" href="afficherProduitSingle.php?id=<?= $product['id'] ?>"> voir les produits</button></a>
                
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
    <style>
        .page-title {
        text-align: center; /* Centre le texte */
        margin-top: 50px; /* Ajoute un espacement en haut pour améliorer la présentation */
        }

        .row {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; /* Permet le retour à la ligne des éléments */
        }

        

        .column {
        flex: 0 0 25%; /* Largeur des éléments, ajustez selon vos besoins */
        padding: 10px; /* Espace entre les éléments */
        }

    </style>

  <br><br>

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