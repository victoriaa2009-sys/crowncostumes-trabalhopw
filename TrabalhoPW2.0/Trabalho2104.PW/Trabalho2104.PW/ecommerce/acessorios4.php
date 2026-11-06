
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

    <section class="produto-container" id="acessorios4">
        <div class="produto-img">
            <img src="fotos/acessorios/acessorios4.jpeg" alt="Acessórios de Mágico">
        </div>

        <div class="produto-info">
            <h2>Acessórios de Mágico</h2>

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

    <section class="produto-descricao">
        <div>
            <h2>Descrição do Produto</h2>
            <p>
                Acessórios de Mágico, perfeitos para festas, aniversários
                e eventos temáticos. Confortáveis, leves e divertidos.
            </p>
        </div>

        <div>
            <h2>Características</h2>
            <ul>
                <li>Material: poliéster confortável</li>
                <li>Tamanhos: 0 a 60+ anos</li>
                <li>Inclui: óculos + toca + luvas</li>
                <li>Cor: preto e branco</li>
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
        const precoProdutoMagico = 87.90;
        const quantidadeMagico = document.getElementById("quantidade");
        const valorParcialMagico = document.getElementById("valorParcial");
        const botaoAdicionarMagico = document.getElementById("adicionarCarrinho");
        const mensagemCarrinhoMagico = document.getElementById("mensagemCarrinho");

        function formatarPrecoMagico(valor) {
            return valor.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL"
            });
        }

        function atualizarPrecoMagico() {
            const qtd = Number(quantidadeMagico.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                valorParcialMagico.textContent =
                    "Informe uma quantidade válida.";
                return;
            }

            valorParcialMagico.textContent =
                "Valor parcial: " +
                formatarPrecoMagico(precoProdutoMagico * qtd);
        }

        quantidadeMagico.addEventListener("input", atualizarPrecoMagico);

        botaoAdicionarMagico.addEventListener("click", function() {
            const qtd = Number(quantidadeMagico.value);

            if (!Number.isInteger(qtd) || qtd < 1) {
                mensagemCarrinhoMagico.style.display = "block";
                mensagemCarrinhoMagico.style.color = "red";
                mensagemCarrinhoMagico.textContent =
                    "Escolha uma quantidade válida!";
                return;
            }

            const produtoMagico = {
                nome: "Acessórios de Mágico",
                preco: precoProdutoMagico,
                quantidade: qtd,
                imagem: "fotos/acessorios/acessorios4.jpeg"
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

            sessionStorage.setItem(
                "carrinho",
                JSON.stringify(carrinhoMagico)
            );

            mensagemCarrinhoMagico.style.display = "block";
            mensagemCarrinhoMagico.style.color = "#faf06b";
            mensagemCarrinhoMagico.innerHTML =
                "✓ Produto adicionado ao carrinho!<br><br>" +
                "Quantidade: " + qtd + "<br>" +
                "Valor: " +
                formatarPrecoMagico(precoProdutoMagico * qtd);
        });

        atualizarPrecoMagico();
    })();
    </script>

</body>
</html>
