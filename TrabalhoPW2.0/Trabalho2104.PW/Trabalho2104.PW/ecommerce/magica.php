
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

    <section class="produto-container" id="magica">

        <div class="produto-img">
            <img src="fotos/femininas/magica.jpeg" alt="Fantasia de Mágica Feminina">
        </div>

        <div class="produto-info">

            <h2>Fantasia de Mágica</h2>

            <p class="preco">R$ 150,00 à vista</p>
            <p class="parcelado">ou 2x de R$ 75,00 sem juros</p>
            <p class="entrega">Entrega em até 5 dias úteis</p>

            <label for="quantidadeMagica">Quantidade:</label>

            <input type="number" id="quantidadeMagica" value="1" min="1" step="1">

            <p id="valorParcialMagica" class="valor-parcial">
                Valor total: R$ 150,00
            </p>

            <h3>Formas de pagamento</h3>

            <ul>
                <li>Cartão de crédito (Visa e Mastercard)</li>
                <li>Cartão de débito</li>
                <li>PIX</li>
                <li>Boleto bancário</li>
            </ul>

            <button class="btn" id="adicionarCarrinhoMagica" type="button">
                Adicionar ao Carrinho
            </button>

            <div id="mensagemCarrinhoMagica" class="mensagem-carrinho"></div>

        </div>

    </section>

    <section class="produto-descricao">

        <div>
            <h2>Descrição do Produto</h2>

            <p>
                Fantasia completa de Mágica, perfeita para festas,
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

        const precoMagica = 150;

        const quantidadeMagica = document.getElementById("quantidadeMagica");
        const valorParcialMagica = document.getElementById("valorParcialMagica");
        const botaoAdicionarMagica = document.getElementById("adicionarCarrinhoMagica");
        const mensagemCarrinhoMagica = document.getElementById("mensagemCarrinhoMagica");

        function formatarPrecoMagica(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoMagica() {

            const qtd = Number(quantidadeMagica.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialMagica.textContent = "Informe uma quantidade válida.";
                return;
            }

            valorParcialMagica.textContent =
                "Valor total: " + formatarPrecoMagica(precoMagica * qtd);
        }

        quantidadeMagica.addEventListener("input", atualizarPrecoMagica);
        quantidadeMagica.addEventListener("change", atualizarPrecoMagica);

        botaoAdicionarMagica.addEventListener("click", function() {

            const qtd = Number(quantidadeMagica.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                mensagemCarrinhoMagica.style.display = "block";
                mensagemCarrinhoMagica.style.color = "red";
                mensagemCarrinhoMagica.textContent = "Escolha uma quantidade válida!";
                return;
            }

            const produtoMagica = {
                nome: "Fantasia de Mágica",
                preco: precoMagica,
                quantidade: qtd,
                imagem: "fotos/femininas/magica.jpeg"
            };

            let carrinhoMagica =
                JSON.parse(sessionStorage.getItem("carrinho")) || [];

            const produtoExistenteMagica = carrinhoMagica.find(function(item) {
                return item.nome === produtoMagica.nome;
            });

            if (produtoExistenteMagica) {
                produtoExistenteMagica.quantidade += qtd;
            } else {
                carrinhoMagica.push(produtoMagica);
            }

            sessionStorage.setItem("carrinho", JSON.stringify(carrinhoMagica));

            mensagemCarrinhoMagica.style.display = "block";
            mensagemCarrinhoMagica.style.color = "#faf06b";

            mensagemCarrinhoMagica.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " + formatarPrecoMagica(precoMagica * qtd);

        });

        atualizarPrecoMagica();

    })();
    </script>

</body>
</html>
