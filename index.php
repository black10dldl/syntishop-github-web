<?php

require("config/commandes.php");

  $Produits=afficher();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil-Syntishop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding-top: 120px; /* pour compenser la hauteur de l'en-tête fixe */
        }

        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
            color: #333;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .navbar {
            margin-bottom: 40px;
        }

        .navbar-nav .nav-link {
            color: #333;
            font-weight: bold;
        }

        .navbar-nav .nav-link:hover {
            color: #28a745;
        }

        .album {
            padding: 20px 0;
        }

        .card {
            border: none;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #666;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-group a {
            text-decoration: none;
            color: #fff;
        }

        .btn-group a:hover {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bienvenue sur SyntiShop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Merci de visiter notre site. Profitez de nos offres spéciales et trouvez vos produits préférés.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<header class="fixed-header">
    <div>
        <a href="#" class="logo">SyntiShop</a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>
    
</header>

<main>
    <div class="container">
        <div class="album py-5">
            <div class="row row-cols-1 row-cols-md-3 g-3" id="productGrid">
                <?php foreach($Produits as $produit): ?>
                    <div class="col product">
                        <div class="card">
                            <img src="<?= $produit->image ?>" class="card-img-top" alt="<?= $produit->nom ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $produit->nom ?></h5>
                                <p class="card-text"><?= substr($produit->description, 0, 160) ?>...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="produit.php?pdt=<?= $produit->id ?>" class="btn btn-success">Voir plus</a>
                                    <span class="text-bold"><?= $produit->prix ?> fr</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
        myModal.show();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const products = document.querySelectorAll('.product');

        searchInput.addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase().trim();

            products.forEach(function (product) {
                const title = product.querySelector('.card-title').innerText.toLowerCase();
                const description = product.querySelector('.card-text').innerText.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });
</script>

</body>
</html>

