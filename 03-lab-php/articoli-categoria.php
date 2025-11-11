<?php
    require_once("bootstrap.php");

    //base template
    $templateParams["titolo"] = "Blog Tw - Home";
    $templateParams["nome"] = "lista-articoli.php";
    $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
    $templateParams["categorie"] = $dbh->getCategories();

    //tameplate specific
    $templateParams["articoli"] = $dbh->getPosts(2);
    $templateParams["titolo_pagina"] = "Ultimi Articoli";

    $idCategoria = -1;
    if (isset($_GET["id"])) {
        $idCategoria = $_GET["id"];
    }
    $nomeCategoria = $dbh->getNameCategoryById($idCategoria);
    if (count($nomeCategoria) > 0) {
        $templateParams["titolo_pagina"] = "Articoli della categoria".$nomeCategoria[0]["nomecategoria"];
        $templateParams["articoli"] = $dbh->getPostById($dbh->getCategoryByid($idCategoria));
    } else {
        $templateParams["titolo_pagina"] = "Categoria non trovata";
        $templateParams["articoli"] = array();        
    }


    require("template/base.php")
?>