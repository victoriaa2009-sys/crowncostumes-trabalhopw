
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

    <section class="produto-container" id="magico">

        <div class="produto-img">
            <img src="fotos/masculinas/mágico.jpg" alt="Fantasia de Mágico Masculina">
        </div>

        <div class="produto-info">

            <h2>Fantasia de Mágico Masculina</h2>

            <p class="preco">R$ 148,98 à vista</p>
            <p class="parcelado">ou 2x de R$ 74,49 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidadeMagico">Quantidade:</label>

            <input type="number" id="quantidadeMagico" value="1" min="1" step="1">

            <p id="valorParcialMagico" class="valor-parcial">
                Valor total: R$ 148,98
            </p>

            <h3>Formas de pagamento</h3>

            <ul>
                <li>Cartão de crédito (Visa e Mastercard)</li>
                <li>Cartão de débito</li>
                <li>PIX</li>
                <li>Boleto bancário</li>
            </ul>

            <button class="btn" id="adicionarCarrinhoMagico" type="button">
                Adicionar ao Carrinho
            </button>

            <div id="mensagemCarrinhoMagico" class="mensagem-carrinho"></div>

        </div>

    </section>

    <section class="produto-descricao">

        <div>
            <h2>Descrição do Produto</h2>

            <p>
                Fantasia completa de Mágico, perfeita para festas,
                aniversários e eventos temáticos.
                Confortável, leve e divertida.
            </p>
        </div>

        <div>
            <h2>Características</h2>

            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 15 a 60+ anos</li>
                <li>Inclui: vestido + colar</li>
                <li>Cor: laranja, bege, amarelo e azul</li>
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

        const precoMagico = 148.98;

        const quantidadeMagico = document.getElementById("quantidadeMagico");
        const valorParcialMagico = document.getElementById("valorParcialMagico");
        const botaoAdicionarMagico = document.getElementById("adicionarCarrinhoMagico");
        const mensagemCarrinhoMagico = document.getElementById("mensagemCarrinhoMagico");

        function formatarPrecoMagico(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoMagico() {

            const qtd = Number(quantidadeMagico.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialMagico.textContent = "Informe uma quantidade válida.";
                return;
            }

            valorParcialMagico.textContent =
                "Valor total: " + formatarPrecoMagico(precoMagico * qtd);
        }

        quantidadeMagico.addEventListener("input", atualizarPrecoMagico);
        quantidadeMagico.addEventListener("change", atualizarPrecoMagico);

        botaoAdicionarMagico.addEventListener("click", function() {

            const qtd = Number(quantidadeMagico.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                mensagemCarrinhoMagico.style.display = "block";
                mensagemCarrinhoMagico.style.color = "red";
                mensagemCarrinhoMagico.textContent = "Escolha uma quantidade válida!";
                return;
            }

            const produtoMagico = {
                nome: "Fantasia de Mágico Masculina",
                preco: precoMagico,
                quantidade: qtd,
                imagem: "fotos/masculinas/mágico.jpg"
            };

            let carrinhoMagico =
                JSON.parse(sessionStorage.getItem("carrinho")) || [];

            const produtoExistenteMagico = carrinhoMagico.find(function(item) {
                return item.nome === produtoMagico.nome;
            });

            if (produtoExistenteMagico) {
                produtoExistenteMagico.quantidade += qtd;
            } else {
                carrinhoMagico.push(produtoMagico);
            }

            sessionStorage.setItem("carrinho", JSON.stringify(carrinhoMagico));

            mensagemCarrinhoMagico.style.display = "block";
            mensagemCarrinhoMagico.style.color = "#faf06b";

            mensagemCarrinhoMagico.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " + formatarPrecoMagico(precoMagico * qtd);

        });

        atualizarPrecoMagico();

    })();
    </script>

</body>
</html>
