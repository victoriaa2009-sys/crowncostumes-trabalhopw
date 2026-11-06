
<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

require_once "php/conexao.php";

$paginasProdutos = [
    "Minions" => "acessorios1.php",
    "Espião" => "acessorios2.php",
    "Mágico" => "acessorios4.php",
    "Chapéu de Bruxa" => "acessorios6.php",
    "Fantasia do Máskara" => "maskara.php",
    "Fantasia de Harry Potter" => "harrypotter.php"
];

$sql = "SELECT * FROM produtos
        WHERE nome IN (
            'Minions',
            'Espião',
            'Mágico',
            'Chapéu de Bruxa',
            'Fantasia do Máskara',
            'Fantasia de Harry Potter'
        )
        ORDER BY FIELD(
            nome,
            'Minions',
            'Espião',
            'Mágico',
            'Chapéu de Bruxa',
            'Fantasia do Máskara',
            'Fantasia de Harry Potter'
        )";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Crown Costumes</title>
    <link href="estilos.css" rel="stylesheet">
</head>

<body>

    <header>
        <img src="fotos/logo.png" class="logo" alt="Logo Crown Costumes">
        <h1>Crown Costumes</h1>
    </header>

    <div class="topo">

        <div class="barra">

            <div class="marca">
                <img src="fotos/logopreta.png" class="logopreta" alt="Logo preta">

                <a href="paginainicial.php" class="nome-barra">
                    Crown Costumes
                </a>
            </div>

            <form class="busca-container" action="paginainicial.php" method="get">

                <input
                    type="text"
                    placeholder="Buscar fantasias..."
                    name="busca"
                    id="campo-busca"
                    autocomplete="off"
                >

                <input
                    type="submit"
                    value="Buscar"
                    class="btn-busca"
                >

                <div id="sugestoes"></div>

            </form>

            <div class="acoes">

                <span>
                    Olá, <?php echo htmlspecialchars($_SESSION["usuario_nome"]); ?>!
                </span>

                <a href="carrinho.php" class="btn">
                    Carrinho
                </a>

                <a href="sobre.php" class="btn">
                    Sobre
                </a>

                <a href="logout.php" class="btn">
                    Sair
                </a>

            </div>

        </div>

    </div>

    <section class="colecoes">

        <h2>Descubra Nossas Coleções Exclusivas!</h2>

        <div class="produtos">

            <a href="feminino.php" class="produto">
                <img src="fotos/femininas/edward.jpeg" alt="Edward">
                <h3>Feminino</h3>
            </a>

            <a href="masculino.php" class="produto">
                <img src="fotos/masculinas/mágico.jpg" alt="Fantasia Mágico">
                <h3>Masculino</h3>
            </a>

            <a href="unissex.php" class="produto">
                <img src="fotos/unissex/uni7.webp" alt="Fantasia Unissex">
                <h3>Unissex</h3>
            </a>

        </div>

        <div class="produtos">

            <a href="acessorios.php" class="produto">
                <img src="fotos/acessorios/acessorios2.jpg" alt="Acessório Espião">
                <h3>Acessórios</h3>
            </a>

            <a href="kids.php" class="produto">
                <img src="fotos/kids/palhacokids.webp" alt="Fantasia de Palhaço infantil">
                <h3>Kids</h3>
            </a>

        </div>

    </section>

    <section class="mais-vendidos">

        <h2>Mais vendidos</h2>

        <div class="produtos">

            <?php if ($resultado && $resultado->num_rows > 0) { ?>

                <?php while ($produto = $resultado->fetch_assoc()) { ?>

                    <?php
                    $nomeProduto = $produto["nome"];
                    $pagina = $paginasProdutos[$nomeProduto];
                    ?>

                    <a
                        href="<?php echo htmlspecialchars($pagina); ?>"
                        class="produto destaque"
                    >

                        <img
                            src="<?php echo htmlspecialchars($produto['foto']); ?>"
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                        >

                        <h3>
                            <?php echo htmlspecialchars($produto['nome']); ?>
                        </h3>

                        <p class="preco">
                            R$ <?php echo number_format(
                                (float) $produto['preco'],
                                2,
                                ',',
                                '.'
                            ); ?> à vista
                        </p>

                    </a>

                <?php } ?>

            <?php } else { ?>

                <p>Nenhum produto cadastrado no momento.</p>

            <?php } ?>

        </div>

    </section>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
