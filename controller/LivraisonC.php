<?php
include "c:xampp/htdocs/projetWeb2A/config.php";

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
        $sql = "INSERT INTO livraison 
        VALUES (NULL,:DateLivraison, :AdresseLivraison,:StatutLivraison)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'DateLivraison' => $livraison->getDateLivraison(),
                'AdresseLivraison' => $livraison->getAdresseLivraison(),
                'StatutLivraison' => $livraison->getStatutLivraison(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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

    function updateLivraison($livraison, $idLivraison)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livraison SET 
                    IdLivraison = :IdLivraison, 
                    DateLivraison =  :DateLivraison, 
                    AdresseLivraison =  :AdresseLivraison, 
                    StatutLivraiso,= :StatutLivraison
                WHERE IdLivraison= :IdLivraison'
            );
            $query->execute([
                'IdLivraison' => $idLivraison,
                'DateLivraison' => $livraison->getDateLivraison(),
                'AdresseLivraison' => $livraison->getAdresseLivraison(),
                'StatutLivraison' => $livraison->getStatutLivraison(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }







     











}





?>