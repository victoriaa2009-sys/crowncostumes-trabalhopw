
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

    <section class="produto-container" id="luigi">

        <div class="produto-img">
            <img src="fotos/unissex/uni8.jpg" alt="Fantasia do Luigi">
        </div>

        <div class="produto-info">

            <h2>Fantasia do Luigi</h2>

            <p class="preco">R$ 200,00 à vista</p>
            <p class="parcelado">ou 2x de R$ 100,00 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidadeLuigi">Quantidade:</label>

            <input type="number" id="quantidadeLuigi" value="1" min="1" step="1">

            <p id="valorParcialLuigi" class="valor-parcial">
                Valor total: R$ 200,00
            </p>

            <h3>Formas de pagamento</h3>

            <ul>
                <li>Cartão de crédito (Visa e Mastercard)</li>
                <li>Cartão de débito</li>
                <li>PIX</li>
                <li>Boleto bancário</li>
            </ul>

            <button class="btn" id="adicionarCarrinhoLuigi" type="button">
                Adicionar ao Carrinho
            </button>

            <div id="mensagemCarrinhoLuigi" class="mensagem-carrinho"></div>

        </div>

    </section>

    <section class="produto-descricao">

        <div>
            <h2>Descrição do Produto</h2>

            <p>
                Fantasia completa do Luigi do jogo Super Mario,
                perfeita para festas, aniversários e eventos temáticos.
                Confortável, leve e divertida.
            </p>
        </div>

        <div>
            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 15 a 60+ anos</li>
                <li>Inclui: chapéu + jardineira</li>
                <li>Cor: verde, azul e amarelo</li>
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

        const precoLuigi = 200;

        const quantidadeLuigi = document.getElementById("quantidadeLuigi");
        const valorParcialLuigi = document.getElementById("valorParcialLuigi");
        const botaoAdicionarLuigi = document.getElementById("adicionarCarrinhoLuigi");
        const mensagemCarrinhoLuigi = document.getElementById("mensagemCarrinhoLuigi");

        function formatarPrecoLuigi(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoLuigi() {

            const qtd = Number(quantidadeLuigi.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialLuigi.textContent = "Informe uma quantidade válida.";
                return;
            }

            valorParcialLuigi.textContent =
                "Valor total: " + formatarPrecoLuigi(precoLuigi * qtd);
        }

        quantidadeLuigi.addEventListener("input", atualizarPrecoLuigi);
        quantidadeLuigi.addEventListener("change", atualizarPrecoLuigi);

        botaoAdicionarLuigi.addEventListener("click", function() {

            const qtd = Number(quantidadeLuigi.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                mensagemCarrinhoLuigi.style.display = "block";
                mensagemCarrinhoLuigi.style.color = "red";
                mensagemCarrinhoLuigi.textContent = "Escolha uma quantidade válida!";
                return;
            }

            const produtoLuigi = {
                nome: "Fantasia do Luigi",
                preco: precoLuigi,
                quantidade: qtd,
                imagem: "fotos/unissex/uni8.jpg"
            };

            let carrinhoLuigi =
                JSON.parse(sessionStorage.getItem("carrinho")) || [];

            const produtoExistenteLuigi = carrinhoLuigi.find(function(item) {
                return item.nome === produtoLuigi.nome;
            });

            if (produtoExistenteLuigi) {
                produtoExistenteLuigi.quantidade += qtd;
            } else {
                carrinhoLuigi.push(produtoLuigi);
            }

            sessionStorage.setItem("carrinho", JSON.stringify(carrinhoLuigi));

            mensagemCarrinhoLuigi.style.display = "block";
            mensagemCarrinhoLuigi.style.color = "#faf06b";

            mensagemCarrinhoLuigi.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " + formatarPrecoLuigi(precoLuigi * qtd);

        });

        atualizarPrecoLuigi();

    })();
    </script>

</body>
</html>
