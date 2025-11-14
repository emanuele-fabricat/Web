<?php
require_once 'bootstrap.php';



if (!isUserLoggedIn() || !isset($_GET["action"])) {
    header("location: login.php");
}

$templateParams["titolo"] = "Blog TW - Gestisci articoli";
$templateParams["nome"] = "admin-form.php";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["azione"] = $_GET["action"];

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);

require 'template/base.php';
?>