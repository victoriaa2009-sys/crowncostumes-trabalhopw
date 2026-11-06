
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
    <title>Crown Costumes</title>
    <link href="estilos.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>

<body>

    <?php include "cabecalho.php"; ?>

    <section>

        <h2>Explore Nossa Coleção Exclusiva De Acessórios</h2>

        <div class="produtos">

            <a href="acessorios1.php" class="produto">
                <img src="fotos/acessorios/acessorios1.jpg" alt="Acessório Minions">
                <h3>Minions</h3>
                <p class="preco">R$ 87,90 à vista</p>
                <p class="parcelado">ou 2x de R$ 43,95 sem juros</p>
            </a>

            <a href="acessorios2.php" class="produto">
                <img src="fotos/acessorios/acessorios2.jpg" alt="Acessório Espião">
                <h3>Espião</h3>
                <p class="preco">R$ 87,90 à vista</p>
                <p class="parcelado">ou 2x de R$ 43,95 sem juros</p>
            </a>

            <a href="acessorios4.php" class="produto">
                <img src="fotos/acessorios/acessorios4.jpeg" alt="Acessório Mágico">
                <h3>Mágico</h3>
                <p class="preco">R$ 87,90 à vista</p>
                <p class="parcelado">ou 2x de R$ 43,95 sem juros</p>
            </a>

        </div>

        <div class="produtos">

            <a href="acessorios6.php" class="produto">
                <img src="fotos/acessorios/acessorios6.jpeg" alt="Acessório Chapéu de Bruxa">
                <h3>Chapéu de Bruxa</h3>
                <p class="preco">R$ 87,90 à vista</p>
                <p class="parcelado">ou 2x de R$ 43,95 sem juros</p>
            </a>

            <a href="perucaverde.php" class="produto">
                <img src="fotos/acessorios/perucaverdeamarelo.webp" alt="Acessório Peruca Verde e Amarelo">
                <h3>Peruca verde e amarelo</h3>
                <p class="preco">R$ 87,90 à vista</p>
                <p class="parcelado">ou 2x de R$ 43,95 sem juros</p>
            </a>

        </div>

    </section>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
