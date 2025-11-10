<h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php foreach($templateParams["articoli"] as $articolo): ?>
<article>
    <img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt=""/>
    <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
    <p><?php echo $articolo["dataarticolo"]; ?> - <?php echo $articolo["nome"]; ?></p>
    <p><?php echo $articolo["anteprimaarticolo"]; ?></p>
    <a href="#">Leggi Tutto</a>
</article>
<?php endforeach; ?>
