
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

        <h2>Explore Nossa Coleção Exclusiva Infantil</h2>

        <div class="produtos">

            <a href="mickeykids.php" class="produto">
                <img src="fotos/kids/Mickeymouse.webp" alt="Fantasia Mickey Mouse infantil">
                <h3>Mickey Mouse</h3>
                <p class="preco">R$ 188,99 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

            <a href="moanakids.php" class="produto">
                <img src="fotos/kids/Moanakids.webp" alt="Fantasia Moana infantil">
                <h3>Moana</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

            <a href="piratakids.php" class="produto">
                <img src="fotos/kids/Pirataskids.webp" alt="Fantasia de Pirata infantil">
                <h3>Pirata</h3>
                <p class="preco">R$ 168,78 à vista</p>
                <p class="parcelado">ou 3x de R$ 56,26 sem juros</p>
            </a>

        </div>

        <div class="produtos">

            <a href="palhacokids.php" class="produto">
                <img src="fotos/kids/palhacokids.webp" alt="Fantasia Palhaço infantil">
                <h3>Palhaço</h3>
                <p class="preco">R$ 148,98 à vista</p>
                <p class="parcelado">ou 3x de R$ 62,99 sem juros</p>
            </a>

            <a href="brancadenevekids.php" class="produto">
                <img src="fotos/kids/brancadenevekids.webp" alt="Fantasia Branca de Neve infantil">
                <h3>Branca de Neve</h3>
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
