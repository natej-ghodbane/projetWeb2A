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
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="afficherProduit.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Produits
                            </a>
                            <a class="nav-link" href="afficherCategorie.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Categorie
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
                    require_once '../../model/Categorie.php';
                    require_once '../../controller/CategorieC.php';
                    $CategorieC = new CategorieC();
                    $Categories = $CategorieC->listCategories();
                ?>
                <br><br>
                
                <h4>Les Catégories</h4>

                <table class="table ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php foreach ($Categories as $Categorie){ ?>
                        <tr>
                            <td><?= $Categorie['nom_c'] ?></td>
                            <td><?= $Categorie['description_c'] ?></td>
                            <td>
                                <a href="deleteCategorie.php?nom=<?= $Categorie['nom_c'] ?>" style="background-color: #3b3131;" class="btn btn-primary"> Delete </a>
                                <a href="updateCategorie.php?nom=<?= $Categorie['nom_c'] ?>" style="background-color: #3b3131;" class="btn btn-primary"> Update </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                </table>

                <a href="ajouterCategorie.php" style="background-color: #000000;" class="btn btn-primary"> Ajouter Catégorie <i class="fa fa-plus" aria-hidden="true"></i></a>


                    
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                        background-color: #ffffff; /* Fond blanc */
                    }

                    th, td {
                        border: 1px solid #dddddd;
                        padding: 8px;
                        text-align: left;
                    }

                    th {
                        background-color: #f1f1f1; /* Gris clair */
                        color: #333333; /* Texte sombre */
                    }

                    tr:nth-child(even) {
                        background-color: #f9f9f9; /* Gris très clair */
                    }

                    tr:hover {
                        background-color: #f1f1f1; /* Gris clair au survol */
                    }

                    a.btn {
                        display: inline-block;
                        padding: 6px 12px;
                        margin-bottom: 0;
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 1.42857143;
                        text-align: center;
                        white-space: nowrap;
                        vertical-align: middle;
                        -ms-touch-action: manipulation;
                        touch-action: manipulation;
                        cursor: pointer;
                        border: 1px solid transparent;
                        border-radius: 4px;
                        text-decoration: none;
                        color: #333333; /* Texte sombre */
                        background-color: #f1f1f1; /* Gris clair */
                        border-color: #dddddd; /* Bordure plus claire */
                    }

                    a.btn-primary {
                        color: #ffffff;
                        background-color: #333333; /* Fond sombre */
                        border-color: #333333; /* Bordure sombre */
                    }

                    a.btn-primary:hover {
                        color: #ffffff;
                        background-color: #666666; /* Fond gris moyen au survol */
                        border-color: #666666; /* Bordure gris moyen au survol */
                    }

                    .fa {
                        font-size: 18px;
                        margin-right: 5px;
                    }
                </style>

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
