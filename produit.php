<?php

require("config/commandes.php");

$Produits=afficher();

if(isset($_GET['pdt'])){
    
    if(!empty($_GET['pdt']) OR is_numeric($_GET['pdt']))
    {
        $id = $_GET['pdt'];

    }
}

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.80.0">
<title>Mes Prodits</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Liens vers les fichiers CSS et JavaScript de lightbox2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-iZlEsYF2YqeC+z5aoKiP9TZbLEr11inYWm0N7cG+yVnRQQ26Ku7tzi+uVYZv45ROgFUXfWPIg41OfKtjs+3zQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-SbrUWsdFOKGY1C4PjPxSkVztdnXcj1ZuKl2f2SMp86IQ/FnFZl0S7pZDVN9Lm3y7/TwYr/bEhWc5+/12/zUe3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link href="style.css"rel="stylesheet">

</head>
<body>

<header>
<div class="collapse bg-dark" id="navbarHeader">
<div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">UN PRIX ABORDABLE POUR DES PRODUITS DE QUALITES</p>
    </div>
    <div class="col-sm-4 offset-md-1 py-4">
        <h4 class="text-white">Sign in</h4>
        <!-- <ul class="list-unstyled">
        <li><a href="login.php" class="text-white">Se connecter</a></li>
        </ul> -->
    </div>
    </div>
</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
<div class="container">
    <a href="#" class="navbar-brand d-flex align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
    <strong>SyntiShop</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
</div>
</div>
</header>

<main>

<div class="album py-5 bg-light">
<div class="container" style="display: flex; justify-content: center">

    <div class="row">
<div class="col-md-2"></div>
<?php foreach($Produits as $produit){ if($produit->id == $id){ ?> 
        <div class="col-md-8">
            <div class="card shadow-sm" >
                <h3 text-alin="center"><?= $produit->nom ?></h3>
                 <div class="col produit hover-effect"> 
            <a href="<?= $produit->image ?>" data-lightbox="product-images" data-title="<?= $produit->nom ?>">
                <img src="<?= $produit->image ?>" class="img-thumbnail" alt="<?= $produit->nom ?>">
            </a>
                 </div> 
                <div class="card-body">
                <p class="card-text"><?= $produit->description ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm btn-success"><!-- Dans votre fichier produit.php -->
<a href="https://wa.me/+2250787421014?text=Bonjour%20je%20souhaite%20commander%20ce%20produit" class="btn btn-success">Commander sur WhatsApp</a>
</button></a>
                    </div>
                    <small class="text" style="font-weight: bold;"><?= $produit->prix ?> fr</small>
                </div>
                </div>
            </div>
            </div>
<?php }} ?>

<div class="col-md-2"></div>
    </div>
</div>
</div>

</main>
<br>
<br>
<br>
<br>
</body>
<script>
    // Assurez-vous que lightbox est initialisé après le chargement du DOM
    document.addEventListener('DOMContentLoaded', function() {
    lightbox.init();
});

</script>

</html>