<?php
    require_once("bootstrap.php");

    //base template
    $templateParams["titolo"] = "Blog Tw - Home";
    $templateParams["nome"] = "informazioni.php";
    $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
    $templateParams["categorie"] = $dbh->getCategories();

    //tameplate specific
    $templateParams["autori"] = $dbh->getAutors();

    require("template/base.php")
?>