<!DOCTYPE html>
<html lang="it">

<head>
    <title><?php echo $templateParams["titolo"] ?></title>
    <link rel="stylesheet" href="./css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header>
        <h1>Blog di Tecnologie Web</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li><li><a href="archivio.php">Archivio</a></li><li><a href="contatti.php">Contatti</a></li><li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <main>
        <?php
        require($templateParams["nome"]);
        ?>
    </main>
    <aside>
        <section>
            <h2>Post Popolari</h2>
            <ul>
                <?php foreach ($templateParams["articolicasuali"] as $articolocasuale): ?>
                    <li>
                        <img src="<?php echo UPLOAD_DIR . $articolocasuale["imgarticolo"]; ?>" alt="" />
                        <a href="articolo.php?id=<?php echo $articolocasuale["idarticolo"]; ?>"><?php echo $articolocasuale["titoloarticolo"]; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section>
            <h2>Categorie</h2>
            <ul>
                <?php foreach ($templateParams["categorie"] as $categoria): ?>
                    <li><a href="articoli-categoria.php?id=<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </aside>
    <footer>
        <p>Tecnologie Web - A.A. 2025/2026</p>
    </footer>
</body>

</html>