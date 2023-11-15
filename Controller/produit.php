<?php

require 'C:\xampp\htdocs\projetWeb2A\config.php';
class Produit
{



    public  function listProduits()
    {

        $sql = "SELECT * from products";
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


        $sql = "DELETE from products where id = $id";
        $db = config::getConnexion();

        $req = $db->prepare($sql);

        try {
            $req->execute();

            echo "produit supprimé";
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }
     }
    

        public function update($id,$quant)
    {


        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE products SET quantité = $quant WHERE idClient= $id "
            );
            $query->execute();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
}
}

?>