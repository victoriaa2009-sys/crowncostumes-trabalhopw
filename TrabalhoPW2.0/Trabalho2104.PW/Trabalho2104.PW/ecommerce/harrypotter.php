
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

    <section class="produto-container" id="harrypotter">

        <div class="produto-img">
            <img src="fotos/unissex/uni7.webp" alt="Fantasia de Harry Potter">
        </div>

        <div class="produto-info">

            <h2>Fantasia de Harry Potter</h2>

            <p class="preco">R$ 200,00 à vista</p>
            <p class="parcelado">ou 2x de R$ 100,00 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidadeHarry">Quantidade:</label>
            <input type="number" id="quantidadeHarry" value="1" min="1">

            <p id="valorParcialHarry" class="valor-parcial">
                Valor parcial: R$ 200,00
            </p>

            <h3>Formas de pagamento</h3>

            <ul>
                <li>Cartão de crédito (Visa e Mastercard)</li>
                <li>Cartão de débito</li>
                <li>PIX</li>
                <li>Boleto bancário</li>
            </ul>

            <button class="btn" id="adicionarCarrinhoHarry" type="button">
                Adicionar ao Carrinho
            </button>

            <div id="mensagemCarrinhoHarry" class="mensagem-carrinho"></div>

        </div>
    </section>

    <section class="produto-descricao">

        <div>
            <h2>Descrição do Produto</h2>

            <p>
                Fantasia completa de Harry Potter, perfeita para festas,
                aniversários e eventos temáticos. Confortável, leve e divertida.
            </p>
        </div>

        <div>
            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 15 a 60+ anos</li>
                <li>Inclui: capa + gravata + varinha</li>
                <li>Cor: preto e vermelho</li>
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

        const precoHarry = 200;

        const quantidadeHarry = document.getElementById("quantidadeHarry");
        const valorParcialHarry = document.getElementById("valorParcialHarry");
        const botaoAdicionarHarry = document.getElementById("adicionarCarrinhoHarry");
        const mensagemCarrinhoHarry = document.getElementById("mensagemCarrinhoHarry");

        function formatarPrecoHarry(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoHarry() {

            const qtd = Number(quantidadeHarry.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialHarry.textContent = "Informe uma quantidade válida.";
                return;
            }

            valorParcialHarry.textContent =
                "Valor parcial: " + formatarPrecoHarry(precoHarry * qtd);
        }

        quantidadeHarry.addEventListener("input", atualizarPrecoHarry);

        botaoAdicionarHarry.addEventListener("click", function() {

            const qtd = Number(quantidadeHarry.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                mensagemCarrinhoHarry.style.display = "block";
                mensagemCarrinhoHarry.style.color = "red";
                mensagemCarrinhoHarry.textContent = "Escolha uma quantidade válida!";
                return;
            }

            const produtoHarry = {
                nome: "Fantasia de Harry Potter",
                preco: precoHarry,
                quantidade: qtd,
                imagem: "fotos/unissex/uni7.webp"
            };

            let carrinhoHarry =
                JSON.parse(sessionStorage.getItem("carrinho")) || [];

            const produtoExistenteHarry = carrinhoHarry.find(function(item) {
                return item.nome === produtoHarry.nome;
            });

            if (produtoExistenteHarry) {
                produtoExistenteHarry.quantidade += qtd;
            } else {
                carrinhoHarry.push(produtoHarry);
            }

            sessionStorage.setItem("carrinho", JSON.stringify(carrinhoHarry));

            mensagemCarrinhoHarry.style.display = "block";
            mensagemCarrinhoHarry.style.color = "#faf06b";

            mensagemCarrinhoHarry.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " + formatarPrecoHarry(precoHarry * qtd);

        });

        atualizarPrecoHarry();

    })();
    </script>

</body>
</html>
