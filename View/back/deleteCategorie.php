<?php
    require_once '../../controller/CategorieC.php';
    $CategorieC = new CategorieC();
    if (isset ($_GET["nom"])&&!empty($_GET["nom"])){
        $list = $CategorieC->delete($_GET["nom"]);
        header('location:afficherCategorie.php');
    }
    else {
        echo "undefined nom";
    }
?>