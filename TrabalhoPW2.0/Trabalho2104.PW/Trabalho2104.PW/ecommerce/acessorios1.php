
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


    <!-- PRODUTO -->

    <section class="produto-container" id="acessorios1">

        <div class="produto-img">
            <img src="fotos/acessorios/acessorios1.jpg" alt="Acessórios de Minions">
        </div>

        <div class="produto-info">

            <h2>Acessórios de Minions</h2>

            <p class="preco">R$ 87,90 à vista</p>
            <p class="parcelado">ou 2x de R$ 43,95 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidade">Quantidade:</label>

            <input type="number" id="quantidade" value="1" min="1">

            <p id="valorParcial" class="valor-parcial">
                Valor parcial: R$ 87,90
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


    <!-- DESCRIÇÃO E CARACTERÍSTICAS -->

    <section class="produto-descricao">

        <div>

            <h2>Descrição do Produto</h2>

            <p>
                Acessórios de Minions, perfeitos para festas, aniversários
                e eventos temáticos. Confortáveis, leves e divertidos.
            </p>

        </div>

        <div>

            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 0 a 60+ anos</li>
                <li>Inclui: óculos + toca + luvas</li>
                <li>Cor: amarelo e azul</li>
            </ul>

        </div>

    </section>


    <!-- AVALIAÇÕES -->

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


    <!-- RODAPÉ -->

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>


    <!-- SCRIPT DE BUSCA -->

    <script src="script.js"></script>


    <!-- SCRIPT DO PRODUTO E CARRINHO -->

    <script>

    (function() {

        const precoProdutoMinions = 87.90;

        const quantidadeMinions =
            document.getElementById("quantidade");

        const valorParcialMinions =
            document.getElementById("valorParcial");

        const botaoAdicionarMinions =
            document.getElementById("adicionarCarrinho");

        const mensagemCarrinhoMinions =
            document.getElementById("mensagemCarrinho");


        function formatarPrecoMinions(valor) {

            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });

        }


        // ATUALIZAR VALOR PARCIAL

        function atualizarPrecoMinions() {

            const qtd = Number(quantidadeMinions.value);

            if (!Number.isInteger(qtd) || qtd < 1) {

                valorParcialMinions.textContent =
                    "Informe uma quantidade válida.";

                return;

            }

            valorParcialMinions.textContent =
                "Valor parcial: " +
                formatarPrecoMinions(precoProdutoMinions * qtd);

        }


        quantidadeMinions.addEventListener(
            "input",
            atualizarPrecoMinions
        );


        // ADICIONAR AO CARRINHO

        botaoAdicionarMinions.addEventListener(
            "click",
            function() {

                const qtd = Number(quantidadeMinions.value);

                if (!Number.isInteger(qtd) || qtd < 1) {

                    mensagemCarrinhoMinions.style.display = "block";

                    mensagemCarrinhoMinions.style.color = "red";

                    mensagemCarrinhoMinions.textContent =
                        "Escolha uma quantidade válida!";

                    return;

                }


                const produtoMinions = {

                    nome: "Acessórios de Minions",

                    preco: precoProdutoMinions,

                    quantidade: qtd,

                    imagem: "fotos/acessorios/acessorios1.jpg"

                };


                let carrinho = JSON.parse(
                    sessionStorage.getItem("carrinho")
                ) || [];


                const produtoExistente = carrinho.find(
                    function(item) {

                        return item.nome === produtoMinions.nome;

                    }
                );


                if (produtoExistente) {

                    produtoExistente.quantidade += qtd;

                } else {

                    carrinho.push(produtoMinions);

                }


                sessionStorage.setItem(
                    "carrinho",
                    JSON.stringify(carrinho)
                );


                mensagemCarrinhoMinions.style.display = "block";

                mensagemCarrinhoMinions.style.color = "#faf06b";

                mensagemCarrinhoMinions.innerHTML =
                    "✓ Produto adicionado ao carrinho!<br><br>" +
                    "Quantidade: " + qtd + "<br>" +
                    "Valor: " +
                    formatarPrecoMinions(precoProdutoMinions * qtd);

            }
        );


        // INICIAR

        atualizarPrecoMinions();

    })();

    </script>

</body>
</html>
