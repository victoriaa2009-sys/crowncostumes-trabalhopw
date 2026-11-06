
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

    <style>
        .mensagem-carrinho {
            display: none;
            margin-top: 20px;
            padding: 15px;
            color: #faf06b;
            background: rgba(240, 247, 203, 0.35);
            border: 1px solid rgba(100, 92, 3, 0.4);
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }

        .valor-parcial {
            font-size: 20px;
            font-weight: bold;
            color: #8b6b20;
        }
    </style>
</head>

<body>

    <?php include "cabecalho.php"; ?>

    <section class="produto-container" id="woody">

        <div class="produto-img">
            <img src="fotos/masculinas/woody.jpg" alt="Fantasia do Woody">
        </div>

        <div class="produto-info">
            <h2>Fantasia do Woody</h2>

            <p class="preco">R$ 148,98 à vista</p>
            <p class="parcelado">ou 2x de R$ 74,49 sem juros</p>

            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label>Quantidade:</label>
            <input type="number" id="quantidade" value="1" min="1" step="1">

            <p id="valorParcial" class="valor-parcial">
                Valor total: R$ 148,98
            </p>

            <h3>Formas de pagamento</h3>
            <ul>
                <li>Cartão de crédito (Visa e Mastercard)</li>
                <li>Cartão de débito</li>
                <li>PIX</li>
                <li>Boleto bancário</li>
            </ul>

            <button class="btn" id="adicionarCarrinho" type="button">
                Adicionar ao Carrinho
            </button>

            <div id="mensagemCarrinho" class="mensagem-carrinho"></div>
        </div>

    </section>

    <section class="produto-descricao">

        <div>
            <h2>Descrição do Produto</h2>
            <p>
                Fantasia completa inspirada no Woody do filme Toy Story,
                perfeita para festas, aniversários e eventos temáticos.
                Confortável, leve e divertida.
            </p>
        </div>

        <div>
            <h2>Características</h2>
            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 6 a 10 anos</li>
                <li>Inclui: camisa + colete + calça + chapéu</li>
                <li>Cor: amarelo, marrom, branco e azul</li>
            </ul>
        </div>

    </section>

    <section>
        <h2>Avaliações</h2>

        <div class="avaliacao">
            <p>⭐⭐⭐⭐⭐</p>
            <p>"Súper confortável! Amei."</p>
            <p>12/03/2026</p>
        </div>

        <div class="avaliacao">
            <p>⭐⭐⭐</p>
            <p>"Demorou um pouco pra chegar, mas gostei."</p>
            <p>05/03/2026</p>
        </div>

        <div class="avaliacao">
            <p>⭐⭐⭐⭐⭐</p>
            <p>"Amei! Igual à foto."</p>
            <p>28/02/2026</p>
        </div>

        <div class="avaliacao">
            <p>⭐⭐⭐</p>
            <p>"Boa, mas o pacote veio rasgado."</p>
            <p>20/02/2026</p>
        </div>

    </section>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

    <script src="script.js"></script>

    <script>
    (function() {

        const precoProdutoWoody = 148.98;

        const quantidadeWoody = document.getElementById("quantidade");
        const valorParcialWoody = document.getElementById("valorParcial");
        const botaoAdicionarWoody = document.getElementById("adicionarCarrinho");
        const mensagemCarrinhoWoody = document.getElementById("mensagemCarrinho");

        function formatarPrecoWoody(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoWoody() {
            const qtd = Number(quantidadeWoody.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialWoody.textContent = "Informe uma quantidade válida.";
                return;
            }

            valorParcialWoody.textContent =
                "Valor total: " + formatarPrecoWoody(precoProdutoWoody * qtd);
        }

        quantidadeWoody.addEventListener("input", atualizarPrecoWoody);
        quantidadeWoody.addEventListener("change", atualizarPrecoWoody);

        botaoAdicionarWoody.addEventListener("click", function() {

            const qtd = Number(quantidadeWoody.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                mensagemCarrinhoWoody.style.display = "block";
                mensagemCarrinhoWoody.textContent = "Escolha uma quantidade válida!";
                return;
            }

            const produto = {
                nome: "Fantasia do Woody",
                preco: precoProdutoWoody,
                quantidade: qtd,
                imagem: "fotos/masculinas/woody.jpg"
            };

            let carrinho = JSON.parse(sessionStorage.getItem("carrinho")) || [];

            const produtoExistente = carrinho.find(function(item) {
                return item.nome === produto.nome;
            });

            if (produtoExistente) {
                produtoExistente.quantidade += qtd;
            } else {
                carrinho.push(produto);
            }

            sessionStorage.setItem("carrinho", JSON.stringify(carrinho));

            mensagemCarrinhoWoody.style.display = "block";
            mensagemCarrinhoWoody.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " + formatarPrecoWoody(precoProdutoWoody * qtd);
        });

        atualizarPrecoWoody();

    })();
    </script>

</body>
</html>
