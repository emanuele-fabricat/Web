<h2>Autori del Blog</h2>
<section>
    <table>
        <tr>
            <th id="autore">Autore</th>
            <th id="email">Email</th>
            <th id="argomenti">Argomenti</th>
        </tr>
        <?php foreach ($templateParams["autori"] as $autori): ?>
            <tr>
                <th id=<?php echo $autori["nome"]; ?>><?php echo $autori["nome"]; ?></th>
                <td headers="email <?php echo $autori["nome"]; ?>"><?php echo $autori["username"]; ?></td>
                <td headers="argomenti <?php echo $autori["nome"]; ?>"><?php echo $autori["nomeCategoria"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>