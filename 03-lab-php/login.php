<?php
    require_once("bootstrap.php");

    //base template
    $templateParams["titolo"] = "Blog Tw - Login";
    $templateParams["nome"] = "login-form.php";
    $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
    $templateParams["categorie"] = $dbh->getCategories();

    require("template/base.php")
?>