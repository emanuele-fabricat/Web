<?php
    require_once("bootstrap.php");

    $templateParams["titolo"] = "Blog Tw - Home";
    $temaplateParams["nome"] = require("tameplate/lista-articoli.php");
    $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
    $tamplateParams["categorie"] = $dbh->getCategories();

    require("tameplate/base.php")
?>