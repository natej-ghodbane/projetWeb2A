<?php
include "c:xampp/htdocs/projetWeb2A/configuration.php";

class LivraisonC
{
    
    
    public  function listLivraisons()
    {

        $sql = "SELECT * from livraison";
        $db = config::getConnexion();

        try {

            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }

        return $liste;
    }

    function delete($id)
    {


        $sql = "DELETE FROM livraison WHERE IdLivraison = :id";
        $db = config::getConnexion();

        $req = $db->prepare($sql);
        $req->bindValue(':id',$id);

        try {
            $req->execute();

        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }
    }

    function addLivraison($livraison)
    {
        $sql = "INSERT INTO livraison (AdresseLivraison, StatutLivraison) VALUES (:adresse, :statut)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':adresse', $livraison->getAdresseLivraison());
            $query->bindValue(':statut', $livraison->getStatutLivraison());
            $query->execute();
        } catch (PDOException $e) {
            echo 'Error inserting Livraison: ' . $e->getMessage();
        }
    }
    
    


    function showLivraison($idLivraison)
    {
        $sql = "SELECT * from livraison where IdLivraison = $idLivraison";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $livraison = $query->fetch();
            return $livraison;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateLivraison($livraison, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET  
                StatutLivraison = :StatutLivraison
                WHERE IdLivraison = :IdLivraison'
            );
            $query->execute([
                'IdLivraison' => $id,
                'StatutLivraison' => $livraison->getStatutLivraison()
            ]);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error updating Livraison: ' . $e->getMessage(); // Ajout de l'affichage du message d'erreur
        }
    }
    





}





?>