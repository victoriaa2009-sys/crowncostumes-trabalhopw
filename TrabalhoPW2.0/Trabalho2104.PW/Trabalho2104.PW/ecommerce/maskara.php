
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

    <section class="produto-container" id="maskara">

        <div class="produto-img">
            <img src="fotos/masculinas/mascara.jpg" alt="Fantasia do Máskara">
        </div>

        <div class="produto-info">

            <h2>Fantasia do Máskara</h2>

            <p class="preco">R$ 148,98 à vista</p>
            <p class="parcelado">ou 2x de R$ 74,49 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidade">Quantidade:</label>

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
                Fantasia completa inspirada no Máskara,
                perfeita para festas, aniversários e eventos temáticos.
                Confortável, leve e divertida.
            </p>
        </div>

        <div>
            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 15 a 60+ anos</li>
                <li>Inclui: vestido + colar</li>
                <li>Cor: amarelo e verde</li>
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

    <script src="script.js"></script>

    <script>
        (function() {

            const precoProdutoMaskara = 148.98;

            const quantidadeMaskara = document.getElementById("quantidade");
            const valorParcialMaskara = document.getElementById("valorParcial");
            const botaoAdicionarMaskara = document.getElementById("adicionarCarrinho");
            const mensagemCarrinhoMaskara = document.getElementById("mensagemCarrinho");

            function formatarPrecoMaskara(valor) {
                return valor.toLocaleString("pt-BR", {
                    style: "currency",
                    currency: "BRL"
                });
            }

            function atualizarPrecoMaskara() {

                const qtd = Number(quantidadeMaskara.value);

                if (!Number.isInteger(qtd) || qtd < 1) {
                    valorParcialMaskara.textContent = "Informe uma quantidade válida.";
                    return;
                }

                valorParcialMaskara.textContent =
                    "Valor total: " + formatarPrecoMaskara(precoProdutoMaskara * qtd);

            }

            quantidadeMaskara.addEventListener("input", atualizarPrecoMaskara);
            quantidadeMaskara.addEventListener("change", atualizarPrecoMaskara);

            botaoAdicionarMaskara.addEventListener("click", function() {

                const qtd = Number(quantidadeMaskara.value);

                if (!Number.isInteger(qtd) || qtd < 1) {
                    mensagemCarrinhoMaskara.style.display = "block";
                    mensagemCarrinhoMaskara.style.color = "red";
                    mensagemCarrinhoMaskara.textContent = "Escolha uma quantidade válida!";
                    return;
                }

                const produto = {
                    nome: "Fantasia do Máskara",
                    preco: precoProdutoMaskara,
                    quantidade: qtd,
                    imagem: "fotos/masculinas/mascara.jpg"
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

                mensagemCarrinhoMaskara.style.display = "block";
                mensagemCarrinhoMaskara.style.color = "#faf06b";

                mensagemCarrinhoMaskara.innerHTML =
                    "✓ Produto adicionado ao carrinho!<br><br>" +
                    "Quantidade: " + qtd + "<br>" +
                    "Valor: " + formatarPrecoMaskara(precoProdutoMaskara * qtd);

            });

            atualizarPrecoMaskara();

        })();
    </script>

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

</body>
</html>
