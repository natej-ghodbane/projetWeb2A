<?php

include "../../controller/rep.php";
include "../../Model/reponse.php";

$error = "";


// create an instance of the controller
$rep = new reponse();
if (
    isset($_POST["reponse"]) 
) {
    if (
        !empty($_POST["reponse"]) 
       
    ) {
        $reponse = new rep(
            $_POST['id'],
            $_POST['reponse'],
            $_POST['idrec'],
        );
        $rep->updatereponse($reponse, $_POST["id"]);
        header('Location:listerep.php');
    } else
        $error = "Missing information";
  }
?>
<div class="registration form">
      <form action="" method="POST" >
      
      <?php
    if (isset($_POST['id'])) {
        $reponse = $rep->showrep($_POST['id']);}

    ?>
        <input type="text" name="id" id="id"  readonly value=" <?php echo $reponse['idrep']; ?>" >
        <input type="text" name="reponse" id=""  value=" <?php echo $reponse['reponse']; ?>">
        <input type="text" name="idrec" id=""  readonly value=" <?php echo $reponse['idrec']; ?>">
        <input type="submit"  value="Update">
      </form>
      </div>
    <?php
    
    ?>