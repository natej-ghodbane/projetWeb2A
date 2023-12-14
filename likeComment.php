<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_comt"])) {
    $id_comt = $_POST["id_comt"];

    try {
        $db = config::getConnexion();
        
        $sql = "UPDATE comment SET `like` = `like` + 1 WHERE id_comt = :id_comt";

        $query = $db->prepare($sql);
        $query->bindParam(':id_comt', $id_comt, PDO::PARAM_INT);
        $query->execute();

        // Send a success response if needed
        $response = array('success' => true, 'message' => 'Update successful');
        echo json_encode($response);
    } catch (PDOException $e) {
        // Handle the error
        $response = array('success' => false, 'message' => $e->getMessage());
        echo json_encode($response);
    }
}


?>

