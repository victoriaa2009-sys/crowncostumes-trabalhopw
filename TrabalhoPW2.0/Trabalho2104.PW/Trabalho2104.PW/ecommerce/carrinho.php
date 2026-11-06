
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
</head>

<body>

    <?php include "cabecalho.php"; ?>

    <!-- CARRINHO -->

    <section>

        <h2 class="carrinho-titulo">
            Seu Carrinho
        </h2>

        <table class="carrinho">

            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody id="listaCarrinho">
            </tbody>

        </table>

        <!-- RESUMO DO PEDIDO -->

        <div class="resumo">

            <h3>Resumo do pedido</h3>

            <!-- CUPOM -->

            <div class="cupom-container">

                <h3>Cupom de desconto</h3>

                <label for="cupom">Código do cupom:</label>

                <input
                    type="text"
                    id="cupom"
                    placeholder="Digite seu cupom"
                    autocomplete="off"
                >

                <button class="btn" id="aplicarCupom" type="button">
                    Aplicar Cupom
                </button>

                <p id="mensagemCupom"></p>

            </div>

            <p>
                Desconto:
                <span id="desconto">R$ 0,00</span>
            </p>

            <!-- CEP -->

            <label for="cep">CEP:</label>

            <input
                type="text"
                id="cep"
                placeholder="Digite seu CEP"
                maxlength="9"
            >

            <p id="mensagemFrete" class="mensagem-login"></p>

            <!-- FRETE -->

            <p>
                Frete:
                <span id="frete">R$ 0,00</span>
            </p>

            <!-- TOTAL -->

            <h2>
                Total:
                <span id="totalCarrinho">R$ 0,00</span>
            </h2>

            <button class="btn" id="calcularFrete" type="button">
                Calcular Frete
            </button>

            <button class="btn" id="finalizarCompra" type="button">
                Finalizar Compra
            </button>

        </div>

    </section>

    <!-- RODAPÉ -->

    <footer>
        <p>© 2026 Crown Costumes</p>
    </footer>

    <script src="script.js"></script>

    <script>
        (function() {

            /* ELEMENTOS DA PÁGINA */

            const listaCarrinho = document.getElementById("listaCarrinho");
            const totalCarrinho = document.getElementById("totalCarrinho");
            const frete = document.getElementById("frete");
            const cep = document.getElementById("cep");
            const mensagemFrete = document.getElementById("mensagemFrete");
            const botaoCalcularFrete = document.getElementById("calcularFrete");
            const botaoFinalizar = document.getElementById("finalizarCompra");

            /* ELEMENTOS DO CUPOM */

            const campoCupom = document.getElementById("cupom");
            const botaoAplicarCupom = document.getElementById("aplicarCupom");
            const mensagemCupom = document.getElementById("mensagemCupom");
            const desconto = document.getElementById("desconto");

            /* PEGAR O CARRINHO */

            let produtosCarrinho = JSON.parse(
                sessionStorage.getItem("carrinho")
            ) || [];

            /* VALORES DO FRETE E DESCONTO */

            let valorFrete = 0;
            let valorDesconto = 0;
            let cupomAplicado = false;

            const codigoCupom = "DESCONTO2026";
            const porcentagemDesconto = 0.10;

            /* FORMATAR PREÇO */

            function formatarPrecoCarrinho(valor) {
                return "R$ " + valor.toFixed(2).replace(".", ",");
            }

            /* SALVAR CARRINHO */

            function salvarCarrinho() {
                sessionStorage.setItem(
                    "carrinho",
                    JSON.stringify(produtosCarrinho)
                );
            }

            /* MOSTRAR OS PRODUTOS */

            function mostrarCarrinho() {

                listaCarrinho.innerHTML = "";

                if (produtosCarrinho.length === 0) {

                    listaCarrinho.innerHTML = `
                        <tr>
                            <td colspan="6">
                                Seu carrinho está vazio.
                            </td>
                        </tr>
                    `;

                    valorFrete = 0;
                    valorDesconto = 0;
                    cupomAplicado = false;

                    atualizarTotal();
                    return;
                }

                produtosCarrinho.forEach(function(produto, indice) {

                    const totalProduto =
                        produto.preco * produto.quantidade;

                    const linha = document.createElement("tr");

                    linha.innerHTML = `

                        <td>
                            <img
                                src="${produto.imagem}"
                                width="60"
                                alt="${produto.nome}"
                            >
                        </td>

                        <td>${produto.nome}</td>

                        <td>
                            <button
                                class="btn"
                                type="button"
                                data-acao="diminuir"
                                data-indice="${indice}"
                            >
                                -
                            </button>

                            <span style="margin: 0 10px;">
                                ${produto.quantidade}
                            </span>

                            <button
                                class="btn"
                                type="button"
                                data-acao="aumentar"
                                data-indice="${indice}"
                            >
                                +
                            </button>
                        </td>

                        <td>${formatarPrecoCarrinho(produto.preco)}</td>

                        <td>${formatarPrecoCarrinho(totalProduto)}</td>

                        <td>
                            <button
                                class="btn"
                                type="button"
                                data-acao="remover"
                                data-indice="${indice}"
                            >
                                Remover
                            </button>
                        </td>
                    `;

                    listaCarrinho.appendChild(linha);

                });

                atualizarTotal();
            }

            /* BOTÕES DE QUANTIDADE E REMOÇÃO */

            listaCarrinho.addEventListener("click", function(evento) {

                const botao = evento.target.closest("button[data-acao]");

                if (!botao) {
                    return;
                }

                const indice = Number(botao.dataset.indice);
                const acao = botao.dataset.acao;

                if (acao === "aumentar") {
                    produtosCarrinho[indice].quantidade++;
                }

                else if (acao === "diminuir") {

                    if (produtosCarrinho[indice].quantidade > 1) {
                        produtosCarrinho[indice].quantidade--;
                    } else {
                        produtosCarrinho.splice(indice, 1);
                    }

                }

                else if (acao === "remover") {
                    produtosCarrinho.splice(indice, 1);
                }

                salvarCarrinho();
                mostrarCarrinho();

            });

            /* ATUALIZAR TOTAL */

            function atualizarTotal() {

                let subtotal = 0;

                produtosCarrinho.forEach(function(produto) {
                    subtotal += produto.preco * produto.quantidade;
                });

                if (cupomAplicado) {
                    valorDesconto = subtotal * porcentagemDesconto;
                } else {
                    valorDesconto = 0;
                }

                const total =
                    subtotal - valorDesconto + valorFrete;

                desconto.textContent =
                    formatarPrecoCarrinho(valorDesconto);

                frete.textContent =
                    formatarPrecoCarrinho(valorFrete);

                totalCarrinho.textContent =
                    formatarPrecoCarrinho(total);

            }

            /* APLICAR CUPOM */

            botaoAplicarCupom.addEventListener("click", function() {

                const codigoDigitado =
                    campoCupom.value.trim().toUpperCase();

                if (produtosCarrinho.length === 0) {
                    mensagemCupom.textContent =
                        "Adicione produtos ao carrinho primeiro.";
                    return;
                }

                if (codigoDigitado === codigoCupom) {

                    if (cupomAplicado) {
                        mensagemCupom.textContent =
                            "O cupom já foi aplicado!";
                        return;
                    }

                    cupomAplicado = true;

                    mensagemCupom.textContent =
                        "Cupom aplicado com sucesso! Você ganhou 10% de desconto.";

                    campoCupom.disabled = true;
                    botaoAplicarCupom.disabled = true;

                    atualizarTotal();

                } else {

                    mensagemCupom.textContent =
                        "Cupom inválido. Tente novamente.";

                }

            });

            /* CALCULAR FRETE PELO CEP */

            botaoCalcularFrete.addEventListener("click", function() {

                if (produtosCarrinho.length === 0) {
                    mensagemFrete.textContent =
                        "Adicione um produto ao carrinho primeiro.";

                    valorFrete = 0;
                    atualizarTotal();
                    return;
                }

                const numeroCEP = cep.value.replace(/\D/g, "");

                if (numeroCEP.length !== 8) {
                    mensagemFrete.textContent =
                        "Digite um CEP válido com 8 números.";

                    valorFrete = 0;
                    atualizarTotal();
                    return;
                }

                /*
                FAIXAS DE FRETE SIMULADAS
                PARA O PROJETO ESCOLAR.
                */

                const primeiroDigito = parseInt(numeroCEP.charAt(0));

                if (primeiroDigito <= 1) {
                    valorFrete = 20;
                }

                else if (primeiroDigito <= 3) {
                    valorFrete = 25;
                }

                else if (primeiroDigito <= 5) {
                    valorFrete = 30;
                }

                else if (primeiroDigito <= 7) {
                    valorFrete = 35;
                }

                else {
                    valorFrete = 40;
                }

                mensagemFrete.textContent =
                    "Frete calculado com sucesso!";

                atualizarTotal();

            });

            /* FORMATAR CEP */

            cep.addEventListener("input", function() {

                let valorCEP = cep.value.replace(/\D/g, "");

                if (valorCEP.length > 5) {
                    valorCEP =
                        valorCEP.substring(0, 5) +
                        "-" +
                        valorCEP.substring(5, 8);
                }

                cep.value = valorCEP;

            });

            /* FINALIZAR COMPRA */

            botaoFinalizar.addEventListener("click", function() {

                if (produtosCarrinho.length === 0) {
                    alert("Seu carrinho está vazio!");
                    return;
                }

                if (cep.value.replace(/\D/g, "").length !== 8) {
                    alert("Digite um CEP válido!");
                    return;
                }

                alert("Compra finalizada com sucesso!");

                /* LIMPAR CARRINHO */

                produtosCarrinho = [];
                sessionStorage.removeItem("carrinho");

                /* LIMPAR CEP */

                cep.value = "";

                /* ZERAR FRETE E DESCONTO */

                valorFrete = 0;
                valorDesconto = 0;
                cupomAplicado = false;

                /* LIMPAR CUPOM */

                campoCupom.value = "";
                campoCupom.disabled = false;
                botaoAplicarCupom.disabled = false;
                mensagemCupom.textContent = "";

                /* LIMPAR MENSAGEM DO FRETE */

                mensagemFrete.textContent = "";

                /* ATUALIZAR TELA */

                mostrarCarrinho();

            });

            /* INICIAR CARRINHO */

            mostrarCarrinho();

        })();
    </script>

</body>
</html>
