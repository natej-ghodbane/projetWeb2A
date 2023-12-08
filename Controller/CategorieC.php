<?php
    require_once '../../config.php';
    require_once '../../Model/Categorie.php';

    class CategorieC {
        public function createCategorie(Categorie $categorie) {
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO categorie (nom_c, description_c) VALUES (?, ?)';
                $list = $pdo->prepare($sql);
                $nom_c = $categorie->getNomC();
                $list->bindParam(1, $nom_c);
                $description_c = $categorie->getDescriptionC();
                $list->bindParam(2, $description_c);
                $list->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function updateCategorie(Categorie $categorie, string $nom_c) {
            try {
                $pdo = config::getConnexion();
                $sql = 'UPDATE categorie SET nom_c=:new_nom_c, description_c=:description_c WHERE nom_c=:nom_c';
                $list = $pdo->prepare($sql);
                $new_nom_c = $categorie->getNomC();
                $list->bindParam(':new_nom_c', $new_nom_c);
                $description_c = $categorie->getDescriptionC();
                $list->bindParam(':description_c', $description_c);
                $list->bindParam(':nom_c', $nom_c);
                $list->execute();
                echo $list->rowCount() . " records Updated successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function delete(string $nom_c) {
            try {
                $pdo = config::getConnexion();
                $sql = 'DELETE FROM categorie WHERE nom_c = :nom_c';
                $list = $pdo->prepare($sql);
                $list->bindParam(':nom_c', $nom_c);
                $list->execute();
                echo $list->rowCount() . " records deleted successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function listCategories() {
            try {
                $pdo = config::getConnexion();
                $sql = "SELECT * FROM categorie";
                $statement = $pdo->query($sql);
                $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $categories;
            } catch (PDOException $e) {
                echo "Erreur: " . $e->getMessage();
                return null;
            }
        }

        public function findCategorie(string $nom){
            try {
                $pdo = config::getConnexion();
                $sql = 'SELECT * FROM categorie WHERE nom_c = :nom';
                $list = $pdo->prepare($sql);
                $list->bindParam(':nom', $nom);
                $list->execute();   
                return $list->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return null;
            }
        }

        public function listCategoriesNames() {
            try {
                $pdo = config::getConnexion();
                $sql = "SELECT nom_c FROM categorie";
                $statement = $pdo->query($sql);
                $categories = $statement->fetchAll(PDO::FETCH_COLUMN);
                return $categories;
            } catch (PDOException $e) {
                echo "Erreur: " . $e->getMessage();
                return null;
            }
        }
        
        
    }
?>
