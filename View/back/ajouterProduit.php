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
                require_once '../../model/Produit.php';
                require_once '../../controller/ProduitC.php';

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (
                        isset($_POST["nom"]) &&
                        isset($_POST["description"]) &&
                        isset($_POST["categorie"]) &&
                        isset($_POST["prix"]) &&
                        isset($_POST["stock"]) &&
                        isset($_POST["fournisseur"]) &&
                        isset($_POST["date_ajout"]) &&
                        isset($_FILES["image"])
                    ) {
                        $errors = []; // Tableau pour stocker les éventuelles erreurs de validation

                        // Vérification de chaque champ et ajout d'une erreur si nécessaire
                        if (empty($_POST["nom"])) {
                            $errors[] = "Le champ nom est vide";
                        }
                        if (empty($_POST["description"])) {
                            $errors[] = "Le champ description est vide";
                        }
                        if (empty($_POST["categorie"])) {
                            $errors[] = "Le champ catégorie est vide";
                        }
                        if (empty($_POST["prix"])) {
                            $errors[] = "Le champ prix est vide";
                        }
                        if (empty($_POST["stock"])) {
                            $errors[] = "Le champ stock est vide";
                        }
                        if (empty($_POST["fournisseur"])) {
                            $errors[] = "Le champ fournisseur est vide";
                        }
                        if (empty($_POST["date_ajout"])) {
                            $errors[] = "Le champ date d'ajout est vide";
                        }
                        if (empty($_FILES["image"]["name"])) {
                            $errors[] = "Aucune image n'a été sélectionnée";
                        }

                        // Si aucune erreur de validation n'a été trouvée, procéder à l'ajout dans la base de données
                        if (empty($errors)) {
                            $date_ajout = new DateTime($_POST["date_ajout"]);
                            $ProduitC = new ProduitC();
                            $Produit1 = new Produit(
                                NULL,
                                $_POST["nom"],
                                $_POST["description"],
                                $_POST["categorie"],
                                $_POST["prix"],
                                $_POST["stock"],
                                $_POST["fournisseur"],
                                $date_ajout,
                                $_FILES["image"]
                            );
                            $ProduitC->createProduit($Produit1);
                            header('Location: afficherProduit.php');
                            exit(); 
                        } else {
                            // S'il y a des erreurs, affiche-les
                            foreach ($errors as $error) {
                                echo '<script>alert("' . $error . '")</script>';
                            }
                        }
                    }
                }
                ?>
                <br><br>
                



                <h2>Ajouter un Produit</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="nom">Nom du Produit:</label><br>
                    <input type="text" id="nom" name="nom"oninput="validateInput('nom', /^[a-zA-Z]+$/)"><br>
                    <span id="nom_span"></span><br><br>
                    
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50" oninput="validateInput('description', /.*/g)"></textarea><br><br>
                    <span id="description_span"></span>
                    
                    <label for="categorie">Catégorie:</label><br>
                    <select id="categorie" name="categorie">
                        <?php
                        require_once '../../controller/CategorieC.php';
                        $categorieC = new CategorieC();
                        $categories = $categorieC->listCategoriesNames();

                        if ($categories) {
                            foreach ($categories as $categ) {
                                ?>
                                <option value=<?php echo $categ ?>><?php echo $categ ?></option>
                            <?php }
                        } else {
                            echo '<option value="">Aucune catégorie trouvée</option>';
                        }
                        ?>
                    </select><br><br>
                    
                    <label for="prix">Prix:</label><br>
                    <input type="number" id="prix" name="prix" step="0.01"oninput="validateInput('prix', /^[0-9]+(\.[0-9]{1,2})?$/)"><br><br>
                    <span id="prix_span"></span>
                    
                    <label for="stock">Stock:</label><br>
                    <input type="number" id="stock" name="stock"oninput="validateInput('stock', /^[0-9]+$/)"><br><br>
                    <span id="stock_span"></span>
                    
                    <label for="fournisseur">Fournisseur:</label><br>
                    <input type="text" id="fournisseur" name="fournisseur"oninput="validateInput('fournisseur', /^[a-zA-Z]+$/)"><br><br>
                    <span id="fournisseur_span"></span>
                    
                    <label for="date_ajout">Date d'ajout:</label><br>
                    <input type="date" id="date_ajout" name="date_ajout"><br><br>
                    
                    <label for="image">Image:</label><br>
                    <input type="file" id="image" name="image"><br><br>
                    
                    <input type="submit" value="Ajouter">
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
