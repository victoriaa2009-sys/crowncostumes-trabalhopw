
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

    <section class="produto-container" id="mickeykids">

        <div class="produto-img">
            <img src="fotos/kids/Mickeymouse.webp" alt="Fantasia Mickey Mouse infantil">
        </div>

        <div class="produto-info">

            <h2>Fantasia Mickey Mouse Infantil</h2>

            <p class="preco">R$ 188,99 à vista</p>
            <p class="parcelado">ou 3x de R$ 63,00 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidade">Quantidade:</label>

            <input type="number" id="quantidade" value="1" min="1" step="1">

            <p id="valorParcial" class="valor-parcial">
                Valor total: R$ 188,99
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
                Fantasia completa do Mickey Mouse infantil,
                perfeita para festas, aniversários e eventos temáticos.
                Confortável, leve e divertida, garante que a criança
                entre no mundo mágico dos personagens clássicos.
            </p>
        </div>

        <div>
            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 2 a 8 anos</li>
                <li>Inclui: macacão + orelhas</li>
                <li>Cor: vermelho, preto e amarelo</li>
            </ul>
        </div>

    </section>

    <section>

        <h2>Avaliações</h2>

        <div class="avaliacao">
            <p>⭐⭐⭐⭐⭐</p>
            <p>"Perfeita! Muito bonita e confortável."</p>
            <p>12/03/2026</p>
        </div>

        <div class="avaliacao">
            <p>⭐⭐⭐⭐</p>
            <p>"Ótima qualidade, só demorou um pouco pra chegar."</p>
            <p>05/03/2026</p>
        </div>

        <div class="avaliacao">
            <p>⭐⭐⭐⭐⭐</p>
            <p>"Amei! Igual à foto."</p>
            <p>28/02/2026</p>
        </div>

        <div class="avaliacao">
            <p>⭐⭐⭐</p>
            <p>"Boa, mas poderia vir melhor embalada."</p>
            <p>20/02/2026</p>
        </div>

    </section>

    <script src="script.js"></script>

    <script>
        (function() {

            const precoProdutoMickey = 188.99;

            const quantidadeMickey = document.getElementById("quantidade");
            const valorParcialMickey = document.getElementById("valorParcial");
            const botaoAdicionarMickey = document.getElementById("adicionarCarrinho");
            const mensagemCarrinhoMickey = document.getElementById("mensagemCarrinho");

            function formatarPrecoMickey(valor) {
                return valor.toLocaleString("pt-BR", {
                    style: "currency",
                    currency: "BRL"
                });
            }

            function atualizarPrecoMickey() {

                const qtd = Number(quantidadeMickey.value);

                if (!Number.isInteger(qtd) || qtd < 1) {
                    valorParcialMickey.textContent = "Informe uma quantidade válida.";
                    return;
                }

                valorParcialMickey.textContent =
                    "Valor total: " + formatarPrecoMickey(precoProdutoMickey * qtd);

            }

            quantidadeMickey.addEventListener("input", atualizarPrecoMickey);
            quantidadeMickey.addEventListener("change", atualizarPrecoMickey);

            botaoAdicionarMickey.addEventListener("click", function() {

                const qtd = Number(quantidadeMickey.value);

                if (!Number.isInteger(qtd) || qtd < 1) {
                    mensagemCarrinhoMickey.style.display = "block";
                    mensagemCarrinhoMickey.style.color = "red";
                    mensagemCarrinhoMickey.textContent = "Escolha uma quantidade válida!";
                    return;
                }

                const produto = {
                    nome: "Fantasia Mickey Mouse Infantil",
                    preco: precoProdutoMickey,
                    quantidade: qtd,
                    imagem: "fotos/kids/Mickeymouse.webp"
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

                mensagemCarrinhoMickey.style.display = "block";
                mensagemCarrinhoMickey.style.color = "#faf06b";

                mensagemCarrinhoMickey.innerHTML =
                    "✓ Produto adicionado ao carrinho!<br><br>" +
                    "Quantidade: " + qtd + "<br>" +
                    "Valor: " + formatarPrecoMickey(precoProdutoMickey * qtd);

            });

            atualizarPrecoMickey();

        })();
    </script>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

</body>
</html>
