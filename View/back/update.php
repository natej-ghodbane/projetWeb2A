<?php

include 'C:\xampp\htdocs\projetWeb2A\Controller\commande.php';
include 'C:\xampp\htdocs\projetWeb2A\Model\commande.php';
$error = "";

// create commande

// create an instance of the controller
$commandeC = new commande();


if (
    isset($_POST["status"]) 
 
) {
    if (
        !empty($_POST['status']) 
        
    ) {
        $comm = new commandeM(
            $_POST['idcommande'],
            $_POST['userid'],
            $_POST['name'],
            $_POST['number'],
            $_POST['email'],
            $_POST['address'],
            $_POST['adresset'],
            $_POST['method'],
            $_POST['proid'],
            $_POST['price'],
            $_POST['qty'],
            new DateTime($_POST['date']),
            $_POST['status'],
            $_POST['idpan']
        );
        $commandeC->updatecommande($comm,$_POST['idcommande'],);

        header('Location:index.php');
    } else
        $error = "Missing information";
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">MartMint</a>
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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                        </div>
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Order
                            </a>
                            
                        </div>
                        <div class="nav">
                            <a class="nav-link" href="listecart.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Cart
                            </a>
                            
                        </div>

                        
                    </div>
                   
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main>
            <?php
    if (isset($_POST['idcommande'])) {
        $commande = $commandeC->showOrders($_POST['idcommande']);

    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="nom">Idcommande :</label></td>
                    <td>
                        <input type="text" id="idcommande" name="idcommande" readonly value="<?php echo $_POST['idcommande'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr> <td><label for="nom">userid :</label></td>
                    <td><input type="text" name="userid" readonly value="<?php echo $commande['user_id']; ?>"></td></tr>
                <tr> <td><label for="nom">nom :</label></td>
                <td><input type="text" name="name" readonly value="<?php echo $commande['name']; ?>"></td></tr>
                <tr> <td><label for="nom">numero :</label></td>
                <td><input type="text" name="number" readonly value="<?php echo $commande['number']; ?>"></td></tr>
                <tr> <td><label for="nom">mail :</label></td>
                <td><input type="text" name="email" readonly value="<?php echo $commande['email']; ?>"></td></tr>
                <tr> <td><label for="nom">adresse :</label></td>
                <td><input type="text" name="address" readonly value="<?php echo $commande['address']; ?>"></td></tr>
                <tr> <td><label for="nom">adressetype:</label></td>
                <td><input type="text" name="adresset" readonly value="<?php echo $commande['address_type']; ?>"></td></tr>
                <tr> <td><label for="nom">method :</label></td>
                <td><input type="text" name="method" readonly value="<?php echo $commande['method']; ?>"></td></tr>
                <tr> <td><label for="nom">product id :</label></td>
                <td><input type="text" name="proid" readonly value="<?php echo $commande['product_id']; ?>"></td></tr>
                <tr> <td><label for="nom">prix:</label></td>
                <td><input type="text" name="price" readonly value="<?php echo $commande['price']; ?>"></td></tr>
                <tr> <td><label for="nom">quantité :</label></td>
                <td><input type="text" name="qty" readonly value="<?php echo $commande['qty']; ?>"></td></tr>
                <tr> <td><label for="nom">date :</label></td>
                <td><input type="text" name="date" readonly value="<?php echo $commande['date']; ?>"></td></tr>

                <tr>
                   
                    <td><label for="status">Status :</label></td>  
                    <td>
                    <!-- <input type="text" id="status" name="status" value=" <?//php echo $commande['status'] ?>"  /> -->
                     <label ><input type="radio" name="status" id="status"  value="<?php echo $commande['status'] ?>" checked> <?php echo $commande['status'] ?> </label> 
                     <label ><input type="radio" name="status" id="status" value="canceled"> canceled </label> 
                     <label ><input type="radio" name="status" id="status" value="delivered" > delivered </label> 
                    </td>
                </tr>
                <tr> <td><label for="nom">Idpan :</label></td>
                    <td><input type="text" name="idpan" readonly value="<?php echo $commande['idpan']; ?>"></td></tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>     
            






            </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
