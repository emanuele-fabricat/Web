<?php
    require_once("bootstrap.php");

    //base template
    $templateParams["titolo"] = "Blog Tw - Home";
    $templateParams["nome"] = "lista-articoli.php";
    $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
    $templateParams["categorie"] = $dbh->getCategories();

    //tameplate specific
    $templateParams["articoli"] = $dbh->getPosts();
    $templateParams["titolo_pagina"] = "Ultimi Articoli";

    require("template/base.php")
?>