<?php
include 'C:\xampp\htdocs\projetWeb2A\Controller\produit.php';
// include 'C:\xampp\htdocs\projetWeb2A\config.php';

// $pro = new Produit();
// $tab = $pro->listProduits();
if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30);
}

$conn = config::getConnexion();

$c = new Produit();
$produit = $c->listProduits();


if(isset($_POST['add_to_cart'])){
   
   $id = create_unique_id();
   $product_id = $_POST['product_id'];
   $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   
   $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?");   
   $verify_cart->execute([$user_id, $product_id]);

   $max_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $max_cart_items->execute([$user_id]);

   if($verify_cart->rowCount() > 0){
      $warning_msg[] = 'Already added to cart!';
   }elseif($max_cart_items->rowCount() == 10){
      $warning_msg[] = 'Cart is full!';
   }else{

      $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
      $select_price->execute([$product_id]);
      $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

      $insert_cart = $conn->prepare("INSERT INTO `cart`( id,user_id, product_id, price, qty) VALUES(?,?,?,?,?)");
      $insert_cart->execute([ $id,$user_id, $product_id, $fetch_price['price'], $qty]);
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css.css" />
</head>
<body>
   
<?php include 'components/header.php'; ?>

<section class="products">

   <h1 class="heading">all products</h1>

   <div class="box-container">

   <?php 
      
         foreach ($produit as $p){
   ?>
   <form action="" method="POST" class="box" onsubmit="return validerQuantité()">
      <img src="project_assets/<?= $p['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $p['name'] ?></h3>
      <input type="hidden" name="product_id" value="<?= $p['id']; ?>">
      <div class="flex">
         <p class="price">TND </i><?= $p['price'] ?></p>
         <input type="number" id="q" name="qty" value="1" class="qty">
      </div>
      <input type="submit"  name="add_to_cart" value="add to cart" class="btn">
      <a href="checkout.php?get_id=<?= $p['id']; ?>" class="delete-btn">buy now</a>
   </form>
   <?php
      }
  
   ?>

   </div>

</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- <script src="js/script.js"></script> -->
<script src="inscription.js"></script>



</body>
</html>