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
                    if (isset($_POST["nom_c"]) && isset($_POST["description"])) {
                        if (!empty($_POST["nom_c"]) && !empty($_POST["description"])) {
                            $Categorie1 = new Categorie($_POST["nom_c"], $_POST["description"]);
                            $CategorieC->createCategorie($Categorie1);
                            header('Location: afficherCategorie.php');
                        } 
                        else{?>
                            <script> alert("Remplir tous les champs")</script>
                        <?php }
                    }
                ?>
                <br><br>
                
                <h4>Ajouter Catégorie</h4>


                    <form action="" method="POST">
                        <label for="nom_c">Nom:</label>
                        <input type="text" id="nom_c" name="nom_c" oninput="validateInput('nom_c', /^[a-zA-Z]+$/)"><br>
                        <span id="nom_c_span"></span>

                        <label for="description">Déscription:</label>
                        <textarea id="description" name="description" oninput="validateInput('description', /.*/g)"></textarea>
                        <span id="description_span"></span>

                        <input type="submit" value="Submit" name="validate">
                    </form>


                    <script>
                        function validateInput(inputId, regex) {
                            const input = document.getElementById(inputId);
                            const span = document.getElementById(`${inputId}_span`);

                            if (regex.test(input.value)) {
                            span.innerText = 'Correct';
                            span.style.color = 'green';
                            } else {
                            span.innerText = 'Incorrect';
                            span.style.color = 'red';
                            }
                        }
                    </script>

                    <style>
                        form {
                            max-width: 400px;
                            margin: 0 auto;
                            font-family: Arial, sans-serif;
                            background-color: #f7f7f7;
                            padding: 45px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }

                        label,
                        input,
                        textarea,
                        select {
                            display: block;
                            margin-bottom: 15px;
                        }

                        select {
                            width: 100%;
                            padding: 10px;
                            border-radius: 5px;
                            border: 1px solid #ccc;
                        }

                        input[type="text"],
                        textarea {
                            width: 100%;
                            padding: 10px;
                            border-radius: 5px;
                            border: 1px solid #ccc;
                            resize: vertical;
                        }

                        input[type="submit"],
                        input[type="reset"] {
                            padding: 10px 20px;
                            border: none;
                            border-radius: 5px;
                            background-color: #3b3131;
                            color: white;
                            cursor: pointer;
                            font-size: 16px;
                        }

                        input[type="submit"]:hover,
                        input[type="reset"]:hover {
                            background-color: #45a049;
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
