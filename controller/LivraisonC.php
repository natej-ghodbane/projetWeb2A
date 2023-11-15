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

    public function delete($id)
    {


        $sql = "DELETE from livraison where IdLivraison = $id";
        $db = config::getConnexion();

        $req = $db->prepare($sql);

        try {
            $req->execute();

            echo "livraison supprimé";
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }
    }

    function addLivraison($livraison)
    {
        echo "aicha";
        $sql = "INSERT INTO livraison (IdLivraison,DateLivraison,AdresseLivraison,StatutLivraison) 
        VALUES (NULL, :IdLivraison,:DateLivraison, :AdresseLivraison,:StatutLivraison)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'IdLivraison' => $livraison->getIdLivraison(),
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
                    StatutLivraiso,= :StatutLivraison,
                WHERE idLivraison= :idLivraison'
            );
            $query->execute([
                'IdLivraison' => $idLivraison->getIdLivraison(),
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