
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
        <h2>Explore Nossa Coleção Exclusiva Feminina</h2>

        <div class="produtos">

            <a href="alice.php" class="produto">
                <img src="fotos/femininas/Alice.jpg" alt="Fantasia Alice, de Alice no País das Maravilhas">
                <h3>Alice, de Alice no País das Maravilhas</h3>
                <p class="preco">R$ 150,00 à vista</p>
                <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            </a>

            <a href="belaeafera.php" class="produto">
                <img src="fotos/femininas/Belaeafera.webp" alt="Fantasia Bela, de Bela e a Fera">
                <h3>Bela, de Bela e a Fera</h3>
                <p class="preco">R$ 150,00 à vista</p>
                <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            </a>

            <a href="magica.php" class="produto">
                <img src="fotos/femininas/magica.jpeg" alt="Fantasia Mágica">
                <h3>Mágica</h3>
                <p class="preco">R$ 150,00 à vista</p>
                <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            </a>

        </div>

        <div class="produtos">

            <a href="edwardfem.php" class="produto">
                <img src="fotos/femininas/edward.jpeg" alt="Fantasia Edward, de Edward Mãos de Tesoura">
                <h3>Edward, de Edward Mãos de Tesoura</h3>
                <p class="preco">R$ 150,00 à vista</p>
                <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            </a>

            <a href="mariofem.php" class="produto">
                <img src="fotos/femininas/mario.jpeg" alt="Fantasia Mario">
                <h3>Super Mario FEM</h3>
                <p class="preco">R$ 150,00 à vista</p>
                <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            </a>

        </div>
    </section>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
