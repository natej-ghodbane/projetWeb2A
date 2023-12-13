<?php

include 'C:\xampp\htdocs\integration\controller\clientC.php';
include 'C:\xampp\htdocs\integration\Model\Client.php';
$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["Motdepasse"]) &&
   /* isset($_POST["Motdepasse1"]) &&*/
    isset($_POST["Email"])&&
    isset($_POST["Adresse"])&&
    isset($_POST["Occupation"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["Motdepasse"]) &&
       /* !empty($_POST["Motdepasse1"]) &&*/
        !empty($_POST["Email"])&&
        !empty($_POST["Adresse"]) &&
        !empty($_POST["Occupation"])

    ) {
        $client = new Client(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['Motdepasse'],
          /*  $_POST['Motdepasse1'],*/
            $_POST['Email'],
            $_POST['Adresse'],
            $_POST['Occupation'],
           
        );
        $clientC->updateClient($client, $_POST["id"]);
        header('Location:index.php');
    } else
        $error = "Missing information";
}
?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css.css" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Historique</title>
    <style>
        .f{
            margin-top: 100px;
            margin-left: 600px;
            background-color: #f2f2f2;
            border-radius: 10px;
            width: 450px;
            height: 405px;
        }
        .b{                             
            margin-left: 150px;
        }
        .i{
            margin-left: 10px;
        }
        .l{
            margin-left: 20px;
        }
    </style>
</head>
 <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">MediMart</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>           
        </nav>
      
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>


<body>

    <div id="error">
        <?php echo $error; ?>
    </div>



<div class="registration form">
      <header>Signup</header>
      <form action="" method="POST" onsubmit="return test()" class="f">
      
      <?php
    if (isset($_POST['id'])) {
        $client = $clientC->showClient($_POST['id']);}

    ?>
        <label for="" class="l"><b>ID client</b></label>
        <input type="text" name="id" id="id" placeholder="Client ID" readonly value=" <?php echo $client['id']; ?>" class="i">
        <br><br>
        <label for="" class="l"><b>nom</b></label>
        <input type="text" name="nom" id="nom" placeholder="Enter your FirstName" value=" <?php echo $client['nom']; ?>" class="i">
        <br><br>
        <label for="" class="l"><b>prenom</b></label>
        <input type="text" name="prenom" id="prenom" placeholder="Enter your LastName"value=" <?php echo $client['prenom']; ?>" class="i">
        <br><br>
        <label for="" class="l"><b>mot de passe</b></label>
        <input type="password" name="Motdepasse" id="Motdepasse" placeholder="Create a password"value=" <?php echo $client['Motdepasse']; ?>" class="i">
        <br><br>
        <label for="" class="l"><b>email</b></label>
        <input type="text" name="Email" id="Email" placeholder="Enter your email"value=" <?php echo $client['Email']; ?>" class="i">
        <br><br>
        <label for="" class="l"><b>email</b></label>
        <input type="text" name="Adresse" id="Adresse" placeholder="Enter your adress"value=" <?php echo $client['Adresse']; ?>" class="i">
        <br><br>
        <label for="" class="l"><b>occupation</b></label>
        <input type="Occupation" name="Occupation" id="Occupation" placeholder="Enter your occupation "value=" <?php echo $client['Occupation']; ?>" class="i">
        <br><br>
        <input type="submit"  value="Update" class="b">
      </form>
      </div>
    <?php
    
    ?>
      </form>
      </div>
    <?php
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.php"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>

</body>




        
       
