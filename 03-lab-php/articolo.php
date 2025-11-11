<?php
    require_once("bootstrap.php");

    //base template
    $templateParams["titolo"] = "Blog Tw - Home";
    $templateParams["nome"] = "informazioni.php";
    $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
    $templateParams["categorie"] = $dbh->getCategories();

    //tameplate specific
    $idArticolo = -1;
    if (isset($_GET["id"])) {
        $idArticolo = $_GET["id"];
    }
    $templateParams["articolo"] = $dbh->getPostById($idArticolo);

    require("template/base.php")
?>