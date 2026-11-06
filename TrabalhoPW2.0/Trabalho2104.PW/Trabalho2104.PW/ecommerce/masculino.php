
<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Crown Costumes</title>
    <link href="estilos.css" rel="stylesheet">
</head>

<body>

    <?php include "cabecalho.php"; ?>

    <section>
        <h2>Explore Nossa Coleção Exclusiva Masculina</h2>

        <div class="produtos">

            <a href="davidbowie.php" class="produto">
                <img src="fotos/masculinas/anos80.jpg" alt="Fantasia de David Bowie">
                <h3>David Bowie</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

            <a href="magico.php" class="produto">
                <img src="fotos/masculinas/mágico.jpg" alt="Fantasia de Mágico">
                <h3>Mágico</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

            <a href="maskara.php" class="produto">
                <img src="fotos/masculinas/mascara.jpg" alt="Fantasia de Máskara">
                <h3>Máskara</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

        </div>

        <div class="produtos">

            <a href="palhaco.php" class="produto">
                <img src="fotos/masculinas/palhaço.jpg" alt="Fantasia de Palhaço">
                <h3>It a coisa</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

            <a href="woody.php" class="produto">
                <img src="fotos/masculinas/woody.jpg" alt="Fantasia de Woody">
                <h3>Woody</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

        </div>
    </section>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
