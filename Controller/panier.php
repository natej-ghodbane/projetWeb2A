<?php

require 'C:\xampp\htdocs\projetWeb2A\config.php';

class panier
{

    public function listcart()
    {
        $sql = "SELECT * FROM cart";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletepanier($ide)
    {
        $sql = "DELETE FROM cart WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcart($cart)
    {
        $sql = "INSERT INTO cart  
        VALUES (NULL, :nom,:prenom, :email,:tel)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $cart->getNom(),
                'prenom' => $cart->getPrenom(),
                'email' => $cart->getEmail(),
                'tel' => $cart->getTel(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showcart($id)
    {
        $sql = "SELECT * from cart where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $cart = $query->fetch();
            return $cart;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatepanier($p,$id,$sta)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE cart SET 
                qty = :qty 
                WHERE `cart`.`id` = $id"
            );

            $query->execute([
                'qty' => $p->getqty()
            ]
            );

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
