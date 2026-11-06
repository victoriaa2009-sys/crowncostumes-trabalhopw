
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

    <section class="produto-container" id="belaeafera">

        <div class="produto-img">
            <img src="fotos/femininas/Belaeafera.webp" alt="Fantasia de Bela">
        </div>

        <div class="produto-info">

            <h2>Fantasia da Bela</h2>

            <p class="preco">R$ 150,00 à vista</p>
            <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" value="1" min="1">

            <p id="valorParcial" class="valor-parcial">
                Valor parcial: R$ 150,00
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
                Fantasia completa inspirada na Bela do filme A Bela e a Fera,
                perfeita para festas, aniversários e eventos temáticos.
                Confortável, leve e divertida.
            </p>
        </div>

        <div>
            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 15 a 60+ anos</li>
                <li>Inclui: vestido + tiara</li>
                <li>Cor: amarelo</li>
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

        const precoProdutoBela = 150;

        const quantidadeBela = document.getElementById("quantidade");
        const valorParcialBela = document.getElementById("valorParcial");
        const botaoAdicionarBela = document.getElementById("adicionarCarrinho");
        const mensagemCarrinhoBela = document.getElementById("mensagemCarrinho");

        function formatarPrecoBela(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoBela() {

            const qtd = Number(quantidadeBela.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialBela.textContent =
                    "Informe uma quantidade válida.";
                return;
            }

            valorParcialBela.textContent =
                "Valor parcial: " +
                formatarPrecoBela(precoProdutoBela * qtd);
        }

        quantidadeBela.addEventListener("input", atualizarPrecoBela);

        botaoAdicionarBela.addEventListener("click", function() {

            const qtd = Number(quantidadeBela.value);

            if (!Number.isInteger(qtd) || qtd < 1) {

                mensagemCarrinhoBela.style.display = "block";
                mensagemCarrinhoBela.style.color = "red";
                mensagemCarrinhoBela.textContent =
                    "Escolha uma quantidade válida!";

                return;
            }

            const produtoBela = {
                nome: "Fantasia da Bela",
                preco: precoProdutoBela,
                quantidade: qtd,
                imagem: "fotos/femininas/Belaeafera.webp"
            };

            let carrinhoBela =
                JSON.parse(sessionStorage.getItem("carrinho")) || [];

            const produtoExistenteBela = carrinhoBela.find(function(item) {
                return item.nome === produtoBela.nome;
            });

            if (produtoExistenteBela) {
                produtoExistenteBela.quantidade += qtd;
            } else {
                carrinhoBela.push(produtoBela);
            }

            sessionStorage.setItem(
                "carrinho",
                JSON.stringify(carrinhoBela)
            );

            mensagemCarrinhoBela.style.display = "block";
            mensagemCarrinhoBela.style.color = "#faf06b";

            mensagemCarrinhoBela.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " +
                formatarPrecoBela(precoProdutoBela * qtd);

        });

        atualizarPrecoBela();

    })();
    </script>

</body>
</html>
