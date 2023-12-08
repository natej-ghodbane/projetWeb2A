<?php
require_once '../../config.php';
require_once '../../Model/Produit.php'; // Assurez-vous d'avoir le bon chemin vers votre modèle Produit

class ProduitC {

    public function listProduits(){
        if(isset($_GET['search']) AND !empty($_GET['search'])){
            $nom = $_GET['search'];
            try {
                $pdo = config::getConnexion();
                $sql = 'SELECT * FROM produits WHERE nom LIKE "%'.$nom.'%"';
                $statement = $pdo->query($sql);
                $produits = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $produits;
            } catch(PDOException $e) {
                echo "Erreur: " . $e->getMessage();
                return null;
            }
        }
        else{
            try {
                $pdo = config::getConnexion();
                $sql = "SELECT * FROM produits";
                $statement = $pdo->query($sql);
                $produits = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $produits;
            } catch(PDOException $e) {
                echo "Erreur: " . $e->getMessage();
                return null;
            }
        }
    }

    public function listCategories($nom_c) {
        try {
            $pdo = config::getConnexion();
            $sql = 'SELECT * FROM categorie WHERE nom_c = '.$nom_c.'';
            $statement = $pdo->query($sql);
            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
            return null;
        }
    }

    public function delete(int $id){
        $pdo = config::getConnexion();
        $sql = 'DELETE FROM produits WHERE id = '.$id.'';
        try{
            $list = $pdo->prepare($sql);
            $list->execute();
            echo $list->rowCount() ." records deleted successfully";
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function createProduit($produit){
        try {
            $pdo = config::getConnexion();
            $sql = 'INSERT INTO `produits`(`nom`, `description`, `categorie`, `prix`, `stock`, `fournisseur`, `date_ajout`, `image`) VALUES  (?, ?, ?, ?, ?, ?, ?, ?)';
            $list = $pdo->prepare($sql);
            
            $nom = $produit->getNom();
            $list->bindParam(1, $nom);
            
            $description = $produit->getDescription();
            $list->bindParam(2, $description);
            
            $categorie = $produit->getCategorie();
            $list->bindParam(3, $categorie);
            
            $prix = $produit->getPrix();
            $list->bindParam(4, $prix);
            
            $stock = $produit->getStock();
            $list->bindParam(5, $stock);
            
            $fournisseur = $produit->getFournisseur();
            $list->bindParam(6, $fournisseur);
            
            // Conversion de la date en format adapté pour MySQL
            $date_ajout = $produit->getDateAjout()->format('Y-m-d');
            $list->bindParam(7, $date_ajout);
            
            // Traitement de l'image et enregistrement du chemin dans la base de données
            $image = $produit->getImage();
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/HamzaJlassi/uploads/";
            $target_file = $target_dir . basename($image["name"]);
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $list->bindParam(8, $target_file);
                echo "Le produit a été ajouté avec succès à la base de données.";
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
            $list->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du produit : " . $e->getMessage();
        }
    }
    
    public function updateProduit($produit, $id){
        try {
            $pdo = config::getConnexion();
            $sql = 'UPDATE produits SET nom=:nom, description=:description, categorie=:categorie, prix=:prix, stock=:stock, fournisseur=:fournisseur, date_ajout=:date_ajout, image=:image WHERE id=:id';
            $list = $pdo->prepare($sql);
            $list->bindParam(':id', $id);
            $nom = $produit->getNom();
            $list->bindParam(':nom', $nom);
            $description = $produit->getDescription();
            $list->bindParam(':description', $description);
            $categorie = $produit->getCategorie();
            $list->bindParam(':categorie', $categorie);
            $prix = $produit->getPrix();
            $list->bindParam(':prix', $prix);
            $stock = $produit->getStock();
            $list->bindParam(':stock', $stock);
            $fournisseur = $produit->getFournisseur();
            $list->bindParam(':fournisseur', $fournisseur);
            $date_ajout = $produit->getDateAjout()->format('Y-m-d'); // Si la date est un objet DateTime
            $list->bindParam(':date_ajout', $date_ajout);
    
            $image = $produit->getImage();
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/HamzaJlassi/uploads/";
            $target_file = $target_dir . basename($image["name"]);
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $list->bindParam(':image', $target_file);
                echo "Le produit a été ajouté avec succès à la base de données.";
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
    
            $list->execute();
            echo $list->rowCount() . " records Updated successfully";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    

    public function findProduit(int $id){
        try {
            $pdo = config::getConnexion();
            $sql = 'SELECT * FROM produits WHERE id = '.$id.'';
            $list = $pdo->prepare($sql);
            $list->execute();   
            return $list->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
