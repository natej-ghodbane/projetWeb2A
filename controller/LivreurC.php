<?php
include "c:xampp/htdocs/projetWeb2A/configuration.php";

class LivreurC{
  
    public function listlivreurs(){
        $sql = "SELECT * from livreur";
        $db = config::getConnexion();

        try {

            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }

        return $liste;
    }
   
    function addlivreur($livreur)
    {
        $sql = "INSERT INTO livreur 
        VALUES (NULL,:nomlivreur, :numero_tel,:statutlivreur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomlivreur' => $livreur->getDatelivreur(),
                'numero_tel' => $livreur->getAdresselivreur(),
                'statutlivreur' => $livreur->getStatutlivreur(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
   
    }

    function deletelivreur($id)
    {


        $sql = "DELETE FROM livreur ORDER BY idlivreur = :id";
        $db = config::getConnexion();

        $req = $db->prepare($sql);
        $req->bindValue(':id',$id);

        try {
            $req->execute();

        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }
    }

    function updateLivreur($livreur,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE livreur SET  
                statutlivreur= :Statutlivreur
               
                WHERE Idlivreur= :Idlivreur'
            );
            $query->execute([
                'Idlivreur'=> $id,
                'statutlivreur' => $livreur->getStatutLivreur()
               
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
     
    function showLivreur($idLivreur)
    {
        $sql = "SELECT * from livreur where idlivreur = $idLivreur";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $livreur = $query->fetch();
            return $livreur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




}

?>