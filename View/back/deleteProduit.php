<?php
    require_once '../../controller/ProduitC.php';
    $ProduitC = new ProduitC();
    if (isset ($_GET["id"])&&!empty($_GET["id"])){
        $list = $ProduitC->delete($_GET["id"]);
        header('location:afficherProduit.php');
    }
    else {
        echo "undefined nom";
    }
?>