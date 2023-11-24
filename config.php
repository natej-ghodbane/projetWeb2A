<?php

class config
{

    public  static function getConnexion()
    {
        try {

            $pdo = new PDO(
                'mysql:host=localhost;dbname=shop_db',
                'root',
                '',


                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]


            );

            // echo "connected successfully";
        } catch (PDOException $e) {

            echo " Erreur :" . $e->getMessage();
        }

        return $pdo;
    }
}
function create_unique_id(){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>