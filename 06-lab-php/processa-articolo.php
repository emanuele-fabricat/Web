<?php
require_once 'bootstrap.php';

var_dump($_POST);

if (!isUserLoggedIn() || !isset($_POST["action"])) {
    //header("location: login.php");
}

if ($_POST["action"]==1) {
    //Inserimento
    $titoloarticolo = $_POST["titoloarticolo"];
    $testoarticolo = $_POST["testoarticolo"];
    $anteprimaarticolo = $_POST["testoarticolo"];
    $dataarticolo = date("Y-m-d");
    $autore = $_SESSION["idautore"];

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach ($categorie as $categoria) {
        if (isset($_POST["categoria_".$categoria["idcategoria"]])) {
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticolo"]);
    if ($result != 0) {
        $imgarticolo = $msg;
        $id = $dbh->insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        if ($id!=false) {
            foreach($categorie_inserite as $categoria) {
                $ris = $dbh->insertCategoryOfArticle($id, $categoria);
            }
            $msg="Inserimento avvenuto correttamente";          
        } else {
            $msg = "Errore in inserimento";
        }
    }
    echo $msg;
    //header("location: login.php?formmsg=".$msg)
}

?>