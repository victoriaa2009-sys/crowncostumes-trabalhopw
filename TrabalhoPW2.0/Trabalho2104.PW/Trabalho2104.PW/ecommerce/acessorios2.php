
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

    <section class="produto-container" id="acessorios2">

        <div class="produto-img">
            <img src="fotos/acessorios/acessorios2.jpg" alt="Acessórios de Espião">
        </div>

        <div class="produto-info">

            <h2>Acessórios de Espião</h2>

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
                Acessórios de Espião, perfeitos para festas, aniversários
                e eventos temáticos. Confortáveis, leves e divertidos.
            </p>

        </div>

        <div>

            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 0 a 60+ anos</li>
                <li>Inclui: óculos + escuta + crachá + gravata</li>
                <li>Cor: preto e branco</li>
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

        const precoProdutoEspiao = 87.90;

        const quantidadeEspiao =
            document.getElementById("quantidade");

        const valorParcialEspiao =
            document.getElementById("valorParcial");

        const botaoAdicionarEspiao =
            document.getElementById("adicionarCarrinho");

        const mensagemCarrinhoEspiao =
            document.getElementById("mensagemCarrinho");


        function formatarPrecoEspiao(valor) {

            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });

        }


        // ATUALIZAR VALOR PARCIAL

        function atualizarPrecoEspiao() {

            const qtd = Number(quantidadeEspiao.value);

            if (!Number.isInteger(qtd) || qtd < 1) {

                valorParcialEspiao.textContent =
                    "Informe uma quantidade válida.";

                return;

            }

            valorParcialEspiao.textContent =
                "Valor parcial: " +
                formatarPrecoEspiao(precoProdutoEspiao * qtd);

        }


        quantidadeEspiao.addEventListener(
            "input",
            atualizarPrecoEspiao
        );


        // ADICIONAR AO CARRINHO

        botaoAdicionarEspiao.addEventListener(
            "click",
            function() {

                const qtd = Number(quantidadeEspiao.value);

                if (!Number.isInteger(qtd) || qtd < 1) {

                    mensagemCarrinhoEspiao.style.display = "block";

                    mensagemCarrinhoEspiao.style.color = "red";

                    mensagemCarrinhoEspiao.textContent =
                        "Escolha uma quantidade válida!";

                    return;

                }


                const produtoEspiao = {

                    nome: "Acessórios de Espião",

                    preco: precoProdutoEspiao,

                    quantidade: qtd,

                    imagem: "fotos/acessorios/acessorios2.jpg"

                };


                let carrinho = JSON.parse(
                    sessionStorage.getItem("carrinho")
                ) || [];


                const produtoExistente = carrinho.find(
                    function(item) {

                        return item.nome === produtoEspiao.nome;

                    }
                );


                if (produtoExistente) {

                    produtoExistente.quantidade += qtd;

                } else {

                    carrinho.push(produtoEspiao);

                }


                sessionStorage.setItem(
                    "carrinho",
                    JSON.stringify(carrinho)
                );


                mensagemCarrinhoEspiao.style.display = "block";

                mensagemCarrinhoEspiao.style.color = "#faf06b";

                mensagemCarrinhoEspiao.innerHTML =
                    "✓ Produto adicionado ao carrinho!<br><br>" +
                    "Quantidade: " + qtd + "<br>" +
                    "Valor: " +
                    formatarPrecoEspiao(precoProdutoEspiao * qtd);

            }
        );


        // INICIAR

        atualizarPrecoEspiao();

    })();

    </script>

</body>
</html>
